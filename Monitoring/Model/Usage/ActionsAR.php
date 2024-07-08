<?php

namespace Numbers\Users\Monitoring\Model\Usage;
class ActionsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Monitoring\Model\Usage\Actions::class;

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
	public ?int $sm_monusgact_tenant_id = NULL;

	/**
	 * Usage #
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: bigint
	 */
	public ?int $sm_monusgact_usage_id = 0;

	/**
	 * Action #
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: smallint
	 */
	public ?int $sm_monusgact_action_id = 0;

	/**
	 * Usage Code
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: varchar
	 */
	public ?string $sm_monusgact_usage_code = null;

	/**
	 * Message
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $sm_monusgact_message = null;

	/**
	 * Replace
	 *
	 *
	 *
	 *
	 *
	 * @var mixed Type: json
	 */
	public ?mixed $sm_monusgact_replace = null;

	/**
	 * Affected rows
	 *
	 *
	 *
	 * {domain{counter}}
	 *
	 * @var int Domain: counter Type: integer
	 */
	public ?int $sm_monusgact_affected_rows = 0;

	/**
	 * Error rows
	 *
	 *
	 *
	 * {domain{counter}}
	 *
	 * @var int Domain: counter Type: integer
	 */
	public ?int $sm_monusgact_error_rows = 0;

	/**
	 * URL
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $sm_monusgact_url = null;

	/**
	 * History
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $sm_monusgact_history = 0;
}