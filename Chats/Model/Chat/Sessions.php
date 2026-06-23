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

class Sessions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Users';
    public $schema;
    public $name = 'c5_chat_sessions';
    public $pk = ['c5_chatsession_tenant_id', 'c5_chatsession_c5_chat_id', 'c5_chatsession_sm_session_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatsession_';
    public $columns = [
        'c5_chatsession_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatsession_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatsession_sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id'],
        'c5_chatsession_um_user_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'c5_chatsession_avatar_colors' => ['name' => 'Avatar', 'domain' => 'html_avatar_colors', 'null' => true],
        'c5_chatsession_message_count' => ['name' => '# of Messages', 'domain' => 'counter', 'default' => 0],
        'c5_chatsession_unread_count' => ['name' => '# of Unread Messages', 'domain' => 'counter', 'default' => 0],
        'c5_chatsession_unread_c5_chatmessage_id' => ['name' => 'Unread Message #', 'domain' => 'message_id', 'default' => 0],
        'c5_chatsession_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_sessions_pk' => ['type' => 'pk', 'columns' => ['c5_chatsession_tenant_id', 'c5_chatsession_c5_chat_id', 'c5_chatsession_sm_session_id']],
        'c5_chatsession_c5_chat_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatsession_tenant_id', 'c5_chatsession_c5_chat_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chats',
            'foreign_columns' => ['c5_chat_tenant_id', 'c5_chat_id']
        ],
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
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
