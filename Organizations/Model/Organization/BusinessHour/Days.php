<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization\BusinessHour;

use Object\Data;

class Days extends Data
{
    public $module_code = 'ON';
    public $title = 'O/N Organization Business Hour Days';
    public $column_key = 'on_orgbissday_id';
    public $column_prefix = 'on_orgbissday_';
    public $orderby = [
        'on_orgbissday_id' => SORT_ASC
    ];
    public $columns = [
        'on_orgbissday_id' => ['name' => 'Type #', 'domain' => 'day_id'],
        'on_orgbissday_name' => ['name' => 'Name', 'type' => 'text'],
    ];
    public $options_map = [
        'on_orgbissday_name' => 'name',
    ];
    public $data = [
        1 => ['on_orgbissday_name' => 'Monday'],
        2 => ['on_orgbissday_name' => 'Tuesday'],
        3 => ['on_orgbissday_name' => 'Wednesday'],
        4 => ['on_orgbissday_name' => 'Thursday'],
        5 => ['on_orgbissday_name' => 'Friday'],
        6 => ['on_orgbissday_name' => 'Saturday'],
        7 => ['on_orgbissday_name' => 'Sunday'],
    ];
}
