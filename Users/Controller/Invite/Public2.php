<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Invite;

use Object\Controller;
use Numbers\Users\Users\Model\UsersAR;

class Public2 extends Controller
{
    public $title = 'U/M Invites (Public)';
    public $icon = 'fa-solid fa-user-astronaut';

    public $acl = [
        'public' => true,
        'authorized' => true,
        'permission' => false
    ];

    public function actionEdit()
    {
        $input = \Request::input();
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'] ?? '', ['invite.token']);
        // set id
        $input['um_usrinv_id'] = $token_data['id'];
        // render form
        $form = new \Numbers\Users\Users\Form\Invite\Public2([
            'input' => $input,
        ]);
        echo $form->render();
    }

    public function actionVerifyTokens()
    {
        $input = \Request::input();
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'] ?? '', ['user.registration.email.token', 'user.registration.sms.token']);
        // update model
        $ar_model = new UsersAR();
        $ar_model->um_user_tenant_id = \Tenant::id();
        $ar_model->um_user_id = $token_data['id'];
        if ($token_data['token'] == 'user.registration.sms.token') {
            $ar_model->um_user_phone_confirmed = 1;
        } else {
            $ar_model->um_user_email_confirmed = 1;
        }
        $ar_model->merge([
            'skip_optimistic_lock' => true,
        ]);
        // redirect to login
        $url = \Request::buildFromName('U/M Sign In', 'Index');
        \Request::redirect($url . '?__message=' . loc('NF.Form.TokenVerified', 'Token verified.'));
    }
}
