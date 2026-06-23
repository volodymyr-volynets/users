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

class WeightedModuleActions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Weighted Module Actions';
    public $name = 'um_weighted_module_actions';
    public $pk = ['um_weimdction_tenant_id', 'um_weimdction_module_id', 'um_weimdction_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_weimdction_weight_value' => SORT_DESC
    ];
    public $limit;
    public $column_prefix = 'um_weimdction_';
    public $columns = [
        'um_weimdction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_weimdction_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_weimdction_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        // weight
        'um_weimdction_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_weimdction_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_weimdction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_weighted_module_actions_pk' => ['type' => 'pk', 'columns' => ['um_weimdction_tenant_id', 'um_weimdction_module_id', 'um_weimdction_action_id']],
        'um_weimdction_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_weimdction_tenant_id', 'um_weimdction_module_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\WeightedModuleIDs',
            'foreign_columns' => ['um_weimdids_tenant_id', 'um_weimdids_module_id']
        ],
        'um_weimdction_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_weimdction_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions',
            'foreign_columns' => ['sm_action_id']
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
