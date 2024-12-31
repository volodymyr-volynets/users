<?php

namespace Numbers\Users\Users\Model\Registration;
class TenantsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Registration\Tenants::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_regten_id'];
    /**
     * Registration #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_regten_id = null {
                        get => $this->um_regten_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_id', $value);
                            $this->um_regten_id = $value;
                        }
                    }

    /**
     * Inserted
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_regten_inserted = null {
                        get => $this->um_regten_inserted;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_inserted', $value);
                            $this->um_regten_inserted = $value;
                        }
                    }

    /**
     * Inserted
     *
     *
     *
     * {domain{status_id}}
     *
     * @var int|null Domain: status_id Type: smallint
     */
    public int|null $um_regten_status = 0 {
                        get => $this->um_regten_status;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_status', $value);
                            $this->um_regten_status = $value;
                        }
                    }

    /**
     * Screen Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_regten_tenant_name = null {
                        get => $this->um_regten_tenant_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_tenant_name', $value);
                            $this->um_regten_tenant_name = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{domain_part}}
     *
     * @var string|null Domain: domain_part Type: varchar
     */
    public string|null $um_regten_tenant_code = null {
                        get => $this->um_regten_tenant_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_tenant_code', $value);
                            $this->um_regten_tenant_code = $value;
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
    public string|null $um_regten_tenant_email = null {
                        get => $this->um_regten_tenant_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_tenant_email', $value);
                            $this->um_regten_tenant_email = $value;
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
    public string|null $um_regten_tenant_phone = null {
                        get => $this->um_regten_tenant_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_tenant_phone', $value);
                            $this->um_regten_tenant_phone = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_regten_type_id = NULL {
                        get => $this->um_regten_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_type_id', $value);
                            $this->um_regten_type_id = $value;
                        }
                    }

    /**
     * Organization Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_regten_organization_name = null {
                        get => $this->um_regten_organization_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_organization_name', $value);
                            $this->um_regten_organization_name = $value;
                        }
                    }

    /**
     * Organization Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_regten_organization_code = null {
                        get => $this->um_regten_organization_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_organization_code', $value);
                            $this->um_regten_organization_code = $value;
                        }
                    }

    /**
     * Address Line 1
     *
     *
     *
     * {domain{address}}
     *
     * @var string|null Domain: address Type: varchar
     */
    public string|null $um_regten_address1 = null {
                        get => $this->um_regten_address1;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_address1', $value);
                            $this->um_regten_address1 = $value;
                        }
                    }

    /**
     * Address Line 2
     *
     *
     *
     * {domain{address}}
     *
     * @var string|null Domain: address Type: varchar
     */
    public string|null $um_regten_address2 = null {
                        get => $this->um_regten_address2;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_address2', $value);
                            $this->um_regten_address2 = $value;
                        }
                    }

    /**
     * City
     *
     *
     *
     * {domain{city}}
     *
     * @var string|null Domain: city Type: varchar
     */
    public string|null $um_regten_city = null {
                        get => $this->um_regten_city;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_city', $value);
                            $this->um_regten_city = $value;
                        }
                    }

    /**
     * Province
     *
     *
     *
     * {domain{province_code}}
     *
     * @var string|null Domain: province_code Type: varchar
     */
    public string|null $um_regten_province_code = null {
                        get => $this->um_regten_province_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_province_code', $value);
                            $this->um_regten_province_code = $value;
                        }
                    }

    /**
     * Country
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $um_regten_country_code = null {
                        get => $this->um_regten_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_country_code', $value);
                            $this->um_regten_country_code = $value;
                        }
                    }

    /**
     * Postal Code
     *
     *
     *
     * {domain{postal_code}}
     *
     * @var string|null Domain: postal_code Type: varchar
     */
    public string|null $um_regten_postal_code = null {
                        get => $this->um_regten_postal_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_postal_code', $value);
                            $this->um_regten_postal_code = $value;
                        }
                    }

    /**
     * User First Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $um_regten_user_first_name = null {
                        get => $this->um_regten_user_first_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_first_name', $value);
                            $this->um_regten_user_first_name = $value;
                        }
                    }

    /**
     * User Last Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $um_regten_user_last_name = null {
                        get => $this->um_regten_user_last_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_last_name', $value);
                            $this->um_regten_user_last_name = $value;
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
    public string|null $um_regten_user_email = null {
                        get => $this->um_regten_user_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_email', $value);
                            $this->um_regten_user_email = $value;
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
    public string|null $um_regten_user_phone = null {
                        get => $this->um_regten_user_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_phone', $value);
                            $this->um_regten_user_phone = $value;
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
    public string|null $um_regten_user_cell = null {
                        get => $this->um_regten_user_cell;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_cell', $value);
                            $this->um_regten_user_cell = $value;
                        }
                    }

    /**
     * Username
     *
     *
     *
     * {domain{login}}
     *
     * @var string|null Domain: login Type: varchar
     */
    public string|null $um_regten_user_login_username = null {
                        get => $this->um_regten_user_login_username;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_user_login_username', $value);
                            $this->um_regten_user_login_username = $value;
                        }
                    }

    /**
     * A/S Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_regten_as_module_id = NULL {
                        get => $this->um_regten_as_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_as_module_id', $value);
                            $this->um_regten_as_module_id = $value;
                        }
                    }

    /**
     * A/S Calculation #
     *
     *
     *
     * {domain{calculation_id}}
     *
     * @var int|null Domain: calculation_id Type: bigint
     */
    public int|null $um_regten_as_calculation_id = NULL {
                        get => $this->um_regten_as_calculation_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_as_calculation_id', $value);
                            $this->um_regten_as_calculation_id = $value;
                        }
                    }

    /**
     * A/S Plan Group Modules
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_regten_as_plngrp_modules = null {
                        get => $this->um_regten_as_plngrp_modules;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_as_plngrp_modules', $value);
                            $this->um_regten_as_plngrp_modules = $value;
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
    public int|null $um_regten_inactive = 0 {
                        get => $this->um_regten_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_regten_inactive', $value);
                            $this->um_regten_inactive = $value;
                        }
                    }
}
