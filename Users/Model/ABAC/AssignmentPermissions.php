<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\ABAC;

use Object\Data;

class AssignmentPermissions extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Assignment Types';
    public $column_key = 'um_abacasignperm_code';
    public $column_prefix = 'um_abacasignperm_';
    public $orderby = [
        'um_abacasignperm_order' => SORT_ASC,
    ];

    public $columns = [
        'um_abacasignperm_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_abacasignperm_name' => ['name' => 'Name', 'type' => 'text'],
        'um_abacasignperm_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'NONE' => ['um_abacasignperm_name' => 'None', 'um_abacasignperm_order' => 1000],
        'READ' => ['um_abacasignperm_name' => 'Read', 'um_abacasignperm_order' => 2000],
        'WRITE' => ['um_abacasignperm_name' => 'Write', 'um_abacasignperm_order' => 3000],
        'ADMIN' => ['um_abacasignperm_name' => 'Admin', 'um_abacasignperm_order' => 4000],
    ];
}
