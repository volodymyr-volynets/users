<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Role\ExternalPermission;

use Object\Table;

class Subresources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Role External Permission Subresources';
    public $name = 'um_role_external_permission_subresources';
    public $pk = ['um_rolextprsub_tenant_id', 'um_rolextprsub_role_id', 'um_rolextprsub_um_extmdids_id', 'um_rolextprsub_um_extresrc_id', 'um_rolextprsub_um_extsursrc_id', 'um_rolextprsub_um_extactn_id'];
    public $tenant = true;
    public $orderby = [
        'um_rolextprsub_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_rolextprsub_';
    public $columns = [
        'um_rolextprsub_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_rolextprsub_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_rolextprsub_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
        'um_rolextprsub_um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_rolextprsub_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_rolextprsub_um_extsursrc_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_rolextprsub_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_rolextprsub_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_role_external_permission_subresources_pk' => ['type' => 'pk', 'columns' => ['um_rolextprsub_tenant_id', 'um_rolextprsub_role_id', 'um_rolextprsub_um_extmdids_id', 'um_rolextprsub_um_extresrc_id', 'um_rolextprsub_um_extsursrc_id', 'um_rolextprsub_um_extactn_id']],
        'um_rolextprsub_um_extresrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolextprsub_tenant_id', 'um_rolextprsub_role_id', 'um_rolextprsub_um_extmdids_id', 'um_rolextprsub_um_extresrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Role\ExternalPermissions',
            'foreign_columns' => ['um_rolextperm_tenant_id', 'um_rolextperm_role_id', 'um_rolextperm_um_extmdids_id', 'um_rolextperm_um_extresrc_id']
        ],
        'um_rolextprsub_um_extsursrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolextprsub_tenant_id', 'um_rolextprsub_um_extresrc_id', 'um_rolextprsub_um_extsursrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresources',
            'foreign_columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_um_extresrc_id', 'um_extsursrc_id']
        ],
        'um_rolextprsub_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolextprsub_tenant_id', 'um_rolextprsub_um_extsursrc_id', 'um_rolextprsub_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresourceMap',
            'foreign_columns' => ['um_extsursmap_tenant_id', 'um_extsursmap_um_extsursrc_id', 'um_extsursmap_um_extactn_id']
        ],
        'um_rolextprsub_um_extmdids_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_rolextprsub_tenant_id', 'um_rolextprsub_um_extmdids_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs',
            'foreign_columns' => ['um_extmdids_tenant_id', 'um_extmdids_id']
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
