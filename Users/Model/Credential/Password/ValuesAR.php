<?php

namespace Numbers\Users\Users\Model\Credential\Password;
class ValuesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Credential\Password\Values::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_passwval_tenant_id','um_passwval_password_code','um_passwval_name'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_passwval_tenant_id = NULL {
                        get => $this->um_passwval_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_tenant_id', $value);
                            $this->um_passwval_tenant_id = $value;
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
    public string|null $um_passwval_password_code = null {
                        get => $this->um_passwval_password_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_password_code', $value);
                            $this->um_passwval_password_code = $value;
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
    public string|null $um_passwval_timestamp = 'now()' {
                        get => $this->um_passwval_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_timestamp', $value);
                            $this->um_passwval_timestamp = $value;
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
    public string|null $um_passwval_name = null {
                        get => $this->um_passwval_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_name', $value);
                            $this->um_passwval_name = $value;
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
    public string|null $um_passwval_encrypted_password = null {
                        get => $this->um_passwval_encrypted_password;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_encrypted_password', $value);
                            $this->um_passwval_encrypted_password = $value;
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
    public int|null $um_passwval_inactive = 0 {
                        get => $this->um_passwval_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_passwval_inactive', $value);
                            $this->um_passwval_inactive = $value;
                        }
                    }
}
