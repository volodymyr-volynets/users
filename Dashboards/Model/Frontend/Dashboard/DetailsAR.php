<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend\Dashboard;

use Object\ActiveRecord;

class DetailsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Details::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['d9_frontdshdet_tenant_id','d9_frontdshdet_d9_frontdash_id','d9_frontdshdet_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_frontdshdet_tenant_id = null {
        get => $this->d9_frontdshdet_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_tenant_id', $value);
            $this->d9_frontdshdet_tenant_id = $value;
        }
    }

    /**
     * Dashboard #
     *
     *
     *
     * {domain{dashboard_id}}
     *
     * @var int|null Domain: dashboard_id Type: integer
     */
    public int|null $d9_frontdshdet_d9_frontdash_id = null {
        get => $this->d9_frontdshdet_d9_frontdash_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_d9_frontdash_id', $value);
            $this->d9_frontdshdet_d9_frontdash_id = $value;
        }
    }

    /**
     * Detail #
     *
     *
     *
     * {domain{detail_id}}
     *
     * @var int|null Domain: detail_id Type: integer
     */
    public int|null $d9_frontdshdet_id = null {
        get => $this->d9_frontdshdet_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_id', $value);
            $this->d9_frontdshdet_id = $value;
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
    public string|null $d9_frontdshdet_d9_backdash_code = null {
        get => $this->d9_frontdshdet_d9_backdash_code;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_d9_backdash_code', $value);
            $this->d9_frontdshdet_d9_backdash_code = $value;
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
    public string|null $d9_frontdshdet_name = null {
        get => $this->d9_frontdshdet_name;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_name', $value);
            $this->d9_frontdshdet_name = $value;
        }
    }

    /**
     * Start X
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_frontdshdet_x_start = 0 {
        get => $this->d9_frontdshdet_x_start;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_x_start', $value);
            $this->d9_frontdshdet_x_start = $value;
        }
    }

    /**
     * End X
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_frontdshdet_x_end = 0 {
        get => $this->d9_frontdshdet_x_end;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_x_end', $value);
            $this->d9_frontdshdet_x_end = $value;
        }
    }

    /**
     * Start Y
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_frontdshdet_y_start = 0 {
        get => $this->d9_frontdshdet_y_start;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_y_start', $value);
            $this->d9_frontdshdet_y_start = $value;
        }
    }

    /**
     * End Y
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_frontdshdet_y_end = 0 {
        get => $this->d9_frontdshdet_y_end;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_y_end', $value);
            $this->d9_frontdshdet_y_end = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $d9_frontdshdet_order = 0 {
        get => $this->d9_frontdshdet_order;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_order', $value);
            $this->d9_frontdshdet_order = $value;
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
    public int|null $d9_frontdshdet_inactive = 0 {
        get => $this->d9_frontdshdet_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_inactive', $value);
            $this->d9_frontdshdet_inactive = $value;
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
    public string|null $d9_frontdshdet_inserted_timestamp = null {
        get => $this->d9_frontdshdet_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_inserted_timestamp', $value);
            $this->d9_frontdshdet_inserted_timestamp = $value;
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
    public int|null $d9_frontdshdet_inserted_user_id = null {
        get => $this->d9_frontdshdet_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdshdet_inserted_user_id', $value);
            $this->d9_frontdshdet_inserted_user_id = $value;
        }
    }
}
