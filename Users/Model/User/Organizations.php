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
use Numbers\Users\Organizations\Model\Organizations as OrganizationsParent;
use Numbers\Users\Users\Model\Users;

class Organizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Organizations';
    public $name = 'um_user_organizations';
    public $pk = ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrorg_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrorg_';
    public $columns = [
        'um_usrorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrorg_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'um_usrorg_primary' => ['name' => 'Primary', 'type' => 'boolean'],
        'um_usrorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_organizations_pk' => ['type' => 'pk', 'columns' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id']],
        'um_usrorg_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrorg_tenant_id', 'um_usrorg_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrorg_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrorg_tenant_id', 'um_usrorg_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
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

    public $code_model = OrganizationsParent::class;
    public $collections = [
        Users::class => [
            'name' => 'User Organizations',
            'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
            'type' => '1M',
            'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
        ],
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
