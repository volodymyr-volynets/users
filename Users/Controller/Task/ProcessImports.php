<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Task;

use Object\Controller\Permission;

class ProcessImports extends Permission
{
    public function actionEdit()
    {
        $form = new \Numbers\Users\Users\Form\Task\ProcessImports([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
