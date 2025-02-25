<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Transaction;

use Object\Data;

class EntryTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Entry Types';
    public $column_key = 'um_enttype_code';
    public $column_prefix = 'um_enttype_';
    public $orderby = ['um_enttype_order' => SORT_ASC];
    public $columns = [
        'um_enttype_code' => ['name' => 'Entry Type', 'domain' => 'type_code'],
        'um_enttype_name' => ['name' => 'Name', 'type' => 'text'],
        'um_enttype_order' => ['name' => 'Order', 'domain' => 'order']
    ];
    public $data = [
        'USR' => ['um_enttype_name' => 'User', 'um_enttype_order' => 1000],
        'ROL' => ['um_enttype_name' => 'Role', 'um_enttype_order' => 2000],
        'TEA' => ['um_enttype_name' => 'Team', 'um_enttype_order' => 3000],
        'GRP' => ['um_enttype_name' => 'Group', 'um_enttype_order' => 4000],
        'IVT' => ['um_enttype_name' => 'Invite', 'um_enttype_order' => 4010],
        // channels
        'CHL' => ['um_enttype_name' => 'Channel', 'um_enttype_order' => 5000],
        'CHG' => ['um_enttype_name' => 'Channel Group', 'um_enttype_order' => 6000],
    ];
}
