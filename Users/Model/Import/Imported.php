<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Import;

use Object\Table;

class Imported extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Import Imported';
    public $name = 'um_import_imported';
    public $pk = ['um_impimported_tenant_id', 'um_impimported_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_impimported_';
    public $columns = [
        'um_impimported_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_impimported_id' => ['name' => 'Action #', 'domain' => 'big_id_sequence'],
        'um_impimported_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_impimported_um_imppreset_id' => ['name' => 'Import Preset #', 'domain' => 'preset_id'],
        'um_impimported_module_id' => ['name' => 'Module #', 'domain' => 'module_id', 'null' => true],
        'um_impimported_sm_model_id' => ['name' => 'Model #', 'domain' => 'model_id'],
        'um_impimported_sm_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        'um_impimported_import_details' => ['name' => 'Import Details', 'type' => 'text', 'null' => true],
        'um_impimported_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_import_imported_pk' => ['type' => 'pk', 'columns' => ['um_impimported_tenant_id', 'um_impimported_id']],
        'um_impimported_um_imppreset_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_impimported_um_imppreset_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Import\Presets',
            'foreign_columns' => ['um_imppreset_id'],
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true
    ];

    public $data_asset = [
        'classification' => 'public',
        'protection' => 0,
        'scope' => 'global'
    ];
}
