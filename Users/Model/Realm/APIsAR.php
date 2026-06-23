<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm;

use Object\ActiveRecord;

class APIsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = APIs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_reaapi_tenant_id','um_reaapi_um_realm_id','um_reaapi_module_id','um_reaapi_resource_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reaapi_tenant_id = null {
        get => $this->um_reaapi_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_tenant_id', $value);
            $this->um_reaapi_tenant_id = $value;
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
    public string|null $um_reaapi_timestamp = 'now()' {
        get => $this->um_reaapi_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_timestamp', $value);
            $this->um_reaapi_timestamp = $value;
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
    public int|null $um_reaapi_um_realm_id = null {
        get => $this->um_reaapi_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_um_realm_id', $value);
            $this->um_reaapi_um_realm_id = $value;
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
    public int|null $um_reaapi_module_id = null {
        get => $this->um_reaapi_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_module_id', $value);
            $this->um_reaapi_module_id = $value;
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
    public int|null $um_reaapi_resource_id = 0 {
        get => $this->um_reaapi_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_resource_id', $value);
            $this->um_reaapi_resource_id = $value;
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
    public int|null $um_reaapi_inactive = 0 {
        get => $this->um_reaapi_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_reaapi_inactive', $value);
            $this->um_reaapi_inactive = $value;
        }
    }
}
