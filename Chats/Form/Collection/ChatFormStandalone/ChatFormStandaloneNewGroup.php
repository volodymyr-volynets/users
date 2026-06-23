<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormStandalone;

use Object\Form\Wrapper\Base;
use NF\Error;
use Numbers\Users\Users\Model\User\Mentions;
use Numbers\Users\Users\Model\User\Group\Map;

class ChatFormStandaloneNewGroup extends Base
{
    public $form_link = 'c5_chat_standalone_new_group_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Group Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 200, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 300],
        'chats_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Chats\Model\Group\Map',
            'details_pk' => ['c5_chatgrpmap_c5_chat_id'],
            'required' => false,
            'order' => 35000,
        ],
        'channels_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Chats\Model\Group\Channels',
            'details_pk' => ['c5_chatgrpchannel_c5_chatchannel_code'],
            'required' => false,
            'order' => 35001,
        ],
        'users_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Chats\Model\Group\Users',
            'details_pk' => ['c5_chatgrpuser_um_user_id'],
            'required' => false,
            'order' => 35002,
        ],
    ];
    public $rows = [
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'chats' => ['order' => 200, 'label_name' => 'Chats'],
            'channels' => ['order' => 300, 'label_name' => 'Channels'],
            'users' => ['order' => 400, 'label_name' => 'Users'],
        ]
    ];
    public $elements = [
        'top' => [
            'c5_chatgroup_code' => [
                'c5_chatgroup_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 95],
                'c5_chatgroup_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'chats' => [
                'chats' => ['container' => 'chats_container', 'order' => 100],
            ],
            'channels' => [
                'channels' => ['container' => 'channels_container', 'order' => 100],
            ],
            'users' => [
                'users' => ['container' => 'users_container', 'order' => 100],
            ],
        ],
        'general_container' => [
            'c5_chatgroup_name' => [
                'c5_chatgroup_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
                'c5_chatgroup_mention' => ['order' => 2, 'label_name' => 'Mention', 'domain' => 'mention', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'c5_chatgroup_icon' => [
                'c5_chatgroup_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
                'c5_chatgroup_um_usrgrp_id' => ['order' => 2, 'label_name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Groups::optionsActive'],
            ]
        ],
        'chats_container' => [
            'row1' => [
                'c5_chatgrpmap_c5_chat_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chats::optionsActive', 'options_params' => ['c5_chat_c5_chattype_code' => 'GENERAL'], 'onchange' => 'this.form.submit();'],
                'c5_chatgrpmap_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'channels_container' => [
            'row1' => [
                'c5_chatgrpchannel_c5_chatchannel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Channel Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Chats\Model\Channels::optionsActive', 'onchange' => 'this.form.submit();'],
                'c5_chatgrpchannel_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'users_container' => [
            'row1' => [
                'c5_chatgrpuser_um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Chats\DataSource\Users::optionsActiveProcessed', 'onchange' => 'this.form.submit();'],
                'c5_chatgrpuser_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'C5 Groups',
        'pk' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_code'],
        'model' => '\Numbers\Users\Chats\Model\Groups',
        'details' => [
            '\Numbers\Users\Chats\Model\Group\Map' => [
                'name' => 'C5 Group Chats',
                'pk' => ['c5_chatgrpmap_tenant_id', 'c5_chatgrpmap_c5_chatgroup_code', 'c5_chatgrpmap_c5_chat_id'],
                'type' => '1M',
                'map' => ['c5_chatgroup_tenant_id' => 'c5_chatgrpmap_tenant_id', 'c5_chatgroup_code' => 'c5_chatgrpmap_c5_chatgroup_code']
            ],
            '\Numbers\Users\Chats\Model\Group\Channels' => [
                'name' => 'C5 Group Channels',
                'pk' => ['c5_chatgrpchannel_tenant_id', 'c5_chatgrpchannel_c5_chatgroup_code', 'c5_chatgrpchannel_c5_chatchannel_code'],
                'type' => '1M',
                'map' => ['c5_chatgroup_tenant_id' => 'c5_chatgrpchannel_tenant_id', 'c5_chatgroup_code' => 'c5_chatgrpchannel_c5_chatgroup_code']
            ],
            '\Numbers\Users\Chats\Model\Group\Users' => [
                'name' => 'C5 Group Users',
                'pk' => ['c5_chatgrpuser_tenant_id', 'c5_chatgrpuser_c5_chatgroup_code', 'c5_chatgrpuser_um_user_id'],
                'type' => '1M',
                'map' => ['c5_chatgroup_tenant_id' => 'c5_chatgrpuser_tenant_id', 'c5_chatgroup_code' => 'c5_chatgrpuser_c5_chatgroup_code']
            ],
        ],
    ];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if (!\User::authorized()) {
            $form->error(DANGER, 'Only logged in users can create groups!');
        }
        if ($form->hasErrors()) {
            return;
        }
        $user_mentions = Mentions::getStatic([
            'where' => [
                'um_usrmention_tenant_id' => \Tenant::id(),
                'um_usrmention_mention' => $form->values['c5_chatgroup_mention'],
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        if (!empty($user_mentions)) {
            $form->error(DANGER, Error::INVALID_VALUES, 'c5_chatgroup_mention');
            return;
        }
        // counters
        $form->values['c5_chatgroup_users_count'] = count($form->values['\Numbers\Users\Chats\Model\Group\Users']);
        $form->values['c5_chatgroup_channel_count'] = count($form->values['\Numbers\Users\Chats\Model\Group\Channels']);
        $form->values['c5_chatgroup_chat_count'] = count($form->values['\Numbers\Users\Chats\Model\Group\Map']);
        // U/M Groups
        if ($form->values['c5_chatgroup_users_count'] <> 0 && !empty($form->values['c5_chatgroup_um_usrgrp_id'])) {
            $map = [];
            foreach ($form->values['\Numbers\Users\Chats\Model\Group\Users'] as $k => $v) {
                $map[] = [
                    'um_usrgrmap_tenant_id' => \Tenant::id(),
                    'um_usrgrmap_user_id' => $v['c5_chatgrpuser_um_user_id'],
                    'um_usrgrmap_group_id' => $form->values['c5_chatgroup_um_usrgrp_id'],
                ];
            }
            $map_result = Map::collectionStatic()->mergeMultiple($map);
            if (!$map_result['success']) {
                $form->error(DANGER, $map_result['error']);
                return;
            }
        }
    }

    public function post(\Object\Form\Base & $form)
    {

    }
}
