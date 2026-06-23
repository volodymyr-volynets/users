<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Phases\Model;

use Object\Data;

class PhaseStepTypes extends Data
{
    public $module_code = 'WG';
    public $title = 'W/G Phase Step Types';
    public $column_key = 'wg_phasestptype_code';
    public $column_prefix = 'wg_phasestptype_';
    public $orderby;
    public $columns = [
        'wg_phasestptype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'wg_phasestptype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'SUBFORM_CALL' => ['wg_phasestptype_name' => 'Sub-Form (Call)'],
        'FIELD_CHECK' => ['wg_phasestptype_name' => 'Field (Check)'],
        'FIELD_UPDATE' => ['wg_phasestptype_name' => 'Field (Update)'],
        'CONFIRMATION' => ['wg_phasestptype_name' => 'Confirmation'],
        'WELCOME' => ['wg_phasestptype_name' => 'Welcome'],
    ];
}
