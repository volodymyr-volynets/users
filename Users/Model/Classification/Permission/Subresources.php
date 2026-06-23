<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification\Permission;

use Object\Table;

class Subresources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification Permission Subresources';
    public $name = 'um_classification_permission_subresources';
    public $pk = ['um_clssubres_tenant_id', 'um_clssubres_um_classification_id', 'um_clssubres_module_id', 'um_clssubres_resource_id', 'um_clssubres_rsrsubres_id', 'um_clssubres_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_clssubres_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_clssubres_';
    public $columns = [
        'um_clssubres_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clssubres_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_clssubres_um_classification_id' => ['name' => 'Classification #', 'domain' => 'classification_id'],
        'um_clssubres_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_clssubres_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_clssubres_rsrsubres_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_clssubres_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_clssubres_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_permission_subresources_pk' => ['type' => 'pk', 'columns' => ['um_clssubres_tenant_id', 'um_clssubres_um_classification_id', 'um_clssubres_module_id', 'um_clssubres_resource_id', 'um_clssubres_rsrsubres_id', 'um_clssubres_action_id']],
        'um_clssubres_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clssubres_tenant_id', 'um_clssubres_um_classification_id', 'um_clssubres_module_id', 'um_clssubres_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classification\Permissions',
            'foreign_columns' => ['um_clsperm_tenant_id', 'um_clsperm_um_classification_id', 'um_clsperm_module_id', 'um_clsperm_resource_id']
        ],
        'um_clssubres_rsrsubres_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clssubres_resource_id', 'um_clssubres_rsrsubres_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresources',
            'foreign_columns' => ['sm_rsrsubres_resource_id', 'sm_rsrsubres_id']
        ],
        'um_clssubres_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clssubres_rsrsubres_id', 'um_clssubres_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map',
            'foreign_columns' => ['sm_rsrsubmap_rsrsubres_id', 'sm_rsrsubmap_action_id']
        ],
        'um_clssubres_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clssubres_tenant_id', 'um_clssubres_module_id'],
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
