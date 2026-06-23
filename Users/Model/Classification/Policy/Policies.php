<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification\Policy;

use Object\Table;

class Policies extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification Policies';
    public $name = 'um_classification_policies';
    public $pk = ['um_clspolicy_tenant_id', 'um_clspolicy_um_classification_id', 'um_clspolicy_sm_policy_tenant_id', 'um_clspolicy_sm_policy_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_clspolicy_';
    public $columns = [
        'um_clspolicy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clspolicy_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_clspolicy_um_classification_id' => ['name' => 'Classification #', 'domain' => 'classification_id'],
        'um_clspolicy_sm_policy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clspolicy_sm_policy_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_clspolicy_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_policies_pk' => ['type' => 'pk', 'columns' => ['um_clspolicy_tenant_id', 'um_clspolicy_um_classification_id', 'um_clspolicy_sm_policy_tenant_id', 'um_clspolicy_sm_policy_code']],
        'um_clspolicy_um_classification_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clspolicy_tenant_id', 'um_clspolicy_um_classification_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classifications',
            'foreign_columns' => ['um_classification_tenant_id', 'um_classification_id']
        ],
        'um_clspolicy_sm_policy_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_clspolicy_sm_policy_tenant_id', 'um_clspolicy_sm_policy_code'],
            'foreign_model' => '\Numbers\Backend\System\Policies\Model\Policies',
            'foreign_columns' => ['sm_policy_tenant_id', 'sm_policy_code']
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
