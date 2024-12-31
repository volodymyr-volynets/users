<?php

namespace Numbers\Users\Organizations\Model;
class CustomersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Customers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_customer_tenant_id','on_customer_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_customer_tenant_id = NULL {
                        get => $this->on_customer_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_tenant_id', $value);
                            $this->on_customer_tenant_id = $value;
                        }
                    }

    /**
     * Customer #
     *
     *
     *
     * {domain{customer_id_sequence}}
     *
     * @var int|null Domain: customer_id_sequence Type: bigserial
     */
    public int|null $on_customer_id = null {
                        get => $this->on_customer_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_id', $value);
                            $this->on_customer_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $on_customer_code = null {
                        get => $this->on_customer_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_code', $value);
                            $this->on_customer_code = $value;
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
    public string|null $on_customer_name = null {
                        get => $this->on_customer_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_name', $value);
                            $this->on_customer_name = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $on_customer_icon = null {
                        get => $this->on_customer_icon;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_icon', $value);
                            $this->on_customer_icon = $value;
                        }
                    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $on_customer_organization_id = NULL {
                        get => $this->on_customer_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_organization_id', $value);
                            $this->on_customer_organization_id = $value;
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
    public string|null $on_customer_email = null {
                        get => $this->on_customer_email;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_email', $value);
                            $this->on_customer_email = $value;
                        }
                    }

    /**
     * Secondary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $on_customer_email2 = null {
                        get => $this->on_customer_email2;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_email2', $value);
                            $this->on_customer_email2 = $value;
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
    public string|null $on_customer_phone = null {
                        get => $this->on_customer_phone;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_phone', $value);
                            $this->on_customer_phone = $value;
                        }
                    }

    /**
     * Secondary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_customer_phone2 = null {
                        get => $this->on_customer_phone2;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_phone2', $value);
                            $this->on_customer_phone2 = $value;
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
    public string|null $on_customer_cell = null {
                        get => $this->on_customer_cell;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_cell', $value);
                            $this->on_customer_cell = $value;
                        }
                    }

    /**
     * Fax
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_customer_fax = null {
                        get => $this->on_customer_fax;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_fax', $value);
                            $this->on_customer_fax = $value;
                        }
                    }

    /**
     * Alternative Contact
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $on_customer_alternative_contact = null {
                        get => $this->on_customer_alternative_contact;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_alternative_contact', $value);
                            $this->on_customer_alternative_contact = $value;
                        }
                    }

    /**
     * Logo File #
     *
     *
     *
     * {domain{file_id}}
     *
     * @var int|null Domain: file_id Type: bigint
     */
    public int|null $on_customer_logo_file_id = NULL {
                        get => $this->on_customer_logo_file_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_logo_file_id', $value);
                            $this->on_customer_logo_file_id = $value;
                        }
                    }

    /**
     * About Nickname
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $on_customer_about_nickname = null {
                        get => $this->on_customer_about_nickname;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_about_nickname', $value);
                            $this->on_customer_about_nickname = $value;
                        }
                    }

    /**
     * About Description
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $on_customer_about_description = null {
                        get => $this->on_customer_about_description;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_about_description', $value);
                            $this->on_customer_about_description = $value;
                        }
                    }

    /**
     * Operating Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $on_customer_operating_country_code = null {
                        get => $this->on_customer_operating_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_operating_country_code', $value);
                            $this->on_customer_operating_country_code = $value;
                        }
                    }

    /**
     * Operating Province Code
     *
     *
     *
     * {domain{province_code}}
     *
     * @var string|null Domain: province_code Type: varchar
     */
    public string|null $on_customer_operating_province_code = null {
                        get => $this->on_customer_operating_province_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_operating_province_code', $value);
                            $this->on_customer_operating_province_code = $value;
                        }
                    }

    /**
     * Operating Currency Code
     *
     *
     *
     * {domain{currency_code}}
     *
     * @var string|null Domain: currency_code Type: char
     */
    public string|null $on_customer_operating_currency_code = null {
                        get => $this->on_customer_operating_currency_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_operating_currency_code', $value);
                            $this->on_customer_operating_currency_code = $value;
                        }
                    }

    /**
     * Operating Currency Type
     *
     *
     *
     * {domain{currency_type}}
     *
     * @var string|null Domain: currency_type Type: varchar
     */
    public string|null $on_customer_operating_currency_type = null {
                        get => $this->on_customer_operating_currency_type;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_operating_currency_type', $value);
                            $this->on_customer_operating_currency_type = $value;
                        }
                    }

    /**
     * Hold
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_customer_hold = 0 {
                        get => $this->on_customer_hold;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_hold', $value);
                            $this->on_customer_hold = $value;
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
    public int|null $on_customer_inactive = 0 {
                        get => $this->on_customer_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_inactive', $value);
                            $this->on_customer_inactive = $value;
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
    public string|null $on_customer_optimistic_lock = 'now()' {
                        get => $this->on_customer_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_optimistic_lock', $value);
                            $this->on_customer_optimistic_lock = $value;
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
    public string|null $on_customer_inserted_timestamp = null {
                        get => $this->on_customer_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_inserted_timestamp', $value);
                            $this->on_customer_inserted_timestamp = $value;
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
    public int|null $on_customer_inserted_user_id = NULL {
                        get => $this->on_customer_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_inserted_user_id', $value);
                            $this->on_customer_inserted_user_id = $value;
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
    public string|null $on_customer_updated_timestamp = null {
                        get => $this->on_customer_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_updated_timestamp', $value);
                            $this->on_customer_updated_timestamp = $value;
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
    public int|null $on_customer_updated_user_id = NULL {
                        get => $this->on_customer_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_customer_updated_user_id', $value);
                            $this->on_customer_updated_user_id = $value;
                        }
                    }
}
