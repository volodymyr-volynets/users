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

class APIs extends Import
{
    public $data = [
        'controllers' => [
            'options' => [
                'pk' => ['sm_resource_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\APIs\Login',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\APIs\Login',
                    'sm_resource_type' => 150,
                    'sm_resource_classification' => 'APIs',
                    'sm_resource_name' => 'U/M Login API',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sign-in-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 1,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\APIMethods' => [
                        [
                            'sm_rsrcapimeth_method_code' => 'Login',
                            'sm_rsrcapimeth_method_name' => 'Login',
                            'sm_rsrcapimeth_inactive' => 0,
                        ],
                        [
                            'sm_rsrcapimeth_method_code' => 'Logout',
                            'sm_rsrcapimeth_method_name' => 'Logout',
                            'sm_rsrcapimeth_inactive' => 0,
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\APIs\Groups',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\APIs\Groups',
                    'sm_resource_type' => 150,
                    'sm_resource_classification' => 'APIs',
                    'sm_resource_name' => 'U/M User Groups API',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-object-group',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\APIMethods' => [
                        [
                            'sm_rsrcapimeth_method_code' => 'AllActions',
                            'sm_rsrcapimeth_method_name' => 'All Actions',
                            'sm_rsrcapimeth_inactive' => 0,
                        ],
                        [
                            'sm_rsrcapimeth_method_code' => 'Get',
                            'sm_rsrcapimeth_method_name' => 'Get',
                            'sm_rsrcapimeth_inactive' => 0,
                        ],
                        [
                            'sm_rsrcapimeth_method_code' => 'Save',
                            'sm_rsrcapimeth_method_name' => 'Save',
                            'sm_rsrcapimeth_inactive' => 0,
                        ],
                        [
                            'sm_rsrcapimeth_method_code' => 'Delete',
                            'sm_rsrcapimeth_method_name' => 'Delete',
                            'sm_rsrcapimeth_inactive' => 0,
                        ],
                    ]
                ],
            ]
        ]
    ];
}
