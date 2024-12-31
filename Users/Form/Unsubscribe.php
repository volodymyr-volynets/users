<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Form\Wrapper\Base;

class Unsubscribe extends Base
{
    public $form_link = 'um_unsubscribe';
    public $module_code = 'UM';
    public $title = 'U/M Unsubscribe Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
        ],
    ];
    public $containers = [
        'top' => ['order' => 100],
        'other' => ['order' => 200],
        'buttons' => ['order' => 300],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'loc' => 'NF.Form.UserID', 'domain' => 'user_id_sequence', 'percent' => 50, 'readonly' => true],
                'um_user_name' => ['order' => 2, 'label_name' => 'Name', 'loc' => 'NF.Form.Name', 'domain' => 'name', 'percent' => 50, 'required' => 'c', 'autocomplete' => 'off', 'readonly' => true],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Primary Email', 'loc' => 'NF.Form.PrimaryEmail', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false, 'readonly' => true],
                'um_user_phone' => ['order' => 2, 'label_name' => 'Primary Phone', 'loc' => 'NF.Form.PrimaryPhone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false, 'readonly' => true],
            ],
            self::HIDDEN => [
                'token' => ['label_name' => 'Token', 'method' => 'hidden', 'preserved' => true]
            ]
        ],
        'other' => [
            'um_user_send_emails' => [
                'um_user_send_emails' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Send Emails', 'loc' => 'NF.Form.SendEmails', 'type' => 'boolean', 'percent' => 25],
                'um_user_send_sms' => ['order' => 2, 'label_name' => 'Send SMS', 'loc' => 'NF.Form.SendSMS', 'type' => 'boolean', 'percent' => 25],
                'um_user_send_postal' => ['order' => 3, 'label_name' => 'Send Postal Mail', 'loc' => 'NF.Form.SendPostalMail', 'type' => 'boolean', 'percent' => 25],
            ],
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
            ]
        ],
    ];
    public $collection = [
        'name' => 'Users',
        'model' => '\Numbers\Users\Users\Model\Users',
    ];
    public $loc = [];

    public function post(& $form)
    {
        $form->values['token'] = \Crypt::nanoCreateStatic($form->values['um_user_id']);
    }
}
