<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Credential\Type;

use Object\Table;

class Values extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Password Type Values';
    public $schema;
    public $name = 'um_password_type_values';
    public $pk = ['um_passtpval_tenant_id', 'um_passtpval_passtype_code', 'um_passtpval_name'];
    public $tenant = true;
    public $orderby = ['um_passtpval_timestamp' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_passtpval_';
    public $columns = [
        'um_passtpval_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_passtpval_passtype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_passtpval_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_passtpval_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_passtpval_encrypted_password' => ['name' => 'Password (Encrypted)', 'domain' => 'encrypted_password', 'null' => true],
        'um_passtpval_preset' => ['name' => 'Preset', 'type' => 'boolean'],
        'um_passtpval_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_password_type_values_pk' => ['type' => 'pk', 'columns' => ['um_passtpval_tenant_id', 'um_passtpval_passtype_code', 'um_passtpval_name']],
        'um_passtpval_passtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_passtpval_tenant_id', 'um_passtpval_passtype_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Credential\Types',
            'foreign_columns' => ['um_passtype_tenant_id', 'um_passtype_code']
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
