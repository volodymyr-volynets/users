<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\OAuth\Model;

use Object\Table;

class Providers extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'OA';
    public $title = 'O/A Providers';
    public $schema;
    public $name = 'oa_providers';
    public $pk = ['oa_provider_code'];
    public $orderby = [
        'oa_provider_order' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'oa_provider_';
    public $columns = [
        'oa_provider_code' => ['name' => 'Code', 'domain' => 'code'],
        'oa_provider_name' => ['name' => 'Name', 'domain' => 'name'],
        'oa_provider_model' => ['name' => 'Model', 'domain' => 'code'],
        'oa_provider_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'oa_provider_order' => ['name' => 'Order', 'domain' => 'order', 'default' => 1000],
        'oa_provider_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'oa_providers_pk' => ['type' => 'pk', 'columns' => ['oa_provider_code']],
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
        'scope' => 'global'
    ];
}
