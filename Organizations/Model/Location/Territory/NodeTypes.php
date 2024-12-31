<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Location\Territory;

use Object\Data;

class NodeTypes extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Territory Node Types';
    public $column_key = 'on_terrnodetype_id';
    public $column_prefix = 'on_terrnodetype_';
    public $columns = [
        'on_terrnodetype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_terrnodetype_name' => ['name' => 'Name', 'type' => 'text'],
        'on_terrnodetype_icon' => ['name' => 'Icon', 'type' => 'text']
    ];
    public $orderby = [
        'on_terrnodetype_id' => SORT_ASC
    ];
    public $options_map = [
        'on_terrnodetype_name' => 'name',
        'on_terrnodetype_icon' => 'icon_class',
    ];
    public $data = [
        10 => ['on_terrnodetype_name' => 'Root', 'on_terrnodetype_icon' => 'fas fa-tree'],
        20 => ['on_terrnodetype_name' => 'Branch', 'on_terrnodetype_icon' => 'fab fa-pagelines'],
        30 => ['on_terrnodetype_name' => 'Leaf', 'on_terrnodetype_icon' => 'fas fa-leaf'],
    ];
}
