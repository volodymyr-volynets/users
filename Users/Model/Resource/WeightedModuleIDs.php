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

class WeightedModuleIDs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Weighted Module IDs';
    public $name = 'um_weighted_module_ids';
    public $pk = ['um_weimdids_tenant_id', 'um_weimdids_module_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_weimdids_';
    public $columns = [
        'um_weimdids_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_weimdids_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_weimdids_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_weimdids_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_weimdids_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        // weight
        'um_weimdids_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_weimdids_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_weimdids_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_weighted_module_ids_pk' => ['type' => 'pk', 'columns' => ['um_weimdids_tenant_id', 'um_weimdids_module_id']],
        'um_weimdids_name_un' => ['type' => 'unique', 'columns' => ['um_weimdids_tenant_id', 'um_weimdids_name']],
        'um_weimdids_slug_un' => ['type' => 'unique', 'columns' => ['um_weimdids_tenant_id', 'um_weimdids_slug']],
        'um_weimdids_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_weimdids_tenant_id', 'um_weimdids_module_id', 'um_weimdids_module_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id', 'tm_module_module_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_weimdids_name' => 'name',
        'um_weimdids_name*' => 'avatar_circle_small',
        'um_weimdids_module_code' => 'module_code',
        'um_weimdids_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_weimdids_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Users\Model\Resource\WeightedModuleIDs::optionsActive';
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
