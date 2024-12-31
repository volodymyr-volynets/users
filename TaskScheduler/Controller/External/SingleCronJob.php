<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Controller\External;

use Numbers\Users\TaskScheduler\Abstract2\Task;
use Numbers\Users\TaskScheduler\Model\Executed\Jobs;
use Numbers\Users\TaskScheduler\Model\Tasks;
use Numbers\Users\Users\Model\User\Authorize;
use Object\Controller;

class SingleCronJob extends Controller
{
    public $title = 'Single Cron Job';
    public function actionIndex()
    {
        $result = [
            'success' => false,
            'error' => []
        ];
        do {
            $input = \Request::input();
            if (empty($input['__token'])) {
                $result['error'][] = 'Token?';
                break;
            }
            $crypt_model = new \Crypt();
            if (($crypt_result = $crypt_model->tokenValidate($input['__token'])) === false) {
                $result['error'][] = 'Token?';
                break;
            }
            // execution limit 1 hour
            set_time_limit(3600);
            // 2GB memory limit
            ini_set('memory_limit', '2048M');
            // set tenant
            \Tenant::setOverrideTenantId((int) $crypt_result['id']);
            $exec_job_id = (int) $crypt_result['data'];
            $exec_tenant_id = (int) $crypt_result['id'];
            // login as user
            $authorize = Authorize::authorizeWithUserId((int) $crypt_result['token']);
            if (!$authorize['success']) {
                $result['error'][] = 'User?';
                break;
            }
            // fetch task
            $query = Jobs::queryBuilderStatic(['skip_acl' => true])->select();
            $query->columns('*');
            $query->join('INNER', new Tasks(), 'b', 'ON', [
                ['AND', ['a.ts_execjb_task_code', '=', 'b.ts_task_code', true]]
            ]);
            $query->where('AND', ['a.ts_execjb_id', '=', $exec_job_id]);
            $query->where('AND', ['a.ts_execjb_status', '=', 10]);
            $job = $query->query();
            if ($job['num_rows'] == 0) {
                $result['error'][] = 'Job?';
                break;
            }
            // set module #
            if (!empty($job['rows'][0]['ts_execjb_module_id'])) {
                \Application::$controller->module_id = $job['rows'][0]['ts_execjb_module_id'];
            }
            // update status on the job
            $execute_job_model = Jobs::collectionStatic();
            $execute_job_model->merge([
                'ts_execjb_tenant_id' => $exec_tenant_id,
                'ts_execjb_id' => $exec_job_id,
                'ts_execjb_status' => 20
            ]);
            // execute task
            $class = $job['rows'][0]['ts_task_model'];
            $job_model = new $class(json_decode($job['rows'][0]['ts_execjb_parameters'], true));
            // set time
            Task::$now = $job['rows'][0]['ts_execjb_datetime'];
            $job_result = $job_model->process([
                'datetime' => $job['rows'][0]['ts_execjb_datetime'],
                'timezone_code' => $job['rows'][0]['ts_execjb_timezone_code'],
                'task_code' => $job['rows'][0]['ts_execjb_task_code'],
            ]);
            if (!$job_result['success']) {
                $result['error'] = array_merge($result['error'], $job_result['error']);
                break;
            }
            // update job
            $execute_job_model->merge([
                'ts_execjb_tenant_id' => $exec_tenant_id,
                'ts_execjb_id' => $exec_job_id,
                'ts_execjb_status' => 30
            ]);
            // success
            $result['success'] = true;
        } while (0);
        \Layout::renderAs($result, 'application/json');
    }
}
