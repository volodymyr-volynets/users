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

class Logout extends Authorized
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\Logout([
            'input' => \Request::input(),
            'no_ajax_form_reload' => true
        ]);
        echo $form->render();
    }
}
