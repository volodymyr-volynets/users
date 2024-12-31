<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team\Policy;

use Object\Table;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Team Policy Groups';
    public $name = 'um_team_policy_groups';
    public $pk = ['um_tempolgrp_tenant_id', 'um_tempolgrp_team_id', 'um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_tempolgrp_';
    public $columns = [
        'um_tempolgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_tempolgrp_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_tempolgrp_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
        'um_tempolgrp_sm_polgroup_tenant_id' => ['name' => 'Child Tenant #', 'domain' => 'tenant_id'],
        'um_tempolgrp_sm_polgroup_id' => ['name' => 'Child Group #', 'domain' => 'group_id'],
        'um_tempolgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_team_policy_groups_pk' => ['type' => 'pk', 'columns' => ['um_tempolgrp_tenant_id', 'um_tempolgrp_team_id', 'um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id']],
        'um_tempolgrp_team_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_tempolgrp_tenant_id', 'um_tempolgrp_team_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Teams',
            'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
        ],
        'um_tempolgrp_sm_polgroup_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id'],
            'foreign_model' => '\Numbers\Backend\System\Policies\Model\Groups',
            'foreign_columns' => ['sm_polgroup_tenant_id', 'sm_polgroup_id']
        ],
    ];
    public $indexes = [];
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

    public $who = [];

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}