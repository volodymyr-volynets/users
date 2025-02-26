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

class APIs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User APIs';
    public $name = 'um_user_apis';
    public $pk = ['um_usrapi_tenant_id', 'um_usrapi_user_id', 'um_usrapi_module_id', 'um_usrapi_resource_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrapi_inserted_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrapi_';
    public $columns = [
        'um_usrapi_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrapi_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrapi_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_usrapi_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_usrapi_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_apis_pk' => ['type' => 'pk', 'columns' => ['um_usrapi_tenant_id', 'um_usrapi_user_id', 'um_usrapi_module_id', 'um_usrapi_resource_id']],
        'um_usrapi_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrapi_tenant_id', 'um_usrapi_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrapi_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrapi_resource_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resources',
            'foreign_columns' => ['sm_resource_id']
        ],
        'um_usrapi_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrapi_tenant_id', 'um_usrapi_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
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

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
