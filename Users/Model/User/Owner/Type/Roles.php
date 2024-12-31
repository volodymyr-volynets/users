<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Owner\Type;

use Object\Table;

class Roles extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Owner Type Roles';
    public $name = 'um_owner_type_roles';
    public $pk = ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id', 'um_ownertprole_role_id'];
    public $tenant = true;
    public $orderby = [
        'um_ownertprole_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_ownertprole_';
    public $columns = [
        'um_ownertprole_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_ownertprole_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_ownertprole_ownertype_id' => ['name' => 'Owner Type #', 'domain' => 'type_id'],
        'um_ownertprole_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
        'um_ownertprole_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_owner_type_roles_pk' => ['type' => 'pk', 'columns' => ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id', 'um_ownertprole_role_id']],
        'um_ownertprole_ownertype_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Owner\Types',
            'foreign_columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']
        ],
        'um_ownertprole_role_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_ownertprole_tenant_id', 'um_ownertprole_role_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Roles',
            'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
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

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
