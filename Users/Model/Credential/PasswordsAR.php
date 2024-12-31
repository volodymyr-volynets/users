<?php

namespace Numbers\Users\Users\Model\Credential;
class PasswordsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Credential\Passwords::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_password_tenant_id','um_password_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_password_tenant_id = NULL {
                        get => $this->um_password_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_tenant_id', $value);
                            $this->um_password_tenant_id = $value;
                        }
                    }

    /**
     * Password Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_password_code = null {
                        get => $this->um_password_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_code', $value);
                            $this->um_password_code = $value;
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
    public string|null $um_password_name = null {
                        get => $this->um_password_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_name', $value);
                            $this->um_password_name = $value;
                        }
                    }

    /**
     * Value Counter
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $um_password_value_counter = 0 {
                        get => $this->um_password_value_counter;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_value_counter', $value);
                            $this->um_password_value_counter = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_password_passtype_code = null {
                        get => $this->um_password_passtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_passtype_code', $value);
                            $this->um_password_passtype_code = $value;
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
    public int|null $um_password_inactive = 0 {
                        get => $this->um_password_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_inactive', $value);
                            $this->um_password_inactive = $value;
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
    public string|null $um_password_optimistic_lock = 'now()' {
                        get => $this->um_password_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_optimistic_lock', $value);
                            $this->um_password_optimistic_lock = $value;
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
    public string|null $um_password_inserted_timestamp = null {
                        get => $this->um_password_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_inserted_timestamp', $value);
                            $this->um_password_inserted_timestamp = $value;
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
    public int|null $um_password_inserted_user_id = NULL {
                        get => $this->um_password_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_inserted_user_id', $value);
                            $this->um_password_inserted_user_id = $value;
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
    public string|null $um_password_updated_timestamp = null {
                        get => $this->um_password_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_updated_timestamp', $value);
                            $this->um_password_updated_timestamp = $value;
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
    public int|null $um_password_updated_user_id = NULL {
                        get => $this->um_password_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_password_updated_user_id', $value);
                            $this->um_password_updated_user_id = $value;
                        }
                    }
}
