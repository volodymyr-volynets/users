<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Channel;

use Object\Data;

class InviteStatuses extends Data
{
    public $module_code = 'C5';
    public $title = 'C/5 Chat Channel Invite Statuses';
    public $column_key = 'c5_chatchaninvstatus_code';
    public $column_prefix = 'c5_chatchaninvstatus_';
    public $orderby;
    public $columns = [
        'c5_chatchaninvstatus_code' => ['name' => 'Status Code', 'domain' => 'group_code'],
        'c5_chatchaninvstatus_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'NEW' => ['c5_chatchaninvstatus_name' => 'New'],
        'JOINED' => ['c5_chatchaninvstatus_name' => 'Joined'],
        'TO_JOIN' => ['c5_chatchaninvstatus_name' => 'To Join'],
        'DECLINED' => ['c5_chatchaninvstatus_name' => 'Declined'],
    ];
}
