<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Workflows\Model\Workflow;

use Object\Table;

class Steps extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'W9';
    public $title = 'W/9 Workflow Steps';
    public $schema;
    public $name = 'w9_workflow_steps';
    public $pk = ['w9_wrkflstep_tenant_id', 'w9_wrkflstep_workflow_id', 'w9_wrkflstep_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'w9_wrkflstep_';
    public $columns = [
        'w9_wrkflstep_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'w9_wrkflstep_workflow_id' => ['name' => 'Workflow #', 'domain' => 'workflow_id'],
        'w9_wrkflstep_id' => ['name' => 'Step #', 'domain' => 'step_id'],
        'w9_wrkflstep_wrkflstptype_id' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Workflows\Model\Workflow\Step\Types'],
        'w9_wrkflstep_name' => ['name' => 'Name', 'domain' => 'name'],
        'w9_wrkflstep_order' => ['name' => 'Order', 'domain' => 'order'],
        'w9_wrkflstep_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'w9_workflow_steps_pk' => ['type' => 'pk', 'columns' => ['w9_wrkflstep_tenant_id', 'w9_wrkflstep_workflow_id', 'w9_wrkflstep_id']],
        'w9_wrkflstep_workflow_id_fk' => [
            'type' => 'fk',
            'columns' => ['w9_wrkflstep_tenant_id', 'w9_wrkflstep_workflow_id'],
            'foreign_model' => '\Numbers\Users\Workflows\Model\Workflows',
            'foreign_columns' => ['w9_workflow_tenant_id', 'w9_workflow_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
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
