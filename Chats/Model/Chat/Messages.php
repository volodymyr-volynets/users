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
use Object\Traits\BatchesURLHelper;

class Messages extends Table
{
    use BatchesURLHelper;

    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Messages';
    public $schema;
    public $name = 'c5_chat_messages';
    public $pk = ['c5_chatmessage_tenant_id', 'c5_chatmessage_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatmessage_';
    public $columns = [
        'c5_chatmessage_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatmessage_id' => ['name' => 'Message #', 'domain' => 'message_id_sequence'],
        'c5_chatmessage_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatmessage_um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'c5_chatmessage_sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
        'c5_chatmessage_um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatmessage_no_data_model_role_code' => ['name' => 'Role Code', 'domain' => 'lgroup_code'],
        'c5_chatmessage_is_ai_assistant' => ['name' => 'Is A/I Assistant', 'type' => 'boolean'],
        // thread
        'c5_chatmessage_is_thread' => ['name' => 'Is Thread', 'type' => 'boolean'],
        'c5_chatmessage_thread_c5_chatmessage_id' => ['name' => 'Thread Message #', 'domain' => 'message_id', 'null' => true],
        'c5_chatmessage_thread_reply_counter' => ['name' => '# of Messages In Thread', 'domain' => 'counter', 'default' => 0],
        // ai
        'c5_chatmessage_thread_ai_agent_code' => ['name' => 'Agent Code', 'domain' => 'code255', 'null' => true],
        'c5_chatmessage_thread_ai_conversation_code' => ['name' => 'Conversation Code', 'domain' => 'code', 'null' => true],
        'c5_chatmessage_thread_is_new' => ['name' => 'Is New (Thread)', 'type' => 'boolean'],
        // message
        'c5_chatmessage_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'c5_chatmessage_message' => ['name' => 'Message', 'type' => 'text'],
        'c5_chatmessage_is_edited' => ['name' => 'Is Edited', 'type' => 'boolean'],
        // mention
        'c5_chatmessage_have_mention' => ['name' => 'Have Mention', 'type' => 'boolean'],
        'c5_chatmessage_mention_users_json' => ['name' => 'Mention Users (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_mention_c5_chatmessage_id' => ['name' => 'Mention Message #', 'domain' => 'message_id', 'null' => true],
        // reactions
        'c5_chatmessage_have_reaction' => ['name' => 'Have Reaction', 'type' => 'boolean'],
        // flags
        'c5_chatmessage_is_answer' => ['name' => 'Is Answer', 'type' => 'boolean'],
        'c5_chatmessage_is_question' => ['name' => 'Is Question', 'type' => 'boolean'],
        // images and files
        'c5_chatmessage_is_file' => ['name' => 'Is File', 'type' => 'boolean'],
        'c5_chatmessage_is_image' => ['name' => 'Is Image', 'type' => 'boolean'],
        'c5_chatmessage_image_settings_json' => ['name' => 'Image Settings (JSON)', 'type' => 'json', 'null' => true],
        // sound
        'c5_chatmessage_is_sound' => ['name' => 'Is Sound', 'type' => 'boolean'],
        'c5_chatmessage_sound_settings_json' => ['name' => 'Sound Settings (JSON)', 'type' => 'json', 'null' => true],
        // transcript
        'c5_chatmessage_is_transcript' => ['name' => 'Is Transcript', 'type' => 'boolean'],
        'c5_chatmessage_transcript_settings_json' => ['name' => 'Transcript Settings (JSON)', 'type' => 'json', 'null' => true],
        // batches
        'c5_chatmessage_tm_batchentry_code' => ['name' => 'Batch Code', 'domain' => 'batch_code', 'null' => true],
        'c5_chatmessage_batch_context_counter' => ['name' => '# of Batch Context', 'domain' => 'counter', 'default' => 0],
        // reasoning
        'c5_chatmessage_reasoning_json' => ['name' => 'Reasoning (JSON)', 'type' => 'json', 'null' => true],
        // signature & term
        'c5_chatmessage_um_usrsign_id' => ['name' => 'Signature #', 'domain' => 'signature_id', 'null' => true],
        'c5_chatmessage_um_usrterm_id' => ['name' => 'Term #', 'domain' => 'bigterm_id', 'null' => true],
        // RAG
        'c5_chatmessage_is_rag' => ['name' => 'Is RAG', 'type' => 'boolean'],
        'c5_chatmessage_rag_settings_json' => ['name' => 'RAG Settings (JSON)', 'type' => 'json', 'null' => true],
        // form
        'c5_chatmessage_is_form' => ['name' => 'Is Form', 'type' => 'boolean'],
        'c5_chatmessage_form_settings_json' => ['name' => 'Form Settings (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_form_result_json' => ['name' => 'Form Result (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_form_status_id' => ['name' => 'Form Status #', 'domain' => 'status_id', 'null' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chat\Message\ChatMessageStatuses'],
        // other
        'c5_chatmessage_is_new' => ['name' => 'Is New', 'type' => 'boolean'],
        'c5_chatmessage_is_loading' => ['name' => 'Is Loading', 'type' => 'boolean'],
        'c5_chatmessage_parent_c5_chatmessage_id' => ['name' => 'Parent Message #', 'domain' => 'message_id', 'null' => true],
        'c5_chatmessage_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_messages_pk' => ['type' => 'pk', 'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_id']],
        'c5_chatmessage_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_c5_chat_id', 'c5_chatmessage_um_user_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Users',
            'foreign_columns' => ['c5_chatuser_tenant_id', 'c5_chatuser_c5_chat_id', 'c5_chatuser_um_user_id']
        ],
        'c5_chatmessage_thread_c5_chatmessage_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_thread_c5_chatmessage_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'foreign_columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_id']
        ],
        'c5_chatmessage_mention_c5_chatmessage_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_mention_c5_chatmessage_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'foreign_columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_id']
        ],
        'c5_chatmessage_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_language_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
            'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
        ],
        'c5_chatmessage_thread_ai_agent_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_thread_ai_agent_code'],
            'foreign_model' => '\Numbers\AI\SDK\Model\Agents',
            'foreign_columns' => ['ai_agent_tenant_id', 'ai_agent_code']
        ],
        'c5_chatmessage_um_usrsign_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_um_usrsign_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Signatures',
            'foreign_columns' => ['um_usrsign_tenant_id', 'um_usrsign_id']
        ],
        'c5_chatmessage_um_usrterm_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatmessage_tenant_id', 'c5_chatmessage_um_usrterm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Terms',
            'foreign_columns' => ['um_usrterm_tenant_id', 'um_usrterm_id']
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
        'updated' => true
    ];

    public $documents = [
        'map' => [
            'c5_chatmessage_tenant_id' => 'wg_document_tenant_id',
            'c5_chatmessage_id' => 'wg_document_c5_chatmessage_id'
        ]
    ];

    public $batches = [
        'map' => [
            'c5_chatmessage_tenant_id' => 'tm_batchrecord_tenant_id',
            'c5_chatmessage_id' => 'tm_batchrecord_field_value_id'
        ],
        'where' => [
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'tm_batchrecord_field_code' => 'c5_chatmessage_id',
        ],
        'edit' => [
            'batch_value' => 'tm_batchrecord_field_value_id',
            'batch_name' => 'C/5 Message #',
            'edit_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'edit_key' => 'c5_chatmessage_id',
            'list_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'list_key' => ['c5_chatmessage_id'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
