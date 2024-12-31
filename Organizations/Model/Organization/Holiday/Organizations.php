<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization\Holiday;

use Object\Table;

class Organizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Holiday Organizations';
    public $name = 'on_organization_holiday_organizations';
    public $pk = ['on_holiorg_tenant_id', 'on_holiorg_holiday_id', 'on_holiorg_organization_id'];
    public $tenant = true;
    public $orderby = [
        'on_holiorg_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'on_holiorg_';
    public $columns = [
        'on_holiorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_holiorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'on_holiorg_holiday_id' => ['name' => 'Holiday #', 'domain' => 'holiday_id'],
        'on_holiorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'on_holiorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_organization_holiday_organizations_pk' => ['type' => 'pk', 'columns' => ['on_holiorg_tenant_id', 'on_holiorg_holiday_id', 'on_holiorg_organization_id']],
        'on_holiorg_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_holiorg_tenant_id', 'on_holiorg_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ],
        'on_holiorg_holiday_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_holiorg_tenant_id', 'on_holiorg_holiday_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organization\Holidays',
            'foreign_columns' => ['on_holiday_tenant_id', 'on_holiday_id']
        ]
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
