<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\PII;

use Object\Data;

class UserPIISexualOrientations extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Sexual Orientations';
    public $column_key = 'um_usrpiisexorient_code';
    public $column_prefix = 'um_usrpiisexorient_';
    public $orderby = [
        'um_usrpiisexorient_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiisexorient_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiisexorient_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiisexorient_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'HETEROSEXUAL' => ['um_usrpiisexorient_name' => 'Heterosexual (Straight)', 'um_usrpiisexorient_order' => 1000],
        'HOMOSEXUAL' => ['um_usrpiisexorient_name' => 'Homosexual (Gay/Lesbian)', 'um_usrpiisexorient_order' => 2000],
        'GAY' => ['um_usrpiisexorient_name' => 'Gay', 'um_usrpiisexorient_order' => 3000],
        'LESBIAN' => ['um_usrpiisexorient_name' => 'Lesbian', 'um_usrpiisexorient_order' => 4000],
        'BISEXUAL' => ['um_usrpiisexorient_name' => 'Bisexual', 'um_usrpiisexorient_order' => 5000],
        'PANSEXUAL' => ['um_usrpiisexorient_name' => 'Pansexual (Omnisexual)', 'um_usrpiisexorient_order' => 6000],
        'ASEXUAL' => ['um_usrpiisexorient_name' => 'Asexual', 'um_usrpiisexorient_order' => 7000],
        'QUEER' => ['um_usrpiisexorient_name' => 'Queer', 'um_usrpiisexorient_order' => 8000],
        'NO_ANSWER' => ['um_usrpiisexorient_name' => 'I do not wish to answer!', 'um_usrpiisexorient_order' => 32000],
    ];
}
