<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Model\Header;

use Object\Data;

class RowTypes extends Data
{
    public $module_code = 'P8';
    public $title = 'P/8 Header Row Types';
    public $column_key = 'p8_hdrrowtype_code';
    public $column_prefix = 'p8_hdrrowtype_';
    public $orderby = [
        'p8_hdrrowtype_order' => SORT_ASC
    ];
    public $columns = [
        'p8_hdrrowtype_code' => ['name' => 'Row Type', 'domain' => 'type_code'],
        'p8_hdrrowtype_name' => ['name' => 'Name', 'type' => 'text'],
        'p8_hdrrowtype_order' => ['name' => 'Order', 'domain' => 'order']
    ];
    public $data = [
        'ROW01' => ['p8_hdrrowtype_name' => 'Row 1', 'p8_hdrrowtype_order' => 1000],
        'ROW02' => ['p8_hdrrowtype_name' => 'Row 2', 'p8_hdrrowtype_order' => 2000],
        'ROW03' => ['p8_hdrrowtype_name' => 'Row 3', 'p8_hdrrowtype_order' => 3000],
        'ROW04' => ['p8_hdrrowtype_name' => 'Row 4', 'p8_hdrrowtype_order' => 4000],
        'ROW05' => ['p8_hdrrowtype_name' => 'Row 5', 'p8_hdrrowtype_order' => 5000],
        'ROW06' => ['p8_hdrrowtype_name' => 'Row 6', 'p8_hdrrowtype_order' => 6000],
        'ROW07' => ['p8_hdrrowtype_name' => 'Row 7', 'p8_hdrrowtype_order' => 7000],
        'ROW08' => ['p8_hdrrowtype_name' => 'Row 8', 'p8_hdrrowtype_order' => 8000],
        'ROW09' => ['p8_hdrrowtype_name' => 'Row 9', 'p8_hdrrowtype_order' => 9000],
        'ROW10' => ['p8_hdrrowtype_name' => 'Row 10', 'p8_hdrrowtype_order' => 10000],
    ];
}
