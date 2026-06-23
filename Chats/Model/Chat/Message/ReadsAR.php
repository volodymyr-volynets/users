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

class ReadsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Reads::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatmessread_tenant_id','c5_chatmessread_c5_chat_id','c5_chatmessread_c5_chatmessage_id','c5_chatmessread_um_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatmessread_tenant_id = null {
        get => $this->c5_chatmessread_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_tenant_id', $value);
            $this->c5_chatmessread_tenant_id = $value;
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
    public int|null $c5_chatmessread_c5_chat_id = null {
        get => $this->c5_chatmessread_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_c5_chat_id', $value);
            $this->c5_chatmessread_c5_chat_id = $value;
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
    public int|null $c5_chatmessread_c5_chatmessage_id = null {
        get => $this->c5_chatmessread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_c5_chatmessage_id', $value);
            $this->c5_chatmessread_c5_chatmessage_id = $value;
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
    public int|null $c5_chatmessread_um_user_id = null {
        get => $this->c5_chatmessread_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_um_user_id', $value);
            $this->c5_chatmessread_um_user_id = $value;
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
    public int|null $c5_chatmessread_inactive = 0 {
        get => $this->c5_chatmessread_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_inactive', $value);
            $this->c5_chatmessread_inactive = $value;
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
    public string|null $c5_chatmessread_inserted_timestamp = null {
        get => $this->c5_chatmessread_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_inserted_timestamp', $value);
            $this->c5_chatmessread_inserted_timestamp = $value;
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
    public int|null $c5_chatmessread_inserted_user_id = null {
        get => $this->c5_chatmessread_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatmessread_inserted_user_id', $value);
            $this->c5_chatmessread_inserted_user_id = $value;
        }
    }
}
