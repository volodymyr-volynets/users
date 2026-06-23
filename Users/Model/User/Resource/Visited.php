<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Resource;

use Object\Table;

class Visited extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Resource Visited';
    public $name = 'um_user_resource_visited';
    public $pk = ['um_usrresvisit_tenant_id', 'um_usrresvisit_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrresvisit_updated_timestamp' => SORT_DESC
    ];
    public $limit;
    public $column_prefix = 'um_usrresvisit_';
    public $columns = [
        'um_usrresvisit_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrresvisit_id' => ['name' => 'Visit #', 'domain' => 'big_id_sequence'],
        'um_usrresvisit_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrresvisit_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'um_usrresvisit_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_usrresvisit_url' => ['name' => 'URL', 'domain' => 'url'],
        'um_usrresvisit_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrresvisit_module_code' => ['name' => 'Module Code', 'domain' => 'module_code', 'null' => true],
        'um_usrresvisit_counter' => ['name' => 'Counter', 'domain' => 'bigcounter'],
        'um_usrresvisit_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_resource_visited_pk' => ['type' => 'pk', 'columns' => ['um_usrresvisit_tenant_id', 'um_usrresvisit_id']],
        'um_usrresvisit_url_un' => ['type' => 'unique', 'columns' => ['um_usrresvisit_tenant_id', 'um_usrresvisit_url', 'um_usrresvisit_user_id']],
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
