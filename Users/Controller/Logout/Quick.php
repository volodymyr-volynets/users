<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Logout;

use Numbers\Users\Users\Model\User\Authorize;
use Object\Controller;

class Quick extends Controller
{
    public $title = 'Quick Logout';
    public $icon = 'fas fa-sign-out-alt';
    public function actionIndex()
    {
        Authorize::signOut();
        \Request::redirect('/Default/Numbers/Users/Users/Controller/Logout/Confirmed');
    }
}
