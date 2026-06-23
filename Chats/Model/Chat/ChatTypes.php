<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat;

use Object\Data;

class ChatTypes extends Data
{
    public $module_code = 'C5';
    public $title = 'C/5 Chat Types';
    public $column_key = 'c5_chattype_code';
    public $column_prefix = 'c5_chattype_';
    public $orderby;
    public $columns = [
        'c5_chattype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'c5_chattype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'GENERAL' => ['c5_chattype_name' => 'General (AI)'],
        'CHANNEL' => ['c5_chattype_name' => 'Channel'],
        'DM' => ['c5_chattype_name' => 'Direct Messages (DM)'],
    ];
}
