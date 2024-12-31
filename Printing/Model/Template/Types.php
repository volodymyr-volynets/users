<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Model\Template;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'P8';
    public $title = 'P/8 Template Types';
    public $name = 'p8_template_types';
    public $pk = ['p8_templtype_tenant_id', 'p8_templtype_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'p8_templtype_';
    public $columns = [
        'p8_templtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'p8_templtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'p8_templtype_name' => ['name' => 'Name', 'domain' => 'name'],
        'p8_templtype_collection_model' => ['name' => 'Collection Model', 'domain' => 'code', 'null' => true],
        'p8_templtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'p8_template_types_pk' => ['type' => 'pk', 'columns' => ['p8_templtype_tenant_id', 'p8_templtype_id']]
    ];
    public $history = false;
    public $audit = false;
    public $options_map = [
        'p8_templtype_name' => 'name',
        'p8_templtype_inactive' => 'inactive'
    ];
    public $options_active = [
        'p8_templtype_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 2,
        'scope' => 'global'
    ];
}
