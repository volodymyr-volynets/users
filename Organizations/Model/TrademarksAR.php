<?php

namespace Numbers\Users\Organizations\Model;
class TrademarksAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Trademarks::class;

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
	public ?int $on_trademark_tenant_id = NULL;

	/**
	 * Trademark #
	 *
	 *
	 *
	 * {domain{trademark_id_sequence}}
	 *
	 * @var int Domain: trademark_id_sequence Type: serial
	 */
	public ?int $on_trademark_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_trademark_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_trademark_name = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_trademark_organization_id = NULL;

	/**
	 * Effective From
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_trademark_effective_from = null;

	/**
	 * Effective To
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_trademark_effective_to = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_trademark_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_trademark_optimistic_lock = 'now()';
}