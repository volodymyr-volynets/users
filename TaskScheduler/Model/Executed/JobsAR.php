<?php

namespace Numbers\Users\TaskScheduler\Model\Executed;
class JobsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\TaskScheduler\Model\Executed\Jobs::class;

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
	public ?int $ts_execjb_tenant_id = NULL;

	/**
	 * Executed Job #
	 *
	 *
	 *
	 * {domain{big_id_sequence}}
	 *
	 * @var int Domain: big_id_sequence Type: bigserial
	 */
	public ?int $ts_execjb_id = null;

	/**
	 * Job #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $ts_execjb_job_id = NULL;

	/**
	 * Status
	 *
	 *
	 * {options_model{\Numbers\Users\TaskScheduler\Model\Executed\Statuses}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $ts_execjb_status = NULL;

	/**
	 * Daemon Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $ts_execjb_daemon_code = null;

	/**
	 * Task Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $ts_execjb_task_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $ts_execjb_name = null;

	/**
	 * Execution Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ts_execjb_datetime = null;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ts_execjb_user_id = NULL;

	/**
	 * Cron (Minutes)
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $ts_execjb_cron_expression = null;

	/**
	 * Timezone
	 *
	 *
	 *
	 * {domain{timezone_code}}
	 *
	 * @var string Domain: timezone_code Type: varchar
	 */
	public ?string $ts_execjb_timezone_code = null;

	/**
	 * Parameters
	 *
	 *
	 *
	 *
	 *
	 * @var mixed Type: json
	 */
	public ?mixed $ts_execjb_parameters = null;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $ts_execjb_module_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ts_execjb_inactive = 0;

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ts_execjb_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ts_execjb_inserted_user_id = NULL;
}