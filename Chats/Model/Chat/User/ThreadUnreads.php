<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat\User;

use Object\Table;

class ThreadUnreads extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat User Thread Unreads';
    public $schema;
    public $name = 'c5_chat_user_thread_unreads';
    public $pk = ['c5_chatusrthrdunrd_tenant_id', 'c5_chatusrthrdunrd_c5_chat_id', 'c5_chatusrthrdunrd_um_user_id', 'c5_chatusrthrdunrd_thread_c5_chatmessage_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatusrthrdunrd_';
    public $columns = [
        'c5_chatusrthrdunrd_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatusrthrdunrd_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatusrthrdunrd_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'c5_chatusrthrdunrd_thread_c5_chatmessage_id' => ['name' => 'Thread Message #', 'domain' => 'message_id'],
        'c5_chatusrthrdunrd_unread_count' => ['name' => '# of Unread Messages', 'domain' => 'counter', 'default' => 0],
        'c5_chatusrthrdunrd_unread_c5_chatmessage_id' => ['name' => 'Unread Message #', 'domain' => 'message_id', 'default' => 0],
        'c5_chatusrthrdunrd_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_user_thread_unreads_pk' => ['type' => 'pk', 'columns' => ['c5_chatusrthrdunrd_tenant_id', 'c5_chatusrthrdunrd_c5_chat_id', 'c5_chatusrthrdunrd_um_user_id', 'c5_chatusrthrdunrd_thread_c5_chatmessage_id']],
        'c5_chatusrthrdunrd_c5_chat_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatusrthrdunrd_tenant_id', 'c5_chatusrthrdunrd_c5_chat_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chats',
            'foreign_columns' => ['c5_chat_tenant_id', 'c5_chat_id']
        ],
        'c5_chatusrthrdunrd_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatusrthrdunrd_tenant_id', 'c5_chatusrthrdunrd_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'c5_chatusrthrdunrd_thread_c5_chatmessage_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatusrthrdunrd_tenant_id', 'c5_chatusrthrdunrd_thread_c5_chatmessage_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'foreign_columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_id']
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

    public $who = [];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
