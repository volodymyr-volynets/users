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

class ExternalSubresourceMapAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalSubresourceMap::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extsursmap_tenant_id','um_extsursmap_um_extsursrc_id','um_extsursmap_um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extsursmap_tenant_id = null {
        get => $this->um_extsursmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_tenant_id', $value);
            $this->um_extsursmap_tenant_id = $value;
        }
    }

    /**
     * Subresource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_extsursmap_um_extsursrc_id = 0 {
        get => $this->um_extsursmap_um_extsursrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_um_extsursrc_id', $value);
            $this->um_extsursmap_um_extsursrc_id = $value;
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
    public int|null $um_extsursmap_um_extactn_id = 0 {
        get => $this->um_extsursmap_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_um_extactn_id', $value);
            $this->um_extsursmap_um_extactn_id = $value;
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
    public int|null $um_extsursmap_weight_enabled = 0 {
        get => $this->um_extsursmap_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_weight_enabled', $value);
            $this->um_extsursmap_weight_enabled = $value;
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
    public int|null $um_extsursmap_weight_value = null {
        get => $this->um_extsursmap_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_weight_value', $value);
            $this->um_extsursmap_weight_value = $value;
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
    public int|null $um_extsursmap_disabled = 0 {
        get => $this->um_extsursmap_disabled;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_disabled', $value);
            $this->um_extsursmap_disabled = $value;
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
    public int|null $um_extsursmap_inactive = 0 {
        get => $this->um_extsursmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extsursmap_inactive', $value);
            $this->um_extsursmap_inactive = $value;
        }
    }
}
