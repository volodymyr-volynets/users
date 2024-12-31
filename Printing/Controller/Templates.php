<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Controller;

use Numbers\Users\Printing\Form\Template\CreateVersion;
use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Templates extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Printing\Form\List2\Templates([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Users\Printing\Form\Templates([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Users\Printing\Form\Templates',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionActivate()
    {
        $form = new CreateVersion([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
