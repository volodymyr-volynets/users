<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain\Policy;

use Object\Table;

class Policies extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Domain Policies';
    public $name = 'um_domain_policies';
    public $pk = ['um_dompolicy_tenant_id', 'um_dompolicy_um_domain_id', 'um_dompolicy_sm_policy_tenant_id', 'um_dompolicy_sm_policy_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_dompolicy_';
    public $columns = [
        'um_dompolicy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_dompolicy_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_dompolicy_um_domain_id' => ['name' => 'Domain #', 'domain' => 'domain_id'],
        'um_dompolicy_sm_policy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_dompolicy_sm_policy_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'um_dompolicy_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_domain_policies_pk' => ['type' => 'pk', 'columns' => ['um_dompolicy_tenant_id', 'um_dompolicy_um_domain_id', 'um_dompolicy_sm_policy_tenant_id', 'um_dompolicy_sm_policy_code']],
        'um_dompolicy_um_domain_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_dompolicy_tenant_id', 'um_dompolicy_um_domain_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Domains',
            'foreign_columns' => ['um_domain_tenant_id', 'um_domain_id']
        ],
        'um_dompolicy_sm_policy_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_dompolicy_sm_policy_tenant_id', 'um_dompolicy_sm_policy_code'],
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
