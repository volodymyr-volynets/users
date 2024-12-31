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

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Channel Groups';
    public $schema;
    public $name = 'um_channel_groups';
    public $pk = ['um_changroup_tenant_id', 'um_changroup_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_changroup_';
    public $columns = [
        'um_changroup_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_changroup_id' => ['name' => 'Group #', 'domain' => 'group_id_sequence'],
        'um_changroup_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_changroup_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_changroup_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_changroup_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $column_settings = [];
    public $constraints = [
        'um_channel_groups_pk' => ['type' => 'pk', 'columns' => ['um_changroup_tenant_id', 'um_changroup_id']],
        'um_changroup_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_changroup_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [
        'um_channel_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_changroup_code', 'um_changroup_name']],
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'um_changroup_name' => 'name',
        'um_changroup_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_changroup_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Users\Model\Channel\Groups::optionsActive';
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
