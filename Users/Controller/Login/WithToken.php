<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Login;

use Numbers\Users\Users\Model\User\Authorize;
use Object\Controller;

class WithToken extends Controller
{
    public $title = 'Single Sign On';
    public $icon = 'fas fa-sign-in-alt';
    public function actionIndex()
    {
        $crypt = new \Crypt();
        $token = \Request::input('token');
        $token_data = $crypt->tokenValidate($token);
        if ($token_data === false || $token_data['token'] != 'login.user') {
            \Layout::addMessage('Login token is not valid or expired!', DANGER);
        }
        // we logout if authorized
        if (\User::authorized()) {
            Authorize::signOut();
        }
        \Request::redirect(\Request::host() . 'Default/Numbers/Users/Users/Controller/Login/WithToken/_Login?token=' . $token);
    }
    public function actionLogin()
    {
        if (\User::authorized()) {
            \Layout::addMessage('You must logout first!', DANGER);
        } else {
            $crypt = new \Crypt();
            $token = \Request::input('token');
            $token_data = $crypt->tokenValidate($token);
            if ($token_data === false || $token_data['token'] != 'login.user') {
                \Layout::addMessage('Login token is not valid or expired!', DANGER);
            } else {
                $user_id = (int) $token_data['id'];
                // we sign in
                $authorize = Authorize::authorizeWithUserId($user_id);
                if ($authorize['success']) {
                    // if we need to redirect to post login page
                    $url = \Application::get('flag.global.default_postlogin_page');
                    if (!empty($url)) {
                        \Request::redirect($url);
                    }
                    \Layout::addMessage('You have successfully signed in!', SUCCESS);
                }
            }
        }
    }
}
