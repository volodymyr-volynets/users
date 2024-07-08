<?php

namespace Numbers\Users\Organizations\Model;
class StrategicBusinessUnitsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\StrategicBusinessUnits::class;

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
	public ?int $on_sbu_tenant_id = NULL;

	/**
	 * SBU #
	 *
	 *
	 *
	 * {domain{sbu_id_sequence}}
	 *
	 * @var int Domain: sbu_id_sequence Type: serial
	 */
	public ?int $on_sbu_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_sbu_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_sbu_name = null;

	/**
	 * Parent Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_sbu_parent_organization_id = NULL;

	/**
	 * Parent Division #
	 *
	 *
	 *
	 * {domain{division_id}}
	 *
	 * @var int Domain: division_id Type: integer
	 */
	public ?int $on_sbu_parent_division_id = NULL;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_sbu_email = null;

	/**
	 * Secondary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_sbu_email2 = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_sbu_phone = null;

	/**
	 * Secondary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_sbu_phone2 = null;

	/**
	 * Cell Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_sbu_cell = null;

	/**
	 * Fax
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_sbu_fax = null;

	/**
	 * Hold
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_sbu_hold = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_sbu_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_sbu_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $on_sbu_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $on_sbu_inserted_user_id = NULL;
}