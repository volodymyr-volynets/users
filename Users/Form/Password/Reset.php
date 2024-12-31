<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Password;

use Numbers\Users\Users\DataSource\Login;
use Numbers\Users\Users\Helper\User\Notifications;
use Object\Form\Wrapper\Base;

class Reset extends Base
{
    public $form_link = 'um_password_reset';
    public $module_code = 'UM';
    public $title = 'U/M Password Reset Form';
    public $options = [
        'segment' => [
            'type' => 'primary',
            'header' => [
                'icon' => ['type' => 'fas fa-asterisk'],
                'title' => 'Password Reset:',
                'loc' => 'NF.Form.PasswordReset'
            ]
        ],
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'login' => ['default_row_type' => 'grid', 'order' => 1]
    ];
    public $rows = [];
    public $elements = [
        'login' => [
            'username' => [
                'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username, Email Address or Phone', 'loc' => 'NF.Form.UsernameEmailPhone', 'type' => 'varchar', 'length' => 255, 'percent' => 50, 'required' => true, 'autofocus' => true]
            ],
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
                'login' => ['order' => 99, 'button_group' => 'left', 'href' => '/Numbers/Users/Users/Controller/Login', 'value' => 'Sign In', 'method' => 'a']
            ]
        ]
    ];
    public $loc = [
        'NF.Message.PleaseCheckYourEmailForLink' => 'Please check your email and click the link provided to reset your password.'
    ];

    public function save(& $form)
    {
        $datasource = new Login();
        $user = $datasource->get(['where' => ['username' => $form->values['username']]]);
        if (!empty($user)) {
            // send email
            Notifications::sendPasswordResetEmail($user['id']);
        }
        $form->error(SUCCESS, 'NF.Message.PleaseCheckYourEmailForLink|->Please check your email and click the link provided to reset your password.');
        return true;
    }
}
