<?php

namespace Numbers\Users\Users\Model;
class UsersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Users::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_user_tenant_id','um_user_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_user_tenant_id = NULL {
                        get => $this->um_user_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_tenant_id', $value);
                            $this->um_user_tenant_id = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id_sequence}}
     *
     * @var int|null Domain: user_id_sequence Type: bigserial
     */
    public int|null $um_user_id = null {
                        get => $this->um_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_id', $value);
                            $this->um_user_id = $value;
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
    public string|null $um_user_code = null {
                        get => $this->um_user_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_code', $value);
                            $this->um_user_code = $value;
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
    public int|null $um_user_type_id = NULL {
                        get => $this->um_user_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_type_id', $value);
                            $this->um_user_type_id = $value;
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
    public string|null $um_user_name = null {
                        get => $this->um_user_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_name', $value);
                            $this->um_user_name = $value;
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
    public string|null $um_user_company = null {
                        get => $this->um_user_company;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_company', $value);
                            $this->um_user_company = $value;
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
    public string|null $um_user_title = null {
                        get => $this->um_user_title;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_title', $value);
                            $this->um_user_title = $value;
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
    public string|null $um_user_first_name = null {
                        get => $this->um_user_first_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_first_name', $value);
                            $this->um_user_first_name = $value;
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
    public string|null $um_user_last_name = null {
                        get => $this->um_user_last_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_last_name', $value);
                            $this->um_user_last_name = $value;
                        }
                    }

    /**
     * Primary Email (Generated)
     *
     * GENERABLE
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $um_user_email = null {
                        get => $this->um_user_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_email', $value);
                            $this->um_user_email = $value;
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
    public string|null $um_user_email2 = null {
                        get => $this->um_user_email2;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_email2', $value);
                            $this->um_user_email2 = $value;
                        }
                    }

    /**
     * Primary Phone (Generated)
     *
     * FORMATABLE
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $um_user_phone = null {
                        get => $this->um_user_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_phone', $value);
                            $this->um_user_phone = $value;
                        }
                    }

    /**
     * Primary Phone (Numeric)
     *
     *
     *
     * {domain{numeric_phone}}
     *
     * @var int|null Domain: numeric_phone Type: bigint
     */
    public int|null $um_user_numeric_phone = NULL {
                        get => $this->um_user_numeric_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_numeric_phone', $value);
                            $this->um_user_numeric_phone = $value;
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
    public string|null $um_user_phone2 = null {
                        get => $this->um_user_phone2;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_phone2', $value);
                            $this->um_user_phone2 = $value;
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
    public string|null $um_user_cell = null {
                        get => $this->um_user_cell;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_cell', $value);
                            $this->um_user_cell = $value;
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
    public string|null $um_user_fax = null {
                        get => $this->um_user_fax;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_fax', $value);
                            $this->um_user_fax = $value;
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
    public string|null $um_user_alternative_contact = null {
                        get => $this->um_user_alternative_contact;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_alternative_contact', $value);
                            $this->um_user_alternative_contact = $value;
                        }
                    }

    /**
     * Login Enabled (Generated)
     *
     * CASTABLE
     *
     *
     *
     * @var int|bool|null Type: boolean
     */
    public int|bool|null $um_user_login_enabled = 0 {
                        get => $this->um_user_login_enabled;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_login_enabled', $value);
                            $this->um_user_login_enabled = $value;
                        }
                    }

    /**
     * Username (Generated)
     *
     * READ_IF_SET
     *
     * {domain{login}}
     *
     * @var string|null Domain: login Type: varchar
     */
    public string|null $um_user_login_username = null {
                        get => $this->um_user_login_username;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_login_username', $value);
                            $this->um_user_login_username = $value;
                        }
                    }

    /**
     * Password (Generated)
     *
     * PASSWORDABLE
     *
     * {domain{password}}
     *
     * @var string|null Domain: password Type: text
     */
    public string|null $um_user_login_password = null {
                        get => $this->um_user_login_password;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_login_password', $value);
                            $this->um_user_login_password = $value;
                        }
                    }

    /**
     * Last Set (Generated)
     *
     * FORMATABLE
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $um_user_login_last_set = null {
                        get => $this->um_user_login_last_set;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_login_last_set', $value);
                            $this->um_user_login_last_set = $value;
                        }
                    }

    /**
     * Photo File #
     *
     *
     *
     * {domain{file_id}}
     *
     * @var int|null Domain: file_id Type: bigint
     */
    public int|null $um_user_photo_file_id = NULL {
                        get => $this->um_user_photo_file_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_photo_file_id', $value);
                            $this->um_user_photo_file_id = $value;
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
    public string|null $um_user_about_nickname = null {
                        get => $this->um_user_about_nickname;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_about_nickname', $value);
                            $this->um_user_about_nickname = $value;
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
    public string|null $um_user_about_description = null {
                        get => $this->um_user_about_description;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_about_description', $value);
                            $this->um_user_about_description = $value;
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
    public string|null $um_user_operating_country_code = null {
                        get => $this->um_user_operating_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_operating_country_code', $value);
                            $this->um_user_operating_country_code = $value;
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
    public string|null $um_user_operating_province_code = null {
                        get => $this->um_user_operating_province_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_operating_province_code', $value);
                            $this->um_user_operating_province_code = $value;
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
    public string|null $um_user_operating_currency_code = null {
                        get => $this->um_user_operating_currency_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_operating_currency_code', $value);
                            $this->um_user_operating_currency_code = $value;
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
    public string|null $um_user_operating_currency_type = null {
                        get => $this->um_user_operating_currency_type;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_operating_currency_type', $value);
                            $this->um_user_operating_currency_type = $value;
                        }
                    }

    /**
     * Channel
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_user_channel = null {
                        get => $this->um_user_channel;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_channel', $value);
                            $this->um_user_channel = $value;
                        }
                    }

    /**
     * Send Emails
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_user_send_emails = 1 {
                        get => $this->um_user_send_emails;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_send_emails', $value);
                            $this->um_user_send_emails = $value;
                        }
                    }

    /**
     * Send SMS
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_user_send_sms = 0 {
                        get => $this->um_user_send_sms;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_send_sms', $value);
                            $this->um_user_send_sms = $value;
                        }
                    }

    /**
     * Send Postal Mail
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_user_send_postal = 0 {
                        get => $this->um_user_send_postal;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_send_postal', $value);
                            $this->um_user_send_postal = $value;
                        }
                    }

    /**
     * Email Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_user_email_confirmed = 0 {
                        get => $this->um_user_email_confirmed;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_email_confirmed', $value);
                            $this->um_user_email_confirmed = $value;
                        }
                    }

    /**
     * Phone Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_user_phone_confirmed = 0 {
                        get => $this->um_user_phone_confirmed;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_phone_confirmed', $value);
                            $this->um_user_phone_confirmed = $value;
                        }
                    }

    /**
     * Hold (Generated)
     *
     * CASTABLE
     *
     *
     *
     * @var int|bool|null Type: boolean
     */
    public int|bool|null $um_user_hold = 0 {
                        get => $this->um_user_hold;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_hold', $value);
                            $this->um_user_hold = $value;
                        }
                    }

    /**
     * Inactive (Generated)
     *
     * CASTABLE
     *
     *
     *
     * @var int|bool|null Type: boolean
     */
    public int|bool|null $um_user_inactive = 0 {
                        get => $this->um_user_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_inactive', $value);
                            $this->um_user_inactive = $value;
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
    public string|null $um_user_optimistic_lock = 'now()' {
                        get => $this->um_user_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_optimistic_lock', $value);
                            $this->um_user_optimistic_lock = $value;
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
    public string|null $um_user_inserted_timestamp = null {
                        get => $this->um_user_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_inserted_timestamp', $value);
                            $this->um_user_inserted_timestamp = $value;
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
    public int|null $um_user_inserted_user_id = NULL {
                        get => $this->um_user_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_inserted_user_id', $value);
                            $this->um_user_inserted_user_id = $value;
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
    public string|null $um_user_updated_timestamp = null {
                        get => $this->um_user_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_updated_timestamp', $value);
                            $this->um_user_updated_timestamp = $value;
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
    public int|null $um_user_updated_user_id = NULL {
                        get => $this->um_user_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_user_updated_user_id', $value);
                            $this->um_user_updated_user_id = $value;
                        }
                    }

    /**
     * (Generated) (Non Database)
     *
     * GENERABLE, READ_ONLY
     *
     * @var mixed
     */
    public $um_user_name_assembled = null;
}
