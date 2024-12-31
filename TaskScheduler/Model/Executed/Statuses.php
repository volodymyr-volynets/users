<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Model\Executed;

use Object\Data;

class Statuses extends Data
{
    public $module_code = 'TS';
    public $title = 'T/S Executed Statuses';
    public $column_key = 'ts_executedjobstatus_id';
    public $column_prefix = 'ts_executedjobstatus_';
    public $orderby;
    public $columns = [
        'ts_executedjobstatus_id' => ['name' => '#', 'domain' => 'type_id'],
        'ts_executedjobstatus_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['ts_executedjobstatus_name' => 'New'],
        20 => ['ts_executedjobstatus_name' => 'In Progress'],
        30 => ['ts_executedjobstatus_name' => 'Completed']
    ];
}
