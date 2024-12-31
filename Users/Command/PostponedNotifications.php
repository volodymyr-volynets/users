<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Command;

use Numbers\Backend\System\ShellCommand\Class2\ShellCommands;

class PostponedNotifications extends ShellCommands
{
    public $code = 'UM::NOTIFICATION_POSTPONED';
    public $name = 'U/M Notification Postponed (Command)';
    public $command = 'um_notifications_postponed';
    public $columns = [
        'tenant_id' => ['required' => true, 'name' => 'Tenant #', 'domain' => 'tenant_id'],
        'start_date' => ['sometimes' => true, 'name' => 'Start Date', 'type' => 'date', 'null' => true],
        'end_date' => ['sometimes' => true, 'name' => 'End Date', 'type' => 'date', 'null' => true],
    ];

    public function execute(array $parameters, array $options = []): array
    {
        // now we simply run a task
        $task = new \Numbers\Users\Users\Task\PostponedNotifications($parameters, $options);
        return $task->process($options);
    }
}
