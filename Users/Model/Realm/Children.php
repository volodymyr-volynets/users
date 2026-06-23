<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm;

use Object\Table;

class Children extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realm Children';
    public $name = 'um_realm_children';
    public $pk = ['um_rearea_tenant_id', 'um_rearea_parent_um_realm_id', 'um_rearea_child_um_realm_id'];
    public $tenant = true;
    public $orderby = [
        'um_rearea_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_rearea_';
    public $columns = [
        'um_rearea_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_rearea_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_rearea_parent_um_realm_id' => ['name' => 'Parent Realm #', 'domain' => 'realm_id'],
        'um_rearea_child_um_realm_id' => ['name' => 'Child Realm #', 'domain' => 'realm_id'],
        'um_rearea_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_realm_children_pk' => ['type' => 'pk', 'columns' => ['um_rearea_tenant_id', 'um_rearea_parent_um_realm_id', 'um_rearea_child_um_realm_id']],
        'um_rearea_parent_um_realm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rearea_tenant_id', 'um_rearea_parent_um_realm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realms',
            'foreign_columns' => ['um_realm_tenant_id', 'um_realm_id']
        ],
        'um_rearea_child_um_realm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rearea_tenant_id', 'um_rearea_child_um_realm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realms',
            'foreign_columns' => ['um_realm_tenant_id', 'um_realm_id']
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
