<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Model;

use Object\Table;

class ComputedFieldTasks extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TS';
    public $title = 'T/S Computed Field Tasks';
    public $name = 'ts_computed_field_tasks';
    public $pk = ['ts_compfldtsk_code'];
    public $tenant;
    public $orderby;
    public $limit;
    public $column_prefix = 'ts_compfldtsk_';
    public $columns = [
        'ts_compfldtsk_code' => ['name' => 'Code', 'domain' => 'code'],
        'ts_compfldtsk_name' => ['name' => 'Name', 'domain' => 'name'],
        'ts_compfldtsk_model' => ['name' => 'Model', 'domain' => 'model'],
        'ts_compfldtsk_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'ts_computed_field_tasks_pk' => ['type' => 'pk', 'columns' => ['ts_compfldtsk_code']]
    ];
    public $indexes = [
        'ts_computed_field_tasks_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ts_compfldtsk_code', 'ts_compfldtsk_name']]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'ts_compfldtsk_name' => 'name'
    ];
    public $options_active = [];
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
