<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\APIs;

use Numbers\Users\Users\Model\User\Authorize;
use Object\Form\Wrapper\Base;

class Login extends Base
{
    public $form_link = 'um_api_login';
    public $module_code = 'UM';
    public $title = 'U/M API Login';
    public $options = [];
    public $containers = [];
    public $rows = [];
    public $elements = [
        'login' => [
            'username' => [
                'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username or Email Address', 'type' => 'varchar', 'length' => 255, 'percent' => 50, 'required' => true, 'autofocus' => true]
            ],
            'password' => [
                'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'type' => 'varchar', 'percent' => 50, 'method' => 'password', 'required' => true, 'empty_value' => true]
            ],
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
            ]
        ]
    ];

    public function validate(& $form)
    {
        $authorize = Authorize::authorizeWithCredentials($form->values['username'], $form->values['password']);
        if ($authorize['success']) {
            $form->api_values = $authorize;
        } else {
            $form->error('danger', 'Provided credentials do not match our records!');
            $form->error('danger', null, 'username');
            $form->error('danger', null, 'password');
        }
    }
}
