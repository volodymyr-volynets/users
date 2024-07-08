<?php

namespace Numbers\Users\Users\Model\User;
class AssignmentsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Assignments::class;

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
	public ?int $um_usrassign_tenant_id = NULL;

	/**
	 * Assignment #
	 *
	 *
	 *
	 * {domain{assignment_id}}
	 *
	 * @var int Domain: assignment_id Type: integer
	 */
	public ?int $um_usrassign_assignusrtype_id = NULL;

	/**
	 * Parent Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_usrassign_parent_role_id = NULL;

	/**
	 * Parent User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrassign_parent_user_id = NULL;

	/**
	 * Child Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_usrassign_child_role_id = NULL;

	/**
	 * Child User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usrassign_child_user_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrassign_inactive = 0;
}