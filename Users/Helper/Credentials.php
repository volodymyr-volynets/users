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

use Numbers\Users\Users\Model\Credential\Password\Values;

class Credentials
{
    /**
     * Load credentials and decrypt
     *
     * @param string $password_code
     * @return array
     */
    public static function loadCredentials(string $password_code): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'data' => []
        ];
        $values = Values::getStatic([
            'where' => [
                'um_passwval_password_code' => $password_code,
            ],
            'pk' => ['um_passwval_name']
        ]);
        $crypt = new \Crypt();
        foreach ($values as $k => $v) {
            $result['data'][$k] = $crypt->decrypt($v['um_passwval_encrypted_password']);
        }
        return $result;
    }
}
