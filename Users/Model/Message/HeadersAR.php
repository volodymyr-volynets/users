<?php

namespace Numbers\Users\Users\Model\Message;
class HeadersAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Message\Headers::class;

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
	public ?int $um_mesheader_tenant_id = NULL;

	/**
	 * Message #
	 *
	 *
	 *
	 * {domain{message_id_sequence}}
	 *
	 * @var int Domain: message_id_sequence Type: bigserial
	 */
	public ?int $um_mesheader_id = null;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Users\Model\Message\HeaderTypes}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_mesheader_type_id = 10;

	/**
	 * Notification Code
	 *
	 *
	 *
	 * {domain{feature_code}}
	 *
	 * @var string Domain: feature_code Type: varchar
	 */
	public ?string $um_mesheader_notification_code = null;

	/**
	 * Important
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_mesheader_important = 0;

	/**
	 * From Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_mesheader_from_email = null;

	/**
	 * From Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_mesheader_from_name = null;

	/**
	 * Subject
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $um_mesheader_subject = null;

	/**
	 * Body #
	 *
	 *
	 *
	 * {domain{message_id}}
	 *
	 * @var int Domain: message_id Type: bigint
	 */
	public ?int $um_mesheader_body_id = NULL;

	/**
	 * Keywords
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $um_mesheader_keywords = null;

	/**
	 * Group #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $um_mesheader_chat_group_id = NULL;

	/**
	 * Chat User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_mesheader_chat_user_id = NULL;

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_mesheader_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_mesheader_inserted_user_id = NULL;
}