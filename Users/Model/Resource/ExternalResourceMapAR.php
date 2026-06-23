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

class ExternalResourceMapAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalResourceMap::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extresmap_tenant_id','um_extresmap_um_extresrc_id','um_extresmap_method_code','um_extresmap_um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extresmap_tenant_id = null {
        get => $this->um_extresmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_tenant_id', $value);
            $this->um_extresmap_tenant_id = $value;
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
    public int|null $um_extresmap_um_extresrc_id = 0 {
        get => $this->um_extresmap_um_extresrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_um_extresrc_id', $value);
            $this->um_extresmap_um_extresrc_id = $value;
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
    public string|null $um_extresmap_method_code = null {
        get => $this->um_extresmap_method_code;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_method_code', $value);
            $this->um_extresmap_method_code = $value;
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
    public int|null $um_extresmap_um_extactn_id = 0 {
        get => $this->um_extresmap_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_um_extactn_id', $value);
            $this->um_extresmap_um_extactn_id = $value;
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
    public int|null $um_extresmap_weight_enabled = 0 {
        get => $this->um_extresmap_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_weight_enabled', $value);
            $this->um_extresmap_weight_enabled = $value;
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
    public int|null $um_extresmap_weight_value = null {
        get => $this->um_extresmap_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_weight_value', $value);
            $this->um_extresmap_weight_value = $value;
        }
    }

    /**
     * Disabled
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extresmap_disabled = 0 {
        get => $this->um_extresmap_disabled;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_disabled', $value);
            $this->um_extresmap_disabled = $value;
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
    public int|null $um_extresmap_inactive = 0 {
        get => $this->um_extresmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extresmap_inactive', $value);
            $this->um_extresmap_inactive = $value;
        }
    }
}
