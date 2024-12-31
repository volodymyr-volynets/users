<?php

namespace Numbers\Users\Organizations\Model;
class LocationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Locations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_location_tenant_id','on_location_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_location_tenant_id = NULL {
                        get => $this->on_location_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_tenant_id', $value);
                            $this->on_location_tenant_id = $value;
                        }
                    }

    /**
     * Location #
     *
     *
     *
     * {domain{location_id_sequence}}
     *
     * @var int|null Domain: location_id_sequence Type: serial
     */
    public int|null $on_location_id = null {
                        get => $this->on_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_id', $value);
                            $this->on_location_id = $value;
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
    public string|null $on_location_code = null {
                        get => $this->on_location_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_code', $value);
                            $this->on_location_code = $value;
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
    public string|null $on_location_name = null {
                        get => $this->on_location_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_name', $value);
                            $this->on_location_name = $value;
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
    public string|null $on_location_icon = null {
                        get => $this->on_location_icon;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_icon', $value);
                            $this->on_location_icon = $value;
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
    public string|null $on_location_email = null {
                        get => $this->on_location_email;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_email', $value);
                            $this->on_location_email = $value;
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
    public string|null $on_location_email2 = null {
                        get => $this->on_location_email2;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_email2', $value);
                            $this->on_location_email2 = $value;
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
    public string|null $on_location_phone = null {
                        get => $this->on_location_phone;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_phone', $value);
                            $this->on_location_phone = $value;
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
    public string|null $on_location_phone2 = null {
                        get => $this->on_location_phone2;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_phone2', $value);
                            $this->on_location_phone2 = $value;
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
    public string|null $on_location_cell = null {
                        get => $this->on_location_cell;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_cell', $value);
                            $this->on_location_cell = $value;
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
    public string|null $on_location_fax = null {
                        get => $this->on_location_fax;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_fax', $value);
                            $this->on_location_fax = $value;
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
    public string|null $on_location_alternative_contact = null {
                        get => $this->on_location_alternative_contact;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_alternative_contact', $value);
                            $this->on_location_alternative_contact = $value;
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
    public int|null $on_location_logo_file_id = NULL {
                        get => $this->on_location_logo_file_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_logo_file_id', $value);
                            $this->on_location_logo_file_id = $value;
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
    public string|null $on_location_about_nickname = null {
                        get => $this->on_location_about_nickname;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_about_nickname', $value);
                            $this->on_location_about_nickname = $value;
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
    public string|null $on_location_about_description = null {
                        get => $this->on_location_about_description;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_about_description', $value);
                            $this->on_location_about_description = $value;
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
    public int|null $on_location_organization_id = NULL {
                        get => $this->on_location_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_organization_id', $value);
                            $this->on_location_organization_id = $value;
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
    public int|null $on_location_customer_id = NULL {
                        get => $this->on_location_customer_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_customer_id', $value);
                            $this->on_location_customer_id = $value;
                        }
                    }

    /**
     * Location Number
     *
     *
     *
     * {domain{location_number}}
     *
     * @var string|null Domain: location_number Type: varchar
     */
    public string|null $on_location_number = NULL {
                        get => $this->on_location_number;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_number', $value);
                            $this->on_location_number = $value;
                        }
                    }

    /**
     * Brand #
     *
     *
     *
     * {domain{brand_id}}
     *
     * @var int|null Domain: brand_id Type: integer
     */
    public int|null $on_location_brand_id = NULL {
                        get => $this->on_location_brand_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_brand_id', $value);
                            $this->on_location_brand_id = $value;
                        }
                    }

    /**
     * District #
     *
     *
     *
     * {domain{district_id}}
     *
     * @var int|null Domain: district_id Type: integer
     */
    public int|null $on_location_district_id = NULL {
                        get => $this->on_location_district_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_district_id', $value);
                            $this->on_location_district_id = $value;
                        }
                    }

    /**
     * Market #
     *
     *
     *
     * {domain{market_id}}
     *
     * @var int|null Domain: market_id Type: integer
     */
    public int|null $on_location_market_id = NULL {
                        get => $this->on_location_market_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_market_id', $value);
                            $this->on_location_market_id = $value;
                        }
                    }

    /**
     * Region #
     *
     *
     *
     * {domain{region_id}}
     *
     * @var int|null Domain: region_id Type: integer
     */
    public int|null $on_location_region_id = NULL {
                        get => $this->on_location_region_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_region_id', $value);
                            $this->on_location_region_id = $value;
                        }
                    }

    /**
     * Item Master #
     *
     *
     *
     * {domain{item_master_id}}
     *
     * @var int|null Domain: item_master_id Type: integer
     */
    public int|null $on_location_item_master_id = NULL {
                        get => $this->on_location_item_master_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_item_master_id', $value);
                            $this->on_location_item_master_id = $value;
                        }
                    }

    /**
     * Construction Date
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_location_construction_date = null {
                        get => $this->on_location_construction_date;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_construction_date', $value);
                            $this->on_location_construction_date = $value;
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
    public int|null $on_location_hold = 0 {
                        get => $this->on_location_hold;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_hold', $value);
                            $this->on_location_hold = $value;
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
    public int|null $on_location_inactive = 0 {
                        get => $this->on_location_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_inactive', $value);
                            $this->on_location_inactive = $value;
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
    public string|null $on_location_optimistic_lock = 'now()' {
                        get => $this->on_location_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_optimistic_lock', $value);
                            $this->on_location_optimistic_lock = $value;
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
    public string|null $on_location_inserted_timestamp = null {
                        get => $this->on_location_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_inserted_timestamp', $value);
                            $this->on_location_inserted_timestamp = $value;
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
    public int|null $on_location_inserted_user_id = NULL {
                        get => $this->on_location_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_inserted_user_id', $value);
                            $this->on_location_inserted_user_id = $value;
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
    public string|null $on_location_updated_timestamp = null {
                        get => $this->on_location_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_updated_timestamp', $value);
                            $this->on_location_updated_timestamp = $value;
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
    public int|null $on_location_updated_user_id = NULL {
                        get => $this->on_location_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_location_updated_user_id', $value);
                            $this->on_location_updated_user_id = $value;
                        }
                    }
}
