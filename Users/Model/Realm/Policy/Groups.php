<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm\Policy;

use Object\Table;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Realm Policy Groups';
    public $name = 'um_realm_policy_groups';
    public $pk = ['um_reapolgrp_tenant_id', 'um_reapolgrp_um_realm_id', 'um_reapolgrp_sm_polgroup_tenant_id', 'um_reapolgrp_sm_polgroup_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_reapolgrp_';
    public $columns = [
        'um_reapolgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_reapolgrp_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_reapolgrp_um_realm_id' => ['name' => 'Realm #', 'domain' => 'realm_id'],
        'um_reapolgrp_sm_polgroup_tenant_id' => ['name' => 'Child Tenant #', 'domain' => 'tenant_id'],
        'um_reapolgrp_sm_polgroup_id' => ['name' => 'Child Group #', 'domain' => 'group_id'],
        'um_reapolgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_realm_policy_groups_pk' => ['type' => 'pk', 'columns' => ['um_reapolgrp_tenant_id', 'um_reapolgrp_um_realm_id', 'um_reapolgrp_sm_polgroup_tenant_id', 'um_reapolgrp_sm_polgroup_id']],
        'um_reapolgrp_um_realm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reapolgrp_tenant_id', 'um_reapolgrp_um_realm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Realms',
            'foreign_columns' => ['um_realm_tenant_id', 'um_realm_id']
        ],
        'um_reapolgrp_sm_polgroup_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_reapolgrp_sm_polgroup_tenant_id', 'um_reapolgrp_sm_polgroup_id'],
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
