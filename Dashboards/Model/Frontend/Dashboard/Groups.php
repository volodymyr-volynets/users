<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend\Dashboard;

use Object\Table;
use Object\Query\Builder;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Frontend Dashboard Groups';
    public $name = 'd9_frontend_dashboard_groups';
    public $pk = ['d9_frontdashgrp_tenant_id', 'd9_frontdashgrp_d9_frontdash_id', 'd9_frontdashgrp_d9_frontgrp_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'd9_frontdashgrp_';
    public $columns = [
        'd9_frontdashgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_frontdashgrp_d9_frontdash_id' => ['name' => 'Dashboard #', 'domain' => 'dashboard_id'],
        'd9_frontdashgrp_d9_frontgrp_id' => ['name' => 'Group #', 'domain' => 'group_id'],
        'd9_frontdashgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'd9_frontend_dashboard_groups_pk' => ['type' => 'pk', 'columns' => ['d9_frontdashgrp_tenant_id', 'd9_frontdashgrp_d9_frontdash_id', 'd9_frontdashgrp_d9_frontgrp_id']],
        'd9_frontdashgrp_d9_frontdash_id_fk' => [
            'type' => 'fk',
            'columns' => ['d9_frontdashgrp_tenant_id', 'd9_frontdashgrp_d9_frontdash_id'],
            'foreign_model' => '\Numbers\Users\Dashboards\Model\Frontend\Dashboards',
            'foreign_columns' => ['d9_frontdash_tenant_id', 'd9_frontdash_id']
        ],
        'd9_frontdashgrp_d9_frontgrp_id_fk' => [
            'type' => 'fk',
            'columns' => ['d9_frontdashgrp_tenant_id', 'd9_frontdashgrp_d9_frontgrp_id'],
            'foreign_model' => '\Numbers\Users\Dashboards\Model\Frontend\Groups',
            'foreign_columns' => ['d9_frontgrp_tenant_id', 'd9_frontgrp_id']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    /**
     * Pivot
     */
    public function pivotFrontendDashboardGroups(Builder & $query, string $name, array $columns, array $options = [], array $values = [])
    {
        $alias = strtolower($name);
        $query->pivot('INNER', new static(), $alias, 'ON', [
            ['AND', [$alias . '.d9_frontdashgrp_tenant_id', '=', $options['alias'] . '.d9_frontgrp_tenant_id', true], false],
            ['AND', [$alias . '.d9_frontdashgrp_d9_frontgrp_id', '=', $options['alias'] . '.d9_frontgrp_id', true], false],
        ], $name, $columns);
        if ($values !== null) {
            foreach ($values as $k => $v) {
                $query->where('AND', [$alias . '.' . $k, 'IN', $v]);
            }
        }
    }
}
