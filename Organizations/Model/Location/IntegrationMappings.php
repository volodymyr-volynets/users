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

class IntegrationMappings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Location Integration Mappings';
    public $name = 'on_location_integration_mappings';
    public $pk = ['on_locintegmap_tenant_id', 'on_locintegmap_location_id', 'on_locintegmap_integtype_code', 'on_locintegmap_code'];
    public $tenant = true;
    public $orderby = [
        'on_locintegmap_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'on_locintegmap_';
    public $columns = [
        'on_locintegmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_locintegmap_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'on_locintegmap_location_id' => ['name' => 'Location #', 'domain' => 'location_id'],
        'on_locintegmap_integtype_code' => ['name' => 'Integration Type', 'domain' => 'group_code'],
        'on_locintegmap_code' => ['name' => 'Code', 'domain' => 'code'],
        'on_locintegmap_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'on_locintegmap_default' => ['name' => 'Default', 'type' => 'boolean'],
        'on_locintegmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_location_integration_mappings_pk' => ['type' => 'pk', 'columns' => ['on_locintegmap_tenant_id', 'on_locintegmap_location_id', 'on_locintegmap_integtype_code', 'on_locintegmap_code']],
        'on_locintegmap_location_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_locintegmap_tenant_id', 'on_locintegmap_location_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Locations',
            'foreign_columns' => ['on_location_tenant_id', 'on_location_id']
        ],
        'on_locintegmap_integtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['on_locintegmap_tenant_id', 'on_locintegmap_integtype_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
            'foreign_columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'on_locintegmap_name' => 'name',
        'on_locintegmap_inactive' => 'inactve'
    ];
    public $options_active = [
        'on_locintegmap_inactive' => 0
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
