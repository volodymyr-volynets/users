<?php

namespace Numbers\Users\Organizations\Model\Organization;
class HolidaysAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\Holidays::class;

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
	public ?int $on_holiday_tenant_id = NULL;

	/**
	 * Holiday #
	 *
	 *
	 *
	 * {domain{holiday_id_sequence}}
	 *
	 * @var int Domain: holiday_id_sequence Type: serial
	 */
	public ?int $on_holiday_id = null;

	/**
	 * Date
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_holiday_date = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_holiday_name = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_holiday_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_holiday_optimistic_lock = 'now()';
}