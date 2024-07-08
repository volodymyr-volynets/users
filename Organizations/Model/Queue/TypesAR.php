<?php

namespace Numbers\Users\Organizations\Model\Queue;
class TypesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Queue\Types::class;

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
	public ?int $on_quetype_tenant_id = NULL;

	/**
	 * Type #
	 *
	 *
	 *
	 * {domain{type_id_sequence}}
	 *
	 * @var int Domain: type_id_sequence Type: smallserial
	 */
	public ?int $on_quetype_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_quetype_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_quetype_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $on_quetype_icon = null;

	/**
	 * Method
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Queue\Methods}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $on_quetype_method_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_quetype_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_quetype_optimistic_lock = 'now()';
}