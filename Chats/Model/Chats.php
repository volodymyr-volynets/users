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

class Chats extends Table
{
    use BatchesURLHelper;

    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chats';
    public $schema;
    public $name = 'c5_chats';
    public $pk = ['c5_chat_tenant_id', 'c5_chat_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chat_';
    public $columns = [
        'c5_chat_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id_sequence'],
        'c5_chat_uuid' => ['name' => 'UUID', 'domain' => 'uuid'],
        'c5_chat_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'c5_chat_c5_chattype_code' => ['name' => 'Type', 'domain' => 'group_code', 'default' => 'GENERAL'],
        'c5_chat_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'c5_chat_user_count' => ['name' => '# of Users', 'domain' => 'counter', 'default' => 0],
        'c5_chat_session_count' => ['name' => '# of Sessions', 'domain' => 'counter', 'default' => 0],
        'c5_chat_message_count' => ['name' => '# of Messages', 'domain' => 'counter', 'default' => 0],
        'c5_chat_shareable_link_hash' => ['name' => 'Sharable Link Hash', 'domain' => 'code', 'null' => true],
        'c5_chat_c5_chatchannel_code' => ['name' => 'Channel Code', 'domain' => 'group_code', 'null' => true],
        // ai
        'c5_chat_ai_agent_code' => ['name' => 'Agent Code', 'domain' => 'code255', 'null' => true],
        'c5_chat_ai_conversation_code' => ['name' => 'Conversation Code', 'domain' => 'code', 'null' => true],
        'c5_chat_no_ai' => ['name' => 'No AI', 'type' => 'boolean'],
        // welcome
        'c5_chat_provide_welcome' => ['name' => 'Provide Welcome', 'type' => 'boolean'],
        // batches
        'c5_chat_tm_batchentry_code' => ['name' => 'Batch Code', 'domain' => 'batch_code', 'null' => true],
        'c5_chat_batch_context_counter' => ['name' => '# of Batch Context', 'domain' => 'counter', 'default' => 0],
        // other
        'c5_chat_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];

    public $constraints = [
        'c5_chats_pk' => ['type' => 'pk', 'columns' => ['c5_chat_tenant_id', 'c5_chat_id']],
        'c5_chat_c5_chatchannel_code_un' => ['type' => 'unique', 'columns' => ['c5_chat_tenant_id', 'c5_chat_c5_chatchannel_code']],
        'c5_chat_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chat_tenant_id', 'c5_chat_language_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
            'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
        ],
        'c5_chat_c5_chatchannel_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chat_tenant_id', 'c5_chat_c5_chatchannel_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Channels',
            'foreign_columns' => ['c5_chatchannel_tenant_id', 'c5_chatchannel_code']
        ],
        'c5_chat_ai_agent_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chat_tenant_id', 'c5_chat_ai_agent_code'],
            'foreign_model' => '\Numbers\AI\SDK\Model\Agents',
            'foreign_columns' => ['ai_agent_tenant_id', 'ai_agent_code']
        ],
        /*
         * This is intentionally skipped as conversations are added on a first prompt
         *
        'c5_chat_ai_conversation_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chat_tenant_id', 'c5_chat_ai_conversation_code'],
            'foreign_model' => '\Numbers\AI\SDK\Model\Conversations',
            'foreign_columns' => ['ai_conversation_tenant_id', 'ai_conversation_code']
        ],
        */
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'c5_chat_name' => 'name',
        'c5_chat_inactive' => 'inactive',
    ];
    public $options_active = [
        'c5_chat_inactive' => 0,
    ];
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

    public $batches = [
        'map' => [
            'c5_chat_tenant_id' => 'tm_batchrecord_tenant_id',
            'c5_chat_id' => 'tm_batchrecord_field_value_id'
        ],
        'where' => [
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chats',
            'tm_batchrecord_field_code' => 'c5_chat_id',
        ],
        'edit' => [
            'batch_value' => 'tm_batchrecord_field_value_id',
            'batch_name' => 'C/5 Chat #',
            'edit_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'edit_key' => 'c5_chat_id',
            'list_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'list_key' => ['c5_chat_id'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
