<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Backend\Dashboard;

use Object\ActiveRecord;

class ParametersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Parameters::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['d9_backdshpar_tenant_id','d9_backdshpar_d9_backdash_code','d9_backdshpar_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_backdshpar_tenant_id = null {
        get => $this->d9_backdshpar_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_tenant_id', $value);
            $this->d9_backdshpar_tenant_id = $value;
        }
    }

    /**
     * Dashboard Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $d9_backdshpar_d9_backdash_code = null {
        get => $this->d9_backdshpar_d9_backdash_code;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_d9_backdash_code', $value);
            $this->d9_backdshpar_d9_backdash_code = $value;
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
    public string|null $d9_backdshpar_code = null {
        get => $this->d9_backdshpar_code;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_code', $value);
            $this->d9_backdshpar_code = $value;
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
    public string|null $d9_backdshpar_name = null {
        get => $this->d9_backdshpar_name;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_name', $value);
            $this->d9_backdshpar_name = $value;
        }
    }

    /**
     * Field Type
     *
     *
     * {options_model{\Numbers\Backend\Db\Common\Model\Shareable\Types}}
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $d9_backdshpar_sm_sharetype_code = null {
        get => $this->d9_backdshpar_sm_sharetype_code;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_sm_sharetype_code', $value);
            $this->d9_backdshpar_sm_sharetype_code = $value;
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
    public string|null $d9_backdshpar_model = null {
        get => $this->d9_backdshpar_model;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_model', $value);
            $this->d9_backdshpar_model = $value;
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
    public int|null $d9_backdshpar_order = 0 {
        get => $this->d9_backdshpar_order;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_order', $value);
            $this->d9_backdshpar_order = $value;
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
    public int|null $d9_backdshpar_inactive = 0 {
        get => $this->d9_backdshpar_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_inactive', $value);
            $this->d9_backdshpar_inactive = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $d9_backdshpar_inserted_timestamp = null {
        get => $this->d9_backdshpar_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_inserted_timestamp', $value);
            $this->d9_backdshpar_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $d9_backdshpar_inserted_user_id = null {
        get => $this->d9_backdshpar_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_backdshpar_inserted_user_id', $value);
            $this->d9_backdshpar_inserted_user_id = $value;
        }
    }
}
