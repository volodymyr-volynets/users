<?php

namespace Numbers\Users\Organizations\Model\Brand;
class TrademarksAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Brand\Trademarks::class;

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
	public ?int $on_brndtrdmrk_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_brndtrdmrk_timestamp = 'now()';

	/**
	 * Brand #
	 *
	 *
	 *
	 * {domain{brand_id}}
	 *
	 * @var int Domain: brand_id Type: integer
	 */
	public ?int $on_brndtrdmrk_brand_id = NULL;

	/**
	 * Trademark #
	 *
	 *
	 *
	 * {domain{trademark_id}}
	 *
	 * @var int Domain: trademark_id Type: integer
	 */
	public ?int $on_brndtrdmrk_trademark_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_brndtrdmrk_inactive = 0;
}