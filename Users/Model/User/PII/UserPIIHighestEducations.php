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

class UserPIIHighestEducations extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M User PII Highest Educations';
    public $column_key = 'um_usrpiihighedu_code';
    public $column_prefix = 'um_usrpiihighedu_';
    public $orderby = [
        'um_usrpiihighedu_order' => SORT_ASC,
    ];

    public $columns = [
        'um_usrpiihighedu_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_usrpiihighedu_name' => ['name' => 'Name', 'type' => 'text'],
        'um_usrpiihighedu_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'HIGH_SCHOOL_DIPLOMA' => ['um_usrpiihighedu_name' => 'GED or high school diploma', 'um_usrpiihighedu_order' => 1000],
        'APPRENTICESHIP_BOOT_CAMP' => ['um_usrpiihighedu_name' => 'Apprenticeship, Boot Camp', 'um_usrpiihighedu_order' => 2000],
        'PROFESSIONAL_CERTIFICATE' => ['um_usrpiihighedu_name' => 'Professional Certificate', 'um_usrpiihighedu_order' => 3000],
        'ASSOCIATE_DEGREE' => ['um_usrpiihighedu_name' => 'Associate Degree', 'um_usrpiihighedu_order' => 4000],
        'BACHELORS_DEGREE' => ['um_usrpiihighedu_name' => 'Bachelor\'s Degree', 'um_usrpiihighedu_order' => 5000],
        'MASTERS_DEGREE' => ['um_usrpiihighedu_name' => 'Master\'s Degree', 'um_usrpiihighedu_order' => 6000],
        'DOCTORAL_DEGREE' => ['um_usrpiihighedu_name' => 'Doctoral Degree', 'um_usrpiihighedu_order' => 7000],
        'NO_ANSWER' => ['um_usrpiihighedu_name' => 'I do not wish to answer!', 'um_usrpiihighedu_order' => 32000],
    ];
}
