<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain\Permission;

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
    public array $object_table_pk = ['um_domperaction_tenant_id','um_domperaction_um_domain_id','um_domperaction_module_id','um_domperaction_resource_id','um_domperaction_method_code','um_domperaction_action_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_domperaction_tenant_id = null {
        get => $this->um_domperaction_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_tenant_id', $value);
            $this->um_domperaction_tenant_id = $value;
        }
    }

    /**
     * Domain #
     *
     *
     *
     * {domain{domain_id}}
     *
     * @var int|null Domain: domain_id Type: integer
     */
    public int|null $um_domperaction_um_domain_id = null {
        get => $this->um_domperaction_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_um_domain_id', $value);
            $this->um_domperaction_um_domain_id = $value;
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
    public int|null $um_domperaction_module_id = null {
        get => $this->um_domperaction_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_module_id', $value);
            $this->um_domperaction_module_id = $value;
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
    public int|null $um_domperaction_resource_id = 0 {
        get => $this->um_domperaction_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_resource_id', $value);
            $this->um_domperaction_resource_id = $value;
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
    public string|null $um_domperaction_method_code = null {
        get => $this->um_domperaction_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_method_code', $value);
            $this->um_domperaction_method_code = $value;
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
    public int|null $um_domperaction_action_id = 0 {
        get => $this->um_domperaction_action_id;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_action_id', $value);
            $this->um_domperaction_action_id = $value;
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
    public int|null $um_domperaction_inactive = 0 {
        get => $this->um_domperaction_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_domperaction_inactive', $value);
            $this->um_domperaction_inactive = $value;
        }
    }
}
