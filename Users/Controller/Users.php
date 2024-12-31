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

use Numbers\Users\Users\Form\Collection\Users\Collection;
use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Users extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\List2\Users([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new Collection([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Users\Users\Form\Users',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
