<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\Table;

class ExternalModuleActions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Module Actions';
    public $name = 'um_external_module_actions';
    public $pk = ['um_extmdction_tenant_id', 'um_extmdction_um_extmdids_id', 'um_extmdction_um_extactn_id'];
    public $tenant = true;
    public $orderby = [
        'um_extmdction_um_extactn_id' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_extmdction_';
    public $columns = [
        'um_extmdction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extmdction_um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_extmdction_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        // weight
        'um_extmdction_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extmdction_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_extmdction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_external_module_actions_pk' => ['type' => 'pk', 'columns' => ['um_extmdction_tenant_id', 'um_extmdction_um_extmdids_id', 'um_extmdction_um_extactn_id']],
        'um_extmdction_um_extmdids_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extmdction_tenant_id', 'um_extmdction_um_extmdids_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs',
            'foreign_columns' => ['um_extmdids_tenant_id', 'um_extmdids_id']
        ],
        'um_extmdction_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extmdction_tenant_id', 'um_extmdction_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
            'foreign_columns' => ['um_extactn_tenant_id', 'um_extactn_id']
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
