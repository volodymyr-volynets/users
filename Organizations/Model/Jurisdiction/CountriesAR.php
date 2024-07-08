<?php

namespace Numbers\Users\Organizations\Model\Jurisdiction;
class CountriesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Jurisdiction\Countries::class;

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
	public ?int $on_juriscntr_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_juriscntr_timestamp = 'now()';

	/**
	 * Jurisdictions #
	 *
	 *
	 *
	 * {domain{jurisdiction_id}}
	 *
	 * @var int Domain: jurisdiction_id Type: integer
	 */
	public ?int $on_juriscntr_jurisdiction_id = NULL;

	/**
	 * Country Code
	 *
	 *
	 *
	 * {domain{country_code}}
	 *
	 * @var string Domain: country_code Type: char
	 */
	public ?string $on_juriscntr_country_code = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_juriscntr_all_provinces = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_juriscntr_inactive = 0;
}