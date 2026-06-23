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

class GroupsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatgroup_tenant_id','c5_chatgroup_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatgroup_tenant_id = null {
        get => $this->c5_chatgroup_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_tenant_id', $value);
            $this->c5_chatgroup_tenant_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chatgroup_code = null {
        get => $this->c5_chatgroup_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_code', $value);
            $this->c5_chatgroup_code = $value;
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
    public string|null $c5_chatgroup_name = null {
        get => $this->c5_chatgroup_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_name', $value);
            $this->c5_chatgroup_name = $value;
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
    public string|null $c5_chatgroup_icon = null {
        get => $this->c5_chatgroup_icon;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_icon', $value);
            $this->c5_chatgroup_icon = $value;
        }
    }

    /**
     * Mention
     *
     *
     *
     * {domain{mention}}
     *
     * @var string|null Domain: mention Type: varchar
     */
    public string|null $c5_chatgroup_mention = null {
        get => $this->c5_chatgroup_mention;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_mention', $value);
            $this->c5_chatgroup_mention = $value;
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
    public int|null $c5_chatgroup_users_count = 0 {
        get => $this->c5_chatgroup_users_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_users_count', $value);
            $this->c5_chatgroup_users_count = $value;
        }
    }

    /**
     * # of Channels
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatgroup_channel_count = 0 {
        get => $this->c5_chatgroup_channel_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_channel_count', $value);
            $this->c5_chatgroup_channel_count = $value;
        }
    }

    /**
     * # of Chats
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatgroup_chat_count = 0 {
        get => $this->c5_chatgroup_chat_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_chat_count', $value);
            $this->c5_chatgroup_chat_count = $value;
        }
    }

    /**
     * U/M Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $c5_chatgroup_um_usrgrp_id = null {
        get => $this->c5_chatgroup_um_usrgrp_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_um_usrgrp_id', $value);
            $this->c5_chatgroup_um_usrgrp_id = $value;
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
    public int|null $c5_chatgroup_inactive = 0 {
        get => $this->c5_chatgroup_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_inactive', $value);
            $this->c5_chatgroup_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $c5_chatgroup_optimistic_lock = 'now()' {
        get => $this->c5_chatgroup_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_optimistic_lock', $value);
            $this->c5_chatgroup_optimistic_lock = $value;
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
    public string|null $c5_chatgroup_inserted_timestamp = null {
        get => $this->c5_chatgroup_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_inserted_timestamp', $value);
            $this->c5_chatgroup_inserted_timestamp = $value;
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
    public int|null $c5_chatgroup_inserted_user_id = null {
        get => $this->c5_chatgroup_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_inserted_user_id', $value);
            $this->c5_chatgroup_inserted_user_id = $value;
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
    public string|null $c5_chatgroup_updated_timestamp = null {
        get => $this->c5_chatgroup_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_updated_timestamp', $value);
            $this->c5_chatgroup_updated_timestamp = $value;
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
    public int|null $c5_chatgroup_updated_user_id = null {
        get => $this->c5_chatgroup_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgroup_updated_user_id', $value);
            $this->c5_chatgroup_updated_user_id = $value;
        }
    }
}
