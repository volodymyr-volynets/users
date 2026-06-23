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

class AccessSettings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realm Permission Access Settings';
    public $name = 'um_realm_permission_access_settings';
    public $pk = ['um_reaacsetting_tenant_id', 'um_reaacsetting_um_realm_id', 'um_reaacsetting_module_id', 'um_reaacsetting_resource_id', 'um_reaacsetting_sm_rsacsertype_code', 'um_reaacsetting_sm_rsacserowner_code'];
    public $tenant = true;
    public $orderby = [
        'um_reaacsetting_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_reaacsetting_';
    public $columns = [
        'um_reaacsetting_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_reaacsetting_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_reaacsetting_um_realm_id' => ['name' => 'Realm #', 'domain' => 'realm_id'],
        'um_reaacsetting_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_reaacsetting_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_reaacsetting_sm_rsacsertype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_reaacsetting_sm_rsacserowner_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_reaacsetting_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_realm_permission_access_settings_pk' => ['type' => 'pk', 'columns' => ['um_reaacsetting_tenant_id', 'um_reaacsetting_um_realm_id', 'um_reaacsetting_module_id', 'um_reaacsetting_resource_id', 'um_reaacsetting_sm_rsacsertype_code', 'um_reaacsetting_sm_rsacserowner_code']],
        'um_reaacsetting_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reaacsetting_tenant_id', 'um_reaacsetting_um_realm_id', 'um_reaacsetting_module_id', 'um_reaacsetting_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realm\Permissions',
            'foreign_columns' => ['um_reaperm_tenant_id', 'um_reaperm_um_realm_id', 'um_reaperm_module_id', 'um_reaperm_resource_id']
        ],
        'um_reaacsetting_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reaacsetting_tenant_id', 'um_reaacsetting_module_id'],
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
