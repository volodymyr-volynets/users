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

class ExternalActionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ExternalActions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_extactn_tenant_id','um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_extactn_tenant_id = null {
        get => $this->um_extactn_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_tenant_id', $value);
            $this->um_extactn_tenant_id = $value;
        }
    }

    /**
     * Action #
     *
     *
     *
     * {domain{action_id_sequence}}
     *
     * @var int|null Domain: action_id_sequence Type: smallserial
     */
    public int|null $um_extactn_id = null {
        get => $this->um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_id', $value);
            $this->um_extactn_id = $value;
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
    public string|null $um_extactn_code = null {
        get => $this->um_extactn_code;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_code', $value);
            $this->um_extactn_code = $value;
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
    public string|null $um_extactn_name = null {
        get => $this->um_extactn_name;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_name', $value);
            $this->um_extactn_name = $value;
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
    public string|null $um_extactn_icon = null {
        get => $this->um_extactn_icon;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_icon', $value);
            $this->um_extactn_icon = $value;
        }
    }

    /**
     * Parent #
     *
     *
     *
     * {domain{action_id}}
     *
     * @var int|null Domain: action_id Type: smallint
     */
    public int|null $um_extactn_parent_um_extactn_id = 0 {
        get => $this->um_extactn_parent_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_parent_um_extactn_id', $value);
            $this->um_extactn_parent_um_extactn_id = $value;
        }
    }

    /**
     * Prohibitive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_extactn_prohibitive = 0 {
        get => $this->um_extactn_prohibitive;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_prohibitive', $value);
            $this->um_extactn_prohibitive = $value;
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
    public int|null $um_extactn_order = 10000 {
        get => $this->um_extactn_order;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_order', $value);
            $this->um_extactn_order = $value;
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
    public int|null $um_extactn_inactive = 0 {
        get => $this->um_extactn_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_extactn_inactive', $value);
            $this->um_extactn_inactive = $value;
        }
    }
}
