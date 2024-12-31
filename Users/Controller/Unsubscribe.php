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

use Object\Controller;

class Unsubscribe extends Controller
{
    public $icon = 'far fa-window-close';
    public $title = 'U/M Unsubscribe';

    public function actionIndex(\Request $request, \Crypt $crypt)
    {
        $token = $request->get('token', null);
        if (!$token || ($validated = $crypt->nanoValidate($token)) === false) {
            throw new \Exception(loc('NF.Message.TokenExpired', 'Your token is not valid or expired!'));
        }
        $form = new \Numbers\Users\Users\Form\Unsubscribe([
            'input' => ['um_user_id' => $validated['id']] + $request->all(),
            'no_ajax_form_reload' => true
        ]);
        echo $form->render();
    }
}
