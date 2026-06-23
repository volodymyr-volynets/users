<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\ActiveRecord;

class DomainsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Domains::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_domain_tenant_id','um_domain_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_domain_tenant_id = null {
        get => $this->um_domain_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_domain_tenant_id', $value);
            $this->um_domain_tenant_id = $value;
        }
    }

    /**
     * Domain #
     *
     *
     *
     * {domain{domain_id_sequence}}
     *
     * @var int|null Domain: domain_id_sequence Type: serial
     */
    public int|null $um_domain_id = null {
        get => $this->um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_domain_id', $value);
            $this->um_domain_id = $value;
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
    public string|null $um_domain_code = null {
        get => $this->um_domain_code;
        set {
            $this->setFullPkAndFilledColumn('um_domain_code', $value);
            $this->um_domain_code = $value;
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
    public string|null $um_domain_name = null {
        get => $this->um_domain_name;
        set {
            $this->setFullPkAndFilledColumn('um_domain_name', $value);
            $this->um_domain_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $um_domain_icon = null {
        get => $this->um_domain_icon;
        set {
            $this->setFullPkAndFilledColumn('um_domain_icon', $value);
            $this->um_domain_icon = $value;
        }
    }

    /**
     * Weight
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_domain_weight = null {
        get => $this->um_domain_weight;
        set {
            $this->setFullPkAndFilledColumn('um_domain_weight', $value);
            $this->um_domain_weight = $value;
        }
    }

    /**
     * Global
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_domain_global = 0 {
        get => $this->um_domain_global;
        set {
            $this->setFullPkAndFilledColumn('um_domain_global', $value);
            $this->um_domain_global = $value;
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
    public int|null $um_domain_inactive = 0 {
        get => $this->um_domain_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_domain_inactive', $value);
            $this->um_domain_inactive = $value;
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
    public string|null $um_domain_optimistic_lock = 'now()' {
        get => $this->um_domain_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_domain_optimistic_lock', $value);
            $this->um_domain_optimistic_lock = $value;
        }
    }
}
