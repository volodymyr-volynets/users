<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Controller\Service\ServiceScript;

use Object\Controller\Permission;

class CreateVersion extends Permission
{
    public function actionEdit()
    {
        $form = new \Numbers\Users\Organizations\Form\Service\ServiceScript\CreateVersion([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
