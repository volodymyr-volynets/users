<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\Table;

class Skills extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Skills';
    public $name = 'um_user_skills';
    public $pk = ['um_usrskill_tenant_id', 'um_usrskill_user_id', 'um_usrskill_name'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrskill_';
    public $columns = [
        'um_usrskill_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrskill_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrskill_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrskill_um_usrskillprof_code' => ['name' => 'Proficiency', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies'],
        'um_usrskill_years_in_practice' => ['name' => 'Years In Practice', 'domain' => 'age_counter', 'null' => true],
        'um_usrskill_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_skills_pk' => ['type' => 'pk', 'columns' => ['um_usrskill_tenant_id', 'um_usrskill_user_id', 'um_usrskill_name']],
        'um_usrskill_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrskill_tenant_id', 'um_usrskill_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'um_usrskill_mention' => 'name',
        'um_usrskill_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrskill_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
