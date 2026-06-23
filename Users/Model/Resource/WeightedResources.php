<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\Table;

class WeightedResources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Weighted Resources';
    public $name = 'um_weighted_resources';
    public $pk = ['um_weiresrc_tenant_id', 'um_weiresrc_module_id', 'um_weiresrc_resource_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_weiresrc_';
    public $columns = [
        'um_weiresrc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_weiresrc_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_weiresrc_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_weiresrc_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_weiresrc_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_weiresrc_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_weiresrc_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        // weight
        'um_weiresrc_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_weiresrc_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_weiresrc_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_weighted_resources_pk' => ['type' => 'pk', 'columns' => ['um_weiresrc_tenant_id', 'um_weiresrc_module_id', 'um_weiresrc_resource_id']],
        'um_weiresrc_code_un' => ['type' => 'unique', 'columns' => ['um_weiresrc_tenant_id', 'um_weiresrc_module_id', 'um_weiresrc_code']],
        'um_weiresrc_slug_um' => ['type' => 'unique', 'columns' => ['um_weiresrc_tenant_id', 'um_weiresrc_module_id', 'um_weiresrc_slug']],
        'um_weiresrc_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_weiresrc_tenant_id', 'um_weiresrc_module_id', 'um_weiresrc_module_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id', 'tm_module_module_code']
        ],
        'um_weiresrc_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_weiresrc_resource_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resources',
            'foreign_columns' => ['sm_resource_id']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_weiresrc_name' => 'name',
        'um_weiresrc_name*' => 'avatar_circle_small',
        'um_weiresrc_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_weiresrc_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'public',
        'protection' => 1,
        'scope' => 'global'
    ];
}
