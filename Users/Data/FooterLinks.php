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

class FooterLinks extends Import
{
    public $data = [
        'quick_actions' => [
            'options' => [
                'pk' => ['sm_resource_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_resource_id' => '::id::\FooterLinks\Numbers\Users\Users\Controller\Users\List',
                    'sm_resource_code' => '\FooterLinks\Numbers\Users\Users\Controller\Users\List',
                    'sm_resource_type' => 230,
                    'sm_resource_name' => 'U/M Users',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-users',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'User Management',
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
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Users',
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\FooterLinks\Numbers\Users\Users\Controller\Users\New',
                    'sm_resource_code' => '\FooterLinks\Numbers\Users\Users\Controller\Users\New',
                    'sm_resource_type' => 230,
                    'sm_resource_name' => 'U/M New User',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-file',
                    'sm_resource_module_code' => 'UM',
                    'sm_resource_group1_name' => 'User Management',
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
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_New',
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Users/_Edit',
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\FooterLinks\Numbers\Users\Users\Controller\Login',
                    'sm_resource_code' => '\FooterLinks\Numbers\Users\Users\Controller\Login',
                    'sm_resource_type' => 230,
                    'sm_resource_name' => 'Sign In',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-sign-in-alt',
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
                    'sm_resource_menu_order' => -32001,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Login',
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\FooterLinks\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_code' => '\FooterLinks\Numbers\Users\Users\Controller\Logout',
                    'sm_resource_type' => 230,
                    'sm_resource_name' => 'Sign Out',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-sign-out-alt',
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
                    'sm_resource_menu_order' => -32001,
                    'sm_resource_menu_url' => '/Numbers/Users/Users/Controller/Logout',
                    'sm_resource_inactive' => 0
                ],
            ]
        ]
    ];
}
