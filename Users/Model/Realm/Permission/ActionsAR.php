<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm\Permission;

use Object\ActiveRecord;

class ActionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Actions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_reaperaction_tenant_id','um_reaperaction_um_realm_id','um_reaperaction_module_id','um_reaperaction_resource_id','um_reaperaction_method_code','um_reaperaction_action_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reaperaction_tenant_id = null {
        get => $this->um_reaperaction_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_tenant_id', $value);
            $this->um_reaperaction_tenant_id = $value;
        }
    }

    /**
     * Realm #
     *
     *
     *
     * {domain{realm_id}}
     *
     * @var int|null Domain: realm_id Type: integer
     */
    public int|null $um_reaperaction_um_realm_id = null {
        get => $this->um_reaperaction_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_um_realm_id', $value);
            $this->um_reaperaction_um_realm_id = $value;
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
    public int|null $um_reaperaction_module_id = null {
        get => $this->um_reaperaction_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_module_id', $value);
            $this->um_reaperaction_module_id = $value;
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
    public int|null $um_reaperaction_resource_id = 0 {
        get => $this->um_reaperaction_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_resource_id', $value);
            $this->um_reaperaction_resource_id = $value;
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
    public string|null $um_reaperaction_method_code = null {
        get => $this->um_reaperaction_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_method_code', $value);
            $this->um_reaperaction_method_code = $value;
        }
    }

    /**
     * Action #
     *
     *
     *
     * {domain{action_id}}
     *
     * @var int|null Domain: action_id Type: smallint
     */
    public int|null $um_reaperaction_action_id = 0 {
        get => $this->um_reaperaction_action_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_action_id', $value);
            $this->um_reaperaction_action_id = $value;
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
    public int|null $um_reaperaction_inactive = 0 {
        get => $this->um_reaperaction_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_reaperaction_inactive', $value);
            $this->um_reaperaction_inactive = $value;
        }
    }
}
