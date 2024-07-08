<?php

namespace Numbers\Users\Users\Model\Message;
class RecipientsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Message\Recipients::class;

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
	public ?int $um_mesrecip_tenant_id = NULL;

	/**
	 * Message #
	 *
	 *
	 *
	 * {domain{message_id}}
	 *
	 * @var int Domain: message_id Type: bigint
	 */
	public ?int $um_mesrecip_message_id = NULL;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Users\Model\Message\RecipientTypes}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_mesrecip_type_id = NULL;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_mesrecip_user_id = NULL;

	/**
	 * User Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_mesrecip_user_email = null;

	/**
	 * Read
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_mesrecip_read = 0;

	/**
	 * Chat Group #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $um_mesrecip_chat_group_id = NULL;
}