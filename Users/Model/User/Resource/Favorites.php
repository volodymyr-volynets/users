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

class Favorites extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Resource Favorites';
    public $name = 'um_user_resource_favorites';
    public $pk = ['um_usrresfavorite_tenant_id', 'um_usrresfavorite_id'];
    public $tenant = true;
    public $orderby = [
        'um_usrresfavorite_inserted_timestamp' => SORT_DESC
    ];
    public $limit;
    public $column_prefix = 'um_usrresfavorite_';
    public $columns = [
        'um_usrresfavorite_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrresfavorite_id' => ['name' => 'Favorite #', 'domain' => 'big_id_sequence'],
        'um_usrresfavorite_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrresfavorite_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'um_usrresfavorite_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_usrresfavorite_url' => ['name' => 'URL', 'domain' => 'url'],
        'um_usrresfavorite_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrresfavorite_folder' => ['name' => 'Folder', 'domain' => 'name', 'null' => true],
        'um_usrresfavorite_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id', 'null' => true],
        'um_usrresfavorite_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_resource_favorites_pk' => ['type' => 'pk', 'columns' => ['um_usrresfavorite_tenant_id', 'um_usrresfavorite_id']],
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
        //'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
