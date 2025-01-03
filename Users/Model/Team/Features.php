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

class Features extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Features';
    public $name = 'um_team_features';
    public $pk = ['um_temfeature_tenant_id', 'um_temfeature_team_id', 'um_temfeature_module_id', 'um_temfeature_feature_code'];
    public $tenant = true;
    public $orderby = [
        'um_temfeature_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_temfeature_';
    public $columns = [
        'um_temfeature_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_temfeature_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_temfeature_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_temfeature_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_temfeature_feature_code' => ['name' => 'Feature Code', 'domain' => 'feature_code'],
        'um_temfeature_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_features_pk' => ['type' => 'pk', 'columns' => ['um_temfeature_tenant_id', 'um_temfeature_team_id', 'um_temfeature_module_id', 'um_temfeature_feature_code']],
        'um_temfeature_team_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temfeature_tenant_id', 'um_temfeature_team_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Teams',
            'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
        ],
        'um_temfeature_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_temfeature_tenant_id', 'um_temfeature_module_id', 'um_temfeature_feature_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Module\Features',
            'foreign_columns' => ['tm_feature_tenant_id', 'tm_feature_module_id', 'tm_feature_feature_code']
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
