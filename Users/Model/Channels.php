<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\Table;

class Channels extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Channels';
    public $schema;
    public $name = 'um_channels';
    public $pk = ['um_channel_tenant_id', 'um_channel_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_channel_';
    public $columns = [
        'um_channel_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_channel_code' => ['name' => 'Code', 'domain' => 'group_code'], // this cannot have id
        'um_channel_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_channel_um_chantype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'um_channel_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_channel_field_id' => ['name' => 'Field #', 'domain' => 'big_id', 'null' => true],
        'um_channel_field_code' => ['name' => 'Field Code', 'domain' => 'code', 'null' => true],
        'um_channel_options' => ['name' => 'Options', 'type' => 'json', 'null' => true],
        'um_channel_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $column_settings = [];
    public $constraints = [
        'um_channels_pk' => ['type' => 'pk', 'columns' => ['um_channel_tenant_id', 'um_channel_code']],
        'um_channel_um_chantype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_channel_um_chantype_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Channel\Types',
            'foreign_columns' => ['um_chantype_code']
        ],
        'um_channel_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_channel_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [
        'um_channels_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_channel_code', 'um_channel_name']],
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'um_channel_name' => 'name',
        'um_channel_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_channel_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Users\Model\Channels::optionsActive';
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
