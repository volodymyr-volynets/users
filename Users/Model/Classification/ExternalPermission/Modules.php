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

class Modules extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification External Permission Modules';
    public $name = 'um_classification_external_permission_modules';
    public $pk = ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_classification_id', 'um_clsextprmmod_um_extmdids_id', 'um_clsextprmmod_um_extactn_id'];
    public $tenant = true;
    public $orderby = [
        'um_clsextprmmod_inserted_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_clsextprmmod_';
    public $columns = [
        'um_clsextprmmod_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clsextprmmod_um_classification_id' => ['name' => 'Classification #', 'domain' => 'classification_id'],
        'um_clsextprmmod_um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_clsextprmmod_um_extmdl_code' => ['name' => 'Module Code', 'domain' => 'module_code_external', 'null' => true],
        'um_clsextprmmod_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_clsextprmmod_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_external_permission_modules_pk' => ['type' => 'pk', 'columns' => ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_classification_id', 'um_clsextprmmod_um_extmdids_id', 'um_clsextprmmod_um_extactn_id']],
        'um_clsextprmmod_um_classification_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_classification_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classifications',
            'foreign_columns' => ['um_classification_tenant_id', 'um_classification_id']
        ],
        'um_clsextprmmod_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
            'foreign_columns' => ['um_extactn_tenant_id', 'um_extactn_id']
        ],
        'um_clsextprmmod_um_extmdids_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_extmdids_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs',
            'foreign_columns' => ['um_extmdids_tenant_id', 'um_extmdids_id']
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
