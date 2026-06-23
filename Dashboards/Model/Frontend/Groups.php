<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend;

use Object\Table;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Frontend Groups';
    public $name = 'd9_frontend_groups';
    public $pk = ['d9_frontgrp_tenant_id', 'd9_frontgrp_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'd9_frontgrp_';
    public $columns = [
        'd9_frontgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_frontgrp_id' => ['name' => 'Group #', 'domain' => 'group_id_sequence'],
        'd9_frontgrp_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'd9_frontgrp_name' => ['name' => 'Name', 'domain' => 'name'],
        'd9_frontgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'd9_frontend_groups_pk' => ['type' => 'pk', 'columns' => ['d9_frontgrp_tenant_id', 'd9_frontgrp_id']],
        'd9_frontgrp_code_un' => ['type' => 'unique', 'columns' => ['d9_frontgrp_tenant_id', 'd9_frontgrp_code']],
    ];
    public $indexes = [
        'd9_frontend_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['d9_frontgrp_name', 'd9_frontgrp_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'd9_frontgrp_name' => 'name',
        'd9_frontgrp_code' => 'name',
        'd9_frontgrp_inactive' => 'inactive',
    ];
    public $options_active = [
        'd9_frontgrp_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
