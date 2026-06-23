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

class ChatFormStandaloneChangeAgent extends Base
{
    public $form_link = 'c5_chat_standalone_change_agent_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Change Agent Form';
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
            'c5_chat_ai_agent_code' => [
                'c5_chat_ai_agent_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Agent', 'domain' => 'code255', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Agents::optionsActive', 'options_params' => ['ai_agent_text' => 1]],
            ],
            self::HIDDEN => [
                'c5_chat_id' => ['label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'C5 Chats',
        'pk' => ['c5_chat_tenant_id', 'c5_chat_id'],
        'model' => '\Numbers\Users\Chats\Model\Chats'
    ];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if ($form->hasErrors()) {
            return;
        }

    }
}
