<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Role\Permission;

use Object\Table;

class Subresources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Role Permission Subresources';
    public $name = 'um_role_permission_subresources';
    public $pk = ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_rolsubres_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_rolsubres_';
    public $columns = [
        'um_rolsubres_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_rolsubres_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_rolsubres_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
        'um_rolsubres_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_rolsubres_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_rolsubres_rsrsubres_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_rolsubres_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_rolsubres_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_role_permission_subresources_pk' => ['type' => 'pk', 'columns' => ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id']],
        'um_rolsubres_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Role\Permissions',
            'foreign_columns' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_module_id', 'um_rolperm_resource_id']
        ],
        'um_rolsubres_rsrsubres_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresources',
            'foreign_columns' => ['sm_rsrsubres_resource_id', 'sm_rsrsubres_id']
        ],
        'um_rolsubres_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map',
            'foreign_columns' => ['sm_rsrsubmap_rsrsubres_id', 'sm_rsrsubmap_action_id']
        ],
        'um_rolsubres_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolsubres_tenant_id', 'um_rolsubres_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
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
