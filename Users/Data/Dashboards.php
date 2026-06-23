<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

use Object\Import;

class Dashboards extends Import
{
    public $data = [
        'tasks' => [
            'options' => [
                'pk' => ['d9_backdash_tenant_id', 'd9_backdash_id'],
                'model' => '\Numbers\Users\Dashboards\Model\Collection\BackendDashboards',
                'method' => 'save'
            ],
            'data' => [
                [
                    'd9_backdash_tenant_id' => '::preserve::1',
                    'd9_backdash_code' => 'UM::USER_SIGNIN_DASHBOARD',
                    'd9_backdash_name' => 'U/M User Sign In Dashboard',
                    'd9_backdash_module_code' => 'UM',
                    'd9_backdash_model' => '\Numbers\Users\Users\Dashboard\UserSignIns',
                    'd9_backdash_x_size' => 100,
                    'd9_backdash_y_size' => 200,
                    'd9_backdash_size_description' => '(100% x 200px)',
                    'd9_backdash_inactive' => 0,
                    '\Numbers\Users\Dashboards\Model\Backend\Dashboard\Parameters' => []
                ],
                [
                    'd9_backdash_tenant_id' => '::preserve::1',
                    'd9_backdash_code' => 'UM::USER_SIGNIN_TOTALS',
                    'd9_backdash_name' => 'U/M User Sign In (Totals) Dashboard',
                    'd9_backdash_module_code' => 'UM',
                    'd9_backdash_model' => '\Numbers\Users\Users\Dashboard\UserSignInTotals',
                    'd9_backdash_x_size' => 25,
                    'd9_backdash_y_size' => 200,
                    'd9_backdash_size_description' => '(25% x 200px)',
                    'd9_backdash_inactive' => 0,
                    '\Numbers\Users\Dashboards\Model\Backend\Dashboard\Parameters' => []
                ],
                [
                    'd9_backdash_tenant_id' => '::preserve::1',
                    'd9_backdash_code' => 'UM::USER_SESSION_TOTALS',
                    'd9_backdash_name' => 'U/M User Session (Totals) Dashboard',
                    'd9_backdash_module_code' => 'UM',
                    'd9_backdash_model' => '\Numbers\Users\Users\Dashboard\UserSessionTotals',
                    'd9_backdash_x_size' => 25,
                    'd9_backdash_y_size' => 200,
                    'd9_backdash_size_description' => '(25% x 200px)',
                    'd9_backdash_inactive' => 0,
                    '\Numbers\Users\Dashboards\Model\Backend\Dashboard\Parameters' => []
                ],
                [
                    'd9_backdash_tenant_id' => '::preserve::1',
                    'd9_backdash_code' => 'UM::USER_SESSIONS_DASHBOARD',
                    'd9_backdash_name' => 'U/M User Sessions Dashboard',
                    'd9_backdash_module_code' => 'UM',
                    'd9_backdash_model' => '\Numbers\Users\Users\Dashboard\UserSessions',
                    'd9_backdash_x_size' => 100,
                    'd9_backdash_y_size' => 200,
                    'd9_backdash_size_description' => '(100% x 200px)',
                    'd9_backdash_inactive' => 0,
                    '\Numbers\Users\Dashboards\Model\Backend\Dashboard\Parameters' => []
                ],
            ],
        ],
    ];
}
