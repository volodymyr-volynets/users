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

use Object\ActiveRecord;

class ReactionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Reactions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatmessreaction_tenant_id','c5_chatmessreaction_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatmessreaction_tenant_id = null {
        get => $this->c5_chatmessreaction_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_tenant_id', $value);
            $this->c5_chatmessreaction_tenant_id = $value;
        }
    }

    /**
     * Reaction #
     *
     *
     *
     * {domain{reaction_id_sequence}}
     *
     * @var int|null Domain: reaction_id_sequence Type: bigserial
     */
    public int|null $c5_chatmessreaction_id = null {
        get => $this->c5_chatmessreaction_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_id', $value);
            $this->c5_chatmessreaction_id = $value;
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
    public int|null $c5_chatmessreaction_c5_chat_id = null {
        get => $this->c5_chatmessreaction_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_c5_chat_id', $value);
            $this->c5_chatmessreaction_c5_chat_id = $value;
        }
    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatmessreaction_c5_chatmessage_id = null {
        get => $this->c5_chatmessreaction_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_c5_chatmessage_id', $value);
            $this->c5_chatmessreaction_c5_chatmessage_id = $value;
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
    public int|null $c5_chatmessreaction_um_user_id = null {
        get => $this->c5_chatmessreaction_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_um_user_id', $value);
            $this->c5_chatmessreaction_um_user_id = $value;
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
    public string|null $c5_chatmessreaction_um_user_name = null {
        get => $this->c5_chatmessreaction_um_user_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_um_user_name', $value);
            $this->c5_chatmessreaction_um_user_name = $value;
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
    public string|null $c5_chatmessreaction_sm_session_id = null {
        get => $this->c5_chatmessreaction_sm_session_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_sm_session_id', $value);
            $this->c5_chatmessreaction_sm_session_id = $value;
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
    public string|null $c5_chatmessreaction_name = null {
        get => $this->c5_chatmessreaction_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_name', $value);
            $this->c5_chatmessreaction_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $c5_chatmessreaction_icon = null {
        get => $this->c5_chatmessreaction_icon;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_icon', $value);
            $this->c5_chatmessreaction_icon = $value;
        }
    }

    /**
     * Emoji
     *
     *
     *
     * {domain{emoji}}
     *
     * @var string|null Domain: emoji Type: varchar
     */
    public string|null $c5_chatmessreaction_emoji = null {
        get => $this->c5_chatmessreaction_emoji;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_emoji', $value);
            $this->c5_chatmessreaction_emoji = $value;
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
    public int|null $c5_chatmessreaction_inactive = 0 {
        get => $this->c5_chatmessreaction_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_inactive', $value);
            $this->c5_chatmessreaction_inactive = $value;
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
    public string|null $c5_chatmessreaction_inserted_timestamp = null {
        get => $this->c5_chatmessreaction_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_inserted_timestamp', $value);
            $this->c5_chatmessreaction_inserted_timestamp = $value;
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
    public int|null $c5_chatmessreaction_inserted_user_id = null {
        get => $this->c5_chatmessreaction_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessreaction_inserted_user_id', $value);
            $this->c5_chatmessreaction_inserted_user_id = $value;
        }
    }
}
