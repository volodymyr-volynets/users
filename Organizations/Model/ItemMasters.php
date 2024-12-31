<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model;

use Object\Table;

class ItemMasters extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Item Master';
    public $schema;
    public $name = 'on_item_masters';
    public $pk = ['on_itemmaster_tenant_id', 'on_itemmaster_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_itemmaster_';
    public $columns = [
        'on_itemmaster_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_itemmaster_id' => ['name' => 'Item Master #', 'domain' => 'item_master_id_sequence'],
        'on_itemmaster_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'on_itemmaster_name' => ['name' => 'Name', 'domain' => 'name'],
        'on_itemmaster_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_item_masters_pk' => ['type' => 'pk', 'columns' => ['on_itemmaster_tenant_id', 'on_itemmaster_id']],
        'on_itemmaster_code_un' => ['type' => 'unique', 'columns' => ['on_itemmaster_tenant_id', 'on_itemmaster_code']],
    ];
    public $indexes = [
        'on_item_masters_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_itemmaster_code', 'on_itemmaster_name']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_itemmaster_tenant_id' => 'wg_audit_tenant_id',
            'on_itemmaster_id' => 'wg_audit_itemmaster_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'on_itemmaster_name' => 'name',
        'on_itemmaster_inactive' => 'inactive'
    ];
    public $options_active = [
        'on_itemmaster_inactive' => 0
    ];
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
