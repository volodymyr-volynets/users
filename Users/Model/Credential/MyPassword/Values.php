<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Credential\MyPassword;

use Object\Table;

class Values extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M My Password Values';
    public $schema;
    public $name = 'um_my_password_values';
    public $pk = ['um_mypasswval_tenant_id', 'um_mypasswval_mypasswd_id', 'um_mypasswval_name'];
    public $tenant = true;
    public $orderby = ['um_mypasswval_timestamp' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_mypasswval_';
    public $columns = [
        'um_mypasswval_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_mypasswval_mypasswd_id' => ['name' => 'Password #', 'domain' => 'password_id'],
        'um_mypasswval_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_mypasswval_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_mypasswval_encrypted_password' => ['name' => 'Password (Encrypted)', 'domain' => 'encrypted_password'],
        'um_mypasswval_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_my_password_values_pk' => ['type' => 'pk', 'columns' => ['um_mypasswval_tenant_id', 'um_mypasswval_mypasswd_id', 'um_mypasswval_name']],
        'um_mypasswval_mypasswd_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_mypasswval_tenant_id', 'um_mypasswval_mypasswd_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Credential\MyPasswords',
            'foreign_columns' => ['um_mypasswd_tenant_id', 'um_mypasswd_id']
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
