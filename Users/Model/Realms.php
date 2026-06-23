<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\Table;

class Realms extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realms';
    public $schema;
    public $name = 'um_realms';
    public $pk = ['um_realm_tenant_id', 'um_realm_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_realm_';
    public $columns = [
        'um_realm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_realm_id' => ['name' => 'Realm #', 'domain' => 'realm_id_sequence'],
        'um_realm_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_realm_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_realm_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_realm_weight' => ['name' => 'Weight', 'domain' => 'weight', 'null' => true], // based on this field priorities would be set
        'um_realm_global' => ['name' => 'Global', 'type' => 'boolean'],
        'um_realm_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_realms_pk' => ['type' => 'pk', 'columns' => ['um_realm_tenant_id', 'um_realm_id']],
        'um_realm_code_un' => ['type' => 'unique', 'columns' => ['um_realm_tenant_id', 'um_realm_code']],
    ];
    public $indexes = [
        'um_realms_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_realm_code', 'um_realm_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_realm_tenant_id' => 'wg_audit_tenant_id',
            'um_realm_id' => 'wg_audit_um_realm_id',
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_realm_name' => 'name',
        'um_realm_code' => 'name',
        'um_realm_name*' => 'avatar_realm_small',
        'um_realm_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_realm_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    public $scoped_attributes = [
        'column_key' => 'um_realm_id',
        'column_pk_type' => 'int',
        'column_name' => 'U/M Realm #',
    ];
}
