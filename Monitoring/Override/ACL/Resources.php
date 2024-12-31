<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Override\ACL;

class Resources
{
    public $data = [
        'initialize' => [
            'monitoring' => [
                'method' => '\Numbers\Users\Monitoring\Helper\Monitor::initialize'
            ]
        ],
        'monitoring' => [
            'action_method' => [
                'method' => '\Numbers\Users\Monitoring\Helper\Monitor::action'
            ]
        ],
        'destroy' => [
            'monitoring' => [
                'method' => '\Numbers\Users\Monitoring\Helper\Monitor::destroy'
            ]
        ]
    ];
}
