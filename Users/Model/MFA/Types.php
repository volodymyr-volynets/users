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

use Object\Data;

class Types extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M MFA Types';
    public $column_key = 'um_mfatype_code';
    public $column_prefix = 'um_mfatype_';
    public $orderby = [
        'um_mfatype_order' => SORT_ASC,
    ];

    public $columns = [
        'um_mfatype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_mfatype_name' => ['name' => 'Name', 'type' => 'text'],
        'um_mfatype_column' => ['name' => 'Column', 'type' => 'field_code', 'null' => true],
        'um_mfatype_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'SMS_PRIMARY' => ['um_mfatype_name' => 'SMS (Primary)', 'um_mfatype_column' => 'phone', 'um_mfatype_order' => 1000],
        'SMS_SECONDARY' => ['um_mfatype_name' => 'SMS (Secondary)', 'um_mfatype_column' => 'phone2', 'um_mfatype_order' => 2000],
        'SMS_CELL' => ['um_mfatype_name' => 'SMS (Cell)', 'um_mfatype_column' => 'cell', 'um_mfatype_order' => 3000],
        'EMAIL_PRIMARY' => ['um_mfatype_name' => 'Email (Primary)', 'um_mfatype_column' => 'email', 'um_mfatype_order' => 4000],
        'EMAIL_SECONDARY' => ['um_mfatype_name' => 'Email (Secondary)', 'um_mfatype_column' => 'email2', 'um_mfatype_order' => 5000],
        'TOTP_AUTHENTICATOR' => ['um_mfatype_name' => 'Authenticator (TOTP)', 'um_mfatype_column' => '', 'um_mfatype_order' => 6000],
    ];
}
