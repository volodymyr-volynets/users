<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model;

use Object\Table;
use Object\Traits\BatchesURLHelper;

class Groups extends Table
{
    use BatchesURLHelper;

    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Groups';
    public $schema;
    public $name = 'c5_chat_groups';
    public $pk = ['c5_chatgroup_tenant_id', 'c5_chatgroup_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatgroup_';
    public $columns = [
        'c5_chatgroup_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatgroup_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'c5_chatgroup_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatgroup_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'c5_chatgroup_mention' => ['name' => 'Mention', 'domain' => 'mention', 'null' => true],
        'c5_chatgroup_users_count' => ['name' => '# of Users', 'domain' => 'counter', 'default' => 0],
        'c5_chatgroup_channel_count' => ['name' => '# of Channels', 'domain' => 'counter', 'default' => 0],
        'c5_chatgroup_chat_count' => ['name' => '# of Chats', 'domain' => 'counter', 'default' => 0],
        'c5_chatgroup_um_usrgrp_id' => ['name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true],
        'c5_chatgroup_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_groups_pk' => ['type' => 'pk', 'columns' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_code']],
        'c5_chatgroup_mention_un' => ['type' => 'unique', 'columns' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_mention']],
        'c5_chatgroup_um_usrgrp_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatgroup_tenant_id', 'c5_chatgroup_um_usrgrp_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Groups',
            'foreign_columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id']
        ]
    ];
    public $indexes = [
        'c5_chat_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['c5_chatgroup_code', 'c5_chatgroup_name']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'c5_chatgroup_name' => 'name',
        'c5_chatgroup_icon' => 'icon_class',
        'c5_chatgroup_inactive' => 'inactive'
    ];
    public $options_active = [
        'c5_chatgroup_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $batches = [
        'map' => [
            'c5_chatgroup_tenant_id' => 'tm_batchrecord_tenant_id',
            'c5_chatgroup_code' => 'tm_batchrecord_field_value_code'
        ],
        'where' => [
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chats',
            'tm_batchrecord_field_code' => 'c5_chatgroup_code',
        ],
        'edit' => [
            'batch_value' => 'tm_batchrecord_field_value_code',
            'batch_name' => 'C/5 Chat Group Code',
            'edit_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'edit_key' => 'c5_chatgroup_code',
            'list_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'list_key' => ['c5_chatgroup_code'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
