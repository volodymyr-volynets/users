<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Workflows\Model\Workflow\Step;

use Object\Data;

class Types extends Data
{
    public $module_code = 'W9';
    public $title = 'W/9 Workflow Step Types';
    public $column_key = 'w9_wrkflstptype_id';
    public $column_prefix = 'w9_wrkflstptype_';
    public $orderby;
    public $columns = [
        'w9_wrkflstptype_id' => ['name' => 'Type', 'domain' => 'type_id'],
        'w9_wrkflstptype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['w9_wrkflstptype_name' => 'System Page'],
        20 => ['w9_wrkflstptype_name' => 'Other System'],
    ];
}
