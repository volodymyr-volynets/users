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

class ExternalModuleIDs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Module IDs';
    public $name = 'um_external_module_ids';
    public $pk = ['um_extmdids_tenant_id', 'um_extmdids_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extmdids_';
    public $columns = [
        'um_extmdids_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id_sequence'],
        'um_extmdids_um_extmdl_code' => ['name' => 'Module Code', 'domain' => 'module_code_external'],
        'um_extmdids_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_extmdids_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        // weight
        'um_extmdids_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extmdids_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_extmdids_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_external_module_ids_pk' => ['type' => 'pk', 'columns' => ['um_extmdids_tenant_id', 'um_extmdids_id']],
        'um_extmdids_um_extmdl_code_un' => ['type' => 'unique', 'columns' => ['um_extmdids_tenant_id', 'um_extmdids_id', 'um_extmdids_um_extmdl_code']],
        'um_extmdids_name_un' => ['type' => 'unique', 'columns' => ['um_extmdids_tenant_id', 'um_extmdids_name']],
        'um_extmdids_slug_un' => ['type' => 'unique', 'columns' => ['um_extmdids_tenant_id', 'um_extmdids_slug']],
        'um_extmdids_um_extmdl_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_extmdids_tenant_id', 'um_extmdids_um_extmdl_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules',
            'foreign_columns' => ['um_extmdl_tenant_id', 'um_extmdl_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_extmdids_name' => 'name',
        'um_extmdids_name*' => 'avatar_circle_small',
        'um_extmdids_um_extmdl_code' => 'module_code',
        'um_extmdids_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_extmdids_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Tenants\Tenants\Model\Modules::optionsActive';
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
