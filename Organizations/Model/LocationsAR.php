<?php

namespace Numbers\Users\Organizations\Model;
class LocationsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Locations::class;

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
	public ?int $on_location_tenant_id = NULL;

	/**
	 * Location #
	 *
	 *
	 *
	 * {domain{location_id_sequence}}
	 *
	 * @var int Domain: location_id_sequence Type: serial
	 */
	public ?int $on_location_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_location_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_location_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $on_location_icon = null;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_location_email = null;

	/**
	 * Secondary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $on_location_email2 = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_location_phone = null;

	/**
	 * Secondary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_location_phone2 = null;

	/**
	 * Cell Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_location_cell = null;

	/**
	 * Fax
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $on_location_fax = null;

	/**
	 * Alternative Contact
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $on_location_alternative_contact = null;

	/**
	 * Logo File #
	 *
	 *
	 *
	 * {domain{file_id}}
	 *
	 * @var int Domain: file_id Type: bigint
	 */
	public ?int $on_location_logo_file_id = NULL;

	/**
	 * About Nickname
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_location_about_nickname = null;

	/**
	 * About Description
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $on_location_about_description = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $on_location_organization_id = NULL;

	/**
	 * Customer #
	 *
	 *
	 *
	 * {domain{customer_id}}
	 *
	 * @var int Domain: customer_id Type: bigint
	 */
	public ?int $on_location_customer_id = NULL;

	/**
	 * Location Number
	 *
	 *
	 *
	 * {domain{location_number}}
	 *
	 * @var string Domain: location_number Type: varchar
	 */
	public ?string $on_location_number = NULL;

	/**
	 * Brand #
	 *
	 *
	 *
	 * {domain{brand_id}}
	 *
	 * @var int Domain: brand_id Type: integer
	 */
	public ?int $on_location_brand_id = NULL;

	/**
	 * District #
	 *
	 *
	 *
	 * {domain{district_id}}
	 *
	 * @var int Domain: district_id Type: integer
	 */
	public ?int $on_location_district_id = NULL;

	/**
	 * Market #
	 *
	 *
	 *
	 * {domain{market_id}}
	 *
	 * @var int Domain: market_id Type: integer
	 */
	public ?int $on_location_market_id = NULL;

	/**
	 * Region #
	 *
	 *
	 *
	 * {domain{region_id}}
	 *
	 * @var int Domain: region_id Type: integer
	 */
	public ?int $on_location_region_id = NULL;

	/**
	 * Item Master #
	 *
	 *
	 *
	 * {domain{item_master_id}}
	 *
	 * @var int Domain: item_master_id Type: integer
	 */
	public ?int $on_location_item_master_id = NULL;

	/**
	 * Construction Date
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_location_construction_date = null;

	/**
	 * Hold
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_location_hold = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_location_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_location_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $on_location_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $on_location_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $on_location_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $on_location_updated_user_id = NULL;
}