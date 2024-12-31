<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Setting\Policy;

use Object\Table;

class Policies extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Setting Policies';
    public $name = 'um_setting_policies';
    public $pk = ['um_setpolicy_tenant_id', 'um_setpolicy_module_id', 'um_setpolicy_sm_policy_tenant_id', 'um_setpolicy_sm_policy_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_setpolicy_';
    public $columns = [
        'um_setpolicy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_setpolicy_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_setpolicy_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_setpolicy_sm_policy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_setpolicy_sm_policy_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_setpolicy_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_setting_policies_pk' => ['type' => 'pk', 'columns' => ['um_setpolicy_tenant_id', 'um_setpolicy_module_id', 'um_setpolicy_sm_policy_tenant_id', 'um_setpolicy_sm_policy_code']],
        'um_setpolicy_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_setpolicy_tenant_id', 'um_setpolicy_module_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Settings',
            'foreign_columns' => ['um_setting_tenant_id', 'um_setting_module_id']
        ],
        'um_setpolicy_sm_policy_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_setpolicy_sm_policy_tenant_id', 'um_setpolicy_sm_policy_code'],
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
