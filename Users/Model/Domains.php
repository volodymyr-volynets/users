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

class Domains extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Domains';
    public $schema;
    public $name = 'um_domains';
    public $pk = ['um_domain_tenant_id', 'um_domain_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_domain_';
    public $columns = [
        'um_domain_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_domain_id' => ['name' => 'Domain #', 'domain' => 'domain_id_sequence'],
        'um_domain_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_domain_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_domain_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_domain_weight' => ['name' => 'Weight', 'domain' => 'weight', 'null' => true], // based on this field priorities would be set
        'um_domain_global' => ['name' => 'Global', 'type' => 'boolean'],
        'um_domain_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_domains_pk' => ['type' => 'pk', 'columns' => ['um_domain_tenant_id', 'um_domain_id']],
        'um_domain_code_un' => ['type' => 'unique', 'columns' => ['um_domain_tenant_id', 'um_domain_code']],
    ];
    public $indexes = [
        'um_domains_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_domain_code', 'um_domain_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_domain_tenant_id' => 'wg_audit_tenant_id',
            'um_domain_id' => 'wg_audit_um_domain_id',
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_domain_name' => 'name',
        'um_domain_code' => 'name',
        'um_domain_name*' => 'avatar_circle_small',
        'um_domain_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_domain_inactive' => 0
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
        'column_key' => 'um_domain_id',
        'column_pk_type' => 'int',
        'column_name' => 'U/M Domain #',
    ];
}
