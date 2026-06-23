<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Canvas;

use Object\Data;

class CanvasTypes extends Data
{
    public $module_code = 'C5';
    public $title = 'C/5 Chat Canvas Types';
    public $column_key = 'c5_canvastype_code';
    public $column_prefix = 'c5_canvastype_';
    public $orderby = [
        'c5_canvastype_order' => SORT_ASC,
    ];

    public $columns = [
        'c5_canvastype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'c5_canvastype_name' => ['name' => 'Name', 'type' => 'text'],
        'c5_canvastype_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'CANVAS' => ['c5_canvastype_name' => 'Canvas', 'c5_canvastype_order' => 1000],
        'LINK' => ['c5_canvastype_name' => 'Link', 'c5_canvastype_order' => 2000],
        'LIST' => ['c5_canvastype_name' => 'List', 'c5_canvastype_order' => 3000],
    ];
}
