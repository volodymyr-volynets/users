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

class Public2 extends Controller
{
    public $title = 'U/M Invites (Public)';
    public $icon = 'fas fa-user-astronaut';

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
}
