<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Model\Collection;

use Object\Collection;

class Tasks extends Collection
{
    public $data = [
        'model' => '\Numbers\Users\TaskScheduler\Model\Tasks',
        'pk' => ['ts_task_code'],
        'details' => [
            '\Numbers\Users\TaskScheduler\Model\TaskParameters' => [
                'pk' => ['ts_tskparam_task_code', 'ts_tskparam_name'],
                'type' => '1M',
                'map' => ['ts_task_code' => 'ts_tskparam_task_code']
            ]
        ]
    ];
}
