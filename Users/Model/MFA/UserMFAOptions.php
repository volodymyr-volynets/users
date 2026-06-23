<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\MFA;

use Numbers\Users\Users\Model\Users;
use Object\Mask\Email;
use Object\Mask\Phone;

class UserMFAOptions extends Users
{
    public $options_map = [
        'um_user_name' => 'name',
        'um_user_company' => 'name',
        'um_user_id' => 'name',
        'um_user_inactive' => 'inactive'
    ];
    public $alias_model = true;
    public $alias_for = '\Numbers\Users\Users\Model\Users';

    /**
     * Generate user options
     *
     * @param mixed $options
     * @return array{name: mixed[]}
     */
    public function generateUserOptions($options = [])
    {
        $result = [];
        $all_options = Types::getStatic();
        foreach ($all_options as $k => $v) {
            $name = $v['um_mfatype_name'];
            $value = \User::get($v['um_mfatype_column']);
            if (!isset($value) && !str_starts_with($k, 'TOTP_')) {
                continue;
            }
            if (str_starts_with($k, 'EMAIL_')) {
                $name .= ' - ' . (new Email())->mask($value);
            } elseif (str_starts_with($k, 'SMS_')) {
                $name .= ' - ' . (new Phone())->mask($value);
            }
            $result[$k] = ['name' => $name, 'column' => $v['um_mfatype_column'], 'user_value' => $value];
        }
        return $result;
    }
}
