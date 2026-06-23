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

class ExternalSubresources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Subresources';
    public $name = 'um_external_subresources';
    public $pk = ['um_extsursrc_tenant_id', 'um_extsursrc_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extsursrc_';
    public $columns = [
        'um_extsursrc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extsursrc_id' => ['name' => 'Subresource #', 'domain' => 'resource_id_sequence'],
        'um_extsursrc_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_extsursrc_parent_um_extsursrc_id' => ['name' => 'Parent Subresource #', 'domain' => 'resource_id', 'null' => true],
        'um_extsursrc_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_extsursrc_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_extsursrc_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_extsursrc_um_extmdl_code' => ['name' => 'Module Code', 'domain' => 'module_code_external'],
        'um_extsursrc_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        // weight
        'um_extsursrc_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extsursrc_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // other
        'um_extsursrc_disabled' => ['name' => 'Disabled', 'type' => 'boolean'],
        'um_extsursrc_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_external_subresources_pk' => ['type' => 'pk', 'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_id']],
        'um_extsursrc_um_extresrc_id_un' => ['type' => 'unique', 'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_um_extresrc_id', 'um_extsursrc_id']],
        'um_extsursrc_code_un' => ['type' => 'unique', 'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_um_extresrc_id', 'um_extsursrc_code']],
        'um_extsursrc_slug_um' => ['type' => 'unique', 'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_slug']],
        'um_extsursrc_um_extresrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_um_extresrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalResources',
            'foreign_columns' => ['um_extresrc_tenant_id', 'um_extresrc_id']
        ],
        'um_extsursrc_parent_um_extsursrc_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_parent_um_extsursrc_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresources',
            'foreign_columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_id']
        ],
        'um_extsursrc_um_extmdl_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_extsursrc_tenant_id', 'um_extsursrc_um_extmdl_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules',
            'foreign_columns' => ['um_extmdl_tenant_id', 'um_extmdl_code']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_extsursrc_name' => 'name',
        // todo icon vs avatar
        //'um_extsursrc_icon' => 'icon_class',
        'um_extsursrc_parent_um_extsursrc_id' => 'parent',
        'um_extsursrc_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_extsursrc_inactive' => 0
    ];
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
