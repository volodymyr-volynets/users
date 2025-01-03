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
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Login',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Login',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'U/M Sign In',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sign-in-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Unsubscribe',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Unsubscribe',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'U/M Unsubscribe',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-window-close',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'U/M Sign Out',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sign-out-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Helper\Dashboard',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Helper\Dashboard',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'U/M Welcome Dashboard',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-wpexplorer',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Helper\Miniboard',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Helper\Miniboard',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'User Management Dashboard',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Account\Profile',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Account\Profile',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'Profile',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Account\Messages',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Account\Messages',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'Messages',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-envelope',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Password\Reset',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Password\Reset',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Miscellaneous',
                    'sm_resource_name' => 'Password Reset',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-key',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Authorization',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => []
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Settings',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Settings',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cogs',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Users',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'U/M Users',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-users',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Invites',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Invites',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'U/M Invites',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-astronaut',
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
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Groups',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Groups',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-object-group',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Teams',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Teams',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Teams',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sitemap',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
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
                            'sm_rsrcftr_feature_code' => 'UM::TEAMS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Titles',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Titles',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Titles',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-blind',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Roles',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Roles',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Roles',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user-circle',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
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
                            'sm_rsrcftr_feature_code' => 'UM::RBAC',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\Types',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Assignment\Types',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Assignment Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-link',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
                        [
                            'sm_rsrcftr_feature_code' => 'UM::RBAC',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Form\Overrides',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Form\Overrides',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Form Overrides',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cogs',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'Miscellaneous',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\System\Senders',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\System\Senders',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Notification Senders',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-envelope',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'Miscellaneous',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
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
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Reports',
                    'sm_resource_name' => 'U/M Organization Access Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-building',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::Report_View',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Reports',
                    'sm_resource_name' => 'U/M Resource Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-tasks',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::Report_View',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Reports',
                    'sm_resource_name' => 'U/M Role Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user-circle',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::Report_View',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Reports',
                    'sm_resource_name' => 'U/M User Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-friends',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::Report_View',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Reports',
                    'sm_resource_name' => 'U/M Team Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sitemap',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::Report_View',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Owner\Types',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Owner\Types',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Owner Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-gg',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\UserToUser',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Assignment\UserToUser',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M User To User Assignment',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-astronaut',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\UserToCustomer',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Assignment\UserToCustomer',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M User To Customer Assignment',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-check',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\Passwords',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Credential\Passwords',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Credential System Passwords',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-asterisk',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\Types',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Credential\Types',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Credential Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-clone',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\MyPasswords',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Credential\MyPasswords',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Credential My Passwords',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-galactic-republic',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
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
                            'sm_rsrcftr_feature_code' => 'UM::MY_PASSWORDS',
                            'sm_rsrcftr_inactive' => 0
                        ],
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
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Grant\Organizations',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Grant\Organizations',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Grant Organizations',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-building',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Grant',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Task\PostponedNotifications',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Task\PostponedNotifications',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Tasks',
                    'sm_resource_name' => 'U/M Postponed Notifications (Task)',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-sun',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Tasks',
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
                            'sm_rsrcftr_feature_code' => 'UM::USERS',
                            'sm_rsrcftr_inactive' => 0
                        ],
                        [
                            'sm_rsrcftr_feature_code' => 'TS::TASK_SCHEDULER',
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
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\Channels',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\Channels',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Channels',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-stack-exchange',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Channels',
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
                            'sm_rsrcftr_feature_code' => 'UM::CHANNELS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Users\Users\Controller\ChannelGroups',
                    'sm_resource_code' => '\Numbers\Users\Users\Controller\ChannelGroups',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'U/M Channel Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-object-group',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Channels',
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
                            'sm_rsrcftr_feature_code' => 'UM::CHANNELS',
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
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
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
                    'sm_resource_id' => '::id::\Menu\Account',
                    'sm_resource_code' => '\Menu\Account',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Account',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-address-card',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => null,
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 1,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_name_generator' => '/Numbers/Users/Users/Controller/Account/Account/_JsonMenuName',
                    'sm_resource_menu_child_ordered' => 1,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Account\Reports',
                    'sm_resource_code' => '\Menu\Account\Reports',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Reports',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-table',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 1,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_name_generator' => null,
                    'sm_resource_menu_child_ordered' => 0,
                    'sm_resource_menu_order' => 32000,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Account\Reports\Miscellaneous',
                    'sm_resource_code' => '\Menu\Account\Reports\Miscellaneous',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Miscellaneous',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cubes',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => 'Reports',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 1,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_name_generator' => null,
                    'sm_resource_menu_child_ordered' => 0,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Login',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Login',
                    'sm_resource_type' => 210,
                    'sm_resource_name' => 'Sign In',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sign-in-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 1,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Login',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_order' => -32000,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_type' => 210,
                    'sm_resource_name' => 'Sign Out',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sign-out-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Logout',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_order' => 999999,
                    'sm_resource_menu_separator' => 1,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Account\Profile',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Account\Profile',
                    'sm_resource_type' => 210,
                    'sm_resource_name' => 'Profile',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Account/Profile',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_order' => 10000,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Account\Messages',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Account\Messages',
                    'sm_resource_type' => 210,
                    'sm_resource_name' => 'Messages',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-envelope',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Account',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Account/Messages',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_menu_name_generator' => '/Numbers/Users/Users/Controller/Account/Messages/_JsonMenuName',
                    'sm_resource_menu_order' => 10100,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management',
                    'sm_resource_code' => '\Menu\Operations\User\Management',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'User Management',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => null,
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
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Helper/Miniboard',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\System\Channels',
                    'sm_resource_code' => '\Menu\Operations\User\Management\System\Channels',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Channels',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-affiliatetheme',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Settings',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Settings',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cogs',
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
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Settings',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Settings/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Users',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Users',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Users',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-users',
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
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Users',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Invites',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Invites',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Invites',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-astronaut',
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
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Invites',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Invites',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Groups',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Groups',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-object-group',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Groups',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Groups',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Titles',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Titles',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Titles',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-blind',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Titles',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Titles',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Settings',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Settings',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cogs',
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
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Grant',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Grant',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Grant',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-x-ray',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Roles',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Roles',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Roles',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user-circle',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Roles',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Roles',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\System\Senders',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\System\Senders',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Notification Senders',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-envelope',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'Miscellaneous',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\System\Senders',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/System/Senders/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Reports',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Reports',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Reports',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-table',
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
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Reports\Security',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Reports\Security',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Security',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-shield-alt',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Organization Access Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-building',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
                    'sm_resource_group4_name' => 'Security',
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::Report_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Report/Security/OrganizationAccessReport',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Resource Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-tasks',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
                    'sm_resource_group4_name' => 'Security',
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::Report_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Report/Security/ResourceSetupReport',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Role Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-user-circle',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
                    'sm_resource_group4_name' => 'Security',
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::Report_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Report/Security/RoleSetupReport',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'User Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-friends',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
                    'sm_resource_group4_name' => 'Security',
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::Report_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Report/Security/UserSetupReport',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Team Setup Report',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sitemap',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Reports',
                    'sm_resource_group4_name' => 'Security',
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::Report_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Report/Security/TeamSetupReport',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Form\Overrides',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Form\Overrides',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Form Overrides',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-cogs',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'System Management',
                    'sm_resource_group3_name' => 'Miscellaneous',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Form\Overrides',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Form/Overrides',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Teams',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Teams',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Teams',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-sitemap',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Teams',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Teams',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Assignment\Types',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Assignment\Types',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Assignment Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-link',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\Types',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Assignment/Types',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Owner\Types',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Owner\Types',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Owner Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-gg',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Owner\Types',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Owner/Types',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Assignments',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Assignments',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Assignments',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-lock',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Assignment\UserToUser',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Assignment\UserToUser',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'User To User',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-astronaut',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\UserToUser',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Assignment/UserToUser',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Assignment\UserToCustomer',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Assignment\UserToCustomer',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'User To Customer',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-user-check',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Assignments',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Assignment\UserToCustomer',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Assignment/UserToCustomer',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\User\Management\Credentials',
                    'sm_resource_code' => '\Menu\Operations\User\Management\Credentials',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Credentials',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-star-of-life',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Credential\Passwords',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Credential\Passwords',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'System Passwords',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fas fa-asterisk',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\Passwords',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Credential/Passwords',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Credential\Types',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Credential\Types',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Credential Types',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-clone',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\Types',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Credential/Types',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Credential\MyPasswords',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Credential\MyPasswords',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'My Passwords',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-galactic-republic',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Credentials',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Credential\MyPasswords',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Credential/MyPasswords',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Grant\Organizations',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Grant\Organizations',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Grant Organizations',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-building',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Grant',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Grant\Organizations',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Grant/Organizations/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Users\Users\Tasks',
                    'sm_resource_code' => '\Menu\Users\Users\Tasks',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Tasks',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-sun',
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
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Task\PostponedNotifications',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Task\PostponedNotifications',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Postponed Notifications',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-sun',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Tasks',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Task\PostponedNotifications',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Task/PostponedNotifications/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Channels',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Channels',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Channels',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fab fa-stack-exchange',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Channels',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Channels',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Channels',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\ChannelGroups',
                    'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\ChannelGroups',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Channel Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'far fa-object-group',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'User Management',
                    'sm_resource_group3_name' => 'Channels',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\ChannelGroups',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/ChannelGroups',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
            ]
        ]
    ];
}
