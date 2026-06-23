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

class Details extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Frontend Dashboard Details';
    public $schema;
    public $name = 'd9_frontend_dashboard_details';
    public $pk = ['d9_frontdshdet_tenant_id', 'd9_frontdshdet_d9_frontdash_id', 'd9_frontdshdet_id'];
    public $tenant = true;
    public $orderby = [
        'd9_frontdshdet_order' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'd9_frontdshdet_';
    public $columns = [
        'd9_frontdshdet_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_frontdshdet_d9_frontdash_id' => ['name' => 'Dashboard #', 'domain' => 'dashboard_id'],
        'd9_frontdshdet_id' => ['name' => 'Detail #', 'domain' => 'detail_id'],
        'd9_frontdshdet_d9_backdash_code' => ['name' => 'Dashboard Code', 'domain' => 'group_code'],
        'd9_frontdshdet_name' => ['name' => 'Name', 'domain' => 'name'],
        'd9_frontdshdet_x_start' => ['name' => 'Start X', 'domain' => 'cell_size'],
        'd9_frontdshdet_x_end' => ['name' => 'End X', 'domain' => 'cell_size'],
        'd9_frontdshdet_y_start' => ['name' => 'Start Y', 'domain' => 'cell_size'],
        'd9_frontdshdet_y_end' => ['name' => 'End Y', 'domain' => 'cell_size'],
        'd9_frontdshdet_order' => ['name' => 'Order', 'domain' => 'order'],
        'd9_frontdshdet_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'd9_frontend_dashboard_details_pk' => ['type' => 'pk', 'columns' => ['d9_frontdshdet_tenant_id', 'd9_frontdshdet_d9_frontdash_id', 'd9_frontdshdet_id']],
        'd9_frontdshdet_d9_frontdash_id_fk' => [
            'type' => 'fk',
            'columns' => ['d9_frontdshdet_tenant_id', 'd9_frontdshdet_d9_frontdash_id'],
            'foreign_model' => '\Numbers\Users\Dashboards\Model\Frontend\Dashboards',
            'foreign_columns' => ['d9_frontdash_tenant_id', 'd9_frontdash_id']
        ],
        'd9_frontdshdet_d9_backdash_code_fk' => [
            'type' => 'fk',
            'columns' => ['d9_frontdshdet_d9_backdash_code'],
            'foreign_model' => '\Numbers\Users\Dashboards\Model\Backend\Dashboards',
            'foreign_columns' => ['d9_backdash_code'],
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
