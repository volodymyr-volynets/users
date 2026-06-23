<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification\API;

use Object\ActiveRecord;

class MethodsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Methods::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_clsapmethod_tenant_id','um_clsapmethod_um_classification_id','um_clsapmethod_module_id','um_clsapmethod_resource_id','um_clsapmethod_method_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_clsapmethod_tenant_id = null {
        get => $this->um_clsapmethod_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_tenant_id', $value);
            $this->um_clsapmethod_tenant_id = $value;
        }
    }

    /**
     * Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_clsapmethod_um_classification_id = null {
        get => $this->um_clsapmethod_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_um_classification_id', $value);
            $this->um_clsapmethod_um_classification_id = $value;
        }
    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_clsapmethod_module_id = null {
        get => $this->um_clsapmethod_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_module_id', $value);
            $this->um_clsapmethod_module_id = $value;
        }
    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_clsapmethod_resource_id = 0 {
        get => $this->um_clsapmethod_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_resource_id', $value);
            $this->um_clsapmethod_resource_id = $value;
        }
    }

    /**
     * Method Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_clsapmethod_method_code = null {
        get => $this->um_clsapmethod_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_method_code', $value);
            $this->um_clsapmethod_method_code = $value;
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
    public int|null $um_clsapmethod_inactive = 0 {
        get => $this->um_clsapmethod_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_clsapmethod_inactive', $value);
            $this->um_clsapmethod_inactive = $value;
        }
    }
}
