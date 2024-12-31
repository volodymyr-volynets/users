<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\Table;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Groups';
    public $name = 'um_user_groups';
    public $pk = ['um_usrgrp_tenant_id', 'um_usrgrp_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrgrp_';
    public $columns = [
        'um_usrgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrgrp_id' => ['name' => 'Group #', 'domain' => 'group_id_sequence'],
        'um_usrgrp_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'um_usrgrp_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrgrp_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'um_usrgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_groups_pk' => ['type' => 'pk', 'columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id']],
        'um_usrgrp_code_un' => ['type' => 'unique', 'columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_code']],
    ];
    public $indexes = [
        'um_user_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_usrgrp_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_usrgrp_tenant_id' => 'wg_audit_tenant_id',
            'um_usrgrp_id' => 'wg_audit_usrgrp_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_usrgrp_name' => 'name',
        'um_usrgrp_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrgrp_inactive' => 0,
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
}
