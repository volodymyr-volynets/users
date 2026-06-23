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

class Import extends \Object\Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['sm_module_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_module_code' => 'C5',
                    'sm_module_type' => 20,
                    'sm_module_name' => 'C/5 Chats',
                    'sm_module_abbreviation' => 'C/5',
                    'sm_module_icon' => 'fa-brands fa-rocketchat',
                    'sm_module_transactions' => 0,
                    'sm_module_multiple' => 0,
                    'sm_module_activation_model' => null,
                    'sm_module_custom_activation' => false,
                    'sm_module_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
                ]
            ]
        ],
        'features' => [
            'options' => [
                'pk' => ['sm_feature_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_feature_module_code' => 'C5',
                    'sm_feature_code' => 'C5::CHATS',
                    'sm_feature_type' => 10,
                    'sm_feature_name' => 'C/5 Chats',
                    'sm_feature_icon' => 'fa-brands fa-rocketchat',
                    'sm_feature_activation_model' => null,
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
                        [
                            'sm_mdldep_child_module_code' => 'UM',
                            'sm_mdldep_child_feature_code' => 'UM::USERS'
                        ]
                    ]
                ],
            ]
        ],
        'chat_groups' => [
            'options' => [
                'pk' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_code'],
                'model' => '\Numbers\Users\Chats\Model\Groups',
                'method' => 'save_insert_new'
            ],
            'data' => [
                [
                    'c5_chatgroup_tenant_id' => 2,
                    'c5_chatgroup_code' => 'UM::USERS',
                    'c5_chatgroup_name' => 'U/M Users',
                    'c5_chatgroup_icon' => 'fa-solid fa-users',
                    'c5_chatgroup_mention' => '@um_users',
                    'c5_chatgroup_inactive' => 0
                ],
                [
                    'c5_chatgroup_tenant_id' => 2,
                    'c5_chatgroup_code' => 'ON::ORGANIZATIONS',
                    'c5_chatgroup_name' => 'O/N Organizations',
                    'c5_chatgroup_icon' => 'fa-regular fa-building',
                    'c5_chatgroup_mention' => '@on_organizations',
                    'c5_chatgroup_inactive' => 0
                ],
                [
                    'c5_chatgroup_tenant_id' => 2,
                    'c5_chatgroup_code' => 'ON::CUSTOMERS',
                    'c5_chatgroup_name' => 'O/N Customers',
                    'c5_chatgroup_icon' => 'fa-solid fa-user-check',
                    'c5_chatgroup_mention' => '@on_customers',
                    'c5_chatgroup_inactive' => 0
                ],
                [
                    'c5_chatgroup_tenant_id' => 2,
                    'c5_chatgroup_code' => 'ON::LOCATIONS',
                    'c5_chatgroup_name' => 'O/N Locations',
                    'c5_chatgroup_icon' => 'fa-solid fa-warehouse',
                    'c5_chatgroup_mention' => '@on_locations',
                    'c5_chatgroup_inactive' => 0
                ]
            ]
        ],
        'chat_channels' => [
            'options' => [
                'pk' => ['c5_chatchannel_tenant_id', 'c5_chatchannel_code'],
                'model' => '\Numbers\Users\Chats\Model\Channels',
                'method' => 'save_insert_new'
            ],
            'data' => [
                [
                    'c5_chatchannel_tenant_id' => 2,
                    'c5_chatchannel_code' => 'UM::TECHNICAL_SUPPORT',
                    'c5_chatchannel_name' => 'Technical Support',
                    'c5_chatchannel_icon' => 'fa-solid fa-wrench',
                    'c5_chatchannel_mention' => '#technical_support',
                    'c5_chatchannel_global' => 1,
                    'c5_chatchannel_inactive' => 0
                ],
            ]
        ],
    ];
}
