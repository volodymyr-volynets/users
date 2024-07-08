<?php

namespace Numbers\Users\Organizations\Model;
class JurisdictionsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Jurisdictions::class;

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
	public ?int $on_jurisdiction_tenant_id = NULL;

	/**
	 * Jurisdictions #
	 *
	 *
	 *
	 * {domain{jurisdiction_id_sequence}}
	 *
	 * @var int Domain: jurisdiction_id_sequence Type: serial
	 */
	public ?int $on_jurisdiction_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_jurisdiction_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_jurisdiction_name = null;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Jurisdiction\Types}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $on_jurisdiction_type = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_jurisdiction_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_jurisdiction_optimistic_lock = 'now()';
}