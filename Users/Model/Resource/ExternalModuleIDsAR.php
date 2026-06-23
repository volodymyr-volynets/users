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

class ExternalModuleIDsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalModuleIDs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extmdids_tenant_id','um_extmdids_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extmdids_tenant_id = null {
        get => $this->um_extmdids_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_tenant_id', $value);
            $this->um_extmdids_tenant_id = $value;
        }
    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id_sequence}}
     *
     * @var int|null Domain: module_id_sequence Type: serial
     */
    public int|null $um_extmdids_id = null {
        get => $this->um_extmdids_id;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_id', $value);
            $this->um_extmdids_id = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code_external}}
     *
     * @var string|null Domain: module_code_external Type: char
     */
    public string|null $um_extmdids_um_extmdl_code = null {
        get => $this->um_extmdids_um_extmdl_code;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_um_extmdl_code', $value);
            $this->um_extmdids_um_extmdl_code = $value;
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
    public string|null $um_extmdids_name = null {
        get => $this->um_extmdids_name;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_name', $value);
            $this->um_extmdids_name = $value;
        }
    }

    /**
     * Slug
     *
     *
     *
     * {domain{slug}}
     *
     * @var string|null Domain: slug Type: varchar
     */
    public string|null $um_extmdids_slug = null {
        get => $this->um_extmdids_slug;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_slug', $value);
            $this->um_extmdids_slug = $value;
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
    public int|null $um_extmdids_weight_enabled = 0 {
        get => $this->um_extmdids_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_weight_enabled', $value);
            $this->um_extmdids_weight_enabled = $value;
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
    public int|null $um_extmdids_weight_value = null {
        get => $this->um_extmdids_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_weight_value', $value);
            $this->um_extmdids_weight_value = $value;
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
    public int|null $um_extmdids_inactive = 0 {
        get => $this->um_extmdids_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extmdids_inactive', $value);
            $this->um_extmdids_inactive = $value;
        }
    }
}
