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

class AssignmentRecordsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = AssignmentRecords::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_abacassign_tenant_id','um_abacassign_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_abacassign_tenant_id = null {
        get => $this->um_abacassign_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_tenant_id', $value);
            $this->um_abacassign_tenant_id = $value;
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
    public int|null $um_abacassign_id = null {
        get => $this->um_abacassign_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_id', $value);
            $this->um_abacassign_id = $value;
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
    public string|null $um_abacassign_um_abacasigntype_code = null {
        get => $this->um_abacassign_um_abacasigntype_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_um_abacasigntype_code', $value);
            $this->um_abacassign_um_abacasigntype_code = $value;
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
    public string|null $um_abacassign_um_abacasignperm_code = null {
        get => $this->um_abacassign_um_abacasignperm_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_um_abacasignperm_code', $value);
            $this->um_abacassign_um_abacasignperm_code = $value;
        }
    }

    /**
     * Record Model #
     *
     *
     *
     * {domain{model_id}}
     *
     * @var int|null Domain: model_id Type: integer
     */
    public int|null $um_abacassign_record_sm_model_id = null {
        get => $this->um_abacassign_record_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_sm_model_id', $value);
            $this->um_abacassign_record_sm_model_id = $value;
        }
    }

    /**
     * Record Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_record_sm_model_code = null {
        get => $this->um_abacassign_record_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_sm_model_code', $value);
            $this->um_abacassign_record_sm_model_code = $value;
        }
    }

    /**
     * Record Field Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_record_field_code = null {
        get => $this->um_abacassign_record_field_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_field_code', $value);
            $this->um_abacassign_record_field_code = $value;
        }
    }

    /**
     * Record Field Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_abacassign_record_field_name = null {
        get => $this->um_abacassign_record_field_name;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_field_name', $value);
            $this->um_abacassign_record_field_name = $value;
        }
    }

    /**
     * Record Field Value #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_abacassign_record_value_id = null {
        get => $this->um_abacassign_record_value_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_value_id', $value);
            $this->um_abacassign_record_value_id = $value;
        }
    }

    /**
     * Record Field Value Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_record_value_code = null {
        get => $this->um_abacassign_record_value_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_value_code', $value);
            $this->um_abacassign_record_value_code = $value;
        }
    }

    /**
     * Record Field Value Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_abacassign_record_value_name = null {
        get => $this->um_abacassign_record_value_name;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_value_name', $value);
            $this->um_abacassign_record_value_name = $value;
        }
    }

    /**
     * Record Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_abacassign_record_module_id = null {
        get => $this->um_abacassign_record_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_record_module_id', $value);
            $this->um_abacassign_record_module_id = $value;
        }
    }

    /**
     * Attribute Model #
     *
     *
     *
     * {domain{model_id}}
     *
     * @var int|null Domain: model_id Type: integer
     */
    public int|null $um_abacassign_attribute_sm_model_id = null {
        get => $this->um_abacassign_attribute_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_sm_model_id', $value);
            $this->um_abacassign_attribute_sm_model_id = $value;
        }
    }

    /**
     * Attribute Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_attribute_sm_model_code = null {
        get => $this->um_abacassign_attribute_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_sm_model_code', $value);
            $this->um_abacassign_attribute_sm_model_code = $value;
        }
    }

    /**
     * Attribute Field Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_attribute_field_code = null {
        get => $this->um_abacassign_attribute_field_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_field_code', $value);
            $this->um_abacassign_attribute_field_code = $value;
        }
    }

    /**
     * Attribute Field Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_abacassign_attribute_field_name = null {
        get => $this->um_abacassign_attribute_field_name;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_field_name', $value);
            $this->um_abacassign_attribute_field_name = $value;
        }
    }

    /**
     * Attribute Field Value #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_abacassign_attribute_value_id = null {
        get => $this->um_abacassign_attribute_value_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_value_id', $value);
            $this->um_abacassign_attribute_value_id = $value;
        }
    }

    /**
     * Attribute Field Value Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_abacassign_attribute_value_code = null {
        get => $this->um_abacassign_attribute_value_code;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_value_code', $value);
            $this->um_abacassign_attribute_value_code = $value;
        }
    }

    /**
     * Attribute Field Value Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_abacassign_attribute_value_name = null {
        get => $this->um_abacassign_attribute_value_name;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_value_name', $value);
            $this->um_abacassign_attribute_value_name = $value;
        }
    }

    /**
     * Attribute Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_abacassign_attribute_module_id = null {
        get => $this->um_abacassign_attribute_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_attribute_module_id', $value);
            $this->um_abacassign_attribute_module_id = $value;
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
    public int|null $um_abacassign_inactive = 0 {
        get => $this->um_abacassign_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_inactive', $value);
            $this->um_abacassign_inactive = $value;
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
    public string|null $um_abacassign_inserted_timestamp = null {
        get => $this->um_abacassign_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_inserted_timestamp', $value);
            $this->um_abacassign_inserted_timestamp = $value;
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
    public int|null $um_abacassign_inserted_user_id = null {
        get => $this->um_abacassign_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_inserted_user_id', $value);
            $this->um_abacassign_inserted_user_id = $value;
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
    public string|null $um_abacassign_updated_timestamp = null {
        get => $this->um_abacassign_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_updated_timestamp', $value);
            $this->um_abacassign_updated_timestamp = $value;
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
    public int|null $um_abacassign_updated_user_id = null {
        get => $this->um_abacassign_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_abacassign_updated_user_id', $value);
            $this->um_abacassign_updated_user_id = $value;
        }
    }
}
