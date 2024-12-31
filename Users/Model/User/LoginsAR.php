<?php

namespace Numbers\Users\Users\Model\User;
class LoginsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Logins::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrlogin_tenant_id','um_usrlogin_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrlogin_tenant_id = NULL {
                        get => $this->um_usrlogin_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_tenant_id', $value);
                            $this->um_usrlogin_tenant_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_usrlogin_id = null {
                        get => $this->um_usrlogin_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_id', $value);
                            $this->um_usrlogin_id = $value;
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
    public string|null $um_usrlogin_timestamp = 'now()' {
                        get => $this->um_usrlogin_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_timestamp', $value);
                            $this->um_usrlogin_timestamp = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrlogin_user_id = NULL {
                        get => $this->um_usrlogin_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_user_id', $value);
                            $this->um_usrlogin_user_id = $value;
                        }
                    }

    /**
     * IP Address
     *
     *
     *
     * {domain{ip}}
     *
     * @var string|null Domain: ip Type: varchar
     */
    public string|null $um_usrlogin_ip_address = null {
                        get => $this->um_usrlogin_ip_address;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_ip_address', $value);
                            $this->um_usrlogin_ip_address = $value;
                        }
                    }

    /**
     * IP Description
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_usrlogin_ip_description = null {
                        get => $this->um_usrlogin_ip_description;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_ip_description', $value);
                            $this->um_usrlogin_ip_description = $value;
                        }
                    }

    /**
     * IP Provider
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_usrlogin_ip_provider = null {
                        get => $this->um_usrlogin_ip_provider;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_ip_provider', $value);
                            $this->um_usrlogin_ip_provider = $value;
                        }
                    }

    /**
     * Authorization Type
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_usrlogin_authorization_type = null {
                        get => $this->um_usrlogin_authorization_type;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_authorization_type', $value);
                            $this->um_usrlogin_authorization_type = $value;
                        }
                    }

    /**
     * IP New
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrlogin_ip_new = 0 {
                        get => $this->um_usrlogin_ip_new;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_ip_new', $value);
                            $this->um_usrlogin_ip_new = $value;
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
    public int|null $um_usrlogin_inactive = 0 {
                        get => $this->um_usrlogin_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlogin_inactive', $value);
                            $this->um_usrlogin_inactive = $value;
                        }
                    }
}
