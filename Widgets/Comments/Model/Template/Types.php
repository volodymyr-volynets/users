<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Comments\Model\Template;

use Object\Data;

class Types extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Note Template Types';
    public $column_key = 'um_notetempltype_id';
    public $column_prefix = 'um_notetempltype_';
    public $orderby;
    public $columns = [
        'um_notetempltype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'um_notetempltype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        100 => ['um_notetempltype_name' => 'Comments'],
    ];
}
