<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Credential;

use Object\Table;

class Passwords extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Passwords';
    public $schema;
    public $name = 'um_passwords';
    public $pk = ['um_password_tenant_id', 'um_password_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_password_';
    public $columns = [
        'um_password_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_password_code' => ['name' => 'Password Code', 'domain' => 'group_code'],
        'um_password_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_password_value_counter' => ['name' => 'Value Counter', 'domain' => 'counter'],
        'um_password_passtype_code' => ['name' => 'Type Code', 'domain' => 'group_code', 'null' => true],
        'um_password_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_passwords_pk' => ['type' => 'pk', 'columns' => ['um_password_tenant_id', 'um_password_code']],
        'um_password_passtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_password_tenant_id', 'um_password_passtype_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Credential\Types',
            'foreign_columns' => ['um_passtype_tenant_id', 'um_passtype_code']
        ],
    ];
    public $indexes = [
        'um_passwords_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_password_code', 'um_password_name']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_password_tenant_id' => 'wg_audit_tenant_id',
            'um_password_code' => 'wg_audit_password_code'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_password_name' => 'name',
        'um_password_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_password_inactive' => 0
    ];
    public $options_skip_i18n = false;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
