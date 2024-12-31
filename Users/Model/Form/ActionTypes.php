<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Form;

use Object\Data;

class ActionTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Form Action Types';
    public $column_key = 'um_frmactiontype_id';
    public $column_prefix = 'um_frmactiontype_';
    public $orderby;
    public $columns = [
        'um_frmactiontype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'um_frmactiontype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['um_frmactiontype_name' => 'Readonly'],
        //20 => ['um_frmactiontype_name' => 'Mask'],
        30 => ['um_frmactiontype_name' => 'Hide']
    ];
}
