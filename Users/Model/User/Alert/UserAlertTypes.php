<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Alert;

use Object\Data;

class UserAlertTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User Alert Types';
    public $column_key = 'um_usralrttype_code';
    public $column_prefix = 'um_usralrttype_';
    public $orderby = [
        'um_usralrttype_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usralrttype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usralrttype_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usralrttype_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'EMAIL_NOTIFICATION' => ['um_usralrttype_name' => 'Email Notification', 'um_usralrttype_order' => 1000],
        'SMS_NOTIFICATION' => ['um_usralrttype_name' => 'SMS Notification', 'um_usralrttype_order' => 1100],
        'CHAT_MESSAGE' => ['um_usralrttype_name' => 'Chat Message', 'um_usralrttype_order' => 2000],
        'CHAT_THREAD' => ['um_usralrttype_name' => 'Chat Thread', 'um_usralrttype_order' => 3000],
        'CHAT_CHANNEL' => ['um_usralrttype_name' => 'Chat Channel', 'um_usralrttype_order' => 3000],
    ];
}
