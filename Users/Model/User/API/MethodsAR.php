<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\API;

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
    public array $object_table_pk = ['um_usrapmethod_tenant_id','um_usrapmethod_user_id','um_usrapmethod_module_id','um_usrapmethod_resource_id','um_usrapmethod_method_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrapmethod_tenant_id = null {
        get => $this->um_usrapmethod_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_tenant_id', $value);
            $this->um_usrapmethod_tenant_id = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrapmethod_user_id = null {
        get => $this->um_usrapmethod_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_user_id', $value);
            $this->um_usrapmethod_user_id = $value;
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
    public int|null $um_usrapmethod_module_id = null {
        get => $this->um_usrapmethod_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_module_id', $value);
            $this->um_usrapmethod_module_id = $value;
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
    public int|null $um_usrapmethod_resource_id = 0 {
        get => $this->um_usrapmethod_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_resource_id', $value);
            $this->um_usrapmethod_resource_id = $value;
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
    public string|null $um_usrapmethod_method_code = null {
        get => $this->um_usrapmethod_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_method_code', $value);
            $this->um_usrapmethod_method_code = $value;
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
    public int|null $um_usrapmethod_inactive = 0 {
        get => $this->um_usrapmethod_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrapmethod_inactive', $value);
            $this->um_usrapmethod_inactive = $value;
        }
    }
}
