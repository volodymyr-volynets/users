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

class ExternalSubresourcesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalSubresources::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extsursrc_tenant_id','um_extsursrc_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extsursrc_tenant_id = null {
        get => $this->um_extsursrc_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_tenant_id', $value);
            $this->um_extsursrc_tenant_id = $value;
        }
    }

    /**
     * Subresource #
     *
     *
     *
     * {domain{resource_id_sequence}}
     *
     * @var int|null Domain: resource_id_sequence Type: serial
     */
    public int|null $um_extsursrc_id = null {
        get => $this->um_extsursrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_id', $value);
            $this->um_extsursrc_id = $value;
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
    public int|null $um_extsursrc_um_extresrc_id = 0 {
        get => $this->um_extsursrc_um_extresrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_um_extresrc_id', $value);
            $this->um_extsursrc_um_extresrc_id = $value;
        }
    }

    /**
     * Parent Subresource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_extsursrc_parent_um_extsursrc_id = 0 {
        get => $this->um_extsursrc_parent_um_extsursrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_parent_um_extsursrc_id', $value);
            $this->um_extsursrc_parent_um_extsursrc_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_extsursrc_code = null {
        get => $this->um_extsursrc_code;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_code', $value);
            $this->um_extsursrc_code = $value;
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
    public string|null $um_extsursrc_name = null {
        get => $this->um_extsursrc_name;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_name', $value);
            $this->um_extsursrc_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $um_extsursrc_icon = null {
        get => $this->um_extsursrc_icon;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_icon', $value);
            $this->um_extsursrc_icon = $value;
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
    public string|null $um_extsursrc_um_extmdl_code = null {
        get => $this->um_extsursrc_um_extmdl_code;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_um_extmdl_code', $value);
            $this->um_extsursrc_um_extmdl_code = $value;
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
    public string|null $um_extsursrc_slug = null {
        get => $this->um_extsursrc_slug;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_slug', $value);
            $this->um_extsursrc_slug = $value;
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
    public int|null $um_extsursrc_weight_enabled = 0 {
        get => $this->um_extsursrc_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_weight_enabled', $value);
            $this->um_extsursrc_weight_enabled = $value;
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
    public int|null $um_extsursrc_weight_value = null {
        get => $this->um_extsursrc_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_weight_value', $value);
            $this->um_extsursrc_weight_value = $value;
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
    public int|null $um_extsursrc_disabled = 0 {
        get => $this->um_extsursrc_disabled;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_disabled', $value);
            $this->um_extsursrc_disabled = $value;
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
    public int|null $um_extsursrc_inactive = 0 {
        get => $this->um_extsursrc_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extsursrc_inactive', $value);
            $this->um_extsursrc_inactive = $value;
        }
    }
}
