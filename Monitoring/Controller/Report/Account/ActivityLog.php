<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Controller\Report\Account;

use Object\Controller\Permission;

class ActivityLog extends Permission
{
    public function actionIndex()
    {
        $input = \Request::input();
        $input['sm_monusage_user_id1'] = \User::id();
        $input['sm_monusage_user_id2'] = \User::id();
        $form = new \Numbers\Users\Monitoring\Form\Report\Account\ActivityLog([
            'input' => $input,
        ]);
        echo $form->render();
    }
}
