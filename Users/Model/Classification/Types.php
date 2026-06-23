<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification Types';
    public $name = 'um_classification_types';
    public $pk = ['um_classtype_tenant_id', 'um_classtype_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_classtype_';
    public $columns = [
        'um_classtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_classtype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'um_classtype_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_classtype_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_classtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_types_pk' => ['type' => 'pk', 'columns' => ['um_classtype_tenant_id', 'um_classtype_code']]
    ];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'um_classtype_name' => 'name',
        'um_classtype_code' => 'name',
        'um_classtype_name*' => 'avatar_circle_small',
        'um_classtype_icon' => 'icon_class',
        'um_classtype_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_classtype_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
