<?php

namespace Numbers\Users\Widgets\Ingestions\Model;
class EmailBodiesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Widgets\Ingestions\Model\EmailBodies::class;

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
	public ?int $wg_emailingbody_tenant_id = NULL;

	/**
	 * Body #
	 *
	 *
	 *
	 * {domain{big_id_sequence}}
	 *
	 * @var int Domain: big_id_sequence Type: bigserial
	 */
	public ?int $wg_emailingbody_id = null;

	/**
	 * Message
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: bytea
	 */
	public ?string $wg_emailingbody_message = null;

	/**
	 * Text
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $wg_emailingbody_text = null;
}