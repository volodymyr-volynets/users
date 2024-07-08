<?php

namespace Numbers\Users\Widgets\Ingestions\Model;
class LocksAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Widgets\Ingestions\Model\Locks::class;

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
	public ?int $wg_emailinglock_tenant_id = NULL;

	/**
	 * Link
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $wg_emailinglock_link = null;

	/**
	 * UID
	 *
	 *
	 *
	 * {domain{big_id}}
	 *
	 * @var int Domain: big_id Type: bigint
	 */
	public ?int $wg_emailinglock_uid = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $wg_emailinglock_timestamp = 'now()';
}