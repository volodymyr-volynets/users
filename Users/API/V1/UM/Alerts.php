<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\API\V1\UM;

use Helper\Constant\HTTPConstants;
use Object\Controller\API;
use Numbers\Users\Users\Model\User\Alert\UserAlertTypes;

class Alerts extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Alerts (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Alerts';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => false,
        'authorized' => true,
        'permission' => false,
    ];

    public $loc = [];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Authorized');
    }

    /**
     * Get alerts API
     */
    public $postGetAlerts_name = 'Get Alerts';
    public $postGetAlerts_description = 'Use this API to get alerts for user.';
    public $postGetAlerts_columns = [
        'um_usralert_um_user_id' => ['required' => true, 'name' => 'User #', 'domain' => 'user_id'],
        'um_usralert_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postGetAlerts_result_danger = \Validator::RESULT_DANGER;
    public $postGetAlerts_result_success = RESULT_SUCCESS;
    public function postGetAlerts()
    {
        $result = \Numbers\Users\Users\Model\User\Alerts::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns('*')
            ->whereMultiple('AND', [
                'um_usralert_tenant_id' => \Tenant::id(),
                'um_usralert_um_user_id' => $this->values['um_usralert_um_user_id'],
                'um_usralert_inactive' => $this->values['um_usralert_inactive'] ?? 0,
            ])
            ->orderby(['um_usralert_id' => SORT_DESC])
            ->query('um_usralert_id');

        $types = UserAlertTypes::optionsStatic();
        foreach ($result['rows'] as $k => $v) {
            $result['rows'][$k]['um_usralert_um_usralrttype_name'] = \I18n::textToLoc('NF.Data', $types[$v['um_usralert_um_usralrttype_code']]['name'], [
                'translate' => true,
            ]);
            $result['rows'][$k]['um_usralert_ago'] = new \Datetime2($v['um_usralert_inserted_timestamp'])->ago();
            if ($v['um_usralert_loc_json'] && is_json($v['um_usralert_loc_json'], ['is_object' => true])) {
                $result['rows'][$k]['um_usralert_description_loc'] = loc($v['um_usralert_loc_json']);
            } else {
                $result['rows'][$k]['um_usralert_description_loc'] = $v['um_usralert_description'];
            }
            $result['rows'][$k]['um_usralert_um_user_name'] = \User::get('name');
        }

        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'data' => array_values($result['rows'] ?? []),
        ]);
    }

    /**
     * Dismiss alerts API
     */
    public $postDismissAlert_name = 'Get Alerts';
    public $postDismissAlert_description = 'Use this API to dismiss alert for user.';
    public $postDismissAlert_columns = [
        'um_usralert_id' => ['required' => true, 'name' => 'Alert #', 'domain' => 'big_id'],
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postDismissAlert_result_danger = \Validator::RESULT_DANGER;
    public $postDismissAlert_result_success = RESULT_SUCCESS;
    public function postDismissAlert()
    {
        $result = \Numbers\Users\Users\Model\User\Alerts::queryBuilderStatic(['alias' => 'a'])
            ->update()
            ->set([
                'um_usralert_inactive' => 1,
            ])
            ->whereMultiple('AND', [
                'um_usralert_tenant_id' => \Tenant::id(),
                'um_usralert_id' => $this->values['um_usralert_id'],
            ])
            ->query();

        return $this->finish(HTTPConstants::isSuccess($result['success']), [
            'success' => $result['success'],
            'error' => $result['error'],
        ]);
    }
}
