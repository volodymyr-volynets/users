<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Credential;

use Numbers\Users\Users\Helper\ReLogin;
use Object\Controller\Permission;

class MyPasswords extends Permission
{
    public function actionIndex()
    {
        $input = \Request::input();
        if (ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
            $form = new \Numbers\Users\Users\Form\List2\Credential\MyPasswords([
                'input' => $input,
            ]);
            echo $form->render();
        }
    }
    public function actionEdit()
    {
        $input = \Request::input();
        if (ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
            $form = new \Numbers\Users\Users\Form\Credential\MyPasswords([
                'input' => $input,
            ]);
            echo $form->render();
        }
    }
}
