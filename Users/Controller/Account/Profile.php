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
use Numbers\Users\Users\Form\Account\Signatures;
use Numbers\Users\Users\Form\Account\Personalization;
use Numbers\Users\Users\Form\Account\Terms;

class Profile extends Authorized
{
    public function actionIndex()
    {
        $edit_profile = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fa-solid fa-users']) . ' ' . loc('NF.Form.UpdateProfile', 'Update Profile'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_EditProfile'])
        ]);
        $change_password = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fa-solid fa-asterisk']) . ' ' . loc('NF.Form.ChangePassword', 'Change Password'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_ChangePassword'])
        ]);
        $edit_signatures = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fa-solid fa-signature']) . ' ' . loc('NF.Form.Signatures', 'Signatures'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_EditSignatures'])
        ]);
        $edit_terms = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fa-solid fa-anchor-circle-exclamation']) . ' ' . loc('NF.Form.Terms2', 'Terms'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_EditTerms'])
        ]);
        $edit_personalization = \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::a(['value' => \HTML::icon(['type' => 'fa-regular fa-circle-user']) . ' ' . loc('NF.Form.Personalization', 'Personalization'), 'href' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_EditPersonalization'])
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
                    ],
                ],
                1 => [
                    'Row2' => [
                        'EditSignatures' => [
                            'value' => $edit_signatures,
                            'options' => [
                                'percent' => 30,
                            ]
                        ],
                        'EditTerms' => [
                            'value' => $edit_terms,
                            'options' => [
                                'percent' => 30,
                            ]
                        ],
                        'EditPersonalization' => [
                            'value' => $edit_personalization,
                            'options' => [
                                'percent' => 30,
                            ]
                        ]
                    ]
                ]
            ]
        ];
        echo \HTML::segment([
            'type' => 'primary',
            'header' => [
                'title' => loc('NF.System.Profile', 'Profile'),
                'icon' => ['type' => 'fa-solid fa-user'],
            ],
            'value' => \HTML::grid($grid)
        ]);
    }
    public function actionEditProfile()
    {
        \Layout::$title_override = loc('NF.Form.Profile', 'Profile');
        $form = new \Numbers\Users\Users\Form\Account\Profile([
            'input' => \Request::input(),
            'no_ajax_form_reload' => true,
            'skip_acl' => true
        ]);
        echo $form->render();
    }
    public function actionEditSignatures()
    {
        \Layout::$title_override = loc('NF.Form.Signatures', 'Signatures');
        $form = new Signatures([
            'input' => \Request::input(),
            'skip_acl' => true
        ]);
        echo $form->render();
    }
    public function actionEditTerms()
    {
        \Layout::$title_override = loc('NF.Form.Terms2', 'Terms');
        $form = new Terms([
            'input' => \Request::input(),
            'skip_acl' => true
        ]);
        echo $form->render();
    }
    public function actionEditPersonalization()
    {
        \Layout::$title_override = loc('NF.Form.Personalization', 'Personalization');
        $form = new Personalization([
            'input' => \Request::input(),
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
