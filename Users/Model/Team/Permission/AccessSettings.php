<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team\Permission;

use Object\Table;

class AccessSettings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Permission Access Settings';
    public $name = 'um_team_permission_access_settings';
    public $pk = ['um_temacsetting_tenant_id', 'um_temacsetting_team_id', 'um_temacsetting_module_id', 'um_temacsetting_resource_id', 'um_temacsetting_sm_rsacsertype_code', 'um_temacsetting_sm_rsacserowner_code'];
    public $tenant = true;
    public $orderby = [
        'um_temacsetting_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_temacsetting_';
    public $columns = [
        'um_temacsetting_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_temacsetting_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_temacsetting_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_temacsetting_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_temacsetting_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_temacsetting_sm_rsacsertype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_temacsetting_sm_rsacserowner_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_temacsetting_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_permission_access_settings_pk' => ['type' => 'pk', 'columns' => ['um_temacsetting_tenant_id', 'um_temacsetting_team_id', 'um_temacsetting_module_id', 'um_temacsetting_resource_id', 'um_temacsetting_sm_rsacsertype_code', 'um_temacsetting_sm_rsacserowner_code']],
        'um_temacsetting_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temacsetting_tenant_id', 'um_temacsetting_team_id', 'um_temacsetting_module_id', 'um_temacsetting_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Team\Permissions',
            'foreign_columns' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id']
        ],
        'um_temacsetting_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temacsetting_tenant_id', 'um_temacsetting_module_id'],
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
