<?php

namespace Numbers\Users\Organizations\Model\Customer;
class IntegrationMappingsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Customer\IntegrationMappings::class;

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
	public ?int $on_custintegmap_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_custintegmap_timestamp = 'now()';

	/**
	 * Customer #
	 *
	 *
	 *
	 * {domain{customer_id}}
	 *
	 * @var int Domain: customer_id Type: bigint
	 */
	public ?int $on_custintegmap_customer_id = NULL;

	/**
	 * Integration Type
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_custintegmap_integtype_code = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $on_custintegmap_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_custintegmap_name = null;

	/**
	 * Default
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_custintegmap_default = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_custintegmap_inactive = 0;
}