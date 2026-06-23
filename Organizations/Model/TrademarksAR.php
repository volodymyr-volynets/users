<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model;

use Object\ActiveRecord;

class TrademarksAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Trademarks::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_trademark_tenant_id','on_trademark_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_trademark_tenant_id = null {
        get => $this->on_trademark_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_tenant_id', $value);
            $this->on_trademark_tenant_id = $value;
        }
    }

    /**
     * Trademark #
     *
     *
     *
     * {domain{trademark_id_sequence}}
     *
     * @var int|null Domain: trademark_id_sequence Type: serial
     */
    public int|null $on_trademark_id = null {
        get => $this->on_trademark_id;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_id', $value);
            $this->on_trademark_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $on_trademark_code = null {
        get => $this->on_trademark_code;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_code', $value);
            $this->on_trademark_code = $value;
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
    public string|null $on_trademark_name = null {
        get => $this->on_trademark_name;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_name', $value);
            $this->on_trademark_name = $value;
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
    public int|null $on_trademark_organization_id = null {
        get => $this->on_trademark_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_organization_id', $value);
            $this->on_trademark_organization_id = $value;
        }
    }

    /**
     * Effective From
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_trademark_effective_from = null {
        get => $this->on_trademark_effective_from;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_effective_from', $value);
            $this->on_trademark_effective_from = $value;
        }
    }

    /**
     * Effective To
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_trademark_effective_to = null {
        get => $this->on_trademark_effective_to;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_effective_to', $value);
            $this->on_trademark_effective_to = $value;
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
    public int|null $on_trademark_inactive = 0 {
        get => $this->on_trademark_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_inactive', $value);
            $this->on_trademark_inactive = $value;
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
    public string|null $on_trademark_optimistic_lock = 'now()' {
        get => $this->on_trademark_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('on_trademark_optimistic_lock', $value);
            $this->on_trademark_optimistic_lock = $value;
        }
    }
}
