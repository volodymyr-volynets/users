<?php

namespace Numbers\Users\Users\Model\Registration;
class TenantsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Registration\Tenants::class;

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
	 * Registration #
	 *
	 *
	 *
	 * {domain{group_id_sequence}}
	 *
	 * @var int Domain: group_id_sequence Type: serial
	 */
	public ?int $um_regten_id = null;

	/**
	 * Inserted
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_regten_inserted = null;

	/**
	 * Inserted
	 *
	 *
	 *
	 * {domain{status_id}}
	 *
	 * @var int Domain: status_id Type: smallint
	 */
	public ?int $um_regten_status = 0;

	/**
	 * Screen Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_regten_tenant_name = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{domain_part}}
	 *
	 * @var string Domain: domain_part Type: varchar
	 */
	public ?string $um_regten_tenant_code = null;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_regten_tenant_email = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_regten_tenant_phone = null;

	/**
	 * Organization Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_regten_organization_name = null;

	/**
	 * Organization Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $um_regten_organization_code = null;

	/**
	 * User First Name
	 *
	 *
	 *
	 * {domain{personal_name}}
	 *
	 * @var string Domain: personal_name Type: varchar
	 */
	public ?string $um_regten_user_first_name = null;

	/**
	 * User Last Name
	 *
	 *
	 *
	 * {domain{personal_name}}
	 *
	 * @var string Domain: personal_name Type: varchar
	 */
	public ?string $um_regten_user_last_name = null;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_regten_user_email = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_regten_user_phone = null;

	/**
	 * Cell Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_regten_user_cell = null;

	/**
	 * Username
	 *
	 *
	 *
	 * {domain{login}}
	 *
	 * @var string Domain: login Type: varchar
	 */
	public ?string $um_regten_user_login_username = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_regten_inactive = 0;
}