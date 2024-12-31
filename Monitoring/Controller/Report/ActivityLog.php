<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Controller\Report;

use Object\Controller\Permission;

class ActivityLog extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Monitoring\Form\Report\ActivityLog([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
