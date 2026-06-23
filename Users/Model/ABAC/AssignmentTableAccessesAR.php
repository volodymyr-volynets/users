<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\ABAC;

use Object\ActiveRecord;

class AssignmentTableAccessesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = AssignmentTableAccesses::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_abacasstblacc_tenant_id','um_abacasstblacc_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_abacasstblacc_tenant_id = null {
        get => $this->um_abacasstblacc_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_tenant_id', $value);
            $this->um_abacasstblacc_tenant_id = $value;
        }
    }

    /**
     * Record #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_abacasstblacc_id = null {
        get => $this->um_abacasstblacc_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_id', $value);
            $this->um_abacasstblacc_id = $value;
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
    public int|null $um_abacasstblacc_sm_model_id = null {
        get => $this->um_abacasstblacc_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_sm_model_id', $value);
            $this->um_abacasstblacc_sm_model_id = $value;
        }
    }

    /**
     * Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacasstblacc_sm_model_code = null {
        get => $this->um_abacasstblacc_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_sm_model_code', $value);
            $this->um_abacasstblacc_sm_model_code = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $um_abacasstblacc_module_code = null {
        get => $this->um_abacasstblacc_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_module_code', $value);
            $this->um_abacasstblacc_module_code = $value;
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
    public int|null $um_abacasstblacc_module_id = null {
        get => $this->um_abacasstblacc_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_module_id', $value);
            $this->um_abacasstblacc_module_id = $value;
        }
    }

    /**
     * Assignment Type
     *
     *
     * {options_model{\Numbers\Users\Users\Model\ABAC\AssignmentTypes}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_abacasstblacc_um_abacasigntype_code = null {
        get => $this->um_abacasstblacc_um_abacasigntype_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_um_abacasigntype_code', $value);
            $this->um_abacasstblacc_um_abacasigntype_code = $value;
        }
    }

    /**
     * Attribute Code
     *
     *
     * {options_model{\Numbers\Users\Users\Model\ABAC\AssignmentTableAttributes}}
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacasstblacc_um_abacasstblatr_code = null {
        get => $this->um_abacasstblacc_um_abacasstblatr_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_um_abacasstblatr_code', $value);
            $this->um_abacasstblacc_um_abacasstblatr_code = $value;
        }
    }

    /**
     * Assignment Permission
     *
     *
     * {options_model{\Numbers\Users\Users\Model\ABAC\AssignmentPermissions}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_abacasstblacc_um_abacasignperm_code = null {
        get => $this->um_abacasstblacc_um_abacasignperm_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_um_abacasignperm_code', $value);
            $this->um_abacasstblacc_um_abacasignperm_code = $value;
        }
    }

    /**
     * Default
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_abacasstblacc_default = 0 {
        get => $this->um_abacasstblacc_default;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_default', $value);
            $this->um_abacasstblacc_default = $value;
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
    public int|null $um_abacasstblacc_inactive = 0 {
        get => $this->um_abacasstblacc_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_inactive', $value);
            $this->um_abacasstblacc_inactive = $value;
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
    public string|null $um_abacasstblacc_inserted_timestamp = null {
        get => $this->um_abacasstblacc_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_inserted_timestamp', $value);
            $this->um_abacasstblacc_inserted_timestamp = $value;
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
    public int|null $um_abacasstblacc_inserted_user_id = null {
        get => $this->um_abacasstblacc_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_inserted_user_id', $value);
            $this->um_abacasstblacc_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_abacasstblacc_updated_timestamp = null {
        get => $this->um_abacasstblacc_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_updated_timestamp', $value);
            $this->um_abacasstblacc_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_abacasstblacc_updated_user_id = null {
        get => $this->um_abacasstblacc_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacasstblacc_updated_user_id', $value);
            $this->um_abacasstblacc_updated_user_id = $value;
        }
    }
}
