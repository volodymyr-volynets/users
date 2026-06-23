<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization\Holiday;

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
    public array $object_table_pk = ['on_holiorg_tenant_id','on_holiorg_holiday_id','on_holiorg_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_holiorg_tenant_id = null {
        get => $this->on_holiorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_holiorg_tenant_id', $value);
            $this->on_holiorg_tenant_id = $value;
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
    public string|null $on_holiorg_timestamp = 'now()' {
        get => $this->on_holiorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('on_holiorg_timestamp', $value);
            $this->on_holiorg_timestamp = $value;
        }
    }

    /**
     * Holiday #
     *
     *
     *
     * {domain{holiday_id}}
     *
     * @var int|null Domain: holiday_id Type: integer
     */
    public int|null $on_holiorg_holiday_id = null {
        get => $this->on_holiorg_holiday_id;
        set {
            $this->setFullPkAndFilledColumn('on_holiorg_holiday_id', $value);
            $this->on_holiorg_holiday_id = $value;
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
    public int|null $on_holiorg_organization_id = null {
        get => $this->on_holiorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_holiorg_organization_id', $value);
            $this->on_holiorg_organization_id = $value;
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
    public int|null $on_holiorg_inactive = 0 {
        get => $this->on_holiorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_holiorg_inactive', $value);
            $this->on_holiorg_inactive = $value;
        }
    }
}
