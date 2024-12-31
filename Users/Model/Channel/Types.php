<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Channel;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Channel Types';
    public $name = 'um_channel_types';
    public $pk = ['um_chantype_code'];
    public $orderby;
    public $limit;
    public $column_prefix = 'um_chantype_';
    public $columns = [
        'um_chantype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_chantype_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_chantype_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_chantype_model' => ['name' => 'Model', 'domain' => 'model', 'null' => true],
        'um_chantype_validator_method' => ['name' => 'Validator Method', 'domain' => 'method', 'null' => true],
        'um_chantype_field_code' => ['name' => 'Field Code', 'domain' => 'field_code', 'null' => true],
        'um_chantype_field_name' => ['name' => 'Field Name', 'domain' => 'name', 'null' => true],
        'um_chantype_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_channel_types_pk' => ['type' => 'pk', 'columns' => ['um_chantype_code']],
        'um_chantype_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_chantype_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'um_chantype_name' => 'name',
        'um_chantype_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_chantype_inactive' => 0,
    ];
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
