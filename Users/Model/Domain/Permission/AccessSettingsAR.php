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

class AccessSettingsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = AccessSettings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_domacsetting_tenant_id','um_domacsetting_um_domain_id','um_domacsetting_module_id','um_domacsetting_resource_id','um_domacsetting_sm_rsacsertype_code','um_domacsetting_sm_rsacserowner_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_domacsetting_tenant_id = null {
        get => $this->um_domacsetting_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_tenant_id', $value);
            $this->um_domacsetting_tenant_id = $value;
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
    public string|null $um_domacsetting_timestamp = 'now()' {
        get => $this->um_domacsetting_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_timestamp', $value);
            $this->um_domacsetting_timestamp = $value;
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
    public int|null $um_domacsetting_um_domain_id = null {
        get => $this->um_domacsetting_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_um_domain_id', $value);
            $this->um_domacsetting_um_domain_id = $value;
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
    public int|null $um_domacsetting_module_id = null {
        get => $this->um_domacsetting_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_module_id', $value);
            $this->um_domacsetting_module_id = $value;
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
    public int|null $um_domacsetting_resource_id = 0 {
        get => $this->um_domacsetting_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_resource_id', $value);
            $this->um_domacsetting_resource_id = $value;
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
    public string|null $um_domacsetting_sm_rsacsertype_code = null {
        get => $this->um_domacsetting_sm_rsacsertype_code;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_sm_rsacsertype_code', $value);
            $this->um_domacsetting_sm_rsacsertype_code = $value;
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
    public string|null $um_domacsetting_sm_rsacserowner_code = null {
        get => $this->um_domacsetting_sm_rsacserowner_code;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_sm_rsacserowner_code', $value);
            $this->um_domacsetting_sm_rsacserowner_code = $value;
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
    public int|null $um_domacsetting_inactive = 0 {
        get => $this->um_domacsetting_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_domacsetting_inactive', $value);
            $this->um_domacsetting_inactive = $value;
        }
    }
}
