<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Jurisdiction;

use Object\Data;

class Types extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Jurisdiction Types';
    public $column_key = 'on_juristype_id';
    public $column_prefix = 'on_juristype_';
    public $columns = [
        'on_juristype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_juristype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['on_juristype_name' => 'Identifying'],
        20 => ['on_juristype_name' => 'Income Tax'],
        30 => ['on_juristype_name' => 'Transaction Tax'],
    ];
}
