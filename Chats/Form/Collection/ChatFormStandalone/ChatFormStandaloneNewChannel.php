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
use Numbers\Users\Chats\Helper\Chats as ChatsHelper;
use Numbers\Users\Chats\Model\Chats as ChatsModel;

class ChatFormStandaloneNewChannel extends Base
{
    public $form_link = 'c5_chat_standalone_new_channel_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Channel Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 300],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'c5_chatchannel_code' => [
                'c5_chatchannel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 90],
                'c5_chatchannel_global' => ['order' => 2, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
                'c5_chatchannel_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'c5_chatchannel_name' => [
                'c5_chatchannel_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
                'c5_chatchannel_mention' => ['order' => 2, 'label_name' => 'Mention', 'domain' => 'hash_tagged', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'c5_chatchannel_icon' => [
                'c5_chatchannel_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'C5 Channels',
        'pk' => ['c5_chatchannel_tenant_id', 'c5_chatchannel_code'],
        'model' => '\Numbers\Users\Chats\Model\Channels'
    ];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if (!\User::authorized()) {
            $form->error(DANGER, 'Only logged in users can create channels!');
        }
    }

    public function post(\Object\Form\Base & $form)
    {
        $existing_chat = ChatsModel::getStatic([
            'where' => [
                'c5_chat_tenant_id' => \Tenant::id(),
                'c5_chat_c5_chatchannel_code' => $form->values['c5_chatchannel_code'],
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        if (empty($existing_chat)) {
            $chat_result = ChatsHelper::create([
                'um_user_id' => \User::id(),
                'sm_session_id' => session_id(),
                'um_user_name' => \User::get('name'),
                'c5_chatchannel_code' => $form->values['c5_chatchannel_code'],
                'c5_chattype_code' => 'CHANNEL',
            ]);
            $form->redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', [
                'c5_chat_uuid' => $chat_result['c5_chat_uuid'],
            ], [
                'force_onload' => true,
            ]);
        } else {
            $form->redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', [
                'c5_chat_uuid' => $existing_chat['c5_chat_uuid'],
            ], [
                'force_onload' => true,
            ]);
        }
    }
}
