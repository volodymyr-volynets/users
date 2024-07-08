<?php

namespace Numbers\Users\Organizations\Model\LegalAuthority;
class JurisdictionsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\LegalAuthority\Jurisdictions::class;

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
	public ?int $on_authjuris_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $on_authjuris_timestamp = 'now()';

	/**
	 * Authority #
	 *
	 *
	 *
	 * {domain{authority_id}}
	 *
	 * @var int Domain: authority_id Type: integer
	 */
	public ?int $on_authjuris_authority_id = NULL;

	/**
	 * Jurisdiction #
	 *
	 *
	 *
	 * {domain{jurisdiction_id}}
	 *
	 * @var int Domain: jurisdiction_id Type: integer
	 */
	public ?int $on_authjuris_jurisdiction_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_authjuris_inactive = 0;
}