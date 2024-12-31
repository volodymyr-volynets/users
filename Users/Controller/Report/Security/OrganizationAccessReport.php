<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Report\Security;

use Object\Controller\Permission;

class OrganizationAccessReport extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\Report\Security\OrganizationAccessReport([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
