<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm;

use Object\Table;

class Map extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realm Map';
    public $name = 'um_user_realm_map';
    public $pk = ['um_usrreamap_tenant_id', 'um_usrreamap_user_id', 'um_usrreamap_um_realm_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrreamap_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_usrreamap_';
    public $columns = [
        'um_usrreamap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrreamap_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrreamap_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrreamap_um_realm_id' => ['name' => 'Realm #', 'domain' => 'realm_id'],
        'um_usrreamap_primary' => ['name' => 'Primary', 'type' => 'boolean'],
        'um_usrreamap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_realm_map_pk' => ['type' => 'pk', 'columns' => ['um_usrreamap_tenant_id', 'um_usrreamap_user_id', 'um_usrreamap_um_realm_id']],
        'um_usrreamap_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrreamap_tenant_id', 'um_usrreamap_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrreamap_um_realm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrreamap_tenant_id', 'um_usrreamap_um_realm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realms',
            'foreign_columns' => ['um_realm_tenant_id', 'um_realm_id']
        ],
    ];
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
