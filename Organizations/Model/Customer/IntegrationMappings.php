<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Customer;

use Object\Table;

class IntegrationMappings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Customer Integration Mappings';
    public $name = 'on_customer_integration_mappings';
    public $pk = ['on_custintegmap_tenant_id', 'on_custintegmap_customer_id', 'on_custintegmap_integtype_code', 'on_custintegmap_code'];
    public $tenant = true;
    public $orderby = [
        'on_custintegmap_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'on_custintegmap_';
    public $columns = [
        'on_custintegmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_custintegmap_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'on_custintegmap_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id'],
        'on_custintegmap_integtype_code' => ['name' => 'Integration Type', 'domain' => 'group_code'],
        'on_custintegmap_code' => ['name' => 'Code', 'domain' => 'code'],
        'on_custintegmap_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'on_custintegmap_default' => ['name' => 'Default', 'type' => 'boolean'],
        'on_custintegmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_customer_integration_mappings_pk' => ['type' => 'pk', 'columns' => ['on_custintegmap_tenant_id', 'on_custintegmap_customer_id', 'on_custintegmap_integtype_code', 'on_custintegmap_code']],
        'on_custintegmap_customer_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_custintegmap_tenant_id', 'on_custintegmap_customer_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Customers',
            'foreign_columns' => ['on_customer_tenant_id', 'on_customer_id']
        ],
        'on_custintegmap_integtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['on_custintegmap_tenant_id', 'on_custintegmap_integtype_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
            'foreign_columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'on_custintegmap_name' => 'name',
        'on_custintegmap_inactive' => 'inactve'
    ];
    public $options_active = [
        'on_custintegmap_inactive' => 0
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
