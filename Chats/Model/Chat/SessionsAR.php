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

class SessionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Sessions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatsession_tenant_id','c5_chatsession_c5_chat_id','c5_chatsession_sm_session_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatsession_tenant_id = null {
        get => $this->c5_chatsession_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_tenant_id', $value);
            $this->c5_chatsession_tenant_id = $value;
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
    public int|null $c5_chatsession_c5_chat_id = null {
        get => $this->c5_chatsession_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_c5_chat_id', $value);
            $this->c5_chatsession_c5_chat_id = $value;
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
    public string|null $c5_chatsession_sm_session_id = null {
        get => $this->c5_chatsession_sm_session_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_sm_session_id', $value);
            $this->c5_chatsession_sm_session_id = $value;
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
    public string|null $c5_chatsession_um_user_name = null {
        get => $this->c5_chatsession_um_user_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_um_user_name', $value);
            $this->c5_chatsession_um_user_name = $value;
        }
    }

    /**
     * Avatar
     *
     *
     *
     * {domain{html_avatar_colors}}
     *
     * @var string|null Domain: html_avatar_colors Type: varchar
     */
    public string|null $c5_chatsession_avatar_colors = null {
        get => $this->c5_chatsession_avatar_colors;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_avatar_colors', $value);
            $this->c5_chatsession_avatar_colors = $value;
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
    public int|null $c5_chatsession_message_count = 0 {
        get => $this->c5_chatsession_message_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_message_count', $value);
            $this->c5_chatsession_message_count = $value;
        }
    }

    /**
     * # of Unread Messages
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatsession_unread_count = 0 {
        get => $this->c5_chatsession_unread_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_unread_count', $value);
            $this->c5_chatsession_unread_count = $value;
        }
    }

    /**
     * Unread Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatsession_unread_c5_chatmessage_id = 0 {
        get => $this->c5_chatsession_unread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_unread_c5_chatmessage_id', $value);
            $this->c5_chatsession_unread_c5_chatmessage_id = $value;
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
    public int|null $c5_chatsession_inactive = 0 {
        get => $this->c5_chatsession_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_inactive', $value);
            $this->c5_chatsession_inactive = $value;
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
    public string|null $c5_chatsession_inserted_timestamp = null {
        get => $this->c5_chatsession_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_inserted_timestamp', $value);
            $this->c5_chatsession_inserted_timestamp = $value;
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
    public int|null $c5_chatsession_inserted_user_id = null {
        get => $this->c5_chatsession_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_inserted_user_id', $value);
            $this->c5_chatsession_inserted_user_id = $value;
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
    public string|null $c5_chatsession_updated_timestamp = null {
        get => $this->c5_chatsession_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_updated_timestamp', $value);
            $this->c5_chatsession_updated_timestamp = $value;
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
    public int|null $c5_chatsession_updated_user_id = null {
        get => $this->c5_chatsession_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatsession_updated_user_id', $value);
            $this->c5_chatsession_updated_user_id = $value;
        }
    }
}
