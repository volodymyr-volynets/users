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

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrorg_tenant_id','um_usrorg_user_id','um_usrorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrorg_tenant_id = null {
        get => $this->um_usrorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_tenant_id', $value);
            $this->um_usrorg_tenant_id = $value;
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
    public string|null $um_usrorg_timestamp = 'now()' {
        get => $this->um_usrorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_timestamp', $value);
            $this->um_usrorg_timestamp = $value;
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
    public int|null $um_usrorg_user_id = null {
        get => $this->um_usrorg_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_user_id', $value);
            $this->um_usrorg_user_id = $value;
        }
    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $um_usrorg_organization_id = null {
        get => $this->um_usrorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_organization_id', $value);
            $this->um_usrorg_organization_id = $value;
        }
    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrorg_primary = 0 {
        get => $this->um_usrorg_primary;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_primary', $value);
            $this->um_usrorg_primary = $value;
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
    public int|null $um_usrorg_inactive = 0 {
        get => $this->um_usrorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrorg_inactive', $value);
            $this->um_usrorg_inactive = $value;
        }
    }
}
