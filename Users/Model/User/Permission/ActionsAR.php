<?php

namespace Numbers\Users\Users\Model\User\Permission;
class ActionsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Permission\Actions::class;

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
	public ?int $um_usrperaction_tenant_id = NULL;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrperaction_user_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $um_usrperaction_module_id = NULL;

	/**
	 * Resource #
	 *
	 *
	 *
	 * {domain{resource_id}}
	 *
	 * @var int Domain: resource_id Type: integer
	 */
	public ?int $um_usrperaction_resource_id = 0;

	/**
	 * Method Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usrperaction_method_code = null;

	/**
	 * Action #
	 *
	 *
	 *
	 * {domain{action_id}}
	 *
	 * @var int Domain: action_id Type: smallint
	 */
	public ?int $um_usrperaction_action_id = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrperaction_inactive = 0;
}