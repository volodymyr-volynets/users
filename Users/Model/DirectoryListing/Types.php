<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\DirectoryListing;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Directory Listing Types';
    public $name = 'um_directory_listing_types';
    public $pk = ['um_dirlisttype_id'];
    public $orderby = [
        'um_dirlisttype_order' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'um_dirlisttype_';
    public $columns = [
        'um_dirlisttype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'um_dirlisttype_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_dirlisttype_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_dirlisttype_order' => ['name' => 'Order', 'domain' => 'order'],
        'um_dirlisttype_parent_um_dirlisttype_id' => ['name' => 'Parent Type #', 'domain' => 'type_id', 'null' => true],
        'um_dirlisttype_root' => ['name' => 'Root', 'type' => 'boolean'],
        'um_dirlisttype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_directory_listing_types_pk' => ['type' => 'pk', 'columns' => ['um_dirlisttype_id']]
    ];
    public $history = false;
    public $audit = false;
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
