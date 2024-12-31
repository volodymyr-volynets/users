<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Override;

class DevPortal
{
    public $data = [
        'Links' => [
            'Global' => [
                'Task Scheduler' => [
                    'url' => '/Numbers/Users/TaskScheduler/Controller/External/CronDaemon',
                    'name' => 'Task Scheduler',
                    'icon' => 'far fa-sun'
                ]
            ]
        ]
    ];
}
