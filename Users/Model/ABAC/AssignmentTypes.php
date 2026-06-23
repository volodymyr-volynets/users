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

class AssignmentTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Assignment Types';
    public $column_key = 'um_abacasigntype_code';
    public $column_prefix = 'um_abacasigntype_';
    public $orderby = [
        'um_abacasigntype_order' => SORT_ASC,
    ];

    public $columns = [
        'um_abacasigntype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_abacasigntype_name' => ['name' => 'Name', 'type' => 'text'],
        'um_abacasigntype_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'OWNER' => ['um_abacasigntype_name' => 'Owner', 'um_abacasigntype_order' => 1000],
        'ACCESS' => ['um_abacasigntype_name' => 'Access', 'um_abacasigntype_order' => 2000],
        'LINKED' => ['um_abacasigntype_name' => 'Linked', 'um_abacasigntype_order' => 3000],
    ];
}
