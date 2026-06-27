<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\ActiveRecord;

class RolesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Roles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrrol_tenant_id','um_usrrol_user_id','um_usrrol_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrrol_tenant_id = null {
        get => $this->um_usrrol_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_tenant_id', $value);
            $this->um_usrrol_tenant_id = $value;
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
    public int|null $um_usrrol_user_id = null {
        get => $this->um_usrrol_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_user_id', $value);
            $this->um_usrrol_user_id = $value;
        }
    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_usrrol_role_id = null {
        get => $this->um_usrrol_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_role_id', $value);
            $this->um_usrrol_role_id = $value;
        }
    }

    /**
     * Unique
     *
     *
     *
     *
     *
     * @var int|null Type: smallint
     */
    public int|null $um_usrrol_unique = null {
        get => $this->um_usrrol_unique;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_unique', $value);
            $this->um_usrrol_unique = $value;
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
    public int|null $um_usrrol_inactive = 0 {
        get => $this->um_usrrol_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_inactive', $value);
            $this->um_usrrol_inactive = $value;
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
    public string|null $um_usrrol_inserted_timestamp = null {
        get => $this->um_usrrol_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_inserted_timestamp', $value);
            $this->um_usrrol_inserted_timestamp = $value;
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
    public int|null $um_usrrol_inserted_user_id = null {
        get => $this->um_usrrol_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_inserted_user_id', $value);
            $this->um_usrrol_inserted_user_id = $value;
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
    public string|null $um_usrrol_updated_timestamp = null {
        get => $this->um_usrrol_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_updated_timestamp', $value);
            $this->um_usrrol_updated_timestamp = $value;
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
    public int|null $um_usrrol_updated_user_id = null {
        get => $this->um_usrrol_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrrol_updated_user_id', $value);
            $this->um_usrrol_updated_user_id = $value;
        }
    }
}
