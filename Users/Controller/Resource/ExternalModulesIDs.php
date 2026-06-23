<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Resource;

use Object\Controller\Permission;
use Object\Form\Wrapper\Import;
use Numbers\Users\Users\Form\Resource\ExternalModuleIDs;

class ExternalModulesIDs extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\List2\Resource\ExternalModuleIDs([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new ExternalModuleIDs([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Users\Users\Form\Resource\ExternalModuleIDs',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
