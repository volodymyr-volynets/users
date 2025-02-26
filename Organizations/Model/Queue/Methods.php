<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Queue;

use Object\Data;

class Methods extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Queue Type Methods';
    public $column_key = 'on_quemethod_id';
    public $column_prefix = 'on_quemethod_';
    public $columns = [
        'on_quemethod_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'on_quemethod_name' => ['name' => 'Name', 'type' => 'text'],
        'on_quemethod_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
    ];
    public $options_map = [
        'on_quemethod_name' => 'name',
        'on_quemethod_icon' => 'icon_class',
    ];
    public $data = [
        10 => ['on_quemethod_name' => 'Round Robin (Sequential)', 'on_quemethod_icon' => 'fab fa-chrome'],
        15 => ['on_quemethod_name' => 'Round Robin (Randomized)', 'on_quemethod_icon' => 'fab fa-grav'],
        20 => ['on_quemethod_name' => 'Prioritized Routing', 'on_quemethod_icon' => 'fab fa-docker'],
        //30 => ['on_quemethod_name' => 'Cherry Picking', 'on_quemethod_icon' => 'fab fa-sistrix'],
    ];
}
