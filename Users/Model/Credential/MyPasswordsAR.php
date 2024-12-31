<?php

namespace Numbers\Users\Users\Model\Credential;
class MyPasswordsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Credential\MyPasswords::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_mypasswd_tenant_id','um_mypasswd_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_mypasswd_tenant_id = NULL {
                        get => $this->um_mypasswd_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_tenant_id', $value);
                            $this->um_mypasswd_tenant_id = $value;
                        }
                    }

    /**
     * Password #
     *
     *
     *
     * {domain{password_id_sequence}}
     *
     * @var int|null Domain: password_id_sequence Type: bigserial
     */
    public int|null $um_mypasswd_id = null {
                        get => $this->um_mypasswd_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_id', $value);
                            $this->um_mypasswd_id = $value;
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
    public string|null $um_mypasswd_name = null {
                        get => $this->um_mypasswd_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_name', $value);
                            $this->um_mypasswd_name = $value;
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
    public int|null $um_mypasswd_value_counter = 0 {
                        get => $this->um_mypasswd_value_counter;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_value_counter', $value);
                            $this->um_mypasswd_value_counter = $value;
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
    public string|null $um_mypasswd_passtype_code = null {
                        get => $this->um_mypasswd_passtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_passtype_code', $value);
                            $this->um_mypasswd_passtype_code = $value;
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
    public int|null $um_mypasswd_inactive = 0 {
                        get => $this->um_mypasswd_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_inactive', $value);
                            $this->um_mypasswd_inactive = $value;
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
    public string|null $um_mypasswd_optimistic_lock = 'now()' {
                        get => $this->um_mypasswd_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_optimistic_lock', $value);
                            $this->um_mypasswd_optimistic_lock = $value;
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
    public string|null $um_mypasswd_inserted_timestamp = null {
                        get => $this->um_mypasswd_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_inserted_timestamp', $value);
                            $this->um_mypasswd_inserted_timestamp = $value;
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
    public int|null $um_mypasswd_inserted_user_id = NULL {
                        get => $this->um_mypasswd_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_inserted_user_id', $value);
                            $this->um_mypasswd_inserted_user_id = $value;
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
    public string|null $um_mypasswd_updated_timestamp = null {
                        get => $this->um_mypasswd_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_updated_timestamp', $value);
                            $this->um_mypasswd_updated_timestamp = $value;
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
    public int|null $um_mypasswd_updated_user_id = NULL {
                        get => $this->um_mypasswd_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswd_updated_user_id', $value);
                            $this->um_mypasswd_updated_user_id = $value;
                        }
                    }
}
