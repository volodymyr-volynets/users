<?php

namespace Numbers\Users\Users\Model;
class UsersAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Users::class;

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
	public ?int $um_user_tenant_id = NULL;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id_sequence}}
	 *
	 * @var int Domain: user_id_sequence Type: bigserial
	 */
	public ?int $um_user_id = null;

	/**
	 * User Number
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $um_user_code = null;

	/**
	 * Type
	 *
	 *
	 * {options_model{Numbers\Users\Users\Model\User\Types}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_user_type_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_user_name = null;

	/**
	 * Company
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_user_company = null;

	/**
	 * Title
	 *
	 *
	 *
	 * {domain{personal_title}}
	 *
	 * @var string Domain: personal_title Type: varchar
	 */
	public ?string $um_user_title = null;

	/**
	 * First Name
	 *
	 *
	 *
	 * {domain{personal_name}}
	 *
	 * @var string Domain: personal_name Type: varchar
	 */
	public ?string $um_user_first_name = null;

	/**
	 * Last Name
	 *
	 *
	 *
	 * {domain{personal_name}}
	 *
	 * @var string Domain: personal_name Type: varchar
	 */
	public ?string $um_user_last_name = null;

	/**
	 * Primary Email (Generated)
	 *
	 * GENERABLE
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_user_email = null;

	/**
	 * Secondary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $um_user_email2 = null;

	/**
	 * Primary Phone (Generated)
	 *
	 * FORMATABLE
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_user_phone = null;

	/**
	 * Primary Phone (Numeric)
	 *
	 *
	 *
	 * {domain{numeric_phone}}
	 *
	 * @var int Domain: numeric_phone Type: bigint
	 */
	public ?int $um_user_numeric_phone = NULL;

	/**
	 * Secondary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_user_phone2 = null;

	/**
	 * Cell Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_user_cell = null;

	/**
	 * Fax
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $um_user_fax = null;

	/**
	 * Alternative Contact
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $um_user_alternative_contact = null;

	/**
	 * Login Enabled (Generated)
	 *
	 * CASTABLE
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_user_login_enabled = 0;

	/**
	 * Username (Generated)
	 *
	 * READ_IF_SET
	 *
	 * {domain{login}}
	 *
	 * @var string Domain: login Type: varchar
	 */
	public ?string $um_user_login_username = null;

	/**
	 * Password (Generated)
	 *
	 * PASSWORDABLE
	 *
	 * {domain{password}}
	 *
	 * @var string Domain: password Type: text
	 */
	public ?string $um_user_login_password = null;

	/**
	 * Last Set (Generated)
	 *
	 * FORMATABLE
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $um_user_login_last_set = null;

	/**
	 * Photo File #
	 *
	 *
	 *
	 * {domain{file_id}}
	 *
	 * @var int Domain: file_id Type: bigint
	 */
	public ?int $um_user_photo_file_id = NULL;

	/**
	 * About Nickname
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_user_about_nickname = null;

	/**
	 * About Description
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $um_user_about_description = null;

	/**
	 * Operating Country Code
	 *
	 *
	 *
	 * {domain{country_code}}
	 *
	 * @var string Domain: country_code Type: char
	 */
	public ?string $um_user_operating_country_code = null;

	/**
	 * Operating Province Code
	 *
	 *
	 *
	 * {domain{province_code}}
	 *
	 * @var string Domain: province_code Type: varchar
	 */
	public ?string $um_user_operating_province_code = null;

	/**
	 * Operating Currency Code
	 *
	 *
	 *
	 * {domain{currency_code}}
	 *
	 * @var string Domain: currency_code Type: char
	 */
	public ?string $um_user_operating_currency_code = null;

	/**
	 * Operating Currency Type
	 *
	 *
	 *
	 * {domain{currency_type}}
	 *
	 * @var string Domain: currency_type Type: varchar
	 */
	public ?string $um_user_operating_currency_type = null;

	/**
	 * Hold (Generated)
	 *
	 * CASTABLE
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_user_hold = 0;

	/**
	 * Inactive (Generated)
	 *
	 * CASTABLE
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_user_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_user_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_user_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_user_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $um_user_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_user_updated_user_id = NULL;

	/**
	 * (Generated) (Non Database)
	 *
	 * GENERABLE, READ_ONLY
	 *
	 * @var mixed
	 */
	public $um_user_name_assembled = null;
}