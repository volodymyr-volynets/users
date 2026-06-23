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

class Presets extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Import Presets';
    public $name = 'um_import_presets';
    public $pk = ['um_imppreset_id'];
    public $tenant = false;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_imppreset_';
    public $columns = [
        'um_imppreset_id' => ['name' => 'Preset #', 'domain' => 'preset_id_sequence'],
        'um_imppreset_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_imppreset_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_imppreset_um_imppretype_code' => ['name' => 'Type', 'domain' => 'group_code', 'default' => 'IMPORT'],
        'um_imppreset_module_code' => ['name' => 'Module Code', 'domain' => 'module_code', 'null' => true],
        'um_imppreset_sm_model_id' => ['name' => 'Model #', 'domain' => 'model_id'],
        'um_imppreset_sm_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        'um_imppreset_activation_method' => ['name' => 'Activation Method', 'domain' => 'method'],
        'um_imppreset_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_import_presets_pk' => ['type' => 'pk', 'columns' => ['um_imppreset_id']],
        'um_imppreset_code_un' => ['type' => 'unique', 'columns' => ['um_imppreset_code']],
        'um_imppreset_sm_model_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_imppreset_sm_model_id'],
            'foreign_model' => '\Numbers\Backend\Db\Common\Model\Models',
            'foreign_columns' => ['sm_model_id'],
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_imppreset_name' => 'name',
        'um_imppreset_name*' => 'avatar_circle_small',
        'um_imppreset_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_imppreset_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'public',
        'protection' => 0,
        'scope' => 'global'
    ];
}
