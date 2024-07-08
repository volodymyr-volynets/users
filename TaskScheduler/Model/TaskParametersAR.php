<?php

namespace Numbers\Users\TaskScheduler\Model;
class TaskParametersAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\TaskScheduler\Model\TaskParameters::class;

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
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $ts_tskparam_task_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $ts_tskparam_name = null;

	/**
	 * Description
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $ts_tskparam_description = null;

	/**
	 * Default
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $ts_tskparam_default = null;

	/**
	 * Mandatory
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ts_tskparam_mandatory = 0;
}