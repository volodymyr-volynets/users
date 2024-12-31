<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Credential\Password;

use Object\Table;

class Values extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Password Values';
    public $schema;
    public $name = 'um_password_values';
    public $pk = ['um_passwval_tenant_id', 'um_passwval_password_code', 'um_passwval_name'];
    public $tenant = true;
    public $orderby = ['um_passwval_timestamp' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_passwval_';
    public $columns = [
        'um_passwval_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_passwval_password_code' => ['name' => 'Password Code', 'domain' => 'group_code'],
        'um_passwval_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_passwval_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_passwval_encrypted_password' => ['name' => 'Password (Encrypted)', 'domain' => 'encrypted_password'],
        'um_passwval_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_password_values_pk' => ['type' => 'pk', 'columns' => ['um_passwval_tenant_id', 'um_passwval_password_code', 'um_passwval_name']],
        'um_passwval_password_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_passwval_tenant_id', 'um_passwval_password_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Credential\Passwords',
            'foreign_columns' => ['um_password_tenant_id', 'um_password_code']
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $options_skip_i18n = false;
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
