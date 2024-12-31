<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper;

class ReLogin
{
    /**
     * Re-login active
     *
     * @param string $controller
     * @param array $params
     * @return bool
     */
    public static function reLoginActive(string $controller, array & $params = []): bool
    {
        if (!empty($_SESSION['numbers']['relogins'][$controller]['authenticated'])) {
            if (empty($params) && !empty($_SESSION['numbers']['relogins'][$controller]['input'])) {
                $params = $_SESSION['numbers']['relogins'][$controller]['input'];
            }
            return true;
        } elseif (!isset($_SESSION['numbers']['relogins'][$controller])) {
            $_SESSION['numbers']['relogins'][$controller] = [
                'authenticated' => false,
                'input' => $params,
            ];
        }
        // show form
        $input = \Request::input();
        $input['username'] = \User::get('login_username') ?? \User::get('email');
        $form = new \Numbers\Users\Users\Form\ReLogin([
            'input' => $input,
            '__other_controller' => $controller
        ]);
        echo $form->render();
        return false;
    }
}
