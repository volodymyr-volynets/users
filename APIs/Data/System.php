<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Data;

use Object\Import;

class System extends Import
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
                    'sm_resource_id' => '::id::\Numbers\Users\APIs\Controller\BearerTokens',
                    'sm_resource_code' => '\Numbers\Users\APIs\Controller\BearerTokens',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/3 Bearer Tokens',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-npm',
                    'sm_resource_module_code' => 'A3',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'APIs',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'A3::APIS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\APIs\Controller\APIResources',
                    'sm_resource_code' => '\Numbers\Users\APIs\Controller\APIResources',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/3 API Resources',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-ns8',
                    'sm_resource_module_code' => 'A3',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'APIs',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'A3::APIS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                    ]
                ],
            ]
        ],
        'menu' => [
            'options' => [
                'pk' => ['sm_resource_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_resource_id' => '::id::\Menu\Operations\System\Management\APIs',
                    'sm_resource_code' => '\Menu\Operations\System\Management\APIs',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'APIs',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-node',
                    'sm_resource_module_code' => 'A3',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\APIs\Controller\BearerTokens',
                    'sm_resource_code' => '\Menu\Numbers\Users\APIs\Controller\BearerTokens',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Bearer Tokens',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-npm',
                    'sm_resource_module_code' => 'A3',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'APIs',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\APIs\Controller\BearerTokens',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/APIs/Controller/BearerTokens',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\APIs\Controller\APIResources',
                    'sm_resource_code' => '\Menu\Numbers\Users\APIs\Controller\APIResources',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'API Resources',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-ns8',
                    'sm_resource_module_code' => 'A3',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'APIs',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\APIs\Controller\APIResources',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/APIs/Controller/APIResources',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
            ]
        ]
    ];
}
