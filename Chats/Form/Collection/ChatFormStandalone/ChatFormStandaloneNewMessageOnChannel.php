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

class ChatFormStandaloneNewMessageOnChannel extends Base
{
    public $form_link = 'c5_chat_standalone_new_message_on_channel_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Message On Channel Form';
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
            'c5_chatdmtype_code' => [
                'c5_chatdmtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'default' => 'CM', 'required' => true, 'percent' => 100, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chat\ChatChannelTypes', 'onchange' => 'this.form.submit();'],
            ],
            'c5_chat_uuid' => [
                'c5_chat_uuid' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Channel', 'domain' => 'uuid', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Chats\DataSource\ChatChannels::options'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        $form->redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', [
            'c5_chat_uuid' => $form->values['c5_chat_uuid'],
        ], [
            'force_onload' => true,
        ]);
    }
}
