<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Logout;

use Object\Controller\Public2;

class Confirmed extends Public2
{
    public $title = 'Sign Out';
    public $icon = 'fa-solid fa-sign-out-alt';
    public function actionIndex()
    {
        header('HTTP/1.0 401 Unauthorized');
        $options = [
            'options' => [
                loc('NF.Message.CongratulationsYouHaveSignOut', 'Congratulations! You have successfully signed out.'),
                loc('NF.Message.YouCanNowSignInIntoYourAccount', 'You can now sign in into your account. {signin}.', [
                    'signin' => \HTML::a(['href' => \Request::host(['mvc' => '/Default/Numbers/Users/Users/Controller/Login']), 'value' => loc('NF.Form.SignIn', 'Sign In')])
                ])
            ]
        ];
        return \HTML::segment([
            'type' => 'success',
            'header' => [
                'icon' => ['type' => 'sign-out'],
                'title' => loc('NF.Form.SignOutColon', 'Sign Out:')
            ],
            'value' => \HTML::ul($options)
        ]);
    }
}
