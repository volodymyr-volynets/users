<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Role\ExternalPermission;

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
    public array $object_table_pk = ['um_rolextpractn_tenant_id','um_rolextpractn_role_id','um_rolextpractn_um_extmdids_id','um_rolextpractn_um_extresrc_id','um_rolextpractn_method_code','um_rolextpractn_um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolextpractn_tenant_id = null {
        get => $this->um_rolextpractn_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_tenant_id', $value);
            $this->um_rolextpractn_tenant_id = $value;
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
    public int|null $um_rolextpractn_role_id = null {
        get => $this->um_rolextpractn_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_role_id', $value);
            $this->um_rolextpractn_role_id = $value;
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
    public int|null $um_rolextpractn_um_extmdids_id = null {
        get => $this->um_rolextpractn_um_extmdids_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_um_extmdids_id', $value);
            $this->um_rolextpractn_um_extmdids_id = $value;
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
    public int|null $um_rolextpractn_um_extresrc_id = 0 {
        get => $this->um_rolextpractn_um_extresrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_um_extresrc_id', $value);
            $this->um_rolextpractn_um_extresrc_id = $value;
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
    public string|null $um_rolextpractn_method_code = null {
        get => $this->um_rolextpractn_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_method_code', $value);
            $this->um_rolextpractn_method_code = $value;
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
    public int|null $um_rolextpractn_um_extactn_id = 0 {
        get => $this->um_rolextpractn_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_um_extactn_id', $value);
            $this->um_rolextpractn_um_extactn_id = $value;
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
    public int|null $um_rolextpractn_inactive = 0 {
        get => $this->um_rolextpractn_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_rolextpractn_inactive', $value);
            $this->um_rolextpractn_inactive = $value;
        }
    }
}
