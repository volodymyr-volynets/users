<?php

namespace Numbers\Users\Users\Model\User\Assignment;
class TypesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Assignment\Types::class;

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
	public ?int $um_assignusrtype_tenant_id = NULL;

	/**
	 * Assignment #
	 *
	 *
	 *
	 * {domain{assignment_id_sequence}}
	 *
	 * @var int Domain: assignment_id_sequence Type: serial
	 */
	public ?int $um_assignusrtype_id = null;

	/**
	 * Type Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $um_assignusrtype_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_assignusrtype_name = null;

	/**
	 * Parent Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_assignusrtype_parent_role_id = NULL;

	/**
	 * Child Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_assignusrtype_child_role_id = NULL;

	/**
	 * Multiple
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_assignusrtype_multiple = 0;

	/**
	 * Mandatory
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_assignusrtype_mandatory = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_assignusrtype_inactive = 0;
}