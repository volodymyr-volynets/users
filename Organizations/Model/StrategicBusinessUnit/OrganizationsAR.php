<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\StrategicBusinessUnit;

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
    public array $object_table_pk = ['on_sborg_tenant_id','on_sborg_sbu_id','on_sborg_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_sborg_tenant_id = null {
        get => $this->on_sborg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_tenant_id', $value);
            $this->on_sborg_tenant_id = $value;
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
    public string|null $on_sborg_timestamp = 'now()' {
        get => $this->on_sborg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_timestamp', $value);
            $this->on_sborg_timestamp = $value;
        }
    }

    /**
     * SBU #
     *
     *
     *
     * {domain{sbu_id}}
     *
     * @var int|null Domain: sbu_id Type: integer
     */
    public int|null $on_sborg_sbu_id = null {
        get => $this->on_sborg_sbu_id;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_sbu_id', $value);
            $this->on_sborg_sbu_id = $value;
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
    public int|null $on_sborg_organization_id = null {
        get => $this->on_sborg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_organization_id', $value);
            $this->on_sborg_organization_id = $value;
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
    public int|null $on_sborg_primary = 0 {
        get => $this->on_sborg_primary;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_primary', $value);
            $this->on_sborg_primary = $value;
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
    public int|null $on_sborg_inactive = 0 {
        get => $this->on_sborg_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_sborg_inactive', $value);
            $this->on_sborg_inactive = $value;
        }
    }
}
