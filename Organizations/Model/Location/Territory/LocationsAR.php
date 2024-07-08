<?php

namespace Numbers\Users\Organizations\Model\Location\Territory;
class LocationsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territory\Locations::class;

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
	public ?int $on_terrloc_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_terrloc_timestamp = 'now()';

	/**
	 * Territory #
	 *
	 *
	 *
	 * {domain{territory_id}}
	 *
	 * @var int Domain: territory_id Type: integer
	 */
	public ?int $on_terrloc_territory_id = NULL;

	/**
	 * Location #
	 *
	 *
	 *
	 * {domain{location_id}}
	 *
	 * @var int Domain: location_id Type: integer
	 */
	public ?int $on_terrloc_location_id = NULL;

	/**
	 * Primary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_terrloc_primary = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_terrloc_inactive = 0;
}