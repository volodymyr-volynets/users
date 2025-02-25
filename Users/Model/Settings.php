<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\Table;

class Settings extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Settings';
    public $name = 'um_settings';
    public $pk = ['um_setting_tenant_id', 'um_setting_module_id'];
    public $tenant = true;
    public $module = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_setting_';
    public $columns = [
        'um_setting_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_setting_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        // other
        'um_setting_sequence' => ['name' => 'Sequence', 'type' => 'bigserial', 'null' => true],
        'um_setting_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_settings_pk' => ['type' => 'pk', 'columns' => ['um_setting_tenant_id', 'um_setting_module_id']],
        'um_setting_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_setting_tenant_id', 'um_setting_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
    ];
    public $indexes = [];
    public $optimistic_lock = true;
    public $history = false;
    public $audit = [
        'map' => [
            'um_setting_tenant_id' => 'wg_audit_tenant_id',
            'um_setting_module_id' => 'wg_audit_module_id'
        ]
    ];
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
