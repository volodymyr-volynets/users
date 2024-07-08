<?php

namespace Numbers\Users\Organizations\Model\Location\Territory;
class PostalCodesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territory\PostalCodes::class;

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
	public ?int $on_terrpostal_tenant_id = NULL;

	/**
	 * Territory #
	 *
	 *
	 *
	 * {domain{territory_id}}
	 *
	 * @var int Domain: territory_id Type: integer
	 */
	public ?int $on_terrpostal_territory_id = NULL;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_terrpostal_organization_id = NULL;

	/**
	 * Location #
	 *
	 *
	 *
	 * {domain{location_id}}
	 *
	 * @var int Domain: location_id Type: integer
	 */
	public ?int $on_terrpostal_location_id = NULL;

	/**
	 * Postal Code
	 *
	 *
	 *
	 * {domain{postal_code}}
	 *
	 * @var string Domain: postal_code Type: varchar
	 */
	public ?string $on_terrpostal_postal_code = null;
}