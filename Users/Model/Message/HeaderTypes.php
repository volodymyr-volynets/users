<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Message;

use Object\Data;

class HeaderTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Message Header Types';
    public $column_key = 'um_meshdrtype_id';
    public $column_prefix = 'um_meshdrtype_';
    public $orderby;
    public $columns = [
        'um_meshdrtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'um_meshdrtype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['um_meshdrtype_name' => 'Email Notification'],
        20 => ['um_meshdrtype_name' => 'Chat Message']
    ];
}
