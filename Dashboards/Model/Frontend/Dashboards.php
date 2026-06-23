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
use Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details;

class Dashboards extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Frontend Dashboards';
    public $schema;
    public $name = 'd9_frontend_dashboards';
    public $pk = ['d9_frontdash_tenant_id', 'd9_frontdash_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'd9_frontdash_';
    public $columns = [
        'd9_frontdash_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_frontdash_id' => ['name' => 'Dashboard #', 'domain' => 'dashboard_id_sequence'],
        'd9_frontdash_code' => ['name' => 'Dashboard Code', 'domain' => 'group_code'],
        'd9_frontdash_name' => ['name' => 'Name', 'domain' => 'name'],
        'd9_frontdash_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'd9_frontdash_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'd9_frontend_dashboards_pk' => ['type' => 'pk', 'columns' => ['d9_frontdash_tenant_id', 'd9_frontdash_id']],
        'd9_frontdash_code_un' => ['type' => 'unique', 'columns' => ['d9_frontdash_tenant_id', 'd9_frontdash_code']],
        'd9_frontdash_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['d9_frontdash_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [
        'd9_frontend_dashboards_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['d9_frontdash_code', 'd9_frontdash_name']],
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'd9_frontdash_name' => 'name',
        'd9_frontdash_code' => 'name',
        'd9_frontdash_inactive' => 'inactive',
    ];
    public $options_active = [
        'd9_frontdash_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Dashboards\Model\Frontend\Dashboards::optionsActive';
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
        'updated' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    public $scoped_records = [
        'column_key' => 'd9_frontdash_id',
        'column_pk_type' => 'int',
        'column_name' => 'D/9 Dashboard #',
        'access_settings' => [
            'default' => 'Owner-*-Write,Owner-Not_Self-None,Access-*-Admin'
        ]
    ];

    /**
     * Groups relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationFrontendDashboardGroups(array & $data, array $options)
    {
        Groups::queryAssemblerStatic($data, $options)
            ->pivot([new Dashboard\Groups(), 'pivotFrontendDashboardGroups'], 'PivotFrontendDashboardGroups', null, $options, [
                'd9_frontdashgrp_d9_frontdash_id' => array_column_unique($data, 'd9_frontdash_id'),
            ])
            ->query()
            ->pk(['d9_frontdashgrp_d9_frontdash_id', 'd9_frontdashgrp_d9_frontgrp_id'])
            ->assign();
    }

    /**
     * Details relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationFrontendDashboardDetails(array & $data, array $options)
    {
        Details::queryAssemblerStatic($data, $options)
            ->whereMultiple('AND', [
                'd9_frontdshdet_d9_frontdash_id' => array_column_unique($data, 'd9_frontdash_id'),
            ])
            ->query()
            ->pk(['d9_frontdshdet_d9_frontdash_id', 'd9_frontdshdet_id'])
            ->assign();
    }
}
