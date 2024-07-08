<?php

namespace Numbers\Users\Users\Model\User;
class NotificationsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Notifications::class;

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
	public ?int $um_usrnoti_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $um_usrnoti_timestamp = 'now()';

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrnoti_user_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $um_usrnoti_module_id = NULL;

	/**
	 * Feature Code
	 *
	 *
	 *
	 * {domain{feature_code}}
	 *
	 * @var string Domain: feature_code Type: varchar
	 */
	public ?string $um_usrnoti_feature_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrnoti_inactive = 0;
}