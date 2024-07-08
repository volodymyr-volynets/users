<?php

namespace Numbers\Users\Users\Model\User\API;
class MethodsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\API\Methods::class;

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
	public ?int $um_usrapmethod_tenant_id = NULL;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrapmethod_user_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $um_usrapmethod_module_id = NULL;

	/**
	 * Resource #
	 *
	 *
	 *
	 * {domain{resource_id}}
	 *
	 * @var int Domain: resource_id Type: integer
	 */
	public ?int $um_usrapmethod_resource_id = 0;

	/**
	 * Method Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usrapmethod_method_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrapmethod_inactive = 0;
}