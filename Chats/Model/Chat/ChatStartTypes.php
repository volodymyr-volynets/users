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

class ChatStartTypes extends Data
{
    public $module_code = 'C5';
    public $title = 'C/5 Chat Start Types';
    public $column_key = 'c5_chatstarttype_code';
    public $column_prefix = 'c5_chatstarttype_';
    public $orderby;
    public $columns = [
        'c5_chatstarttype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'c5_chatstarttype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'AI' => ['c5_chatstarttype_name' => 'Artificial Intelligence'],
    ];
}
