<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification\ExternalPermission;

use Object\Table;

class Actions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification External Permission Actions';
    public $name = 'um_classification_external_permission_actions';
    public $pk = ['um_clsextpractn_tenant_id', 'um_clsextpractn_um_classification_id', 'um_clsextpractn_um_extmdids_id', 'um_clsextpractn_um_extresrc_id', 'um_clsextpractn_method_code', 'um_clsextpractn_um_extactn_id'];
    public $tenant = true;
    public $orderby = [
        'um_clsextpractn_um_extactn_id' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_clsextpractn_';
    public $columns = [
        'um_clsextpractn_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clsextpractn_um_classification_id' => ['name' => 'Classification #', 'domain' => 'classification_id'],
        'um_clsextpractn_um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_clsextpractn_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_clsextpractn_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
        'um_clsextpractn_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_clsextpractn_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_external_permission_actions_pk' => ['type' => 'pk', 'columns' => ['um_clsextpractn_tenant_id', 'um_clsextpractn_um_classification_id', 'um_clsextpractn_um_extmdids_id', 'um_clsextpractn_um_extresrc_id', 'um_clsextpractn_method_code', 'um_clsextpractn_um_extactn_id']],
        'um_clsextpractn_um_extresrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clsextpractn_tenant_id', 'um_clsextpractn_um_classification_id', 'um_clsextpractn_um_extmdids_id', 'um_clsextpractn_um_extresrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classification\ExternalPermissions',
            'foreign_columns' => ['um_clsextperm_tenant_id', 'um_clsextperm_um_classification_id', 'um_clsextperm_um_extmdids_id', 'um_clsextperm_um_extresrc_id']
        ],
        'um_clsextpractn_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clsextpractn_tenant_id', 'um_clsextpractn_um_extresrc_id', 'um_clsextpractn_method_code', 'um_clsextpractn_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalResourceMap',
            'foreign_columns' => ['um_extresmap_tenant_id', 'um_extresmap_um_extresrc_id', 'um_extresmap_method_code', 'um_extresmap_um_extactn_id']
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
