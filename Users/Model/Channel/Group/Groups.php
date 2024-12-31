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

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Channel Group Groups';
    public $name = 'um_channel_group_groups';
    public $pk = ['um_changrpgroup_tenant_id', 'um_changrpgroup_um_changroup_id', 'um_changrpgroup_child_um_changroup_id'];
    public $tenant = true;
    public $orderby = [
        'um_changrpgroup_inserted_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_changrpgroup_';
    public $columns = [
        'um_changrpgroup_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_changrpgroup_um_changroup_id' => ['name' => 'Group #', 'domain' => 'group_id'],
        'um_changrpgroup_child_um_changroup_id' => ['name' => 'Child Group #', 'domain' => 'group_id'],
        'um_changrpgroup_type_code' => ['name' => 'Type Code', 'domain' => 'group_code', 'enum' => '\Numbers\Users\Users\Model\Channel\Enum\GroupChannelTypes'],
        'um_changrpgroup_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_channel_group_groups_pk' => ['type' => 'pk', 'columns' => ['um_changrpgroup_tenant_id', 'um_changrpgroup_um_changroup_id', 'um_changrpgroup_child_um_changroup_id']],
        'um_changrpgroup_um_changroup_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_changrpgroup_tenant_id', 'um_changrpgroup_um_changroup_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Channel\Groups',
            'foreign_columns' => ['um_changroup_tenant_id', 'um_changroup_id']
        ],
        'um_changrpgroup_child_um_changroup_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_changrpgroup_tenant_id', 'um_changrpgroup_child_um_changroup_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Channel\Groups',
            'foreign_columns' => ['um_changroup_tenant_id', 'um_changroup_id']
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
