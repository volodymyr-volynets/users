<?php

namespace Numbers\Users\Organizations\Model\Location\Type;
class MapAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Type\Map::class;

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
	public ?int $on_loctpmap_tenant_id = NULL;

	/**
	 * Location #
	 *
	 *
	 *
	 * {domain{location_id}}
	 *
	 * @var int Domain: location_id Type: integer
	 */
	public ?int $on_loctpmap_location_id = NULL;

	/**
	 * Type Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_loctpmap_type_code = null;
}