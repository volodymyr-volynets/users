<?php

namespace Numbers\Users\Users\Model\Message;
class BodiesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Message\Bodies::class;

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
	public ?int $um_mesbody_tenant_id = NULL;

	/**
	 * Message #
	 *
	 *
	 *
	 * {domain{message_id_sequence}}
	 *
	 * @var int Domain: message_id_sequence Type: bigserial
	 */
	public ?int $um_mesbody_id = null;

	/**
	 * Type #
	 *
	 *
	 * {options_model{\Numbers\Users\Users\Model\Message\BodyTypes}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_mesbody_type_id = NULL;

	/**
	 * Body
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $um_mesbody_body = null;

	/**
	 * Body (Binary)
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: bytea
	 */
	public ?string $um_mesbody_bytea = null;
}