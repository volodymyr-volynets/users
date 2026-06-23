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

class MenuSearches extends Import
{
    public $data = [
        'tasks' => [
            'options' => [
                'pk' => ['sm_menusearch_tenant_id', 'sm_menusearch_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Menu\Searches',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_menusearch_tenant_id' => '::preserve::1',
                    'sm_menusearch_code' => 'UM::USERS_SEARCH',
                    'sm_menusearch_name' => 'U/M Users',
                    'sm_menusearch_module_code' => 'UM',
                    'sm_menusearch_model' => '\Numbers\Users\Users\MenuSearch\Users',
                    'sm_menusearch_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                    'sm_menusearch_sm_resource_code' => '\Numbers\Users\Users\Controller\Users',
                    'sm_menusearch_icon' => 'fa-solid fa-users',
                    'sm_menusearch_inactive' => 0,
                ],
            ],
        ],
    ];
}
