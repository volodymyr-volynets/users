<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Channel\Group;

use Object\Table;
use Numbers\Users\Users\Model\Channels as ChannelsParent;

class Channels extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Channel Group Channels';
    public $name = 'um_channel_group_channels';
    public $pk = ['um_changrpchan_tenant_id', 'um_changrpchan_um_changroup_id', 'um_changrpchan_um_channel_code'];
    public $tenant = true;
    public $orderby = [
        'um_changrpchan_inserted_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_changrpchan_';
    public $columns = [
        'um_changrpchan_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_changrpchan_um_changroup_id' => ['name' => 'Group #', 'domain' => 'group_id'],
        'um_changrpchan_um_channel_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_changrpchan_type_code' => ['name' => 'Type Code', 'domain' => 'group_code', 'enum' => '\Numbers\Users\Users\Model\Channel\Enum\GroupChannelTypes'],
        'um_changrpchan_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_channel_group_channels_pk' => ['type' => 'pk', 'columns' => ['um_changrpchan_tenant_id', 'um_changrpchan_um_changroup_id', 'um_changrpchan_um_channel_code']],
        'um_changrpchan_um_changroup_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_changrpchan_tenant_id', 'um_changrpchan_um_changroup_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Channel\Groups',
            'foreign_columns' => ['um_changroup_tenant_id', 'um_changroup_id']
        ],
        'um_changrpchan_um_channel_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_changrpchan_tenant_id', 'um_changrpchan_um_channel_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Channels',
            'foreign_columns' => ['um_channel_tenant_id', 'um_channel_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $code_model = ChannelsParent::class;
    public $collections = [];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

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
