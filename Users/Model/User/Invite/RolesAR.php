<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Invite;

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
    public array $object_table_pk = ['um_usrinrol_tenant_id','um_usrinrol_usrinv_id','um_usrinrol_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrinrol_tenant_id = null {
        get => $this->um_usrinrol_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_tenant_id', $value);
            $this->um_usrinrol_tenant_id = $value;
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
    public string|null $um_usrinrol_timestamp = 'now()' {
        get => $this->um_usrinrol_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_timestamp', $value);
            $this->um_usrinrol_timestamp = $value;
        }
    }

    /**
     * Invite #
     *
     *
     *
     * {domain{invite_id}}
     *
     * @var int|null Domain: invite_id Type: bigint
     */
    public int|null $um_usrinrol_usrinv_id = null {
        get => $this->um_usrinrol_usrinv_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_usrinv_id', $value);
            $this->um_usrinrol_usrinv_id = $value;
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
    public int|null $um_usrinrol_role_id = null {
        get => $this->um_usrinrol_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_role_id', $value);
            $this->um_usrinrol_role_id = $value;
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
    public int|null $um_usrinrol_unique = null {
        get => $this->um_usrinrol_unique;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_unique', $value);
            $this->um_usrinrol_unique = $value;
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
    public int|null $um_usrinrol_inactive = 0 {
        get => $this->um_usrinrol_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrinrol_inactive', $value);
            $this->um_usrinrol_inactive = $value;
        }
    }
}
