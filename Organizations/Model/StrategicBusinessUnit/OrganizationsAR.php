<?php

namespace Numbers\Users\Organizations\Model\StrategicBusinessUnit;
class OrganizationsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\StrategicBusinessUnit\Organizations::class;

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
	public ?int $on_sborg_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_sborg_timestamp = 'now()';

	/**
	 * SBU #
	 *
	 *
	 *
	 * {domain{sbu_id}}
	 *
	 * @var int Domain: sbu_id Type: integer
	 */
	public ?int $on_sborg_sbu_id = NULL;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_sborg_organization_id = NULL;

	/**
	 * Primary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_sborg_primary = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_sborg_inactive = 0;
}