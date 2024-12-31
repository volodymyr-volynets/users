<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Permission;

use Object\Table;

class Subresources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Permission Subresources';
    public $name = 'um_user_permission_subresources';
    public $pk = ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrsubres_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrsubres_';
    public $columns = [
        'um_usrsubres_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrsubres_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrsubres_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrsubres_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_usrsubres_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_usrsubres_rsrsubres_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_usrsubres_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_usrsubres_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_permission_subresources_pk' => ['type' => 'pk', 'columns' => ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id']],
        'um_usrsubres_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Permissions',
            'foreign_columns' => ['um_usrperm_tenant_id', 'um_usrperm_user_id', 'um_usrperm_module_id', 'um_usrperm_resource_id']
        ],
        'um_usrsubres_rsrsubres_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresources',
            'foreign_columns' => ['sm_rsrsubres_resource_id', 'sm_rsrsubres_id']
        ],
        'um_usrsubres_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map',
            'foreign_columns' => ['sm_rsrsubmap_rsrsubres_id', 'sm_rsrsubmap_action_id']
        ],
        'um_usrsubres_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsubres_tenant_id', 'um_usrsubres_module_id'],
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
