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

class ExternalSubresourceMap extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Resource Map';
    public $name = 'um_external_subresource_map';
    public $pk = ['um_extsursmap_tenant_id', 'um_extsursmap_um_extsursrc_id', 'um_extsursmap_um_extactn_id'];
    public $tenant = false;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extsursmap_';
    public $columns = [
        'um_extsursmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extsursmap_um_extsursrc_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
        'um_extsursmap_um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        // weight
        'um_extsursmap_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extsursmap_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_extsursmap_disabled' => ['name' => 'Disabled', 'type' => 'boolean'],
        'um_extsursmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_external_subresource_map_pk' => ['type' => 'pk', 'columns' => ['um_extsursmap_tenant_id', 'um_extsursmap_um_extsursrc_id', 'um_extsursmap_um_extactn_id']],
        'um_extsursmap_um_extsursrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extsursmap_tenant_id', 'um_extsursmap_um_extsursrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresources',
            'foreign_columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_id']
        ],
        'um_extsursmap_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extsursmap_tenant_id', 'um_extsursmap_um_extactn_id'],
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
