<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Registration;

use Numbers\Users\Users\Form\Registration\Tenant\Collection;
use Object\Controller;

class Tenant extends Controller
{
    public function actionIndex()
    {
        if (!\Application::get('debug.toolbar')) {
            throw new \Exception('You must enabled toolbar to view Dev. Portal.');
        }
        $form = new Collection([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
