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

class UserPIISkillProficiencies extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Skill Proficiencies';
    public $column_key = 'um_usrskillprof_code';
    public $column_prefix = 'um_usrskillprof_';
    public $orderby = [
        'um_usrskillprof_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrskillprof_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrskillprof_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrskillprof_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'NOVICE' => ['um_usrskillprof_name' => 'Novice', 'um_usrskillprof_order' => 1000],
        'INTERMEDIATE' => ['um_usrskillprof_name' => 'Intermediate', 'um_usrskillprof_order' => 2000],
        'ADVANCED' => ['um_usrskillprof_name' => 'Advanced', 'um_usrskillprof_order' => 3000],
        'SUPERIOR' => ['um_usrskillprof_name' => 'Superior', 'um_usrskillprof_order' => 4000],
        'NO_ANSWER' => ['um_usrskillprof_name' => 'I do not wish to answer!', 'um_usrskillprof_order' => 32000],
    ];
}
