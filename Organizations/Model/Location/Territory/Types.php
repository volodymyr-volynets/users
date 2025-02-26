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

class Types extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Territory Types';
    public $column_key = 'on_terrtype_id';
    public $column_prefix = 'on_terrtype_';
    public $columns = [
        'on_terrtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_terrtype_name' => ['name' => 'Name', 'type' => 'text'],
        'on_terrtype_icon' => ['name' => 'Icon', 'type' => 'text']
    ];
    public $options_map = [
        'on_terrtype_name' => 'name',
        'on_terrtype_icon' => 'icon_class',
    ];
    public $data = [ // keys are mirrored to service assignment type
        13 => ['on_terrtype_name' => 'Postal Codes', 'on_terrtype_icon' => 'far fa-compass'],
        17 => ['on_terrtype_name' => 'Counties', 'on_terrtype_icon' => 'fab fa-chrome'],
    ];
}
