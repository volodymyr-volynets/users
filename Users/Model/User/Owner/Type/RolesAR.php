<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Owner\Type;

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
    public array $object_table_pk = ['um_ownertprole_tenant_id','um_ownertprole_ownertype_id','um_ownertprole_role_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_ownertprole_tenant_id = null {
        get => $this->um_ownertprole_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_ownertprole_tenant_id', $value);
            $this->um_ownertprole_tenant_id = $value;
        }
    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $um_ownertprole_timestamp = 'now()' {
        get => $this->um_ownertprole_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_ownertprole_timestamp', $value);
            $this->um_ownertprole_timestamp = $value;
        }
    }

    /**
     * Owner Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_ownertprole_ownertype_id = null {
        get => $this->um_ownertprole_ownertype_id;
        set {
            $this->setFullPkAndFilledColumn('um_ownertprole_ownertype_id', $value);
            $this->um_ownertprole_ownertype_id = $value;
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
    public int|null $um_ownertprole_role_id = null {
        get => $this->um_ownertprole_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_ownertprole_role_id', $value);
            $this->um_ownertprole_role_id = $value;
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
    public int|null $um_ownertprole_inactive = 0 {
        get => $this->um_ownertprole_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_ownertprole_inactive', $value);
            $this->um_ownertprole_inactive = $value;
        }
    }
}
