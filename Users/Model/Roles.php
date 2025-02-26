<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Numbers\Users\Users\Model\User\Owner\Types;
use Object\Table;

class Roles extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Roles';
    public $schema;
    public $name = 'um_roles';
    public $pk = ['um_role_tenant_id', 'um_role_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_role_';
    public $columns = [
        'um_role_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_role_id' => ['name' => 'Role #', 'domain' => 'role_id_sequence'],
        'um_role_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_role_type_id' => ['name' => 'Type', 'domain' => 'type_id'],
        'um_role_department_id' => ['name' => 'Department #', 'domain' => 'department_id', 'null' => true],
        'um_role_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_role_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_role_global' => ['name' => 'Global', 'type' => 'boolean'],
        'um_role_super_admin' => ['name' => 'Super Admin', 'type' => 'boolean'],
        'um_role_weight' => ['name' => 'Weight', 'domain' => 'weight', 'null' => true], // based on this field priorities would be set
        'um_role_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_roles_pk' => ['type' => 'pk', 'columns' => ['um_role_tenant_id', 'um_role_id']],
        'um_role_code_un' => ['type' => 'unique', 'columns' => ['um_role_tenant_id', 'um_role_code']],
        'um_role_type_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_role_type_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Role\Types',
            'foreign_columns' => ['um_roltype_id']
        ],
        'um_role_department_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_role_tenant_id', 'um_role_department_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Departments',
            'foreign_columns' => ['on_department_tenant_id', 'on_department_id']
        ],
    ];
    public $indexes = [
        'um_roles_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_role_code', 'um_role_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_role_tenant_id' => 'wg_audit_tenant_id',
            'um_role_id' => 'wg_audit_role_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_role_name' => 'name',
        'um_role_icon' => 'icon_class',
        'um_role_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_role_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    /**
     * Owner Types relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationOwnerTypes(array & $data, array & $options)
    {
        $query = Types::queryBuilderStatic(['alias' => 'owner_types'])->select();
        $query->columns([
            'owner_types.*',
            'owner_type_map.*',
        ]);
        $query->join('INNER', new User\Owner\Type\Roles(), 'owner_type_map', 'ON', [
            ['AND', ['owner_type_map.um_ownertprole_tenant_id', '=', 'owner_types.um_ownertype_tenant_id', true], false],
            ['AND', ['owner_type_map.um_ownertprole_ownertype_id', '=', 'owner_types.um_ownertype_id', true], false],
        ]);
        $query->where('AND', ['owner_type_map.um_ownertprole_role_id', 'IN', array_column_unique($data, 'um_role_id')]);
        $result = $query->query();
        // pk and map
        pk(['um_ownertprole_role_id', 'um_ownertprole_ownertype_id'], $result['rows']);
        foreach ($data as $k => $v) {
            foreach ($result['rows'] as $k2 => $v2) {
                if ($k2 == $v['um_role_id']) {
                    foreach ($v2 as $k3 => $v3) {
                        $data[$k][$options['relation_key']][$k3] = $v3;
                    }
                }
            }
        }
    }
}
