<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Controller;

use Numbers\Users\Organizations\Form\Collection\Customer\Collection;
use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Customers extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Organizations\Form\List2\Customers([
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
            'model' => '\Numbers\Users\Organizations\Form\Customers',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
