<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\AI\Form;

use Object\Form\Wrapper\Base;
use Numbers\Users\Chats\Helper\Chats as ChatsHelper;
use Numbers\AI\SDK\Helper\FieldsSummary as AIFieldsSummaryHelper;

class UMUsersCheckEmailPhoneSubForm extends Base
{
    public $form_link = 'um_users_check_email_phone_subform';
    public $module_code = 'UM';
    public $title = 'U/M Users Check Email & Phone Sub Form';
    public $options = [
        'actions' => [
            'refresh' => true,
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
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 50, 'readonly' => true],
                'um_user_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'required' => true, 'percent' => 50],
                'um_user_phone' => ['order' => 2, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            self::HIDDEN => [
                // chat fields
                'c5_chat_id' => ['label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'method' => 'hidden', 'preserved' => true],
                'c5_chatmessage_id' => ['label_name' => 'Message #', 'domain' => 'message_id', 'null' => true, 'method' => 'hidden', 'preserved' => true],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'model' => '\Numbers\Users\Users\Model\Users',
    ];

    public function post(& $form)
    {
        $summary = AIFieldsSummaryHelper::HTML([
            'U/M User ID' => $form->values['um_user_id'],
            'Name' => $form->values['um_user_name'],
            'Primary Email' => $form->values['um_user_email'],
            'Primary Phone' => $form->values['um_user_phone'],
        ]);
        ChatsHelper::formToolCompleted($form->values['c5_chatmessage_id'], [
            'success' => true,
            'error' => [],
            'summary' => $summary
        ]);
        $form->hideSubform();
    }
}
