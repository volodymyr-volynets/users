<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Channel\Group;

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
    public array $object_table_pk = ['um_changrpgroup_tenant_id','um_changrpgroup_um_changroup_id','um_changrpgroup_child_um_changroup_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_changrpgroup_tenant_id = null {
        get => $this->um_changrpgroup_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_tenant_id', $value);
            $this->um_changrpgroup_tenant_id = $value;
        }
    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_changrpgroup_um_changroup_id = null {
        get => $this->um_changrpgroup_um_changroup_id;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_um_changroup_id', $value);
            $this->um_changrpgroup_um_changroup_id = $value;
        }
    }

    /**
     * Child Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_changrpgroup_child_um_changroup_id = null {
        get => $this->um_changrpgroup_child_um_changroup_id;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_child_um_changroup_id', $value);
            $this->um_changrpgroup_child_um_changroup_id = $value;
        }
    }

    /**
     * Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_changrpgroup_type_code = null {
        get => $this->um_changrpgroup_type_code;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_type_code', $value);
            $this->um_changrpgroup_type_code = $value;
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
    public int|null $um_changrpgroup_inactive = 0 {
        get => $this->um_changrpgroup_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_inactive', $value);
            $this->um_changrpgroup_inactive = $value;
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
    public string|null $um_changrpgroup_inserted_timestamp = null {
        get => $this->um_changrpgroup_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_inserted_timestamp', $value);
            $this->um_changrpgroup_inserted_timestamp = $value;
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
    public int|null $um_changrpgroup_inserted_user_id = null {
        get => $this->um_changrpgroup_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_inserted_user_id', $value);
            $this->um_changrpgroup_inserted_user_id = $value;
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
    public string|null $um_changrpgroup_updated_timestamp = null {
        get => $this->um_changrpgroup_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_updated_timestamp', $value);
            $this->um_changrpgroup_updated_timestamp = $value;
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
    public int|null $um_changrpgroup_updated_user_id = null {
        get => $this->um_changrpgroup_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_changrpgroup_updated_user_id', $value);
            $this->um_changrpgroup_updated_user_id = $value;
        }
    }
}
