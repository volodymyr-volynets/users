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

class Logins extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Logins';
    public $name = 'um_user_logins';
    public $pk = ['um_usrlogin_tenant_id', 'um_usrlogin_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrlogin_timestamp' => SORT_DESC
    ];
    public $limit;
    public $column_prefix = 'um_usrlogin_';
    public $columns = [
        'um_usrlogin_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrlogin_id' => ['name' => 'Group #', 'domain' => 'big_id_sequence'],
        'um_usrlogin_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_usrlogin_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrlogin_ip_address' => ['name' => 'IP Address', 'domain' => 'ip'],
        'um_usrlogin_ip_description' => ['name' => 'IP Description', 'domain' => 'name', 'null' => true],
        'um_usrlogin_ip_provider' => ['name' => 'IP Provider', 'domain' => 'name', 'null' => true],
        'um_usrlogin_authorization_type' => ['name' => 'Authorization Type', 'domain' => 'name', 'null' => true],
        'um_usrlogin_ip_new' => ['name' => 'IP New', 'type' => 'boolean'],
        'um_usrlogin_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_logins_pk' => ['type' => 'pk', 'columns' => ['um_usrlogin_tenant_id', 'um_usrlogin_id']],
        // notice: we do not add fk to users to make it not dependable
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
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
