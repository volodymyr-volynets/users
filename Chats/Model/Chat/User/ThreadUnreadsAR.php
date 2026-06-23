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

use Object\ActiveRecord;

class ThreadUnreadsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ThreadUnreads::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatusrthrdunrd_tenant_id','c5_chatusrthrdunrd_c5_chat_id','c5_chatusrthrdunrd_um_user_id','c5_chatusrthrdunrd_thread_c5_chatmessage_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatusrthrdunrd_tenant_id = null {
        get => $this->c5_chatusrthrdunrd_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_tenant_id', $value);
            $this->c5_chatusrthrdunrd_tenant_id = $value;
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
    public int|null $c5_chatusrthrdunrd_c5_chat_id = null {
        get => $this->c5_chatusrthrdunrd_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_c5_chat_id', $value);
            $this->c5_chatusrthrdunrd_c5_chat_id = $value;
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
    public int|null $c5_chatusrthrdunrd_um_user_id = null {
        get => $this->c5_chatusrthrdunrd_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_um_user_id', $value);
            $this->c5_chatusrthrdunrd_um_user_id = $value;
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
    public int|null $c5_chatusrthrdunrd_thread_c5_chatmessage_id = null {
        get => $this->c5_chatusrthrdunrd_thread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_thread_c5_chatmessage_id', $value);
            $this->c5_chatusrthrdunrd_thread_c5_chatmessage_id = $value;
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
    public int|null $c5_chatusrthrdunrd_unread_count = 0 {
        get => $this->c5_chatusrthrdunrd_unread_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_unread_count', $value);
            $this->c5_chatusrthrdunrd_unread_count = $value;
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
    public int|null $c5_chatusrthrdunrd_unread_c5_chatmessage_id = 0 {
        get => $this->c5_chatusrthrdunrd_unread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_unread_c5_chatmessage_id', $value);
            $this->c5_chatusrthrdunrd_unread_c5_chatmessage_id = $value;
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
    public int|null $c5_chatusrthrdunrd_inactive = 0 {
        get => $this->c5_chatusrthrdunrd_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatusrthrdunrd_inactive', $value);
            $this->c5_chatusrthrdunrd_inactive = $value;
        }
    }
}
