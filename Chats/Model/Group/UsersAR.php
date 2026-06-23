<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Group;

use Object\ActiveRecord;

class UsersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Users::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatgrpuser_tenant_id','c5_chatgrpuser_c5_chatgroup_code','c5_chatgrpuser_um_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatgrpuser_tenant_id = null {
        get => $this->c5_chatgrpuser_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_tenant_id', $value);
            $this->c5_chatgrpuser_tenant_id = $value;
        }
    }

    /**
     * Group Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chatgrpuser_c5_chatgroup_code = null {
        get => $this->c5_chatgrpuser_c5_chatgroup_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_c5_chatgroup_code', $value);
            $this->c5_chatgrpuser_c5_chatgroup_code = $value;
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
    public int|null $c5_chatgrpuser_um_user_id = null {
        get => $this->c5_chatgrpuser_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_um_user_id', $value);
            $this->c5_chatgrpuser_um_user_id = $value;
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
    public int|null $c5_chatgrpuser_inactive = 0 {
        get => $this->c5_chatgrpuser_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_inactive', $value);
            $this->c5_chatgrpuser_inactive = $value;
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
    public string|null $c5_chatgrpuser_inserted_timestamp = null {
        get => $this->c5_chatgrpuser_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_inserted_timestamp', $value);
            $this->c5_chatgrpuser_inserted_timestamp = $value;
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
    public int|null $c5_chatgrpuser_inserted_user_id = null {
        get => $this->c5_chatgrpuser_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpuser_inserted_user_id', $value);
            $this->c5_chatgrpuser_inserted_user_id = $value;
        }
    }
}
