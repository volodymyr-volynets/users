<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend;

use Object\ActiveRecord;

class DashboardsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Dashboards::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['d9_frontdash_tenant_id','d9_frontdash_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_frontdash_tenant_id = null {
        get => $this->d9_frontdash_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_tenant_id', $value);
            $this->d9_frontdash_tenant_id = $value;
        }
    }

    /**
     * Dashboard #
     *
     *
     *
     * {domain{dashboard_id_sequence}}
     *
     * @var int|null Domain: dashboard_id_sequence Type: serial
     */
    public int|null $d9_frontdash_id = null {
        get => $this->d9_frontdash_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_id', $value);
            $this->d9_frontdash_id = $value;
        }
    }

    /**
     * Dashboard Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $d9_frontdash_code = null {
        get => $this->d9_frontdash_code;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_code', $value);
            $this->d9_frontdash_code = $value;
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
    public string|null $d9_frontdash_name = null {
        get => $this->d9_frontdash_name;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_name', $value);
            $this->d9_frontdash_name = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $d9_frontdash_module_code = null {
        get => $this->d9_frontdash_module_code;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_module_code', $value);
            $this->d9_frontdash_module_code = $value;
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
    public int|null $d9_frontdash_inactive = 0 {
        get => $this->d9_frontdash_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_inactive', $value);
            $this->d9_frontdash_inactive = $value;
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
    public string|null $d9_frontdash_optimistic_lock = 'now()' {
        get => $this->d9_frontdash_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_optimistic_lock', $value);
            $this->d9_frontdash_optimistic_lock = $value;
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
    public string|null $d9_frontdash_inserted_timestamp = null {
        get => $this->d9_frontdash_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_inserted_timestamp', $value);
            $this->d9_frontdash_inserted_timestamp = $value;
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
    public int|null $d9_frontdash_inserted_user_id = null {
        get => $this->d9_frontdash_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_inserted_user_id', $value);
            $this->d9_frontdash_inserted_user_id = $value;
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
    public string|null $d9_frontdash_updated_timestamp = null {
        get => $this->d9_frontdash_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_updated_timestamp', $value);
            $this->d9_frontdash_updated_timestamp = $value;
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
    public int|null $d9_frontdash_updated_user_id = null {
        get => $this->d9_frontdash_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdash_updated_user_id', $value);
            $this->d9_frontdash_updated_user_id = $value;
        }
    }
}
