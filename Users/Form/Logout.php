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

use Numbers\Users\Users\Model\User\Authorize;
use Object\Form\Wrapper\Base;

class Logout extends Base
{
    public $form_link = 'um_logout';
    public $module_code = 'UM';
    public $title = 'U/M Logout';
    public $options = [
        'segment' => [
            'type' => 'danger',
            'header' => [
                'icon' => ['type' => 'fas fa-sign-out-alt'],
                'title' => 'Sign Out:'
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
            'confirmation' => [
                'confirmation' => ['order' => 1, 'row_order' => 100, 'label_name' => null, 'loc_options' => ['NF.Form.WantToSignOut'], 'method' => 'div', 'type' => 'text', 'percent' => 100]
            ],
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
            ]
        ]
    ];
    public $loc = [
        'NF.Form.WantToSignOut' => 'Do you really want to sign out?'
    ];

    public function save(& $form)
    {
        Authorize::signOut();
        \Request::redirect('/Default/Numbers/Users/Users/Controller/Logout/Confirmed');
        return true;
    }
}
