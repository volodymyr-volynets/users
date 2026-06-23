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

class ClassificationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Classifications::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_classification_tenant_id','um_classification_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_classification_tenant_id = null {
        get => $this->um_classification_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_classification_tenant_id', $value);
            $this->um_classification_tenant_id = $value;
        }
    }

    /**
     * Team #
     *
     *
     *
     * {domain{classification_id_sequence}}
     *
     * @var int|null Domain: classification_id_sequence Type: serial
     */
    public int|null $um_classification_id = null {
        get => $this->um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_classification_id', $value);
            $this->um_classification_id = $value;
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
    public string|null $um_classification_um_classtype_code = null {
        get => $this->um_classification_um_classtype_code;
        set {
            $this->setFullPkAndFilledColumn('um_classification_um_classtype_code', $value);
            $this->um_classification_um_classtype_code = $value;
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
    public string|null $um_classification_code = null {
        get => $this->um_classification_code;
        set {
            $this->setFullPkAndFilledColumn('um_classification_code', $value);
            $this->um_classification_code = $value;
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
    public string|null $um_classification_name = null {
        get => $this->um_classification_name;
        set {
            $this->setFullPkAndFilledColumn('um_classification_name', $value);
            $this->um_classification_name = $value;
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
    public string|null $um_classification_icon = null {
        get => $this->um_classification_icon;
        set {
            $this->setFullPkAndFilledColumn('um_classification_icon', $value);
            $this->um_classification_icon = $value;
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
    public int|null $um_classification_weight = null {
        get => $this->um_classification_weight;
        set {
            $this->setFullPkAndFilledColumn('um_classification_weight', $value);
            $this->um_classification_weight = $value;
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
    public int|null $um_classification_global = 0 {
        get => $this->um_classification_global;
        set {
            $this->setFullPkAndFilledColumn('um_classification_global', $value);
            $this->um_classification_global = $value;
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
    public int|null $um_classification_inactive = 0 {
        get => $this->um_classification_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_classification_inactive', $value);
            $this->um_classification_inactive = $value;
        }
    }
}
