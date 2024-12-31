<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Controller;

use Object\Controller\Permission;

class Jobs extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\TaskScheduler\Form\List2\Jobs([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Users\TaskScheduler\Form\Jobs([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
