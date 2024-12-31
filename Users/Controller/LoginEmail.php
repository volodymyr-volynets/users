<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller;

use Numbers\Users\Users\Form\Login;
use Object\Controller;

class LoginEmail extends Controller
{
    public function actionIndex()
    {
        $input = \Request::input();
        // if logged in
        if (\User::authorized()) {
            if (!empty($input['email_token'])) {
                $crypt = new \Crypt();
                $token_data = $crypt->tokenVerify($input['email_token'] ?? '', ['email.link']);
                if ($token_data !== false) {
                    $token_data['data'] = json_decode($token_data['data'], true);
                    $_SESSION['numbers']['tokens']['email_token'] = $token_data;
                }
            }
            // link from email
            if (!empty($_SESSION['numbers']['tokens']['email_token'])) {
                $href = $_SESSION['numbers']['tokens']['email_token']['data']['href'];
                unset($_SESSION['numbers']['tokens']['email_token']['data']['href']);
                \Request::redirect($href);
            }
        } else {
            if (!empty($input['email_token'])) {
                $crypt = new \Crypt();
                $token_data = $crypt->tokenVerify($input['email_token'] ?? '', ['email.link']);
                if ($token_data !== false) {
                    $token_data['data'] = json_decode($token_data['data'], true);
                    $_SESSION['numbers']['tokens']['email_token'] = $token_data;
                }
            }
            $form = new Login([
                'input' => $input,
                'no_ajax_form_reload' => true
            ]);
            echo $form->render();
        }
    }
}
