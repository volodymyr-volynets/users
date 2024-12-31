<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

use Object\Import;

class Commands extends Import
{
    public $data = [
        'tasks' => [
            'options' => [
                'pk' => ['sm_shellcommand_code'],
                'model' => '\Numbers\Backend\System\ShellCommand\Model\ShellCommands',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_shellcommand_code' => 'UM::NOTIFICATION_POSTPONED',
                    'sm_shellcommand_name' => 'U/M Notification Postponed (Command)',
                    'sm_shellcommand_description' => 'Use this command to send postponed mesages to users.',
                    'sm_shellcommand_model' => '\Numbers\Users\Users\Command\PostponedNotifications',
                    'sm_shellcommand_command' => 'um_notifications_postponed',
                    'sm_shellcommand_module_code' => 'UM',
                    'sm_shellcommand_inactive' => 0,
                ],
            ],
        ],
    ];
}
