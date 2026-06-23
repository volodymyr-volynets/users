<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Data;

use Object\Import;

class QuickActions extends Import
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
                    'sm_resource_id' => '::id::\QuickActions\Numbers\Users\Chats\Controller\ChatPageStandalone',
                    'sm_resource_code' => '\QuickActions\Numbers\Users\Chats\Controller\ChatPageStandalone',
                    'sm_resource_type' => 215,
                    'sm_resource_name' => 'Chats & Channels',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-message',
                    'sm_resource_module_code' => 'C5',
                    'sm_resource_group1_name' => 'Chats',
                    'sm_resource_group2_name' => null,
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
                    'sm_resource_menu_url' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
                    'sm_resource_inactive' => 0
                ],
            ]
        ]
    ];
}
