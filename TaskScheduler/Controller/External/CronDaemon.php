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
use Numbers\Users\TaskScheduler\Helper\ProcessJobs;
use Numbers\Users\TaskScheduler\Model\Daemons;
use Object\Content\Messages;
use Object\Controller;

class CronDaemon extends Controller
{
    public $title = 'Cron Daemon';
    public function actionIndex()
    {
        // process input
        $input = \Request::input();
        $is_cli = false;
        if (!empty($input['daemon_token']) && !empty($input['daemon_code'])) {
            $is_cli = Daemons::checkIfValidDaemonToken($input['daemon_code'] . '', $input['daemon_token'] . '');
        }
        if (!\Application::get('debug.toolbar') && !$is_cli) {
            throw new \Exception('You must enabled toolbar to view Dev. Portal.');
        }
        if (empty($input['datetime'])) {
            $input['datetime'] = \Format::now('datetime');
        }
        // we need to set "now" in abstract
        Task::$now = $input['datetime'];
        // form to get parameters
        $form = new \Numbers\Users\TaskScheduler\Form\External\CronDaemon([
            'input' => $input
        ]);
        $result = $form->apiResult();
        if (!$result['success'] || empty($form->form_object->values['__submit_button'])) {
            if ($is_cli) {
                \Layout::renderAs($result, 'application/json');
            } else {
                echo $form->render();
            }
        } else {
            $model = new ProcessJobs();
            $result = $model->process($form->form_object->values + ['__preserve_tenant_host' => $input['__preserve_tenant_host'] ?? false]);
            if ($is_cli) {
                \Layout::renderAs($result, 'application/json');
            } else {
                if (!$result['success']) {
                    $form->form_object->error(DANGER, $result['error']);
                } else {
                    $form->form_object->error(SUCCESS, Messages::OPERATION_EXECUTED);
                }
                echo $form->render();
            }
        }
    }
}
