<?php

namespace Numbers\Users\Organizations\Model\Location;
class TerritoriesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territories::class;

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
	public ?int $on_territory_tenant_id = NULL;

	/**
	 * Territory #
	 *
	 *
	 *
	 * {domain{territory_id_sequence}}
	 *
	 * @var int Domain: territory_id_sequence Type: serial
	 */
	public ?int $on_territory_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_territory_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_territory_name = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_territory_organization_id = NULL;

	/**
	 * Node Type
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Location\Territory\NodeTypes}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $on_territory_node_type_id = NULL;

	/**
	 * Parent Territory #
	 *
	 *
	 *
	 * {domain{territory_id}}
	 *
	 * @var int Domain: territory_id Type: integer
	 */
	public ?int $on_territory_parent_territory_id = NULL;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Location\Territory\Types}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $on_territory_type_id = NULL;

	/**
	 * Postal Codes
	 *
	 *
	 *
	 * {domain{postal_codes}}
	 *
	 * @var string Domain: postal_codes Type: varchar
	 */
	public ?string $on_territory_postal_codes = null;

	/**
	 * Country Code
	 *
	 *
	 *
	 * {domain{country_code}}
	 *
	 * @var string Domain: country_code Type: char
	 */
	public ?string $on_territory_country_code = null;

	/**
	 * Province Code
	 *
	 *
	 *
	 * {domain{province_code}}
	 *
	 * @var string Domain: province_code Type: varchar
	 */
	public ?string $on_territory_province_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_territory_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_territory_optimistic_lock = 'now()';
}