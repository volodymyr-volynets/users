<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\APIs;

use Numbers\Users\APIs\Helper\Authorize;
use Object\Controller\API;

class Login extends API
{
    public function actionLogin()
    {
        $result = \Numbers\Users\Users\Form\APIs\Login::API()->save($this->api_input, ['simple' => 2]);
        $this->handleOutput($result);
    }
    public function actionLogout()
    {
        $result = Authorize::signOut($this->api_input['__session_id']);
        $this->handleOutput($result);
    }
    public function actionGetStructure()
    {
        return '';
    }
}
