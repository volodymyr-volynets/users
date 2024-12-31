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

use Object\Controller\Permission;

class Settings extends Permission
{
    public function actionEdit()
    {
        $form = new \Numbers\Users\Users\Form\Settings([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}