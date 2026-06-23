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

class ChatFormStandaloneNewDirectMessage extends Base
{
    public $form_link = 'c5_chat_standalone_new_dm_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Direct Message Form';
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
                'c5_chatdmtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'default' => 'USERS', 'required' => true, 'percent' => 100, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chat\ChatDMTypes', 'onchange' => 'this.form.submit();'],
            ],
            'c5_chatuser_um_user_id' => [
                'c5_chatuser_um_user_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Chats\DataSource\Users::optionsProcessed', 'options_params' => ['skip_current_user' => true]],
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
            'um_user_name' => \User::get('name'),
            'c5_chattype_code' => 'DM',
            // dm list
            'um_user_ids' => array_keys($form->values['c5_chatuser_um_user_id']),
        ]);
        if ($chat_result['success']) {
            $form->redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', [
                'c5_chat_uuid' => $chat_result['c5_chat_uuid'],
            ], [
                'force_onload' => true,
            ]);
        }
    }

    /*
    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'c5_chatuser_um_user_id') {
            if ($neighbouring_values['c5_chatdmtype_code'] != 'USERS') {
                $options['options']['hidden'] = true;
                $options['options']['row_class'] = 'grid_row_hidden';
            }
        }
    }
    */
}
