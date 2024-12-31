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

class RecipientTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Message Recipient Types';
    public $column_key = 'um_mesrctype_id';
    public $column_prefix = 'um_mesrctype_';
    public $orderby;
    public $columns = [
        'um_mesrctype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'um_mesrctype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['um_mesrctype_name' => 'To'],
        20 => ['um_mesrctype_name' => 'CC'],
        30 => ['um_mesrctype_name' => 'BCC']
    ];
}
