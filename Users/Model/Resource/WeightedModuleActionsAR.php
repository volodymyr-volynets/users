<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\ActiveRecord;

class WeightedModuleActionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = WeightedModuleActions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_weimdction_tenant_id','um_weimdction_module_id','um_weimdction_action_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_weimdction_tenant_id = null {
        get => $this->um_weimdction_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_tenant_id', $value);
            $this->um_weimdction_tenant_id = $value;
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
    public int|null $um_weimdction_module_id = null {
        get => $this->um_weimdction_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_module_id', $value);
            $this->um_weimdction_module_id = $value;
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
    public int|null $um_weimdction_action_id = 0 {
        get => $this->um_weimdction_action_id;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_action_id', $value);
            $this->um_weimdction_action_id = $value;
        }
    }

    /**
     * Weight Enabled
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_weimdction_weight_enabled = 0 {
        get => $this->um_weimdction_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_weight_enabled', $value);
            $this->um_weimdction_weight_enabled = $value;
        }
    }

    /**
     * Weight Value
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_weimdction_weight_value = null {
        get => $this->um_weimdction_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_weight_value', $value);
            $this->um_weimdction_weight_value = $value;
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
    public int|null $um_weimdction_inactive = 0 {
        get => $this->um_weimdction_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_weimdction_inactive', $value);
            $this->um_weimdction_inactive = $value;
        }
    }
}
