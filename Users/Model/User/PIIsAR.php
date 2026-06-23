<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\ActiveRecord;

class PIIsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = PIIs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrpii_tenant_id','um_usrpii_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrpii_tenant_id = null {
        get => $this->um_usrpii_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_tenant_id', $value);
            $this->um_usrpii_tenant_id = $value;
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
    public int|null $um_usrpii_user_id = null {
        get => $this->um_usrpii_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_user_id', $value);
            $this->um_usrpii_user_id = $value;
        }
    }

    /**
     * Gender
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIGenders}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_usrpiigender_code = null {
        get => $this->um_usrpii_um_usrpiigender_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_usrpiigender_code', $value);
            $this->um_usrpii_um_usrpiigender_code = $value;
        }
    }

    /**
     * Race
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIRaces}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_usrpiirace_code = null {
        get => $this->um_usrpii_um_usrpiirace_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_usrpiirace_code', $value);
            $this->um_usrpii_um_usrpiirace_code = $value;
        }
    }

    /**
     * Disability
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIDisability}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_usrpiidisability_code = null {
        get => $this->um_usrpii_um_usrpiidisability_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_usrpiidisability_code', $value);
            $this->um_usrpii_um_usrpiidisability_code = $value;
        }
    }

    /**
     * Veteran Status
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_um_usrpiiveteran_code = null {
        get => $this->um_usrpii_um_um_usrpiiveteran_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_um_usrpiiveteran_code', $value);
            $this->um_usrpii_um_um_usrpiiveteran_code = $value;
        }
    }

    /**
     * Sexual Orientation
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_usrpiisexorient_code = null {
        get => $this->um_usrpii_um_usrpiisexorient_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_usrpiisexorient_code', $value);
            $this->um_usrpii_um_usrpiisexorient_code = $value;
        }
    }

    /**
     * Highest Education
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrpii_um_usrpiihighedu_code = null {
        get => $this->um_usrpii_um_usrpiihighedu_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_um_usrpiihighedu_code', $value);
            $this->um_usrpii_um_usrpiihighedu_code = $value;
        }
    }

    /**
     * Birth Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $um_usrpii_birth_cm_country_code = null {
        get => $this->um_usrpii_birth_cm_country_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_birth_cm_country_code', $value);
            $this->um_usrpii_birth_cm_country_code = $value;
        }
    }

    /**
     * Living Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $um_usrpii_living_cm_country_code = null {
        get => $this->um_usrpii_living_cm_country_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_living_cm_country_code', $value);
            $this->um_usrpii_living_cm_country_code = $value;
        }
    }

    /**
     * Date Of Birth
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $um_usrpii_date_of_birth = null {
        get => $this->um_usrpii_date_of_birth;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_date_of_birth', $value);
            $this->um_usrpii_date_of_birth = $value;
        }
    }

    /**
     * Age In Years
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrpii_age_in_years = null {
        get => $this->um_usrpii_age_in_years;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_age_in_years', $value);
            $this->um_usrpii_age_in_years = $value;
        }
    }

    /**
     * Date Of Seniority
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $um_usrpii_date_of_seniority = null {
        get => $this->um_usrpii_date_of_seniority;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_date_of_seniority', $value);
            $this->um_usrpii_date_of_seniority = $value;
        }
    }

    /**
     * Seniority In Years
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrpii_seniority_in_years = null {
        get => $this->um_usrpii_seniority_in_years;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_seniority_in_years', $value);
            $this->um_usrpii_seniority_in_years = $value;
        }
    }

    /**
     * Datetime Of Joining
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $um_usrpii_datetime_of_joining = null {
        get => $this->um_usrpii_datetime_of_joining;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_datetime_of_joining', $value);
            $this->um_usrpii_datetime_of_joining = $value;
        }
    }

    /**
     * Joining In Days
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrpii_joining_in_days = null {
        get => $this->um_usrpii_joining_in_days;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_joining_in_days', $value);
            $this->um_usrpii_joining_in_days = $value;
        }
    }

    /**
     * Datetime Of Last Purchase
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $um_usrpii_datetime_of_last_purchase = null {
        get => $this->um_usrpii_datetime_of_last_purchase;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_datetime_of_last_purchase', $value);
            $this->um_usrpii_datetime_of_last_purchase = $value;
        }
    }

    /**
     * Days Since Last Purchase
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrpii_last_purchase_in_days = null {
        get => $this->um_usrpii_last_purchase_in_days;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_last_purchase_in_days', $value);
            $this->um_usrpii_last_purchase_in_days = $value;
        }
    }

    /**
     * Datetime Of Last Login
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $um_usrpii_datetime_of_last_login = null {
        get => $this->um_usrpii_datetime_of_last_login;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_datetime_of_last_login', $value);
            $this->um_usrpii_datetime_of_last_login = $value;
        }
    }

    /**
     * Days Since Last Login
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrpii_last_login_in_days = null {
        get => $this->um_usrpii_last_login_in_days;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_last_login_in_days', $value);
            $this->um_usrpii_last_login_in_days = $value;
        }
    }

    /**
     * Social Insurance Number (SIN)
     *
     *
     *
     * {domain{sin}}
     *
     * @var string|null Domain: sin Type: varchar
     */
    public string|null $um_usrpii_sin_number = null {
        get => $this->um_usrpii_sin_number;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_sin_number', $value);
            $this->um_usrpii_sin_number = $value;
        }
    }

    /**
     * SIN Expires
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $um_usrpii_sin_expires = null {
        get => $this->um_usrpii_sin_expires;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_sin_expires', $value);
            $this->um_usrpii_sin_expires = $value;
        }
    }

    /**
     * On Visa
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrpii_on_visa = 0 {
        get => $this->um_usrpii_on_visa;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_on_visa', $value);
            $this->um_usrpii_on_visa = $value;
        }
    }

    /**
     * Vulnerable Person
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrpii_vulnerable_person = 0 {
        get => $this->um_usrpii_vulnerable_person;
        set {
            $this->setFullPkAndFilledColumn('um_usrpii_vulnerable_person', $value);
            $this->um_usrpii_vulnerable_person = $value;
        }
    }
}
