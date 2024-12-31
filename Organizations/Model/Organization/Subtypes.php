<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization;

use Object\Data;

class Subtypes extends Data
{
    public $column_key = 'on_orgclass_id';
    public $column_prefix = 'on_orgclass_';
    public $columns = [
        'on_orgclass_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_orgclass_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['on_orgclass_name' => 'Primary'],
        20 => ['on_orgclass_name' => 'Customer'],
    ];
}
