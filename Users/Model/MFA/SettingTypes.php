<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\MFA;

use Object\Data;

class SettingTypes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M MFA Setting Types';
    public $column_key = 'um_mfasettyp_code';
    public $column_prefix = 'um_mfasettyp_';
    public $orderby = [
        'um_mfasettyp_order' => SORT_ASC,
    ];

    public $columns = [
        'um_mfasettyp_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_mfasettyp_name' => ['name' => 'Name', 'type' => 'text'],
        'um_mfasettyp_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'NONE' => ['um_mfasettyp_name' => 'None', 'um_mfasettyp_order' => 1000],
        'ENABLED' => ['um_mfasettyp_name' => 'Enabled', 'um_mfasettyp_order' => 2000],
        'ENFORCED' => ['um_mfasettyp_name' => 'Enforced', 'um_mfasettyp_order' => 3000],
        'SKIPPED' => ['um_mfasettyp_name' => 'Skipped', 'um_mfasettyp_order' => 4000],
    ];
}
