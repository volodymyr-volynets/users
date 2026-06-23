<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\ABAC;

use Object\Table;

class AssignmentTableAccesses extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M ABAC Assignment Table Accesses';
    public $name = 'um_abac_assignment_table_accesses';
    public $pk = ['um_abacasstblacc_tenant_id', 'um_abacasstblacc_id'];
    public $tenant = true;
    public $orderby = ['um_abacasstblacc_id' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_abacasstblacc_';
    public $columns = [
        'um_abacasstblacc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_abacasstblacc_id' => ['name' => 'Record #', 'domain' => 'big_id_sequence'],
        // model
        'um_abacasstblacc_sm_model_id' => ['name' => 'Model #', 'domain' => 'model_id'],
        'um_abacasstblacc_sm_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        // null for all modules
        'um_abacasstblacc_module_code' => ['name' => 'Module Code', 'domain' => 'module_code', 'null' => true],
        'um_abacasstblacc_module_id' => ['name' => 'Module #', 'domain' => 'module_id', 'null' => true],
        // access
        'um_abacasstblacc_um_abacasigntype_code' => ['name' => 'Assignment Type', 'domain' => 'group_code', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTypes'],
        'um_abacasstblacc_um_abacasstblatr_code' => ['name' => 'Attribute Code', 'domain' => 'code', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTableAttributes'],
        'um_abacasstblacc_um_abacasignperm_code' => ['name' => 'Assignment Permission', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentPermissions'],
        // other
        'um_abacasstblacc_default' => ['name' => 'Default', 'type' => 'boolean'],
        'um_abacasstblacc_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'um_abac_assignment_table_accesses_pk' => ['type' => 'pk', 'columns' => ['um_abacasstblacc_tenant_id', 'um_abacasstblacc_id']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [
        'map' => [
            'um_abacasstblacc_tenant_id' => 'wg_audit_tenant_id',
            'um_abacasstblacc_id' => 'wg_audit_um_abacasstblacc_id',
        ]
    ];
    public $optimistic_lock = false;
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
        'updated' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
