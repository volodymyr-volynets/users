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

class ChannelsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Channels::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatchannel_tenant_id','c5_chatchannel_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatchannel_tenant_id = null {
        get => $this->c5_chatchannel_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_tenant_id', $value);
            $this->c5_chatchannel_tenant_id = $value;
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
    public string|null $c5_chatchannel_code = null {
        get => $this->c5_chatchannel_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_code', $value);
            $this->c5_chatchannel_code = $value;
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
    public string|null $c5_chatchannel_name = null {
        get => $this->c5_chatchannel_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_name', $value);
            $this->c5_chatchannel_name = $value;
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
    public string|null $c5_chatchannel_icon = null {
        get => $this->c5_chatchannel_icon;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_icon', $value);
            $this->c5_chatchannel_icon = $value;
        }
    }

    /**
     * Mention
     *
     *
     *
     * {domain{hash_tagged}}
     *
     * @var string|null Domain: hash_tagged Type: varchar
     */
    public string|null $c5_chatchannel_mention = null {
        get => $this->c5_chatchannel_mention;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_mention', $value);
            $this->c5_chatchannel_mention = $value;
        }
    }

    /**
     * Global
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatchannel_global = 0 {
        get => $this->c5_chatchannel_global;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_global', $value);
            $this->c5_chatchannel_global = $value;
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
    public int|null $c5_chatchannel_inactive = 0 {
        get => $this->c5_chatchannel_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_inactive', $value);
            $this->c5_chatchannel_inactive = $value;
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
    public string|null $c5_chatchannel_optimistic_lock = 'now()' {
        get => $this->c5_chatchannel_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_optimistic_lock', $value);
            $this->c5_chatchannel_optimistic_lock = $value;
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
    public string|null $c5_chatchannel_inserted_timestamp = null {
        get => $this->c5_chatchannel_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_inserted_timestamp', $value);
            $this->c5_chatchannel_inserted_timestamp = $value;
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
    public int|null $c5_chatchannel_inserted_user_id = null {
        get => $this->c5_chatchannel_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_inserted_user_id', $value);
            $this->c5_chatchannel_inserted_user_id = $value;
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
    public string|null $c5_chatchannel_updated_timestamp = null {
        get => $this->c5_chatchannel_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_updated_timestamp', $value);
            $this->c5_chatchannel_updated_timestamp = $value;
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
    public int|null $c5_chatchannel_updated_user_id = null {
        get => $this->c5_chatchannel_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatchannel_updated_user_id', $value);
            $this->c5_chatchannel_updated_user_id = $value;
        }
    }
}
