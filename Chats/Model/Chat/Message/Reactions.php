<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat\Message;

use Object\Table;

class Reactions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Message Reactions';
    public $schema;
    public $name = 'c5_chat_message_reactions';
    public $pk = ['c5_chatmessreaction_tenant_id', 'c5_chatmessreaction_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatmessreaction_';
    public $columns = [
        'c5_chatmessreaction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatmessreaction_id' => ['name' => 'Reaction #', 'domain' => 'reaction_id_sequence'],
        'c5_chatmessreaction_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatmessreaction_c5_chatmessage_id' => ['name' => 'Message #', 'domain' => 'message_id'],
        'c5_chatmessreaction_um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'c5_chatmessreaction_um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatmessreaction_sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
        'c5_chatmessreaction_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatmessreaction_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'c5_chatmessreaction_emoji' => ['name' => 'Emoji', 'domain' => 'emoji', 'null' => true],
        'c5_chatmessreaction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_message_reactions_pk' => ['type' => 'pk', 'columns' => ['c5_chatmessreaction_tenant_id', 'c5_chatmessreaction_id']],
        'c5_chatmessreaction_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessreaction_tenant_id', 'c5_chatmessreaction_c5_chat_id', 'c5_chatmessreaction_um_user_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Users',
            'foreign_columns' => ['c5_chatuser_tenant_id', 'c5_chatuser_c5_chat_id', 'c5_chatuser_um_user_id']
        ],
        'c5_chatmessreaction_c5_chatmessage_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessreaction_tenant_id', 'c5_chatmessreaction_c5_chatmessage_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'foreign_columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_id']
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
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
