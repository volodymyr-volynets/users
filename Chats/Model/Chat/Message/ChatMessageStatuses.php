<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat\Message;

use Object\Data;

class ChatMessageStatuses extends Data
{
    public $module_code = 'C5';
    public $title = 'C/5 Chat Message Statuses';
    public $column_key = 'c5_chatmessstatus_id';
    public $column_prefix = 'c5_chatmessstatus_';
    public $orderby;
    public $columns = [
        'c5_chatmessstatus_id' => ['name' => 'Status #', 'domain' => 'status_id'],
        'c5_chatmessstatus_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['c5_chatmessstatus_name' => 'New'],
        20 => ['c5_chatmessstatus_name' => 'Completed'],
    ];
}
