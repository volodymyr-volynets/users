<?php

namespace Numbers\Users\Users\Model;
class RolesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Roles::class;

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
	public ?int $um_role_tenant_id = NULL;

	/**
	 * Role #
	 *
	 *
	 *
	 * {domain{role_id_sequence}}
	 *
	 * @var int Domain: role_id_sequence Type: serial
	 */
	public ?int $um_role_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $um_role_code = null;

	/**
	 * Type
	 *
	 *
	 *
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_role_type_id = NULL;

	/**
	 * Department #
	 *
	 *
	 *
	 * {domain{department_id}}
	 *
	 * @var int Domain: department_id Type: integer
	 */
	public ?int $um_role_department_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_role_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $um_role_icon = null;

	/**
	 * Global
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_role_global = 0;

	/**
	 * Super Admin
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_role_super_admin = 0;

	/**
	 * Weight
	 *
	 *
	 *
	 * {domain{weight}}
	 *
	 * @var int Domain: weight Type: integer
	 */
	public ?int $um_role_weight = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_role_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_role_optimistic_lock = 'now()';
}