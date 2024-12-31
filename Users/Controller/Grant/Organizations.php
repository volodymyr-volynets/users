<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Grant;

use Numbers\Users\Users\Form\Grant\GrantOrganizations;
use Object\Controller\Permission;

class Organizations extends Permission
{
    public function actionEdit()
    {
        $form = new GrantOrganizations([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
