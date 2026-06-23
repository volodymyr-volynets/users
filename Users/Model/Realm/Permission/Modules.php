<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm\Permission;

use Object\Table;

class Modules extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realm Permission Modules';
    public $name = 'um_realm_permission_modules';
    public $pk = ['um_reaprmmod_tenant_id', 'um_reaprmmod_um_realm_id', 'um_reaprmmod_module_id', 'um_reaprmmod_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_reaprmmod_inserted_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_reaprmmod_';
    public $columns = [
        'um_reaprmmod_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_reaprmmod_um_realm_id' => ['name' => 'Realm #', 'domain' => 'realm_id'],
        'um_reaprmmod_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_reaprmmod_module_code' => ['name' => 'Module Code', 'domain' => 'module_code', 'null' => true],
        'um_reaprmmod_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_reaprmmod_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_realm_permission_modules_pk' => ['type' => 'pk', 'columns' => ['um_reaprmmod_tenant_id', 'um_reaprmmod_um_realm_id', 'um_reaprmmod_module_id', 'um_reaprmmod_action_id']],
        'um_reaprmmod_um_realm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reaprmmod_tenant_id', 'um_reaprmmod_um_realm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realms',
            'foreign_columns' => ['um_realm_tenant_id', 'um_realm_id']
        ],
        'um_reaprmmod_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reaprmmod_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions',
            'foreign_columns' => ['sm_action_id']
        ],
        'um_reaprmmod_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reaprmmod_tenant_id', 'um_reaprmmod_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
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
