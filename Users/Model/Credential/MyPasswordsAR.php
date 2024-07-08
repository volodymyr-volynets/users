<?php

namespace Numbers\Users\Users\Model\Credential;
class MyPasswordsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Credential\MyPasswords::class;

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
	public ?int $um_mypasswd_tenant_id = NULL;

	/**
	 * Password #
	 *
	 *
	 *
	 * {domain{password_id_sequence}}
	 *
	 * @var int Domain: password_id_sequence Type: bigserial
	 */
	public ?int $um_mypasswd_id = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_mypasswd_name = null;

	/**
	 * Value Counter
	 *
	 *
	 *
	 * {domain{counter}}
	 *
	 * @var int Domain: counter Type: integer
	 */
	public ?int $um_mypasswd_value_counter = 0;

	/**
	 * Type Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $um_mypasswd_passtype_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_mypasswd_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_mypasswd_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_mypasswd_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_mypasswd_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_mypasswd_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_mypasswd_updated_user_id = NULL;
}