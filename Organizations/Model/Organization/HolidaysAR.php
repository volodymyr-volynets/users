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

class HolidaysAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Holidays::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_holiday_tenant_id','on_holiday_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_holiday_tenant_id = null {
        get => $this->on_holiday_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_tenant_id', $value);
            $this->on_holiday_tenant_id = $value;
        }
    }

    /**
     * Holiday #
     *
     *
     *
     * {domain{holiday_id_sequence}}
     *
     * @var int|null Domain: holiday_id_sequence Type: serial
     */
    public int|null $on_holiday_id = null {
        get => $this->on_holiday_id;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_id', $value);
            $this->on_holiday_id = $value;
        }
    }

    /**
     * Date
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_holiday_date = null {
        get => $this->on_holiday_date;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_date', $value);
            $this->on_holiday_date = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $on_holiday_name = null {
        get => $this->on_holiday_name;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_name', $value);
            $this->on_holiday_name = $value;
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
    public int|null $on_holiday_inactive = 0 {
        get => $this->on_holiday_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_inactive', $value);
            $this->on_holiday_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $on_holiday_optimistic_lock = 'now()' {
        get => $this->on_holiday_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('on_holiday_optimistic_lock', $value);
            $this->on_holiday_optimistic_lock = $value;
        }
    }
}
