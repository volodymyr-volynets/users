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

class LoginWithToken
{
    /**
     * URL
     *
     * @param int $user_id
     * @param string|null $host
     */
    public static function URL(int $user_id, ?string $host = null): string
    {
        $crypt = new \Crypt();
        if (!$host) {
            $host = \Request::host();
        }
        return $host . 'Default/Numbers/Users/Users/Controller/Login/WithToken/_Index?token=' . $crypt->tokenCreate($user_id, 'login.user');
    }
}
