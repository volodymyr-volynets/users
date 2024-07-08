<?php

namespace Numbers\Users\TaskScheduler\Model;
class JobsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\TaskScheduler\Model\Jobs::class;

	/**
	 * Constructing object
	 *
	 * @param array $options
	 *		skip_db_object
	 *		skip_table_object
	 */
	public function __construct($options = []) {
		if (empty($options['skip_table_object'])) {
			$this->object_table_object = new $this->object_table_class($options);
		}
	}
	/**
	 * Tenant #
	 *
	 *
	 *
	 * {domain{tenant_id}}
	 *
	 * @var int Domain: tenant_id Type: integer
	 */
	public ?int $ts_job_tenant_id = NULL;

	/**
	 * Job #
	 *
	 *
	 *
	 * {domain{group_id_sequence}}
	 *
	 * @var int Domain: group_id_sequence Type: serial
	 */
	public ?int $ts_job_id = null;

	/**
	 * Daemon Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $ts_job_daemon_code = null;

	/**
	 * Task Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $ts_job_task_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $ts_job_name = null;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ts_job_user_id = NULL;

	/**
	 * Cron (Minutes)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_minute = null;

	/**
	 * Cron (Hours)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_hour = null;

	/**
	 * Cron (Day of Month)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_day_of_month = null;

	/**
	 * Cron (Month)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_month = null;

	/**
	 * Cron (Day of Week)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_day_of_week = null;

	/**
	 * Cron (Years)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_job_cron_year = null;

	/**
	 * Timezone
	 *
	 *
	 *
	 * {domain{timezone_code}}
	 *
	 * @var string Domain: timezone_code Type: varchar
	 */
	public ?string $ts_job_timezone_code = null;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $ts_job_module_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ts_job_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $ts_job_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ts_job_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ts_job_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ts_job_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ts_job_updated_user_id = NULL;
}