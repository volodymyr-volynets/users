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

class WeightedAccesses extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Weighted Accesses';
    public $name = 'um_weighted_accesses';
    public $pk = ['um_weiaccess_tenant_id', 'um_weiaccess_id'];
    public $tenant = true;
    public $orderby = [
        'um_weiaccess_id' => SORT_DESC,
    ];
    public $limit;
    public $column_prefix = 'um_weiaccess_';
    public $columns = [
        'um_weiaccess_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_weiaccess_id' => ['name' => 'Weighted #', 'domain' => 'weight'],
        'um_weiaccess_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_weiaccess_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_weiaccess_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'um_weiaccess_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_weighted_accesses_pk' => ['type' => 'pk', 'columns' => ['um_weiaccess_tenant_id', 'um_weiaccess_id']],
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_weiaccess_name' => 'name',
        'um_weiaccess_id' => 'name',
        'um_weiaccess_icon' => 'icon_class',
        'um_weiaccess_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_weiaccess_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $scoped_attributes = [
        'column_key' => 'um_weiaccess_id',
        'column_pk_type' => 'int',
        'column_name' => 'U/M Weighted #',
    ];

    public $scoped_records = [
        'column_key' => 'um_weiaccess_id',
        'column_pk_type' => 'int',
        'column_name' => 'U/M Weighted #',
        'access_settings' => [
            'default' => 'Owner-*-Write,Owner-Not_Self-None,Access-*-Admin'
        ]
    ];

    public $data_asset = [
        'classification' => 'public',
        'protection' => 1,
        'scope' => 'global'
    ];
}
