<?php

namespace Numbers\Users\Users\Model\Credential\MyPassword;
class ValuesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Credential\MyPassword\Values::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_mypasswval_tenant_id','um_mypasswval_mypasswd_id','um_mypasswval_name'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_mypasswval_tenant_id = NULL {
                        get => $this->um_mypasswval_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_tenant_id', $value);
                            $this->um_mypasswval_tenant_id = $value;
                        }
                    }

    /**
     * Password #
     *
     *
     *
     * {domain{password_id}}
     *
     * @var int|null Domain: password_id Type: bigint
     */
    public int|null $um_mypasswval_mypasswd_id = NULL {
                        get => $this->um_mypasswval_mypasswd_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_mypasswd_id', $value);
                            $this->um_mypasswval_mypasswd_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $um_mypasswval_timestamp = 'now()' {
                        get => $this->um_mypasswval_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_timestamp', $value);
                            $this->um_mypasswval_timestamp = $value;
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
    public string|null $um_mypasswval_name = null {
                        get => $this->um_mypasswval_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_name', $value);
                            $this->um_mypasswval_name = $value;
                        }
                    }

    /**
     * Password (Encrypted)
     *
     *
     *
     * {domain{encrypted_password}}
     *
     * @var string|null Domain: encrypted_password Type: bytea
     */
    public string|null $um_mypasswval_encrypted_password = null {
                        get => $this->um_mypasswval_encrypted_password;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_encrypted_password', $value);
                            $this->um_mypasswval_encrypted_password = $value;
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
    public int|null $um_mypasswval_inactive = 0 {
                        get => $this->um_mypasswval_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_mypasswval_inactive', $value);
                            $this->um_mypasswval_inactive = $value;
                        }
                    }
}
