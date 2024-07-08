<?php

namespace Numbers\Users\Users\Model\Credential\MyPassword;
class ValuesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Credential\MyPassword\Values::class;

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
	public ?int $um_mypasswval_tenant_id = NULL;

	/**
	 * Password #
	 *
	 *
	 *
	 * {domain{password_id}}
	 *
	 * @var int Domain: password_id Type: bigint
	 */
	public ?int $um_mypasswval_mypasswd_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $um_mypasswval_timestamp = 'now()';

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_mypasswval_name = null;

	/**
	 * Password (Encrypted)
	 *
	 *
	 *
	 * {domain{encrypted_password}}
	 *
	 * @var string Domain: encrypted_password Type: bytea
	 */
	public ?string $um_mypasswval_encrypted_password = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_mypasswval_inactive = 0;
}