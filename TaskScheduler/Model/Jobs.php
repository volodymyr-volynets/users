<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Model;

use Object\Table;

class Jobs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TS';
    public $title = 'T/S Jobs';
    public $name = 'ts_jobs';
    public $pk = ['ts_job_tenant_id', 'ts_job_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'ts_job_';
    public $columns = [
        'ts_job_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'ts_job_id' => ['name' => 'Job #', 'domain' => 'group_id_sequence'],
        'ts_job_daemon_code' => ['name' => 'Daemon Code', 'domain' => 'type_code'],
        'ts_job_task_code' => ['name' => 'Task Code', 'domain' => 'group_code'],
        'ts_job_name' => ['name' => 'Name', 'domain' => 'name'],
        'ts_job_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        // cron
        'ts_job_cron_minute' => ['name' => 'Cron (Minutes)', 'domain' => 'code'],
        'ts_job_cron_hour' => ['name' => 'Cron (Hours)', 'domain' => 'code'],
        'ts_job_cron_day_of_month' => ['name' => 'Cron (Day of Month)', 'domain' => 'code'],
        'ts_job_cron_month' => ['name' => 'Cron (Month)', 'domain' => 'code'],
        'ts_job_cron_day_of_week' => ['name' => 'Cron (Day of Week)', 'domain' => 'code'],
        'ts_job_cron_year' => ['name' => 'Cron (Years)', 'domain' => 'code'],
        // other
        'ts_job_timezone_code' => ['name' => 'Timezone', 'domain' => 'timezone_code', 'null' => true],
        'ts_job_module_id' => ['name' => 'Module #', 'domain' => 'module_id', 'null' => true],
        'ts_job_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'ts_jobs_pk' => ['type' => 'pk', 'columns' => ['ts_job_tenant_id', 'ts_job_id']],
        'ts_job_daemon_code_fk' => [
            'type' => 'fk',
            'columns' => ['ts_job_daemon_code'],
            'foreign_model' => '\Numbers\Users\TaskScheduler\Model\Daemons',
            'foreign_columns' => ['ts_daemon_code']
        ],
        'ts_job_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['ts_job_tenant_id', 'ts_job_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
        'ts_job_task_code_fk' => [
            'type' => 'fk',
            'columns' => ['ts_job_task_code'],
            'foreign_model' => '\Numbers\Users\TaskScheduler\Model\Tasks',
            'foreign_columns' => ['ts_task_code']
        ],
        'ts_job_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['ts_job_tenant_id', 'ts_job_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'ts_job_timezone_code_fk' => [
            'type' => 'fk',
            'columns' => ['ts_job_tenant_id', 'ts_job_timezone_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Timezones',
            'foreign_columns' => ['in_timezone_tenant_id', 'in_timezone_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'ts_job_name' => 'name'
    ];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
