<?php

namespace Numbers\Users\Organizations\Model;
class CustomersAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Customers::class;

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
	public ?int $on_customer_tenant_id = NULL;

	/**
	 * Customer #
	 *
	 *
	 *
	 * {domain{customer_id_sequence}}
	 *
	 * @var int Domain: customer_id_sequence Type: bigserial
	 */
	public ?int $on_customer_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_customer_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_customer_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $on_customer_icon = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_customer_organization_id = NULL;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_customer_email = null;

	/**
	 * Secondary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_customer_email2 = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_customer_phone = null;

	/**
	 * Secondary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_customer_phone2 = null;

	/**
	 * Cell Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_customer_cell = null;

	/**
	 * Fax
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_customer_fax = null;

	/**
	 * Alternative Contact
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $on_customer_alternative_contact = null;

	/**
	 * Logo File #
	 *
	 *
	 *
	 * {domain{file_id}}
	 *
	 * @var int Domain: file_id Type: bigint
	 */
	public ?int $on_customer_logo_file_id = NULL;

	/**
	 * About Nickname
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_customer_about_nickname = null;

	/**
	 * About Description
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $on_customer_about_description = null;

	/**
	 * Operating Country Code
	 *
	 *
	 *
	 * {domain{country_code}}
	 *
	 * @var string Domain: country_code Type: char
	 */
	public ?string $on_customer_operating_country_code = null;

	/**
	 * Operating Province Code
	 *
	 *
	 *
	 * {domain{province_code}}
	 *
	 * @var string Domain: province_code Type: varchar
	 */
	public ?string $on_customer_operating_province_code = null;

	/**
	 * Operating Currency Code
	 *
	 *
	 *
	 * {domain{currency_code}}
	 *
	 * @var string Domain: currency_code Type: char
	 */
	public ?string $on_customer_operating_currency_code = null;

	/**
	 * Operating Currency Type
	 *
	 *
	 *
	 * {domain{currency_type}}
	 *
	 * @var string Domain: currency_type Type: varchar
	 */
	public ?string $on_customer_operating_currency_type = null;

	/**
	 * Hold
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_customer_hold = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_customer_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_customer_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $on_customer_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $on_customer_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $on_customer_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $on_customer_updated_user_id = NULL;
}