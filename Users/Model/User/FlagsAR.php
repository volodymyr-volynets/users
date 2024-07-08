<?php

namespace Numbers\Users\Users\Model\User;
class FlagsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Flags::class;

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
	public ?int $um_usrsysflag_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $um_usrsysflag_timestamp = 'now()';

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrsysflag_user_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $um_usrsysflag_module_id = NULL;

	/**
	 * Subresource #
	 *
	 *
	 *
	 * {domain{resource_id}}
	 *
	 * @var int Domain: resource_id Type: integer
	 */
	public ?int $um_usrsysflag_sysflag_id = 0;

	/**
	 * Action #
	 *
	 *
	 *
	 * {domain{action_id}}
	 *
	 * @var int Domain: action_id Type: smallint
	 */
	public ?int $um_usrsysflag_action_id = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrsysflag_inactive = 0;
}