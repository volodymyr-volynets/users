<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\PII;

use Object\Data;

class UserPIIDisability extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Disability';
    public $column_key = 'um_usrpiidisability_code';
    public $column_prefix = 'um_usrpiidisability_';
    public $orderby = [
        'um_usrpiidisability_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiidisability_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiidisability_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiidisability_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'DISABLED' => ['um_usrpiidisability_name' => 'Disabled', 'um_usrpiidisability_order' => 1000],
        'NOT_DISABLED' => ['um_usrpiidisability_name' => 'Not Disabled', 'um_usrpiidisability_order' => 2000],
        'NO_ANSWER' => ['um_usrpiidisability_name' => 'I do not wish to answer!', 'um_usrpiidisability_order' => 32000],
    ];
}
