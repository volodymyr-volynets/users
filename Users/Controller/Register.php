<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller;

use Object\Controller\Public2;
use Numbers\Users\Users\Form\Registration\RegisterAdvanced;
use Numbers\Users\Users\Form\Registration\RegisterSimple;

class Register extends Public2
{
    #[\Route(array('uri' => '/register', 'name' => 'U/M Register (Advanced)', 'icon' => 'fa-regular fa-registered', 'group' => array('UM', 'Account'), 'route_alias' => 'um.users.register.advanced', 'acl' => array('public' => 1, 'authorized' => 0)))]
    #[\Menu(array('uri' => '/register', 'name' => 'Register (Advanced)', 'type' => 210, 'icon' => 'fa-regular fa-registered', 'order' => -31999, 'group' => array('UM', 'Account'), 'acl' => array('public' => 1, 'authorized' => 0)))]
    #[\Footer(array('uri' => '/register', 'name' => 'Register (Advanced)', 'icon' => 'fa-regular fa-registered', 'order' => -31999, 'group' => array('UM', 'Account'), 'acl' => array('public' => 1, 'authorized' => 0)))]
    public function actionIndex()
    {
        $input = \Request::input();
        $form = new RegisterAdvanced([
            'input' => $input,
        ]);
        echo $form->render();
    }

    #[\Route(array('uri' => '/register2', 'name' => 'U/M Register (Simple)', 'icon' => 'fa-regular fa-registered', 'group' => array('UM', 'Account'), 'route_alias' => 'um.users.register.simple', 'acl' => array('public' => 1, 'authorized' => 0)))]
    #[\Menu(array('uri' => '/register2', 'name' => 'Register (Simple)', 'type' => 210, 'icon' => 'fa-regular fa-registered', 'order' => -31999, 'group' => array('UM', 'Account'), 'acl' => array('public' => 1, 'authorized' => 0)))]
    #[\Footer(array('uri' => '/register2', 'name' => 'Register (Simple)', 'icon' => 'fa-regular fa-registered', 'order' => -31999, 'group' => array('UM', 'Account'), 'acl' => array('public' => 1, 'authorized' => 0)))]
    public function actionSimple()
    {
        $input = \Request::input();
        $form = new RegisterSimple([
            'input' => $input,
        ]);
        echo $form->render();
    }
}
