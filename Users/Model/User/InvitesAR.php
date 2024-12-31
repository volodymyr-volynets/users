<?php

namespace Numbers\Users\Users\Model\User;
class InvitesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Invites::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrinv_tenant_id','um_usrinv_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrinv_tenant_id = NULL {
                        get => $this->um_usrinv_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_tenant_id', $value);
                            $this->um_usrinv_tenant_id = $value;
                        }
                    }

    /**
     * Invite #
     *
     *
     *
     * {domain{invite_id_sequence}}
     *
     * @var int|null Domain: invite_id_sequence Type: bigserial
     */
    public int|null $um_usrinv_id = null {
                        get => $this->um_usrinv_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_id', $value);
                            $this->um_usrinv_id = $value;
                        }
                    }

    /**
     * User Number
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrinv_code = null {
                        get => $this->um_usrinv_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_code', $value);
                            $this->um_usrinv_code = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{Numbers\Users\Users\Model\User\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_usrinv_type_id = NULL {
                        get => $this->um_usrinv_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_type_id', $value);
                            $this->um_usrinv_type_id = $value;
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
    public string|null $um_usrinv_name = null {
                        get => $this->um_usrinv_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_name', $value);
                            $this->um_usrinv_name = $value;
                        }
                    }

    /**
     * Company
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_usrinv_company = null {
                        get => $this->um_usrinv_company;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_company', $value);
                            $this->um_usrinv_company = $value;
                        }
                    }

    /**
     * Title
     *
     *
     *
     * {domain{personal_title}}
     *
     * @var string|null Domain: personal_title Type: varchar
     */
    public string|null $um_usrinv_title = null {
                        get => $this->um_usrinv_title;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_title', $value);
                            $this->um_usrinv_title = $value;
                        }
                    }

    /**
     * First Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $um_usrinv_first_name = null {
                        get => $this->um_usrinv_first_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_first_name', $value);
                            $this->um_usrinv_first_name = $value;
                        }
                    }

    /**
     * Last Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $um_usrinv_last_name = null {
                        get => $this->um_usrinv_last_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_last_name', $value);
                            $this->um_usrinv_last_name = $value;
                        }
                    }

    /**
     * Primary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $um_usrinv_email = null {
                        get => $this->um_usrinv_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_email', $value);
                            $this->um_usrinv_email = $value;
                        }
                    }

    /**
     * Primary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $um_usrinv_phone = null {
                        get => $this->um_usrinv_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_phone', $value);
                            $this->um_usrinv_phone = $value;
                        }
                    }

    /**
     * Invite Message
     *
     *
     *
     * {domain{message}}
     *
     * @var string|null Domain: message Type: text
     */
    public string|null $um_usrinv_invite_message = null {
                        get => $this->um_usrinv_invite_message;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_invite_message', $value);
                            $this->um_usrinv_invite_message = $value;
                        }
                    }

    /**
     * Created User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrinv_created_user_id = NULL {
                        get => $this->um_usrinv_created_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_created_user_id', $value);
                            $this->um_usrinv_created_user_id = $value;
                        }
                    }

    /**
     * Referral User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrinv_referral_user_id = NULL {
                        get => $this->um_usrinv_referral_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_referral_user_id', $value);
                            $this->um_usrinv_referral_user_id = $value;
                        }
                    }

    /**
     * Assignment Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $um_usrinv_assignusrtype_code = null {
                        get => $this->um_usrinv_assignusrtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_assignusrtype_code', $value);
                            $this->um_usrinv_assignusrtype_code = $value;
                        }
                    }

    /**
     * Other Params
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $um_usrinv_other_json_params = null {
                        get => $this->um_usrinv_other_json_params;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_other_json_params', $value);
                            $this->um_usrinv_other_json_params = $value;
                        }
                    }

    /**
     * Require Address
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrinv_require_address = 0 {
                        get => $this->um_usrinv_require_address;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_require_address', $value);
                            $this->um_usrinv_require_address = $value;
                        }
                    }

    /**
     * Require Assignment
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrinv_require_assignment = 0 {
                        get => $this->um_usrinv_require_assignment;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_require_assignment', $value);
                            $this->um_usrinv_require_assignment = $value;
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
    public int|null $um_usrinv_inactive = 0 {
                        get => $this->um_usrinv_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_inactive', $value);
                            $this->um_usrinv_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $um_usrinv_optimistic_lock = 'now()' {
                        get => $this->um_usrinv_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_optimistic_lock', $value);
                            $this->um_usrinv_optimistic_lock = $value;
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
    public string|null $um_usrinv_inserted_timestamp = null {
                        get => $this->um_usrinv_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_inserted_timestamp', $value);
                            $this->um_usrinv_inserted_timestamp = $value;
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
    public int|null $um_usrinv_inserted_user_id = NULL {
                        get => $this->um_usrinv_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_inserted_user_id', $value);
                            $this->um_usrinv_inserted_user_id = $value;
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
    public string|null $um_usrinv_updated_timestamp = null {
                        get => $this->um_usrinv_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_updated_timestamp', $value);
                            $this->um_usrinv_updated_timestamp = $value;
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
    public int|null $um_usrinv_updated_user_id = NULL {
                        get => $this->um_usrinv_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrinv_updated_user_id', $value);
                            $this->um_usrinv_updated_user_id = $value;
                        }
                    }
}
