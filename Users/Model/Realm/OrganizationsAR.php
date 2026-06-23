<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm;

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
    public array $object_table_pk = ['um_reaorg_tenant_id','um_reaorg_um_realm_id','um_reaorg_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reaorg_tenant_id = null {
        get => $this->um_reaorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaorg_tenant_id', $value);
            $this->um_reaorg_tenant_id = $value;
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
    public string|null $um_reaorg_timestamp = 'now()' {
        get => $this->um_reaorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_reaorg_timestamp', $value);
            $this->um_reaorg_timestamp = $value;
        }
    }

    /**
     * Realm #
     *
     *
     *
     * {domain{realm_id}}
     *
     * @var int|null Domain: realm_id Type: integer
     */
    public int|null $um_reaorg_um_realm_id = null {
        get => $this->um_reaorg_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaorg_um_realm_id', $value);
            $this->um_reaorg_um_realm_id = $value;
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
    public int|null $um_reaorg_organization_id = null {
        get => $this->um_reaorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaorg_organization_id', $value);
            $this->um_reaorg_organization_id = $value;
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
    public int|null $um_reaorg_inactive = 0 {
        get => $this->um_reaorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_reaorg_inactive', $value);
            $this->um_reaorg_inactive = $value;
        }
    }
}
