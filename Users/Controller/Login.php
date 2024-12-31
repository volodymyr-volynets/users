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

use Object\Controller\Public2;

class Login extends Public2
{
    public function actionIndex()
    {
        if (\User::authorized()) {
            $url = \Request::buildFromName('U/M Welcome Dashboard', 'Index');
            \Request::redirect($url);
        }
        // login
        $input = \Request::input();
        if (!empty($input['email_token'])) {
            $crypt = new \Crypt();
            $token_data = $crypt->tokenVerify($input['email_token'] ?? '', ['email.link']);
            if ($token_data !== false) {
                $token_data['data'] = json_decode($token_data['data'], true);
                $_SESSION['numbers']['tokens']['email_token'] = $token_data;
            }
        }
        $form = new \Numbers\Users\Users\Form\Login([
            'input' => $input,
            'no_ajax_form_reload' => true
        ]);
        echo $form->render();
    }
}
