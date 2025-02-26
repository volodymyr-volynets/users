<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Model;

use Object\Table;

class Catalogs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'DT';
    public $title = 'D/T Catalogs';
    public $name = 'dt_catalogs';
    public $pk = ['dt_catalog_tenant_id', 'dt_catalog_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'dt_catalog_';
    public $columns = [
        'dt_catalog_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'dt_catalog_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'dt_catalog_dt_amzprofile_id' => ['name' => 'Amazon Profile #', 'domain' => 'profile_id', 'null' => true],
        'dt_catalog_name' => ['name' => 'Name', 'domain' => 'name'],
        'dt_catalog_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'dt_catalog_readonly' => ['name' => 'Readonly', 'type' => 'boolean'], // cannot delete after upload
        'dt_catalog_approval' => ['name' => 'Approval', 'type' => 'boolean'],
        'dt_catalog_temporary' => ['name' => 'Temporary', 'type' => 'boolean'],
        'dt_catalog_primary' => ['name' => 'Primary', 'type' => 'boolean'],
        'dt_catalog_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'dt_catalogs_pk' => ['type' => 'pk', 'columns' => ['dt_catalog_tenant_id', 'dt_catalog_code']],
    ];
    public $indexes = [
        'dt_catalogs_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['dt_catalog_name', 'dt_catalog_code']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'dt_catalog_tenant_id' => 'wg_audit_tenant_id',
            'dt_catalog_code' => 'wg_audit_catalog_code'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'dt_catalog_name' => 'name',
        'dt_catalog_inactive' => 'inactive'
    ];
    public $options_active = [
        'dt_catalog_inactive' => 0
    ];
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
