<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization;

use Object\ActiveRecord;

class BusinessHoursAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = BusinessHours::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_orgbhour_tenant_id','on_orgbhour_organization_id','on_orgbhour_day_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_orgbhour_tenant_id = null {
        get => $this->on_orgbhour_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_tenant_id', $value);
            $this->on_orgbhour_tenant_id = $value;
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
    public int|null $on_orgbhour_organization_id = null {
        get => $this->on_orgbhour_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_organization_id', $value);
            $this->on_orgbhour_organization_id = $value;
        }
    }

    /**
     * Day #
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Organization\BusinessHour\Days}}
     * {domain{day_id}}
     *
     * @var int|null Domain: day_id Type: smallint
     */
    public int|null $on_orgbhour_day_id = 0 {
        get => $this->on_orgbhour_day_id;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_day_id', $value);
            $this->on_orgbhour_day_id = $value;
        }
    }

    /**
     * Start Time
     *
     *
     *
     *
     *
     * @var string|null Type: time
     */
    public string|null $on_orgbhour_start_time = null {
        get => $this->on_orgbhour_start_time;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_start_time', $value);
            $this->on_orgbhour_start_time = $value;
        }
    }

    /**
     * End Time
     *
     *
     *
     *
     *
     * @var string|null Type: time
     */
    public string|null $on_orgbhour_end_time = null {
        get => $this->on_orgbhour_end_time;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_end_time', $value);
            $this->on_orgbhour_end_time = $value;
        }
    }

    /**
     * Timezone
     *
     *
     *
     * {domain{timezone_code}}
     *
     * @var string|null Domain: timezone_code Type: varchar
     */
    public string|null $on_orgbhour_timezone_code = null {
        get => $this->on_orgbhour_timezone_code;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_timezone_code', $value);
            $this->on_orgbhour_timezone_code = $value;
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
    public int|null $on_orgbhour_inactive = 0 {
        get => $this->on_orgbhour_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_orgbhour_inactive', $value);
            $this->on_orgbhour_inactive = $value;
        }
    }
}
