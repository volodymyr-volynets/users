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

class Map extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Group Map';
    public $schema;
    public $name = 'c5_chat_group_map';
    public $pk = ['c5_chatgrpmap_tenant_id', 'c5_chatgrpmap_c5_chat_id', 'c5_chatgrpmap_c5_chatgroup_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatgrpmap_';
    public $columns = [
        'c5_chatgrpmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatgrpmap_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatgrpmap_c5_chatgroup_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'c5_chatgrpmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_group_map_pk' => ['type' => 'pk', 'columns' => ['c5_chatgrpmap_tenant_id', 'c5_chatgrpmap_c5_chat_id', 'c5_chatgrpmap_c5_chatgroup_code']],
        'c5_chatgrpmap_c5_chat_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpmap_tenant_id', 'c5_chatgrpmap_c5_chat_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chats',
            'foreign_columns' => ['c5_chat_tenant_id', 'c5_chat_id']
        ],
        'c5_chatgrpmap_c5_chatgroup_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpmap_tenant_id', 'c5_chatgrpmap_c5_chatgroup_code'],
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

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
