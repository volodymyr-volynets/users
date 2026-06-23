<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Backend;

use Object\Table;

class Dashboards extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Backend Dashboards';
    public $schema;
    public $name = 'd9_backend_dashboards';
    public $pk = ['d9_backdash_tenant_id', 'd9_backdash_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'd9_backdash_';
    public $columns = [
        'd9_backdash_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_backdash_code' => ['name' => 'Dashboard Code', 'domain' => 'group_code'],
        'd9_backdash_name' => ['name' => 'Name', 'domain' => 'name'],
        'd9_backdash_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'd9_backdash_model' => ['name' => 'Model', 'domain' => 'model'],
        'd9_backdash_x_size' => ['name' => 'Size X', 'domain' => 'cell_size'],
        'd9_backdash_y_size' => ['name' => 'Size Y', 'domain' => 'cell_size'],
        'd9_backdash_size_description' => ['name' => 'Size Description', 'domain' => 'name', 'null' => true],
        'd9_backdash_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'd9_backend_dashboards_pk' => ['type' => 'pk', 'columns' => ['d9_backdash_tenant_id', 'd9_backdash_code']],
        'd9_backdash_code_un' => ['type' => 'unique', 'columns' => ['d9_backdash_code']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'd9_backdash_name' => 'name',
        'd9_backdash_code' => 'name',
        'd9_backdash_size_description' => [
            'field' => 'name',
            'prefix' => 'Size: ',
        ],
        'd9_backdash_inactive' => 'inactive',
    ];
    public $options_active = [
        'd9_backdash_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Dashboards\Model\Backend\Dashboards::optionsActive';
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
