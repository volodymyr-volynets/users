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

class Mentions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Mentions';
    public $name = 'um_user_mentions';
    public $pk = ['um_usrmention_tenant_id', 'um_usrmention_user_id', 'um_usrmention_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrmention_';
    public $columns = [
        'um_usrmention_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrmention_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrmention_id' => ['name' => 'Mention #', 'domain' => 'big_id_sequence'],
        'um_usrmention_mention' => ['name' => 'Mention', 'domain' => 'mention'],
        'um_usrmention_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'um_usrmention_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_mentions_pk' => ['type' => 'pk', 'columns' => ['um_usrmention_tenant_id', 'um_usrmention_user_id', 'um_usrmention_id']],
        'um_usrmention_mention_un' => ['type' => 'unique', 'columns' => ['um_usrmention_tenant_id', 'um_usrmention_mention']],
        'um_usrmention_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrmention_tenant_id', 'um_usrmention_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrmention_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrmention_tenant_id', 'um_usrmention_language_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
            'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'um_usrmention_mention' => 'name',
        'um_usrmention_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrmention_inactive' => 0,
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
