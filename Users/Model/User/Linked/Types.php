<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Linked;

use Object\Data;

class Types extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User Linked Types';
    public $column_key = 'um_usrlinktype_code';
    public $column_prefix = 'um_usrlinktype_';
    public $orderby = [
        'um_usrlinktype_name' => SORT_ASC
    ];
    public $columns = [
        'um_usrlinktype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_usrlinktype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'AR_CUSTOMERS' => ['um_usrlinktype_name' => 'A/R Customers'],
        'AP_VENDORS' => ['um_usrlinktype_name' => 'A/P Vendors'],
        // todo: move it to proper modules
    ];
}
