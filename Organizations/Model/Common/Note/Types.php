<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Common\Note;

use Object\Data;

class Types extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Common Note Types';
    public $column_key = 'on_comnottype_code';
    public $column_prefix = 'on_comnottype_';
    public $columns = [
        'on_comnottype_code' => ['name' => 'Type #', 'domain' => 'type_code'],
        'on_comnottype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'GENERAL' => ['on_comnottype_name' => 'General'],
        'WARNING' => ['on_comnottype_name' => 'Warning'],
        'NOTICE' => ['on_comnottype_name' => 'Notice'],
    ];
}
