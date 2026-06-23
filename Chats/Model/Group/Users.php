<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Group;

use Object\Table;

class Users extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Group Users';
    public $schema;
    public $name = 'c5_chat_group_users';
    public $pk = ['c5_chatgrpuser_tenant_id', 'c5_chatgrpuser_c5_chatgroup_code', 'c5_chatgrpuser_um_user_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatgrpuser_';
    public $columns = [
        'c5_chatgrpuser_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatgrpuser_c5_chatgroup_code' => ['name' => 'Group Code', 'domain' => 'group_code'],
        'c5_chatgrpuser_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'c5_chatgrpuser_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_group_users_pk' => ['type' => 'pk', 'columns' => ['c5_chatgrpuser_tenant_id', 'c5_chatgrpuser_c5_chatgroup_code', 'c5_chatgrpuser_um_user_id']],
        'c5_chatgrpuser_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpuser_tenant_id', 'c5_chatgrpuser_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'c5_chatgrpuser_c5_chatgroup_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpuser_tenant_id', 'c5_chatgrpuser_c5_chatgroup_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Groups',
            'foreign_columns' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
