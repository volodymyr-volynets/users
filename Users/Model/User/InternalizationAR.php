<?php

namespace Numbers\Users\Users\Model\User;
class InternalizationAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Internalization::class;

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
	public ?int $um_usri18n_tenant_id = NULL;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $um_usri18n_user_id = NULL;

	/**
	 * Group #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $um_usri18n_group_id = NULL;

	/**
	 * Language Code
	 *
	 *
	 *
	 * {domain{language_code}}
	 *
	 * @var string Domain: language_code Type: char
	 */
	public ?string $um_usri18n_language_code = null;

	/**
	 * Locale Code
	 *
	 *
	 *
	 * {domain{locale_code}}
	 *
	 * @var string Domain: locale_code Type: varchar
	 */
	public ?string $um_usri18n_locale_code = null;

	/**
	 * Timezone Code
	 *
	 *
	 *
	 * {domain{timezone_code}}
	 *
	 * @var string Domain: timezone_code Type: varchar
	 */
	public ?string $um_usri18n_timezone_code = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $um_usri18n_organization_id = NULL;

	/**
	 * Date Format
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_format_date = null;

	/**
	 * Time Format
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_format_time = null;

	/**
	 * Datetime Format
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_format_datetime = null;

	/**
	 * Timestamp Format
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_format_timestamp = null;

	/**
	 * Amounts In Forms
	 *
	 *
	 * {options_model{\Object\Format\Amounts}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_usri18n_format_amount_frm = NULL;

	/**
	 * Amounts In Financial Statement
	 *
	 *
	 * {options_model{\Object\Format\Amounts}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_usri18n_format_amount_fs = NULL;

	/**
	 * Unit of Measures
	 *
	 *
	 * {options_model{\Object\Format\UoM}}
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $um_usri18n_format_uom = 'METRIC';

	/**
	 * Print Format
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_print_format = null;

	/**
	 * Print Font
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_usri18n_print_font = null;
}