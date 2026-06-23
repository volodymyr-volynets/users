<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain\API;

use Object\Table;

class Methods extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Domain API Methods';
    public $name = 'um_domain_api_methods';
    public $pk = ['um_domapmethod_tenant_id', 'um_domapmethod_um_domain_id', 'um_domapmethod_module_id', 'um_domapmethod_resource_id', 'um_domapmethod_method_code'];
    public $tenant = true;
    public $orderby = [
        'um_domapmethod_method_code' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_domapmethod_';
    public $columns = [
        'um_domapmethod_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_domapmethod_um_domain_id' => ['name' => 'Domain #', 'domain' => 'domain_id'],
        'um_domapmethod_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_domapmethod_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_domapmethod_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
        'um_domapmethod_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_domain_api_methods_pk' => ['type' => 'pk', 'columns' => ['um_domapmethod_tenant_id', 'um_domapmethod_um_domain_id', 'um_domapmethod_module_id', 'um_domapmethod_resource_id', 'um_domapmethod_method_code']],
        'um_domapmethod_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_domapmethod_tenant_id', 'um_domapmethod_um_domain_id', 'um_domapmethod_module_id', 'um_domapmethod_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Domain\APIs',
            'foreign_columns' => ['um_domapi_tenant_id', 'um_domapi_um_domain_id', 'um_domapi_module_id', 'um_domapi_resource_id']
        ],
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
