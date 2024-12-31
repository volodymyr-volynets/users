<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Invite;

use Object\Table;
use Numbers\Users\Users\Model\Roles as RolesParent;
use Numbers\Users\Users\Model\User\Invites;

class Roles extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Invite Roles';
    public $name = 'um_user_invite_roles';
    public $pk = ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_role_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrinrol_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrinrol_';
    public $columns = [
        'um_usrinrol_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrinrol_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrinrol_usrinv_id' => ['name' => 'Invite #', 'domain' => 'invite_id'],
        'um_usrinrol_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
        'um_usrinrol_unique' => ['name' => 'Unique', 'type' => 'smallint', 'null' => true, 'default' => null],
        'um_usrinrol_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_invite_roles_pk' => ['type' => 'pk', 'columns' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_role_id']],
        'um_usrinrol_unique_un' => ['type' => 'unique', 'columns' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_unique']],
        'um_usrinrol_usrinv_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Invites',
            'foreign_columns' => ['um_usrinv_tenant_id', 'um_usrinv_id']
        ],
        'um_usrinrol_role_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrinrol_tenant_id', 'um_usrinrol_role_id'],
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

    public $code_model = RolesParent::class;
    public $collections = [
        Invites::class => [
            'name' => 'Invite Roles',
            'pk' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_role_id'],
            'type' => '1M',
            'map' => ['um_usrinv_tenant_id' => 'um_usrinrol_tenant_id', 'um_usrinv_id' => 'um_usrinrol_usrinv_id'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
