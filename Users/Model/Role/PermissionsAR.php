<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Role;

use Object\ActiveRecord;

class PermissionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Permissions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolperm_tenant_id','um_rolperm_role_id','um_rolperm_module_id','um_rolperm_resource_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolperm_tenant_id = null {
        get => $this->um_rolperm_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_tenant_id', $value);
            $this->um_rolperm_tenant_id = $value;
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
    public string|null $um_rolperm_timestamp = 'now()' {
        get => $this->um_rolperm_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_timestamp', $value);
            $this->um_rolperm_timestamp = $value;
        }
    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolperm_role_id = null {
        get => $this->um_rolperm_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_role_id', $value);
            $this->um_rolperm_role_id = $value;
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
    public int|null $um_rolperm_module_id = null {
        get => $this->um_rolperm_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_module_id', $value);
            $this->um_rolperm_module_id = $value;
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
    public int|null $um_rolperm_resource_id = 0 {
        get => $this->um_rolperm_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_resource_id', $value);
            $this->um_rolperm_resource_id = $value;
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
    public int|null $um_rolperm_inactive = 0 {
        get => $this->um_rolperm_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_rolperm_inactive', $value);
            $this->um_rolperm_inactive = $value;
        }
    }
}
