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

use Object\Table;

class PIIs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User PIIs';
    public $name = 'um_user_piis';
    public $pk = ['um_usrpii_tenant_id', 'um_usrpii_user_id'];
    public $tenant = true;
    public $orderby = [];
    public $limit;
    public $column_prefix = 'um_usrpii_';
    public $columns = [
        'um_usrpii_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrpii_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        // pii settings
        'um_usrpii_um_usrpiigender_code' => ['name' => 'Gender', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIGenders'],
        'um_usrpii_um_usrpiirace_code' => ['name' => 'Race', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIRaces'],
        'um_usrpii_um_usrpiidisability_code' => ['name' => 'Disability', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIDisability'],
        'um_usrpii_um_um_usrpiiveteran_code' => ['name' => 'Veteran Status', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses'],
        'um_usrpii_um_usrpiisexorient_code' => ['name' => 'Sexual Orientation', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations'],
        'um_usrpii_um_usrpiihighedu_code' => ['name' => 'Highest Education', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations'],
        'um_usrpii_birth_cm_country_code' => ['name' => 'Birth Country Code', 'domain' => 'country_code', 'null' => true],
        'um_usrpii_living_cm_country_code' => ['name' => 'Living Country Code', 'domain' => 'country_code', 'null' => true],
        // dates + computed
        'um_usrpii_date_of_birth' => ['name' => 'Date Of Birth', 'type' => 'date', 'null' => true],
        'um_usrpii_age_in_years' => ['name' => 'Age In Years', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'um_usrpii_date_of_seniority' => ['name' => 'Date Of Seniority', 'type' => 'date', 'null' => true],
        'um_usrpii_seniority_in_years' => ['name' => 'Seniority In Years', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'um_usrpii_datetime_of_joining' => ['name' => 'Datetime Of Joining', 'type' => 'datetime', 'null' => true],
        'um_usrpii_joining_in_days' => ['name' => 'Joining In Days', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'um_usrpii_datetime_of_last_purchase' => ['name' => 'Datetime Of Last Purchase', 'type' => 'datetime', 'null' => true],
        'um_usrpii_last_purchase_in_days' => ['name' => 'Days Since Last Purchase', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'um_usrpii_datetime_of_last_login' => ['name' => 'Datetime Of Last Login', 'type' => 'datetime', 'null' => true],
        'um_usrpii_last_login_in_days' => ['name' => 'Days Since Last Login', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        // sin
        'um_usrpii_sin_number' => ['name' => 'Social Insurance Number (SIN)', 'domain' => 'sin', 'null' => true],
        'um_usrpii_sin_expires' => ['name' => 'SIN Expires', 'type' => 'date', 'null' => true],
        // other
        'um_usrpii_on_visa' => ['name' => 'On Visa', 'type' => 'boolean'],
        'um_usrpii_vulnerable_person' => ['name' => 'Vulnerable Person', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_user_piis_pk' => ['type' => 'pk', 'columns' => ['um_usrpii_tenant_id', 'um_usrpii_user_id']],
        'um_usrpii_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpii_tenant_id', 'um_usrpii_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrpii_birth_cm_country_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpii_tenant_id', 'um_usrpii_birth_cm_country_code'],
            'foreign_model' => '\Numbers\Countries\Countries\Model\Countries',
            'foreign_columns' => ['cm_country_tenant_id', 'cm_country_code']
        ],
        'um_usrpii_living_cm_country_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpii_tenant_id', 'um_usrpii_living_cm_country_code'],
            'foreign_model' => '\Numbers\Countries\Countries\Model\Countries',
            'foreign_columns' => ['cm_country_tenant_id', 'cm_country_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
