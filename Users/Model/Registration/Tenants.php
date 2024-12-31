<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Registration;

use Object\Table;

class Tenants extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Registration Tenants';
    public $schema;
    public $name = 'um_registration_tenants';
    public $pk = ['um_regten_id'];
    public $tenant = false;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_regten_';
    public $columns = [
        'um_regten_id' => ['name' => 'Registration #', 'domain' => 'group_id_sequence'],
        'um_regten_inserted' => ['name' => 'Inserted', 'type' => 'timestamp'],
        'um_regten_status' => ['name' => 'Inserted', 'domain' => 'status_id', 'default' => 0],
        // tenant information
        'um_regten_tenant_name' => ['name' => 'Screen Name', 'domain' => 'name'],
        'um_regten_tenant_code' => ['name' => 'Code', 'domain' => 'domain_part'],
        'um_regten_tenant_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_regten_tenant_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'um_regten_type_id' => ['name' => 'Type', 'domain' => 'type_id', 'null' => true],
        // organization
        'um_regten_organization_name' => ['name' => 'Organization Name', 'domain' => 'name'],
        'um_regten_organization_code' => ['name' => 'Organization Code', 'domain' => 'group_code'],
        // address
        'um_regten_address1' => ['name' => 'Address Line 1', 'domain' => 'address', 'null' => true],
        'um_regten_address2' => ['name' => 'Address Line 2', 'domain' => 'address', 'null' => true],
        'um_regten_city' => ['name' => 'City', 'domain' => 'city', 'null' => true],
        'um_regten_province_code' => ['name' => 'Province', 'domain' => 'province_code', 'null' => true],
        'um_regten_country_code' => ['name' => 'Country', 'domain' => 'country_code', 'null' => true],
        'um_regten_postal_code' => ['name' => 'Postal Code', 'domain' => 'postal_code', 'null' => true],
        // user
        'um_regten_user_first_name' => ['name' => 'User First Name', 'domain' => 'personal_name'],
        'um_regten_user_last_name' => ['name' => 'User Last Name', 'domain' => 'personal_name'],
        'um_regten_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_regten_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'um_regten_user_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
        'um_regten_user_login_username' => ['name' => 'Username', 'domain' => 'login', 'null' => true],
        // AS subscription
        'um_regten_as_module_id' => ['name' => 'A/S Module #', 'domain' => 'module_id', 'null' => true],
        'um_regten_as_calculation_id' => ['name' => 'A/S Calculation #', 'domain' => 'calculation_id', 'null' => true],
        'um_regten_as_plngrp_modules' => ['name' => 'A/S Plan Group Modules', 'domain' => 'code', 'null' => true], // comma separated list
        // inactive
        'um_regten_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_registration_tenants_pk' => ['type' => 'pk', 'columns' => ['um_regten_id']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
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
