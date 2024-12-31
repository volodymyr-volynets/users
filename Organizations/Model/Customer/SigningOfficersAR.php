<?php

namespace Numbers\Users\Organizations\Model\Customer;
class SigningOfficersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Customer\SigningOfficers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_custsignofficer_tenant_id','on_custsignofficer_customer_id','on_custsignofficer_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_custsignofficer_tenant_id = NULL {
                        get => $this->on_custsignofficer_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_tenant_id', $value);
                            $this->on_custsignofficer_tenant_id = $value;
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
    public string|null $on_custsignofficer_timestamp = 'now()' {
                        get => $this->on_custsignofficer_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_timestamp', $value);
                            $this->on_custsignofficer_timestamp = $value;
                        }
                    }

    /**
     * Customer #
     *
     *
     *
     * {domain{customer_id}}
     *
     * @var int|null Domain: customer_id Type: bigint
     */
    public int|null $on_custsignofficer_customer_id = NULL {
                        get => $this->on_custsignofficer_customer_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_customer_id', $value);
                            $this->on_custsignofficer_customer_id = $value;
                        }
                    }

    /**
     * Detail #
     *
     *
     *
     * {domain{detail_id}}
     *
     * @var int|null Domain: detail_id Type: integer
     */
    public int|null $on_custsignofficer_id = NULL {
                        get => $this->on_custsignofficer_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_id', $value);
                            $this->on_custsignofficer_id = $value;
                        }
                    }

    /**
     * Signing Type
     *
     *
     * {options_model{Numbers\Users\Organizations\Model\Customer\SigningTypes}}
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_custsignofficer_custsigntype_code = null {
                        get => $this->on_custsignofficer_custsigntype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_custsigntype_code', $value);
                            $this->on_custsignofficer_custsigntype_code = $value;
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
    public int|null $on_custsignofficer_um_user_id = NULL {
                        get => $this->on_custsignofficer_um_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_um_user_id', $value);
                            $this->on_custsignofficer_um_user_id = $value;
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
    public string|null $on_custsignofficer_name = null {
                        get => $this->on_custsignofficer_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_name', $value);
                            $this->on_custsignofficer_name = $value;
                        }
                    }

    /**
     * Title
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $on_custsignofficer_title = null {
                        get => $this->on_custsignofficer_title;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_title', $value);
                            $this->on_custsignofficer_title = $value;
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
    public string|null $on_custsignofficer_email = null {
                        get => $this->on_custsignofficer_email;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_email', $value);
                            $this->on_custsignofficer_email = $value;
                        }
                    }

    /**
     * Cell Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_custsignofficer_cell = null {
                        get => $this->on_custsignofficer_cell;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_cell', $value);
                            $this->on_custsignofficer_cell = $value;
                        }
                    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_custsignofficer_primary = 0 {
                        get => $this->on_custsignofficer_primary;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_primary', $value);
                            $this->on_custsignofficer_primary = $value;
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
    public int|null $on_custsignofficer_inactive = 0 {
                        get => $this->on_custsignofficer_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_custsignofficer_inactive', $value);
                            $this->on_custsignofficer_inactive = $value;
                        }
                    }
}
