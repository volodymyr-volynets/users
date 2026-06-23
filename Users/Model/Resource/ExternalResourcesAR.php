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

class ExternalResourcesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalResources::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extresrc_tenant_id','um_extresrc_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extresrc_tenant_id = null {
        get => $this->um_extresrc_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_tenant_id', $value);
            $this->um_extresrc_tenant_id = $value;
        }
    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id_sequence}}
     *
     * @var int|null Domain: resource_id_sequence Type: serial
     */
    public int|null $um_extresrc_id = null {
        get => $this->um_extresrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_id', $value);
            $this->um_extresrc_id = $value;
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
    public string|null $um_extresrc_code = null {
        get => $this->um_extresrc_code;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_code', $value);
            $this->um_extresrc_code = $value;
        }
    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Backend\System\Modules\Model\Resource\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_extresrc_type = null {
        get => $this->um_extresrc_type;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_type', $value);
            $this->um_extresrc_type = $value;
        }
    }

    /**
     * Classification
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_extresrc_classification = null {
        get => $this->um_extresrc_classification;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_classification', $value);
            $this->um_extresrc_classification = $value;
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
    public string|null $um_extresrc_name = null {
        get => $this->um_extresrc_name;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_name', $value);
            $this->um_extresrc_name = $value;
        }
    }

    /**
     * Description
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $um_extresrc_description = null {
        get => $this->um_extresrc_description;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_description', $value);
            $this->um_extresrc_description = $value;
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
    public string|null $um_extresrc_icon = null {
        get => $this->um_extresrc_icon;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_icon', $value);
            $this->um_extresrc_icon = $value;
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
    public string|null $um_extresrc_um_extmdl_code = null {
        get => $this->um_extresrc_um_extmdl_code;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_um_extmdl_code', $value);
            $this->um_extresrc_um_extmdl_code = $value;
        }
    }

    /**
     * Groups
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $um_extresrc_groups = null {
        get => $this->um_extresrc_groups;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_groups', $value);
            $this->um_extresrc_groups = $value;
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
    public string|null $um_extresrc_slug = null {
        get => $this->um_extresrc_slug;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_slug', $value);
            $this->um_extresrc_slug = $value;
        }
    }

    /**
     * Acl Public
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extresrc_acl_public = 0 {
        get => $this->um_extresrc_acl_public;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_acl_public', $value);
            $this->um_extresrc_acl_public = $value;
        }
    }

    /**
     * Acl Authorized
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extresrc_acl_authorized = 0 {
        get => $this->um_extresrc_acl_authorized;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_acl_authorized', $value);
            $this->um_extresrc_acl_authorized = $value;
        }
    }

    /**
     * Acl Permission
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extresrc_acl_permission = 0 {
        get => $this->um_extresrc_acl_permission;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_acl_permission', $value);
            $this->um_extresrc_acl_permission = $value;
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
    public int|null $um_extresrc_weight_enabled = 0 {
        get => $this->um_extresrc_weight_enabled;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_weight_enabled', $value);
            $this->um_extresrc_weight_enabled = $value;
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
    public int|null $um_extresrc_weight_value = null {
        get => $this->um_extresrc_weight_value;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_weight_value', $value);
            $this->um_extresrc_weight_value = $value;
        }
    }

    /**
     * Menu URL
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_extresrc_menu_url = null {
        get => $this->um_extresrc_menu_url;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_menu_url', $value);
            $this->um_extresrc_menu_url = $value;
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
    public int|null $um_extresrc_inactive = 0 {
        get => $this->um_extresrc_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extresrc_inactive', $value);
            $this->um_extresrc_inactive = $value;
        }
    }
}
