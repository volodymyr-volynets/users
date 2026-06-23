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

use Object\ActiveRecord;

class MessagesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Messages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatmessage_tenant_id','c5_chatmessage_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatmessage_tenant_id = null {
        get => $this->c5_chatmessage_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_tenant_id', $value);
            $this->c5_chatmessage_tenant_id = $value;
        }
    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id_sequence}}
     *
     * @var int|null Domain: message_id_sequence Type: bigserial
     */
    public int|null $c5_chatmessage_id = null {
        get => $this->c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_id', $value);
            $this->c5_chatmessage_id = $value;
        }
    }

    /**
     * Chat #
     *
     *
     *
     * {domain{chat_id}}
     *
     * @var int|null Domain: chat_id Type: bigint
     */
    public int|null $c5_chatmessage_c5_chat_id = null {
        get => $this->c5_chatmessage_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_c5_chat_id', $value);
            $this->c5_chatmessage_c5_chat_id = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatmessage_um_user_id = null {
        get => $this->c5_chatmessage_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_um_user_id', $value);
            $this->c5_chatmessage_um_user_id = $value;
        }
    }

    /**
     * Session #
     *
     *
     *
     * {domain{session_id}}
     *
     * @var string|null Domain: session_id Type: varchar
     */
    public string|null $c5_chatmessage_sm_session_id = null {
        get => $this->c5_chatmessage_sm_session_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_sm_session_id', $value);
            $this->c5_chatmessage_sm_session_id = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $c5_chatmessage_um_user_name = null {
        get => $this->c5_chatmessage_um_user_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_um_user_name', $value);
            $this->c5_chatmessage_um_user_name = $value;
        }
    }

    /**
     * Role Code
     *
     *
     *
     * {domain{lgroup_code}}
     *
     * @var string|null Domain: lgroup_code Type: varchar
     */
    public string|null $c5_chatmessage_no_data_model_role_code = null {
        get => $this->c5_chatmessage_no_data_model_role_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_no_data_model_role_code', $value);
            $this->c5_chatmessage_no_data_model_role_code = $value;
        }
    }

    /**
     * Is A/I Assistant
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_ai_assistant = 0 {
        get => $this->c5_chatmessage_is_ai_assistant;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_ai_assistant', $value);
            $this->c5_chatmessage_is_ai_assistant = $value;
        }
    }

    /**
     * Is Thread
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_thread = 0 {
        get => $this->c5_chatmessage_is_thread;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_thread', $value);
            $this->c5_chatmessage_is_thread = $value;
        }
    }

    /**
     * Thread Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatmessage_thread_c5_chatmessage_id = null {
        get => $this->c5_chatmessage_thread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_thread_c5_chatmessage_id', $value);
            $this->c5_chatmessage_thread_c5_chatmessage_id = $value;
        }
    }

    /**
     * # of Messages In Thread
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatmessage_thread_reply_counter = 0 {
        get => $this->c5_chatmessage_thread_reply_counter;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_thread_reply_counter', $value);
            $this->c5_chatmessage_thread_reply_counter = $value;
        }
    }

    /**
     * Agent Code
     *
     *
     *
     * {domain{code255}}
     *
     * @var string|null Domain: code255 Type: varchar
     */
    public string|null $c5_chatmessage_thread_ai_agent_code = null {
        get => $this->c5_chatmessage_thread_ai_agent_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_thread_ai_agent_code', $value);
            $this->c5_chatmessage_thread_ai_agent_code = $value;
        }
    }

    /**
     * Conversation Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $c5_chatmessage_thread_ai_conversation_code = null {
        get => $this->c5_chatmessage_thread_ai_conversation_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_thread_ai_conversation_code', $value);
            $this->c5_chatmessage_thread_ai_conversation_code = $value;
        }
    }

    /**
     * Is New (Thread)
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_thread_is_new = 0 {
        get => $this->c5_chatmessage_thread_is_new;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_thread_is_new', $value);
            $this->c5_chatmessage_thread_is_new = $value;
        }
    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $c5_chatmessage_language_code = null {
        get => $this->c5_chatmessage_language_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_language_code', $value);
            $this->c5_chatmessage_language_code = $value;
        }
    }

    /**
     * Message
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $c5_chatmessage_message = null {
        get => $this->c5_chatmessage_message;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_message', $value);
            $this->c5_chatmessage_message = $value;
        }
    }

    /**
     * Is Edited
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_edited = 0 {
        get => $this->c5_chatmessage_is_edited;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_edited', $value);
            $this->c5_chatmessage_is_edited = $value;
        }
    }

    /**
     * Have Mention
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_have_mention = 0 {
        get => $this->c5_chatmessage_have_mention;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_have_mention', $value);
            $this->c5_chatmessage_have_mention = $value;
        }
    }

    /**
     * Mention Users (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_mention_users_json = null {
        get => $this->c5_chatmessage_mention_users_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_mention_users_json', $value);
            $this->c5_chatmessage_mention_users_json = $value;
        }
    }

    /**
     * Mention Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatmessage_mention_c5_chatmessage_id = null {
        get => $this->c5_chatmessage_mention_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_mention_c5_chatmessage_id', $value);
            $this->c5_chatmessage_mention_c5_chatmessage_id = $value;
        }
    }

    /**
     * Have Reaction
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_have_reaction = 0 {
        get => $this->c5_chatmessage_have_reaction;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_have_reaction', $value);
            $this->c5_chatmessage_have_reaction = $value;
        }
    }

    /**
     * Is Answer
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_answer = 0 {
        get => $this->c5_chatmessage_is_answer;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_answer', $value);
            $this->c5_chatmessage_is_answer = $value;
        }
    }

    /**
     * Is Question
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_question = 0 {
        get => $this->c5_chatmessage_is_question;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_question', $value);
            $this->c5_chatmessage_is_question = $value;
        }
    }

    /**
     * Is File
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_file = 0 {
        get => $this->c5_chatmessage_is_file;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_file', $value);
            $this->c5_chatmessage_is_file = $value;
        }
    }

    /**
     * Is Image
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_image = 0 {
        get => $this->c5_chatmessage_is_image;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_image', $value);
            $this->c5_chatmessage_is_image = $value;
        }
    }

    /**
     * Image Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_image_settings_json = null {
        get => $this->c5_chatmessage_image_settings_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_image_settings_json', $value);
            $this->c5_chatmessage_image_settings_json = $value;
        }
    }

    /**
     * Is Sound
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_sound = 0 {
        get => $this->c5_chatmessage_is_sound;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_sound', $value);
            $this->c5_chatmessage_is_sound = $value;
        }
    }

    /**
     * Sound Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_sound_settings_json = null {
        get => $this->c5_chatmessage_sound_settings_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_sound_settings_json', $value);
            $this->c5_chatmessage_sound_settings_json = $value;
        }
    }

    /**
     * Is Transcript
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_transcript = 0 {
        get => $this->c5_chatmessage_is_transcript;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_transcript', $value);
            $this->c5_chatmessage_is_transcript = $value;
        }
    }

    /**
     * Transcript Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_transcript_settings_json = null {
        get => $this->c5_chatmessage_transcript_settings_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_transcript_settings_json', $value);
            $this->c5_chatmessage_transcript_settings_json = $value;
        }
    }

    /**
     * Batch Code
     *
     *
     *
     * {domain{batch_code}}
     *
     * @var string|null Domain: batch_code Type: varchar
     */
    public string|null $c5_chatmessage_tm_batchentry_code = null {
        get => $this->c5_chatmessage_tm_batchentry_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_tm_batchentry_code', $value);
            $this->c5_chatmessage_tm_batchentry_code = $value;
        }
    }

    /**
     * # of Batch Context
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatmessage_batch_context_counter = 0 {
        get => $this->c5_chatmessage_batch_context_counter;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_batch_context_counter', $value);
            $this->c5_chatmessage_batch_context_counter = $value;
        }
    }

    /**
     * Reasoning (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_reasoning_json = null {
        get => $this->c5_chatmessage_reasoning_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_reasoning_json', $value);
            $this->c5_chatmessage_reasoning_json = $value;
        }
    }

    /**
     * Signature #
     *
     *
     *
     * {domain{signature_id}}
     *
     * @var int|null Domain: signature_id Type: bigint
     */
    public int|null $c5_chatmessage_um_usrsign_id = null {
        get => $this->c5_chatmessage_um_usrsign_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_um_usrsign_id', $value);
            $this->c5_chatmessage_um_usrsign_id = $value;
        }
    }

    /**
     * Term #
     *
     *
     *
     * {domain{bigterm_id}}
     *
     * @var int|null Domain: bigterm_id Type: bigint
     */
    public int|null $c5_chatmessage_um_usrterm_id = null {
        get => $this->c5_chatmessage_um_usrterm_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_um_usrterm_id', $value);
            $this->c5_chatmessage_um_usrterm_id = $value;
        }
    }

    /**
     * Is RAG
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_rag = 0 {
        get => $this->c5_chatmessage_is_rag;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_rag', $value);
            $this->c5_chatmessage_is_rag = $value;
        }
    }

    /**
     * RAG Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_rag_settings_json = null {
        get => $this->c5_chatmessage_rag_settings_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_rag_settings_json', $value);
            $this->c5_chatmessage_rag_settings_json = $value;
        }
    }

    /**
     * Is Form
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_form = 0 {
        get => $this->c5_chatmessage_is_form;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_form', $value);
            $this->c5_chatmessage_is_form = $value;
        }
    }

    /**
     * Form Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_form_settings_json = null {
        get => $this->c5_chatmessage_form_settings_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_form_settings_json', $value);
            $this->c5_chatmessage_form_settings_json = $value;
        }
    }

    /**
     * Form Result (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $c5_chatmessage_form_result_json = null {
        get => $this->c5_chatmessage_form_result_json;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_form_result_json', $value);
            $this->c5_chatmessage_form_result_json = $value;
        }
    }

    /**
     * Form Status #
     *
     *
     * {options_model{\Numbers\Users\Chats\Model\Chat\Message\ChatMessageStatuses}}
     * {domain{status_id}}
     *
     * @var int|null Domain: status_id Type: smallint
     */
    public int|null $c5_chatmessage_form_status_id = null {
        get => $this->c5_chatmessage_form_status_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_form_status_id', $value);
            $this->c5_chatmessage_form_status_id = $value;
        }
    }

    /**
     * Is New
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_new = 0 {
        get => $this->c5_chatmessage_is_new;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_new', $value);
            $this->c5_chatmessage_is_new = $value;
        }
    }

    /**
     * Is Loading
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_is_loading = 0 {
        get => $this->c5_chatmessage_is_loading;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_is_loading', $value);
            $this->c5_chatmessage_is_loading = $value;
        }
    }

    /**
     * Parent Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatmessage_parent_c5_chatmessage_id = null {
        get => $this->c5_chatmessage_parent_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_parent_c5_chatmessage_id', $value);
            $this->c5_chatmessage_parent_c5_chatmessage_id = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatmessage_inactive = 0 {
        get => $this->c5_chatmessage_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_inactive', $value);
            $this->c5_chatmessage_inactive = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $c5_chatmessage_inserted_timestamp = null {
        get => $this->c5_chatmessage_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_inserted_timestamp', $value);
            $this->c5_chatmessage_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatmessage_inserted_user_id = null {
        get => $this->c5_chatmessage_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_inserted_user_id', $value);
            $this->c5_chatmessage_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $c5_chatmessage_updated_timestamp = null {
        get => $this->c5_chatmessage_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_updated_timestamp', $value);
            $this->c5_chatmessage_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatmessage_updated_user_id = null {
        get => $this->c5_chatmessage_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessage_updated_user_id', $value);
            $this->c5_chatmessage_updated_user_id = $value;
        }
    }
}
