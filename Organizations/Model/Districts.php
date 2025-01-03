<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model;

use Object\Table;

class Districts extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Districts';
    public $schema;
    public $name = 'on_districts';
    public $pk = ['on_district_tenant_id', 'on_district_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_district_';
    public $columns = [
        'on_district_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_district_id' => ['name' => 'District #', 'domain' => 'district_id_sequence'],
        'on_district_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'on_district_name' => ['name' => 'Name', 'domain' => 'name'],
        'on_district_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'on_district_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_districts_pk' => ['type' => 'pk', 'columns' => ['on_district_tenant_id', 'on_district_id']],
        'on_district_code_un' => ['type' => 'unique', 'columns' => ['on_district_tenant_id', 'on_district_code']],
        'on_district_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_district_tenant_id', 'on_district_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ]
    ];
    public $indexes = [
        'on_districts_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_district_code', 'on_district_name']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_district_tenant_id' => 'wg_audit_tenant_id',
            'on_district_id' => 'wg_audit_district_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'on_district_name' => 'name',
        'on_district_inactive' => 'inactive'
    ];
    public $options_active = [
        'on_district_inactive' => 0
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
}
