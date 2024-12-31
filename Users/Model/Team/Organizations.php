<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team;

use Object\Table;

class Organizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Organizations';
    public $name = 'um_team_organizations';
    public $pk = ['um_temorg_tenant_id', 'um_temorg_team_id', 'um_temorg_organization_id'];
    public $tenant = true;
    public $orderby = [
        'um_temorg_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_temorg_';
    public $columns = [
        'um_temorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_temorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_temorg_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_temorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'um_temorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_organizations_pk' => ['type' => 'pk', 'columns' => ['um_temorg_tenant_id', 'um_temorg_team_id', 'um_temorg_organization_id']],
        'um_temorg_team_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temorg_tenant_id', 'um_temorg_team_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Teams',
            'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
        ],
        'um_temorg_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temorg_tenant_id', 'um_temorg_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
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
