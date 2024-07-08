<?php

namespace Numbers\Users\Organizations\Model\Organization;
class BusinessHoursAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\BusinessHours::class;

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
	public ?int $on_orgbhour_tenant_id = NULL;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_orgbhour_organization_id = NULL;

	/**
	 * Day #
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Organization\BusinessHour\Days}}
	 * {domain{day_id}}
	 *
	 * @var int Domain: day_id Type: smallint
	 */
	public ?int $on_orgbhour_day_id = 0;

	/**
	 * Start Time
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: time
	 */
	public ?string $on_orgbhour_start_time = null;

	/**
	 * End Time
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: time
	 */
	public ?string $on_orgbhour_end_time = null;

	/**
	 * Timezone
	 *
	 *
	 *
	 * {domain{timezone_code}}
	 *
	 * @var string Domain: timezone_code Type: varchar
	 */
	public ?string $on_orgbhour_timezone_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_orgbhour_inactive = 0;
}