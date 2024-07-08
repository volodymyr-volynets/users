<?php

namespace Numbers\Users\Users\Model\Notification;
class PostponedMessagesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Notification\PostponedMessages::class;

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
	public ?int $um_notpostmess_tenant_id = NULL;

	/**
	 * Message #
	 *
	 *
	 *
	 * {domain{message_id_sequence}}
	 *
	 * @var int Domain: message_id_sequence Type: bigserial
	 */
	public ?int $um_notpostmess_id = null;

	/**
	 * Timestamp Inserted
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $um_notpostmess_inserted_timestamp = 'now()';

	/**
	 * Method
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $um_notpostmess_method = null;

	/**
	 * Params
	 *
	 *
	 *
	 *
	 *
	 * @var mixed Type: json
	 */
	public ?mixed $um_notpostmess_params = null;

	/**
	 * Timestamp Completed
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_notpostmess_completed_timestamp = null;

	/**
	 * Last Timestamp
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_notpostmess_last_timestamp = null;

	/**
	 * Last Message
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $um_notpostmess_last_message = null;

	/**
	 * Log Originated #
	 *
	 *
	 *
	 * {domain{uuid}}
	 *
	 * @var string Domain: uuid Type: char
	 */
	public ?string $um_notpostmess_sm_log_originated_id = null;
}