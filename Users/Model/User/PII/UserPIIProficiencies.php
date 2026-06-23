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

class UserPIIProficiencies extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Proficiencies';
    public $column_key = 'um_usrpiiprof_code';
    public $column_prefix = 'um_usrpiiprof_';
    public $orderby = [
        'um_usrpiiprof_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiiprof_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiiprof_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiiprof_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'NOVICE' => ['um_usrpiiprof_name' => 'Novice', 'um_usrpiiprof_order' => 1000],
        'INTERMEDIATE' => ['um_usrpiiprof_name' => 'Intermediate', 'um_usrpiiprof_order' => 2000],
        'ADVANCED' => ['um_usrpiiprof_name' => 'Advanced', 'um_usrpiiprof_order' => 3000],
        'SUPERIOR' => ['um_usrpiiprof_name' => 'Superior', 'um_usrpiiprof_order' => 4000],
        'DISTINGUISHED' => ['um_usrpiiprof_name' => 'Distinguished', 'um_usrpiiprof_order' => 5000],
        'NATIVE' => ['um_usrpiiprof_name' => 'Native', 'um_usrpiiprof_order' => 6000],
        'NO_ANSWER' => ['um_usrpiiprof_name' => 'I do not wish to answer!', 'um_usrpiiprof_order' => 32000],
    ];
}
