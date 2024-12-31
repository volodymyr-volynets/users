<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Division;

use Object\Data;

class Types extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Division Types';
    public $column_key = 'on_divtype_id';
    public $column_prefix = 'on_divtype_';
    public $orderby = ['on_divtype_id' => SORT_ASC];
    public $columns = [
        'on_divtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_divtype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['on_divtype_name' => 'Division'],
        20 => ['on_divtype_name' => 'Subdivision'],
    ];
}
