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

class AssignmentRecords extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M ABAC Assignment Records';
    public $name = 'um_abac_assignment_records';
    public $pk = ['um_abacassign_tenant_id', 'um_abacassign_id'];
    public $tenant = true;
    public $orderby = ['um_abacassign_id' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_abacassign_';
    public $columns = [
        'um_abacassign_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_abacassign_id' => ['name' => 'Record #', 'domain' => 'big_id_sequence'],
        // types
        'um_abacassign_um_abacasigntype_code' => ['name' => 'Assignment Type', 'domain' => 'group_code', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTypes'],
        'um_abacassign_um_abacasignperm_code' => ['name' => 'Assignment Permission', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentPermissions'],
        // record
        'um_abacassign_record_sm_model_id' => ['name' => 'Record Model #', 'domain' => 'model_id'],
        'um_abacassign_record_sm_model_code' => ['name' => 'Record Model Code', 'domain' => 'code'],
        'um_abacassign_record_field_code' => ['name' => 'Record Field Code', 'domain' => 'code', 'null' => true],
        'um_abacassign_record_field_name' => ['name' => 'Record Field Name', 'domain' => 'name', 'null' => true],
        'um_abacassign_record_value_id' => ['name' => 'Record Field Value #', 'domain' => 'big_id', 'null' => true],
        'um_abacassign_record_value_code' => ['name' => 'Record Field Value Code', 'domain' => 'code', 'null' => true],
        'um_abacassign_record_value_name' => ['name' => 'Record Field Value Name', 'domain' => 'name', 'null' => true],
        'um_abacassign_record_module_id' => ['name' => 'Record Module #', 'domain' => 'module_id', 'null' => true],
        // attribute
        'um_abacassign_attribute_sm_model_id' => ['name' => 'Attribute Model #', 'domain' => 'model_id'],
        'um_abacassign_attribute_sm_model_code' => ['name' => 'Attribute Model Code', 'domain' => 'code'],
        'um_abacassign_attribute_field_code' => ['name' => 'Attribute Field Code', 'domain' => 'code', 'null' => true],
        'um_abacassign_attribute_field_name' => ['name' => 'Attribute Field Name', 'domain' => 'name', 'null' => true],
        'um_abacassign_attribute_value_id' => ['name' => 'Attribute Field Value #', 'domain' => 'big_id', 'null' => true],
        'um_abacassign_attribute_value_code' => ['name' => 'Attribute Field Value Code', 'domain' => 'code', 'null' => true],
        'um_abacassign_attribute_value_name' => ['name' => 'Attribute Field Value Name', 'domain' => 'name', 'null' => true],
        'um_abacassign_attribute_module_id' => ['name' => 'Attribute Module #', 'domain' => 'module_id', 'null' => true],
        // other
        'um_abacassign_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'um_abac_assignment_records_pk' => ['type' => 'pk', 'columns' => ['um_abacassign_tenant_id', 'um_abacassign_id']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [
        'map' => [
            'um_abacassign_tenant_id' => 'wg_audit_tenant_id',
            'um_abacassign_id' => 'wg_audit_um_abacassign_id',
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
