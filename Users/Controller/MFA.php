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

use Object\Controller\Authorized;

class MFA extends Authorized
{
    public function actionIndex()
    {
        $input = \Request::input();
        $form = new \Numbers\Users\Users\Form\MFA([
            'input' => $input,
            'no_ajax_form_reload' => true
        ]);
        echo $form->render();
    }
}
