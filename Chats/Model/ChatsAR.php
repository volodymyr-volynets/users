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

use Object\ActiveRecord;

class ChatsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Chats::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chat_tenant_id','c5_chat_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chat_tenant_id = null {
        get => $this->c5_chat_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_tenant_id', $value);
            $this->c5_chat_tenant_id = $value;
        }
    }

    /**
     * Chat #
     *
     *
     *
     * {domain{chat_id_sequence}}
     *
     * @var int|null Domain: chat_id_sequence Type: bigserial
     */
    public int|null $c5_chat_id = null {
        get => $this->c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_id', $value);
            $this->c5_chat_id = $value;
        }
    }

    /**
     * UUID
     *
     *
     *
     * {domain{uuid}}
     *
     * @var string|null Domain: uuid Type: char
     */
    public string|null $c5_chat_uuid = null {
        get => $this->c5_chat_uuid;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_uuid', $value);
            $this->c5_chat_uuid = $value;
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
    public string|null $c5_chat_name = null {
        get => $this->c5_chat_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_name', $value);
            $this->c5_chat_name = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chat_c5_chattype_code = 'GENERAL' {
        get => $this->c5_chat_c5_chattype_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_c5_chattype_code', $value);
            $this->c5_chat_c5_chattype_code = $value;
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
    public string|null $c5_chat_language_code = null {
        get => $this->c5_chat_language_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_language_code', $value);
            $this->c5_chat_language_code = $value;
        }
    }

    /**
     * # of Users
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chat_user_count = 0 {
        get => $this->c5_chat_user_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_user_count', $value);
            $this->c5_chat_user_count = $value;
        }
    }

    /**
     * # of Sessions
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chat_session_count = 0 {
        get => $this->c5_chat_session_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_session_count', $value);
            $this->c5_chat_session_count = $value;
        }
    }

    /**
     * # of Messages
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chat_message_count = 0 {
        get => $this->c5_chat_message_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_message_count', $value);
            $this->c5_chat_message_count = $value;
        }
    }

    /**
     * Sharable Link Hash
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $c5_chat_shareable_link_hash = null {
        get => $this->c5_chat_shareable_link_hash;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_shareable_link_hash', $value);
            $this->c5_chat_shareable_link_hash = $value;
        }
    }

    /**
     * Channel Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chat_c5_chatchannel_code = null {
        get => $this->c5_chat_c5_chatchannel_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_c5_chatchannel_code', $value);
            $this->c5_chat_c5_chatchannel_code = $value;
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
    public string|null $c5_chat_ai_agent_code = null {
        get => $this->c5_chat_ai_agent_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_ai_agent_code', $value);
            $this->c5_chat_ai_agent_code = $value;
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
    public string|null $c5_chat_ai_conversation_code = null {
        get => $this->c5_chat_ai_conversation_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_ai_conversation_code', $value);
            $this->c5_chat_ai_conversation_code = $value;
        }
    }

    /**
     * No AI
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chat_no_ai = 0 {
        get => $this->c5_chat_no_ai;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_no_ai', $value);
            $this->c5_chat_no_ai = $value;
        }
    }

    /**
     * Provide Welcome
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chat_provide_welcome = 0 {
        get => $this->c5_chat_provide_welcome;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_provide_welcome', $value);
            $this->c5_chat_provide_welcome = $value;
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
    public string|null $c5_chat_tm_batchentry_code = null {
        get => $this->c5_chat_tm_batchentry_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_tm_batchentry_code', $value);
            $this->c5_chat_tm_batchentry_code = $value;
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
    public int|null $c5_chat_batch_context_counter = 0 {
        get => $this->c5_chat_batch_context_counter;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_batch_context_counter', $value);
            $this->c5_chat_batch_context_counter = $value;
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
    public int|null $c5_chat_inactive = 0 {
        get => $this->c5_chat_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_inactive', $value);
            $this->c5_chat_inactive = $value;
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
    public string|null $c5_chat_inserted_timestamp = null {
        get => $this->c5_chat_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_inserted_timestamp', $value);
            $this->c5_chat_inserted_timestamp = $value;
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
    public int|null $c5_chat_inserted_user_id = null {
        get => $this->c5_chat_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_inserted_user_id', $value);
            $this->c5_chat_inserted_user_id = $value;
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
    public string|null $c5_chat_updated_timestamp = null {
        get => $this->c5_chat_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_updated_timestamp', $value);
            $this->c5_chat_updated_timestamp = $value;
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
    public int|null $c5_chat_updated_user_id = null {
        get => $this->c5_chat_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chat_updated_user_id', $value);
            $this->c5_chat_updated_user_id = $value;
        }
    }
}
