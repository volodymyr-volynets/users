<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team;

use Object\Table;

class Permissions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Permissions';
    public $name = 'um_team_permissions';
    public $pk = ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id'];
    public $tenant = true;
    public $orderby = [
        'um_temperm_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_temperm_';
    public $columns = [
        'um_temperm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_temperm_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_temperm_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_temperm_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_temperm_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_temperm_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_permissions_pk' => ['type' => 'pk', 'columns' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id']],
        'um_temperm_team_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temperm_tenant_id', 'um_temperm_team_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Teams',
            'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
        ],
        'um_temperm_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temperm_resource_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resources',
            'foreign_columns' => ['sm_resource_id']
        ],
        'um_temperm_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temperm_tenant_id', 'um_temperm_module_id'],
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

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
