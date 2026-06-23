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

class UserPIIRaces extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Races';
    public $column_key = 'um_usrpiirace_code';
    public $column_prefix = 'um_usrpiirace_';
    public $orderby = [
        'um_usrpiirace_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiirace_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiirace_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiirace_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'AMERICAN_INDIAN' => ['um_usrpiirace_name' => 'American Indian or Alaska Native', 'um_usrpiirace_order' => 1000],
        'ASIAN' => ['um_usrpiirace_name' => 'Asian', 'um_usrpiirace_order' => 2000],
        'BLACK' => ['um_usrpiirace_name' => 'Black or African American', 'um_usrpiirace_order' => 3000],
        'NATIVE_HAWAIIAN' => ['um_usrpiirace_name' => 'Native Hawaiian or Other Pacific Islander', 'um_usrpiirace_order' => 4000],
        'WHITE' => ['um_usrpiirace_name' => 'White', 'um_usrpiirace_order' => 5000],
        'LATINO' => ['um_usrpiirace_name' => 'Hispanic or Latino', 'um_usrpiirace_order' => 6000],
        'MIDDLE_EASTERN' => ['um_usrpiirace_name' => 'Middle Eastern or North African (MENA)', 'um_usrpiirace_order' => 7000],
        'NO_ANSWER' => ['um_usrpiirace_name' => 'I do not wish to answer!', 'um_usrpiirace_order' => 32000],
    ];
}
