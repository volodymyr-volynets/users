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

class TitlesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Titles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrtitle_tenant_id','um_usrtitle_name'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrtitle_tenant_id = null {
        get => $this->um_usrtitle_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtitle_tenant_id', $value);
            $this->um_usrtitle_tenant_id = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{personal_title}}
     *
     * @var string|null Domain: personal_title Type: varchar
     */
    public string|null $um_usrtitle_name = null {
        get => $this->um_usrtitle_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrtitle_name', $value);
            $this->um_usrtitle_name = $value;
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
    public int|null $um_usrtitle_order = 0 {
        get => $this->um_usrtitle_order;
        set {
            $this->setFullPkAndFilledColumn('um_usrtitle_order', $value);
            $this->um_usrtitle_order = $value;
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
    public int|null $um_usrtitle_inactive = 0 {
        get => $this->um_usrtitle_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrtitle_inactive', $value);
            $this->um_usrtitle_inactive = $value;
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
    public string|null $um_usrtitle_optimistic_lock = 'now()' {
        get => $this->um_usrtitle_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_usrtitle_optimistic_lock', $value);
            $this->um_usrtitle_optimistic_lock = $value;
        }
    }
}
