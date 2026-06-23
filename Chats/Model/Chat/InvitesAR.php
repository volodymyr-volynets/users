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

class InvitesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Invites::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatinvite_tenant_id','c5_chatinvite_c5_chat_id','c5_chatinvite_um_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatinvite_tenant_id = null {
        get => $this->c5_chatinvite_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_tenant_id', $value);
            $this->c5_chatinvite_tenant_id = $value;
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
    public int|null $c5_chatinvite_c5_chat_id = null {
        get => $this->c5_chatinvite_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_c5_chat_id', $value);
            $this->c5_chatinvite_c5_chat_id = $value;
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
    public int|null $c5_chatinvite_um_user_id = null {
        get => $this->c5_chatinvite_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_um_user_id', $value);
            $this->c5_chatinvite_um_user_id = $value;
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
    public string|null $c5_chatinvite_um_user_name = null {
        get => $this->c5_chatinvite_um_user_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_um_user_name', $value);
            $this->c5_chatinvite_um_user_name = $value;
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
    public string|null $c5_chatinvite_c5_chatchannel_code = null {
        get => $this->c5_chatinvite_c5_chatchannel_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_c5_chatchannel_code', $value);
            $this->c5_chatinvite_c5_chatchannel_code = $value;
        }
    }

    /**
     * Status Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chatinvite_c5_chatchaninvstatus_code = 'NEW' {
        get => $this->c5_chatinvite_c5_chatchaninvstatus_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_c5_chatchaninvstatus_code', $value);
            $this->c5_chatinvite_c5_chatchaninvstatus_code = $value;
        }
    }

    /**
     * # of Mentions
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatinvite_mentions_count = 1 {
        get => $this->c5_chatinvite_mentions_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_mentions_count', $value);
            $this->c5_chatinvite_mentions_count = $value;
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
    public int|null $c5_chatinvite_inactive = 0 {
        get => $this->c5_chatinvite_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_inactive', $value);
            $this->c5_chatinvite_inactive = $value;
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
    public string|null $c5_chatinvite_inserted_timestamp = null {
        get => $this->c5_chatinvite_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_inserted_timestamp', $value);
            $this->c5_chatinvite_inserted_timestamp = $value;
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
    public int|null $c5_chatinvite_inserted_user_id = null {
        get => $this->c5_chatinvite_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatinvite_inserted_user_id', $value);
            $this->c5_chatinvite_inserted_user_id = $value;
        }
    }
}
