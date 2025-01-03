<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Location;

use Object\Table;

class Territories extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Territories';
    public $schema;
    public $name = 'on_territories';
    public $pk = ['on_territory_tenant_id', 'on_territory_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_territory_';
    public $columns = [
        'on_territory_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_territory_id' => ['name' => 'Territory #', 'domain' => 'territory_id_sequence'],
        'on_territory_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'on_territory_name' => ['name' => 'Name', 'domain' => 'name'],
        'on_territory_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'on_territory_node_type_id' => ['name' => 'Node Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Organizations\Model\Location\Territory\NodeTypes'],
        'on_territory_parent_territory_id' => ['name' => 'Parent Territory #', 'domain' => 'territory_id', 'null' => true],
        'on_territory_type_id' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Organizations\Model\Location\Territory\Types'],
        'on_territory_postal_codes' => ['name' => 'Postal Codes', 'domain' => 'postal_codes', 'null' => true],
        'on_territory_country_code' => ['name' => 'Country Code', 'domain' => 'country_code'],
        'on_territory_province_code' => ['name' => 'Province Code', 'domain' => 'province_code', 'null' => true],
        'on_territory_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_territories_pk' => ['type' => 'pk', 'columns' => ['on_territory_tenant_id', 'on_territory_id']],
        'on_territory_parent_territory_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_territory_tenant_id', 'on_territory_parent_territory_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Location\Territories',
            'foreign_columns' => ['on_territory_tenant_id', 'on_territory_id']
        ]
    ];
    public $indexes = [
        'on_territories_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_territory_name']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_territory_tenant_id' => 'wg_audit_tenant_id',
            'on_territory_id' => 'wg_audit_territory_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'on_territory_name' => 'name',
        'on_territory_parent_territory_id' => 'parent',
        'on_territory_node_type_id' => 'node_type_id',
        'on_territory_parent_territory_id' => 'parent_id',
        'on_territory_inactive' => 'inactive'
    ];
    public $options_active = [
        'on_territory_inactive' => 0
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

    public $triggers = [];
}
