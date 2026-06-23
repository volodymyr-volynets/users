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

class ChatFormStandaloneChangeTerms extends Base
{
    public $form_link = 'c5_chat_standalone_change_terms_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Change Terms Form';
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
            'c5_chatmessage_um_usrterm_id' => [
                'c5_chatmessage_um_usrterm_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Term #', 'domain' => 'bigterm_id', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Terms::optionsActive', 'options_depends' => ['um_usrterm_user_id' => 'um_user_id'], 'options_params' => ['um_usrterm_module_code' => 'C5']],
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
        $c5_chatmessage_um_usrterm_id = $form->values['c5_chatmessage_um_usrterm_id'];
        \Layout::onLoad("localStorage.setItem('nf_chat_terms_um_usrterm_id', '{$c5_chatmessage_um_usrterm_id}');");
        \Layout::onLoad("Numbers.Modal.hide('form_subform_c5_chat_standalone_change_terms_form_form');");
    }
}
