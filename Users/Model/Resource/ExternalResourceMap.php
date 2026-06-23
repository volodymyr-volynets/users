<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\Table;

class ExternalResourceMap extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Resource Map';
    public $name = 'um_external_resource_map';
    public $pk = ['um_extresmap_tenant_id', 'um_extresmap_um_extresrc_id', 'um_extresmap_method_code', 'um_extresmap_um_extactn_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extresmap_';
    public $columns = [
        'um_extresmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extresmap_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_extresmap_method_code' => ['name' => 'Method Code', 'domain' => 'code'], // controls access to controller's action in the code
        'um_extresmap_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        // weight
        'um_extresmap_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extresmap_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_extresmap_disabled' => ['name' => 'Disabled', 'type' => 'boolean'],
        'um_extresmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_external_resource_map_pk' => ['type' => 'pk', 'columns' => ['um_extresmap_tenant_id', 'um_extresmap_um_extresrc_id', 'um_extresmap_method_code', 'um_extresmap_um_extactn_id']],
        'um_extresmap_um_extresrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extresmap_tenant_id', 'um_extresmap_um_extresrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalResources',
            'foreign_columns' => ['um_extresrc_tenant_id', 'um_extresrc_id']
        ],
        'um_extresmap_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extresmap_tenant_id', 'um_extresmap_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
            'foreign_columns' => ['um_extactn_tenant_id', 'um_extactn_id']
        ],
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'public',
        'protection' => 0,
        'scope' => 'global'
    ];
}
