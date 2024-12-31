<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Account;

use Numbers\Users\Users\Form\Account\ChangePassword;
use Object\Controller\Authorized;

class Profile extends Authorized
{
    public function actionIndex()
    {
        $edit_profile = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fas fa-users']) . ' ' . i18n(null, 'Update Profile'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_EditProfile'])
        ]);
        $change_password = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fas fa-asterisk']) . ' ' . i18n(null, 'Change Password'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_ChangePassword'])
        ]);
        $grid = [
            'options' => [
                0 => [
                    'Row1' => [
                        'EditProfile' => [
                            'value' => $edit_profile,
                            'options' => [
                                'percent' => 30,
                            ]
                        ],
                        'ChangePassword' => [
                            'value' => $change_password,
                            'options' => [
                                'percent' => 30,
                            ]
                        ]
                    ]
                ]
            ]
        ];
        echo \HTML::grid($grid);
    }
    public function actionEditProfile()
    {
        $form = new \Numbers\Users\Users\Form\Account\Profile([
            'input' => \Request::input(),
            'no_ajax_form_reload' => true,
            'skip_acl' => true
        ]);
        echo $form->render();
    }
    public function actionChangePassword()
    {
        $form = new ChangePassword([
            'input' => \Request::input(),
            'no_ajax_form_reload' => true
        ]);
        echo $form->render();
    }
}
