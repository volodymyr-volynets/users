<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Password;

use Numbers\Users\Users\Form\Password\Set;
use Object\Controller;

class Reset extends Controller
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\Password\Reset([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionSetPassword()
    {
        $form = new Set([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
