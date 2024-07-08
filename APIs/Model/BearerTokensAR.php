<?php

namespace Numbers\Users\APIs\Model;
class BearerTokensAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\APIs\Model\BearerTokens::class;

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
	public ?int $a3_bearertoken_tenant_id = NULL;

	/**
	 * Token #
	 *
	 *
	 *
	 * {domain{token}}
	 *
	 * @var string Domain: token Type: varchar
	 */
	public ?string $a3_bearertoken_id = null;

	/**
	 * Datetime Started
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $a3_bearertoken_started = null;

	/**
	 * Datetime Expires
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $a3_bearertoken_expires = null;

	/**
	 * Session #
	 *
	 *
	 *
	 * {domain{session_id}}
	 *
	 * @var string Domain: session_id Type: varchar
	 */
	public ?string $a3_bearertoken_session_id = null;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $a3_bearertoken_user_id = NULL;

	/**
	 * User IP
	 *
	 *
	 *
	 * {domain{ip}}
	 *
	 * @var string Domain: ip Type: varchar
	 */
	public ?string $a3_bearertoken_user_ip = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $a3_bearertoken_inactive = 0;
}