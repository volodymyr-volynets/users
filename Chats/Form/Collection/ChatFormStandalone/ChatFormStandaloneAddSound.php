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

class ChatFormStandaloneAddSound extends Base
{
    public $form_link = 'c5_chat_standalone_add_sound_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Add Sound Form';
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
            'ai_agent_code' => [
                'ai_agent_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Agent', 'domain' => 'code255', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Agents::optionsActive', 'options_params' => ['ai_agent_sound' => 1], 'set_primary' => true],
            ],
            'ai_soundvoice_code' => [
                'ai_soundvoice_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Size', 'domain' => 'lgroup_code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Sound\Voices', 'options_options' => ['i18n' => 'skip_sorting'], 'set_primary' => true],
            ],
            self::HIDDEN => [
                'c5_chat_id' => ['label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'um_user_id' => ['label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
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
        // generate js event
        $form->dispatchJSEvent('nf_c5_chat_add_sound_form_event', [
            'ai_agent_code' => $form->values['ai_agent_code'],
            'ai_soundvoice_code' => $form->values['ai_soundvoice_code'],
        ]);
        $form->hideSubform();
    }
}
