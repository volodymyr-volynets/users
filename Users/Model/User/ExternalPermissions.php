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

class ExternalPermissions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User External Permissions';
    public $name = 'um_user_external_permissions';
    public $pk = ['um_usrextperm_tenant_id', 'um_usrextperm_user_id', 'um_usrextperm_um_extmdids_id', 'um_usrextperm_um_extresrc_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrextperm_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrextperm_';
    public $columns = [
        'um_usrextperm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrextperm_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrextperm_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrextperm_um_extmdids_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_usrextperm_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_usrextperm_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_external_permissions_pk' => ['type' => 'pk', 'columns' => ['um_usrextperm_tenant_id', 'um_usrextperm_user_id', 'um_usrextperm_um_extmdids_id', 'um_usrextperm_um_extresrc_id']],
        'um_usrextperm_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrextperm_tenant_id', 'um_usrextperm_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrextperm_um_extresrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrextperm_tenant_id', 'um_usrextperm_um_extresrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalResources',
            'foreign_columns' => ['um_extresrc_tenant_id', 'um_extresrc_id']
        ],
        'um_usrextperm_um_extmdids_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrextperm_tenant_id', 'um_usrextperm_um_extmdids_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs',
            'foreign_columns' => ['um_extmdids_tenant_id', 'um_extmdids_id']
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
