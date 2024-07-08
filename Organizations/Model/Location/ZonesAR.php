<?php

namespace Numbers\Users\Organizations\Model\Location;
class ZonesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Zones::class;

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
	public ?int $on_loczone_tenant_id = NULL;

	/**
	 * Zone / Slot #
	 *
	 *
	 *
	 * {domain{zone_id_sequence}}
	 *
	 * @var int Domain: zone_id_sequence Type: serial
	 */
	public ?int $on_loczone_id = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_loczone_name = null;

	/**
	 * Location #
	 *
	 *
	 *
	 * {domain{location_id}}
	 *
	 * @var int Domain: location_id Type: integer
	 */
	public ?int $on_loczone_location_id = NULL;

	/**
	 * Zone Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loczone_zone_code = null;

	/**
	 * Aisle Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loczone_aisle_code = null;

	/**
	 * Bay Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loczone_bay_code = null;

	/**
	 * Level Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loczone_level_code = null;

	/**
	 * Slot Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loczone_slot_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_loczone_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_loczone_optimistic_lock = 'now()';
}