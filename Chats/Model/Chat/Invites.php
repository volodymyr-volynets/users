<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat;

use Object\Table;

class Invites extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Invites';
    public $schema;
    public $name = 'c5_chat_invites';
    public $pk = ['c5_chatinvite_tenant_id', 'c5_chatinvite_c5_chat_id', 'c5_chatinvite_um_user_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatinvite_';
    public $columns = [
        'c5_chatinvite_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatinvite_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatinvite_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'c5_chatinvite_um_user_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'c5_chatinvite_c5_chatchannel_code' => ['name' => 'Channel Code', 'domain' => 'group_code', 'null' => true],
        'c5_chatinvite_c5_chatchaninvstatus_code' => ['name' => 'Status Code', 'domain' => 'group_code', 'default' => 'NEW'],
        'c5_chatinvite_mentions_count' => ['name' => '# of Mentions', 'domain' => 'counter', 'default' => 1],
        'c5_chatinvite_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_invites_pk' => ['type' => 'pk', 'columns' => ['c5_chatinvite_tenant_id', 'c5_chatinvite_c5_chat_id', 'c5_chatinvite_um_user_id']],
        'c5_chatinvite_c5_chat_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatinvite_tenant_id', 'c5_chatinvite_c5_chat_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chats',
            'foreign_columns' => ['c5_chat_tenant_id', 'c5_chat_id']
        ],
        'c5_chatinvite_c5_chatchannel_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatinvite_tenant_id', 'c5_chatinvite_c5_chatchannel_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Channels',
            'foreign_columns' => ['c5_chatchannel_tenant_id', 'c5_chatchannel_code']
        ],
        'c5_chatinvite_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatinvite_tenant_id', 'c5_chatinvite_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
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
