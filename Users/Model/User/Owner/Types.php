<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Owner;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Owner Types';
    public $name = 'um_owner_types';
    public $pk = ['um_ownertype_tenant_id', 'um_ownertype_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_ownertype_';
    public $columns = [
        'um_ownertype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_ownertype_id' => ['name' => 'Type #', 'domain' => 'type_id_sequence'],
        'um_ownertype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_ownertype_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_ownertype_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
        'um_ownertype_readonly' => ['name' => 'Readonly', 'type' => 'boolean'],
        'um_ownertype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_owner_types_pk' => ['type' => 'pk', 'columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']],
        'um_ownertype_code_un' => ['type' => 'unique', 'columns' => ['um_ownertype_tenant_id', 'um_ownertype_code']],
    ];
    public $indexes = [
        'um_owner_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_ownertype_name', 'um_ownertype_code']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_ownertype_tenant_id' => 'wg_audit_tenant_id',
            'um_ownertype_id' => 'wg_audit_owner_type_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_ownertype_name' => 'name',
        'um_ownertype_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_ownertype_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Users\Model\User\Owner\Types::optionsActive';
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
