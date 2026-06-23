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

class ExternalModulesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalModules::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extmdl_tenant_id','um_extmdl_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extmdl_tenant_id = null {
        get => $this->um_extmdl_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_tenant_id', $value);
            $this->um_extmdl_tenant_id = $value;
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
    public string|null $um_extmdl_code = null {
        get => $this->um_extmdl_code;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_code', $value);
            $this->um_extmdl_code = $value;
        }
    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Backend\System\Modules\Model\Module\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_extmdl_type = null {
        get => $this->um_extmdl_type;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_type', $value);
            $this->um_extmdl_type = $value;
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
    public string|null $um_extmdl_name = null {
        get => $this->um_extmdl_name;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_name', $value);
            $this->um_extmdl_name = $value;
        }
    }

    /**
     * Abbreviation
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_extmdl_abbreviation = null {
        get => $this->um_extmdl_abbreviation;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_abbreviation', $value);
            $this->um_extmdl_abbreviation = $value;
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
    public string|null $um_extmdl_icon = null {
        get => $this->um_extmdl_icon;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_icon', $value);
            $this->um_extmdl_icon = $value;
        }
    }

    /**
     * Transactions
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extmdl_transactions = 0 {
        get => $this->um_extmdl_transactions;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_transactions', $value);
            $this->um_extmdl_transactions = $value;
        }
    }

    /**
     * Multiple
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extmdl_multiple = 0 {
        get => $this->um_extmdl_multiple;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_multiple', $value);
            $this->um_extmdl_multiple = $value;
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
    public string|null $um_extmdl_slug = null {
        get => $this->um_extmdl_slug;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_slug', $value);
            $this->um_extmdl_slug = $value;
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
    public int|null $um_extmdl_inactive = 0 {
        get => $this->um_extmdl_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extmdl_inactive', $value);
            $this->um_extmdl_inactive = $value;
        }
    }
}
