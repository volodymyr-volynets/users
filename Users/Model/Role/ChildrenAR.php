<?php

namespace Numbers\Users\Users\Model\Role;
class ChildrenAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Role\Children::class;

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
	public ?int $um_rolrol_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $um_rolrol_timestamp = 'now()';

	/**
	 * Parent Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_rolrol_parent_role_id = NULL;

	/**
	 * Child Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_rolrol_child_role_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_rolrol_inactive = 0;
}