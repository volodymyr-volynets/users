<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain;

use Object\Table;

class Children extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Domain Children';
    public $name = 'um_domain_children';
    public $pk = ['um_domdom_tenant_id', 'um_domdom_parent_um_domain_id', 'um_domdom_child_um_domain_id'];
    public $tenant = true;
    public $orderby = [
        'um_domdom_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_domdom_';
    public $columns = [
        'um_domdom_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_domdom_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_domdom_parent_um_domain_id' => ['name' => 'Parent Domain #', 'domain' => 'domain_id'],
        'um_domdom_child_um_domain_id' => ['name' => 'Child Domain #', 'domain' => 'domain_id'],
        'um_domdom_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_domain_children_pk' => ['type' => 'pk', 'columns' => ['um_domdom_tenant_id', 'um_domdom_parent_um_domain_id', 'um_domdom_child_um_domain_id']],
        'um_domdom_parent_um_domain_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_domdom_tenant_id', 'um_domdom_parent_um_domain_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Domains',
            'foreign_columns' => ['um_domain_tenant_id', 'um_domain_id']
        ],
        'um_domdom_child_um_domain_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_domdom_tenant_id', 'um_domdom_child_um_domain_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Domains',
            'foreign_columns' => ['um_domain_tenant_id', 'um_domain_id']
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

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
