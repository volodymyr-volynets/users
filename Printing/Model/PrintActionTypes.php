<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Model;

use Object\Data;

class PrintActionTypes extends Data
{
    public $module_code = 'P8';
    public $title = 'P/8 Print Action Types';
    public $column_key = 'p8_printactiontype_code';
    public $column_prefix = 'p8_printactiontype_';
    public $orderby;
    public $columns = [
        'p8_printactiontype_code' => ['name' => 'Action Type', 'domain' => 'type_code'],
        'p8_printactiontype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'PDF' => ['p8_printactiontype_name' => 'Print as PDF'],
        'HTML' => ['p8_printactiontype_name' => 'Print as HTML'],
        'EMAIL' => ['p8_printactiontype_name' => 'Send Email'],
        'QUEUE' => ['p8_printactiontype_name' => 'Add to Print Queue'],
    ];
}
