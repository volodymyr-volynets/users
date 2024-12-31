<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Model\File;

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'DT';
    public $title = 'D/T File Types';
    public $name = 'dt_file_types';
    public $pk = ['dt_filetype_tenant_id', 'dt_filetype_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'dt_filetype_';
    public $columns = [
        'dt_filetype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'dt_filetype_id' => ['name' => 'Type', 'domain' => 'type_id_sequence'],
        'dt_filetype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'dt_filetype_name' => ['name' => 'Name', 'domain' => 'name'],
        'dt_filetype_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'dt_filetype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'dt_file_types_pk' => ['type' => 'pk', 'columns' => ['dt_filetype_tenant_id', 'dt_filetype_id']],
        'dt_filetype_code_un' => ['type' => 'unique', 'columns' => ['dt_filetype_tenant_id', 'dt_filetype_code']],
    ];
    public $indexes = [
        'dt_file_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['dt_filetype_name', 'dt_filetype_code']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'dt_filetype_tenant_id' => 'wg_audit_tenant_id',
            'dt_filetype_id' => 'wg_audit_filetype_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'dt_filetype_name' => 'name'
    ];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
