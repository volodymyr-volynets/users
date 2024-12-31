<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Documents\Model;

use Object\Data;

class Statuses extends Data
{
    public $module_code = 'WG';
    public $title = 'W/G Document Statuses';
    public $column_key = 'wg_docstatus_id';
    public $column_prefix = 'wg_docstatus_';
    public $columns = [
        'wg_docstatus_id' => ['name' => '#', 'type' => 'smallint'],
        'wg_docstatus_name' => ['name' => 'Name', 'type' => 'text'],
    ];
    public $options_map = [
        'wg_docstatus_name' => 'name'
    ];
    public $orderby = [
        'wg_docstatus_id' => SORT_ASC
    ];
    public $data = [
        10 => ['wg_docstatus_name' => 'Not Required'],
        20 => ['wg_docstatus_name' => 'Required'],
        30 => ['wg_docstatus_name' => 'Approved'],
        40 => ['wg_docstatus_name' => 'Declined'],
    ];
}
