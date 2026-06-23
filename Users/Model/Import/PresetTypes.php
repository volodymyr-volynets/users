<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Import;

use Object\Data;

class PresetTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Import Preset Types';
    public $column_key = 'um_imppretype_code';
    public $column_prefix = 'um_imppretype_';
    public $orderby = [
        'um_imppretype_name' => SORT_ASC
    ];
    public $columns = [
        'um_imppretype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_imppretype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'IMPORT' => ['um_imppretype_name' => 'Imports'],
        'ETL' => ['um_imppretype_name' => 'Extract Transform Load'],
    ];
}
