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

class UserPIIGenders extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Genders';
    public $column_key = 'um_usrpiigender_code';
    public $column_prefix = 'um_usrpiigender_';
    public $orderby = [
        'um_usrpiigender_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiigender_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiigender_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiigender_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'MALE' => ['um_usrpiigender_name' => 'Male', 'um_usrpiigender_order' => 1000],
        'FEMALE' => ['um_usrpiigender_name' => 'Female', 'um_usrpiigender_order' => 1100],
        'CISGENDER' => ['um_usrpiigender_name' => 'Cisgender', 'um_usrpiigender_order' => 2000],
        'TRANSGENDER' => ['um_usrpiigender_name' => 'Transgender', 'um_usrpiigender_order' => 3000],
        'NON_BINARY' => ['um_usrpiigender_name' => 'Non-binary', 'um_usrpiigender_order' => 4000],
        'AGENDER' => ['um_usrpiigender_name' => 'Agender', 'um_usrpiigender_order' => 5000],
        'GENDERFLUID' => ['um_usrpiigender_name' => 'Genderfluid', 'um_usrpiigender_order' => 6000],
        'GENDERQUEER' => ['um_usrpiigender_name' => 'Genderqueer', 'um_usrpiigender_order' => 7000],
        'GENDER_EXPRESSION' => ['um_usrpiigender_name' => 'Gender Expression', 'um_usrpiigender_order' => 8000],
        'NO_ANSWER' => ['um_usrpiigender_name' => 'I do not wish to answer!', 'um_usrpiigender_order' => 32000],
    ];
}
