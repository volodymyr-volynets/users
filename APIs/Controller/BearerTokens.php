<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Controller;

use Object\Controller\Permission;

class BearerTokens extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\APIs\Form\List2\BearerTokens([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Users\APIs\Form\BearerTokens([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
