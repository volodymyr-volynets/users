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

class UserPIIVeteranStatuses extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Veteran Statuses';
    public $column_key = 'um_usrpiiveteran_code';
    public $column_prefix = 'um_usrpiiveteran_';
    public $orderby = [
        'um_usrpiiveteran_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiiveteran_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiiveteran_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiiveteran_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'VETERAN' => ['um_usrpiiveteran_name' => 'Veteran', 'um_usrpiiveteran_order' => 1000],
        'NOT_VETERAN' => ['um_usrpiiveteran_name' => 'Not Veteran', 'um_usrpiiveteran_order' => 2000],
        'NO_ANSWER' => ['um_usrpiiveteran_name' => 'I do not wish to answer!', 'um_usrpiiveteran_order' => 32000],
    ];
}
