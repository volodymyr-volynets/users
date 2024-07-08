<?php

namespace Numbers\Users\Users\Model\Message\Sender;
class CommonAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Message\Sender\Common::class;

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
	public ?int $um_sendercmn_tenant_id = NULL;

	/**
	 * From Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_sendercmn_from_email = null;

	/**
	 * From Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_sendercmn_from_name = null;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_sendercmn_optimistic_lock = 'now()';
}