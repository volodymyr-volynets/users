<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Phases\Model;

use Object\ActiveRecord;

class StepsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Steps::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['wg_phasestep_tenant_id','wg_phasestep_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $wg_phasestep_tenant_id = null {
        get => $this->wg_phasestep_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_tenant_id', $value);
            $this->wg_phasestep_tenant_id = $value;
        }
    }

    /**
     * Phase Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $wg_phasestep_code = null {
        get => $this->wg_phasestep_code;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_code', $value);
            $this->wg_phasestep_code = $value;
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
    public string|null $wg_phasestep_name = null {
        get => $this->wg_phasestep_name;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_name', $value);
            $this->wg_phasestep_name = $value;
        }
    }

    /**
     * Group
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $wg_phasestep_group = null {
        get => $this->wg_phasestep_group;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_group', $value);
            $this->wg_phasestep_group = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $wg_phasestep_order = 0 {
        get => $this->wg_phasestep_order;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_order', $value);
            $this->wg_phasestep_order = $value;
        }
    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Widgets\Phases\Model\PhaseStepTypes}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $wg_phasestep_wg_phasestptype_code = null {
        get => $this->wg_phasestep_wg_phasestptype_code;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_wg_phasestptype_code', $value);
            $this->wg_phasestep_wg_phasestptype_code = $value;
        }
    }

    /**
     * Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $wg_phasestep_um_ownertype_id = null {
        get => $this->wg_phasestep_um_ownertype_id;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_um_ownertype_id', $value);
            $this->wg_phasestep_um_ownertype_id = $value;
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
    public string|null $wg_phasestep_um_ownertype_code = null {
        get => $this->wg_phasestep_um_ownertype_code;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_um_ownertype_code', $value);
            $this->wg_phasestep_um_ownertype_code = $value;
        }
    }

    /**
     * Settings (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $wg_phasestep_settings_json = null {
        get => $this->wg_phasestep_settings_json;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_settings_json', $value);
            $this->wg_phasestep_settings_json = $value;
        }
    }

    /**
     * Model
     *
     *
     *
     * {domain{model}}
     *
     * @var string|null Domain: model Type: varchar
     */
    public string|null $wg_phasestep_model = null {
        get => $this->wg_phasestep_model;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_model', $value);
            $this->wg_phasestep_model = $value;
        }
    }

    /**
     * Model #
     *
     *
     *
     * {domain{model_id}}
     *
     * @var int|null Domain: model_id Type: integer
     */
    public int|null $wg_phasestep_sm_model_id = null {
        get => $this->wg_phasestep_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_sm_model_id', $value);
            $this->wg_phasestep_sm_model_id = $value;
        }
    }

    /**
     * Model
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $wg_phasestep_sm_model_code = null {
        get => $this->wg_phasestep_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_sm_model_code', $value);
            $this->wg_phasestep_sm_model_code = $value;
        }
    }

    /**
     * A/I Tool Code
     *
     *
     *
     * {domain{code255}}
     *
     * @var string|null Domain: code255 Type: varchar
     */
    public string|null $wg_phasestep_ai_tool_code = null {
        get => $this->wg_phasestep_ai_tool_code;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_ai_tool_code', $value);
            $this->wg_phasestep_ai_tool_code = $value;
        }
    }

    /**
     * Is Form
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $wg_phasestep_is_form = 0 {
        get => $this->wg_phasestep_is_form;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_is_form', $value);
            $this->wg_phasestep_is_form = $value;
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
    public int|null $wg_phasestep_inactive = 0 {
        get => $this->wg_phasestep_inactive;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_inactive', $value);
            $this->wg_phasestep_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $wg_phasestep_optimistic_lock = 'now()' {
        get => $this->wg_phasestep_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('wg_phasestep_optimistic_lock', $value);
            $this->wg_phasestep_optimistic_lock = $value;
        }
    }
}
