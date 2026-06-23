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

class ChatFormStandaloneNewChat extends Base
{
    public $form_link = 'c5_chat_standalone_new_chat_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Chat Form';
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
            'c5_chatstarttype_code' => [
                'c5_chatstarttype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'default' => 'AI', 'required' => true, 'percent' => 100, 'method' => 'select', 'mo_choose' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chat\ChatStartTypes', 'onchange' => 'this.form.submit();'],
            ],
            'c5_chat_ai_agent_code' => [
                'c5_chat_ai_agent_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Agent', 'domain' => 'code255', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Agents::optionsActive', 'options_params' => ['ai_agent_text' => 1]],
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
        $chat_result = ChatsHelper::create([
            'um_user_id' => \User::id(),
            'sm_session_id' => session_id(),
            'um_user_name' => \User::get('name') ?? 'Anonymous',
            'c5_chattype_code' => 'GENERAL',
            'c5_chat_ai_agent_code' => $form->values['c5_chat_ai_agent_code'],
        ]);
        if ($chat_result['success']) {
            $form->redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', [
                'c5_chat_uuid' => $chat_result['c5_chat_uuid'],
            ], [
                'force_onload' => true,
            ]);
        } else {
            $form->error(DANGER, $chat_result['error']);
        }
    }
}
