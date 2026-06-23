<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain;

use Object\ActiveRecord;

class ChildrenAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Children::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_domdom_tenant_id','um_domdom_parent_um_domain_id','um_domdom_child_um_domain_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_domdom_tenant_id = null {
        get => $this->um_domdom_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_domdom_tenant_id', $value);
            $this->um_domdom_tenant_id = $value;
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
    public string|null $um_domdom_timestamp = 'now()' {
        get => $this->um_domdom_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_domdom_timestamp', $value);
            $this->um_domdom_timestamp = $value;
        }
    }

    /**
     * Parent Domain #
     *
     *
     *
     * {domain{domain_id}}
     *
     * @var int|null Domain: domain_id Type: integer
     */
    public int|null $um_domdom_parent_um_domain_id = null {
        get => $this->um_domdom_parent_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_domdom_parent_um_domain_id', $value);
            $this->um_domdom_parent_um_domain_id = $value;
        }
    }

    /**
     * Child Domain #
     *
     *
     *
     * {domain{domain_id}}
     *
     * @var int|null Domain: domain_id Type: integer
     */
    public int|null $um_domdom_child_um_domain_id = null {
        get => $this->um_domdom_child_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_domdom_child_um_domain_id', $value);
            $this->um_domdom_child_um_domain_id = $value;
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
    public int|null $um_domdom_inactive = 0 {
        get => $this->um_domdom_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_domdom_inactive', $value);
            $this->um_domdom_inactive = $value;
        }
    }
}
