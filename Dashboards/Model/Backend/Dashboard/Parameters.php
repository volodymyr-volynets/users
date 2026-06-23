<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Backend\Dashboard;

use Object\Table;

class Parameters extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'D9';
    public $title = 'D/9 Backend Dashboard Parameters';
    public $schema;
    public $name = 'd9_backend_dashboard_parameters';
    public $pk = ['d9_backdshpar_tenant_id', 'd9_backdshpar_d9_backdash_code', 'd9_backdshpar_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'd9_backdshpar_';
    public $columns = [
        'd9_backdshpar_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'd9_backdshpar_d9_backdash_code' => ['name' => 'Dashboard Code', 'domain' => 'group_code'],
        'd9_backdshpar_code' => ['name' => 'Code', 'domain' => 'code'],
        'd9_backdshpar_name' => ['name' => 'Name', 'domain' => 'name'],
        'd9_backdshpar_sm_sharetype_code' => ['name' => 'Field Type', 'domain' => 'type_code', 'options_model' => '\Numbers\Backend\Db\Common\Model\Shareable\Types'],
        'd9_backdshpar_model' => ['name' => 'Model', 'domain' => 'model', 'null' => true],
        'd9_backdshpar_order' => ['name' => 'Order', 'domain' => 'order'],
        'd9_backdshpar_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'd9_backend_dashboard_parameters_pk' => ['type' => 'pk', 'columns' => ['d9_backdshpar_tenant_id', 'd9_backdshpar_d9_backdash_code', 'd9_backdshpar_code']],
        'd9_backdshpar_d9_backdash_code_fk' => [
            'type' => 'fk',
            'columns' => ['d9_backdshpar_tenant_id', 'd9_backdshpar_d9_backdash_code'],
            'foreign_model' => '\Numbers\Users\Dashboards\Model\Backend\Dashboards',
            'foreign_columns' => ['d9_backdash_tenant_id', 'd9_backdash_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'd9_backdshpar_name' => 'name',
        'd9_backdshpar_code' => 'name',
        'd9_backdshpar_inactive' => 'inactive',
    ];
    public $options_active = [
        'd9_backdshpar_inactive' => 0
    ];
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
