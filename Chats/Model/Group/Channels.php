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

class Channels extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Group Channels';
    public $schema;
    public $name = 'c5_chat_group_channels';
    public $pk = ['c5_chatgrpchannel_tenant_id', 'c5_chatgrpchannel_c5_chatgroup_code', 'c5_chatgrpchannel_c5_chatchannel_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatgrpchannel_';
    public $columns = [
        'c5_chatgrpchannel_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatgrpchannel_c5_chatgroup_code' => ['name' => 'Group Code', 'domain' => 'group_code'],
        'c5_chatgrpchannel_c5_chatchannel_code' => ['name' => 'Channel Code', 'domain' => 'group_code'],
        'c5_chatgrpchannel_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_group_channels_pk' => ['type' => 'pk', 'columns' => ['c5_chatgrpchannel_tenant_id', 'c5_chatgrpchannel_c5_chatgroup_code', 'c5_chatgrpchannel_c5_chatchannel_code']],
        'c5_chatgrpchannel_c5_chatgroup_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpchannel_tenant_id', 'c5_chatgrpchannel_c5_chatgroup_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Groups',
            'foreign_columns' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_code']
        ],
        'c5_chatgrpchannel_c5_chatchannel_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgrpchannel_tenant_id', 'c5_chatgrpchannel_c5_chatchannel_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Channels',
            'foreign_columns' => ['c5_chatchannel_tenant_id', 'c5_chatchannel_code']
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
