<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification;

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
    public array $object_table_pk = ['um_clscls_tenant_id','um_clscls_parent_um_classification_id','um_clscls_child_um_classification_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_clscls_tenant_id = null {
        get => $this->um_clscls_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_tenant_id', $value);
            $this->um_clscls_tenant_id = $value;
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
    public string|null $um_clscls_timestamp = 'now()' {
        get => $this->um_clscls_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_timestamp', $value);
            $this->um_clscls_timestamp = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_clscls_um_classtype_code = null {
        get => $this->um_clscls_um_classtype_code;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_um_classtype_code', $value);
            $this->um_clscls_um_classtype_code = $value;
        }
    }

    /**
     * Parent Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_clscls_parent_um_classification_id = null {
        get => $this->um_clscls_parent_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_parent_um_classification_id', $value);
            $this->um_clscls_parent_um_classification_id = $value;
        }
    }

    /**
     * Child Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_clscls_child_um_classification_id = null {
        get => $this->um_clscls_child_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_child_um_classification_id', $value);
            $this->um_clscls_child_um_classification_id = $value;
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
    public int|null $um_clscls_inactive = 0 {
        get => $this->um_clscls_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_clscls_inactive', $value);
            $this->um_clscls_inactive = $value;
        }
    }
}
