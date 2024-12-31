<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Task;

use Numbers\Users\TaskScheduler\Abstract2\Task;
use NF\Message;

class PostponedEvents extends Task
{
    public $task_code = 'SM::POSTPONED_EVENTS';

    public function execute(array $parameters, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'data' => [
                'comments' => []
            ]
        ];
        $counter = 0;
        $result['success'] = true;
        if ($counter > 0) {
            $result['data']['comments'][] = loc(Message::EXECUTED_NUMBER_POSTPONED_EVENTS, '', [
                'number' => \Format::id($counter),
            ]);
        }
        return $result;
    }
}
