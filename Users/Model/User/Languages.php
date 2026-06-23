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

class Languages extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Languages';
    public $name = 'um_user_languages';
    public $pk = ['um_usrsplang_tenant_id', 'um_usrsplang_user_id', 'um_usrsplang_language_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrsplang_';
    public $columns = [
        'um_usrsplang_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrsplang_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrsplang_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'um_usrsplang_listening_um_usrpiiprof_code' => ['name' => 'Listening Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'um_usrsplang_speaking_um_usrpiiprof_code' => ['name' => 'Speaking Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'um_usrsplang_writing_um_usrpiiprof_code' => ['name' => 'Writing Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'um_usrsplang_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_languages_pk' => ['type' => 'pk', 'columns' => ['um_usrsplang_tenant_id', 'um_usrsplang_user_id', 'um_usrsplang_language_code']],
        'um_usrsplang_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsplang_tenant_id', 'um_usrsplang_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrsplang_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsplang_tenant_id', 'um_usrsplang_language_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
            'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'um_usrsplang_mention' => 'name',
        'um_usrsplang_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrsplang_inactive' => 0,
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
