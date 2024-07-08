<?php

namespace Numbers\Users\Organizations\Model;
class DivisionsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Divisions::class;

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
	public ?int $on_division_tenant_id = NULL;

	/**
	 * Division #
	 *
	 *
	 *
	 * {domain{division_id_sequence}}
	 *
	 * @var int Domain: division_id_sequence Type: serial
	 */
	public ?int $on_division_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_division_code = null;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Division\Types}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $on_division_type_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_division_name = null;

	/**
	 * Parent Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_division_parent_organization_id = NULL;

	/**
	 * Parent Division #
	 *
	 *
	 *
	 * {domain{division_id}}
	 *
	 * @var int Domain: division_id Type: integer
	 */
	public ?int $on_division_parent_division_id = NULL;

	/**
	 * Region #
	 *
	 *
	 *
	 * {domain{country_number}}
	 *
	 * @var int Domain: country_number Type: smallint
	 */
	public ?int $on_division_region_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_division_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_division_optimistic_lock = 'now()';
}