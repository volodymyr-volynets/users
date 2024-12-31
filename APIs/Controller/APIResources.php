<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Controller;

use Numbers\Users\APIs\Form\APIResources\Collection;
use Object\Controller;
use Object\Controller\Permission;

class APIResources extends Permission
{
    public function actionIndex()
    {
        // we need to set 100% width
        Controller::$main_content_class = 'container-fluid';
        // render pages
        $input = \Request::input();
        $hash = \Application::get('mvc.hash_parts');
        if (!empty($hash)) {
            $input['sm_resource_module_code'] = $hash[1];
            $input['sm_resource_version_code'] = $hash[2];
            $input['sm_resource_id'] = $hash[3];
        }
        $form = new Collection([
            'input' => $input,
        ]);
        echo $form->render();
    }
}
