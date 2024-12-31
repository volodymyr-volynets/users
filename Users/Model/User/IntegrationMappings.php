<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\Table;

class IntegrationMappings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Integration Mappings';
    public $name = 'um_user_integration_mappings';
    public $pk = ['um_usrintegmap_tenant_id', 'um_usrintegmap_user_id', 'um_usrintegmap_integtype_code', 'um_usrintegmap_code'];
    public $tenant = true;
    public $orderby = [
        'um_usrintegmap_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrintegmap_';
    public $columns = [
        'um_usrintegmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrintegmap_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrintegmap_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrintegmap_integtype_code' => ['name' => 'Integration Type', 'domain' => 'group_code'],
        'um_usrintegmap_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_usrintegmap_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'um_usrintegmap_default' => ['name' => 'Default', 'type' => 'boolean'],
        'um_usrintegmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_integration_mappings_pk' => ['type' => 'pk', 'columns' => ['um_usrintegmap_tenant_id', 'um_usrintegmap_user_id', 'um_usrintegmap_integtype_code', 'um_usrintegmap_code']],
        'um_usrintegmap_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrintegmap_tenant_id', 'um_usrintegmap_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrintegmap_integtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrintegmap_tenant_id', 'um_usrintegmap_integtype_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
            'foreign_columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'um_usrintegmap_name' => 'name',
        'um_usrintegmap_inactive' => 'inactve'
    ];
    public $options_active = [
        'um_usrintegmap_inactive' => 0
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
