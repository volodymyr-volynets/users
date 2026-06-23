<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Phases\Model;

use Object\Table;

class Steps extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'WG';
    public $title = 'W/G Phase Steps';
    public $name = 'wg_phase_steps';
    public $pk = ['wg_phasestep_tenant_id', 'wg_phasestep_code'];
    public $tenant = true;
    public $orderby = ['wg_phasestep_order' => SORT_ASC];
    public $limit;
    public $column_prefix = 'wg_phasestep_';
    public $columns = [
        'wg_phasestep_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'wg_phasestep_code' => ['name' => 'Phase Code', 'domain' => 'group_code'],
        'wg_phasestep_name' => ['name' => 'Name', 'domain' => 'name'],
        'wg_phasestep_group' => ['name' => 'Group', 'domain' => 'name'], // Quote Phase, Complete Phase
        'wg_phasestep_order' => ['name' => 'Order', 'domain' => 'order'],
        'wg_phasestep_wg_phasestptype_code' => ['name' => 'Type', 'domain' => 'group_code', 'options_model' => '\Numbers\Users\Widgets\Phases\Model\PhaseStepTypes'],
        // owner
        'wg_phasestep_um_ownertype_id' => ['name' => 'Type #', 'domain' => 'type_id', 'null' => true],
        'wg_phasestep_um_ownertype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        // settings
        'wg_phasestep_settings_json' => ['name' => 'Settings (JSON)', 'type' => 'json', 'null' => true],
        'wg_phasestep_model' => ['name' => 'Model', 'domain' => 'model', 'null' => true],
        // model
        'wg_phasestep_sm_model_id' => ['name' => 'Model #', 'domain' => 'model_id', 'null' => true],
        'wg_phasestep_sm_model_code' => ['name' => 'Model', 'domain' => 'code', 'null' => true],
        // tool
        'wg_phasestep_ai_tool_code' => ['name' => 'A/I Tool Code', 'domain' => 'code255', 'null' => true],
        'wg_phasestep_is_form' => ['name' => 'Is Form', 'type' => 'boolean'],
        // other
        'wg_phasestep_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'wg_phase_steps_pk' => ['type' => 'pk', 'columns' => ['wg_phasestep_tenant_id', 'wg_phasestep_code']],
        'wg_phasestep_um_ownertype_id_fk' => [
            'type' => 'fk',
            'columns' => ['wg_phasestep_tenant_id', 'wg_phasestep_um_ownertype_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Owner\Types',
            'foreign_columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'wg_phasestep_name' => 'name',
        'wg_phasestep_code' => 'name',
        'wg_phasestep_inactive' => 'inactive'
    ];
    public $options_active = [
        'wg_phasestep_inactive' => 0,
    ];
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
