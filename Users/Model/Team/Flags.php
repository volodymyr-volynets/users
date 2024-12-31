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

class Flags extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Permission Flags';
    public $name = 'um_team_system_flags';
    public $pk = ['um_temsysflag_tenant_id', 'um_temsysflag_team_id', 'um_temsysflag_module_id', 'um_temsysflag_sysflag_id', 'um_temsysflag_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_temsysflag_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_temsysflag_';
    public $columns = [
        'um_temsysflag_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_temsysflag_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_temsysflag_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_temsysflag_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_temsysflag_sysflag_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_temsysflag_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_temsysflag_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_system_flags_pk' => ['type' => 'pk', 'columns' => ['um_temsysflag_tenant_id', 'um_temsysflag_team_id', 'um_temsysflag_module_id', 'um_temsysflag_sysflag_id', 'um_temsysflag_action_id']],
        'um_temsysflag_sysflag_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temsysflag_sysflag_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\System\Flags',
            'foreign_columns' => ['sm_sysflag_id']
        ],
        'um_temsysflag_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temsysflag_sysflag_id', 'um_temsysflag_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\System\Flag\Map',
            'foreign_columns' => ['sm_sysflgmap_sysflag_id', 'sm_sysflgmap_action_id']
        ],
        'um_temsysflag_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temsysflag_tenant_id', 'um_temsysflag_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
        'um_temsysflag_team_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temsysflag_tenant_id', 'um_temsysflag_team_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Teams',
            'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
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
