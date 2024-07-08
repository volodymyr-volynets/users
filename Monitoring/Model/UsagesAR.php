<?php

namespace Numbers\Users\Monitoring\Model;
class UsagesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Monitoring\Model\Usages::class;

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
	public ?int $sm_monusage_tenant_id = NULL;

	/**
	 * Usage #
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: bigserial
	 */
	public ?int $sm_monusage_id = null;

	/**
	 * Session #
	 *
	 *
	 *
	 * {domain{big_id}}
	 *
	 * @var int Domain: big_id Type: bigint
	 */
	public ?int $sm_monusage_session_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $sm_monusage_timestamp = null;

	/**
	 * User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $sm_monusage_user_id = NULL;

	/**
	 * User IP
	 *
	 *
	 *
	 * {domain{ip}}
	 *
	 * @var string Domain: ip Type: varchar
	 */
	public ?string $sm_monusage_user_ip = null;

	/**
	 * Resource #
	 *
	 *
	 *
	 * {domain{resource_id}}
	 *
	 * @var int Domain: resource_id Type: integer
	 */
	public ?int $sm_monusage_resource_id = 0;

	/**
	 * Resource Name
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $sm_monusage_resource_name = null;

	/**
	 * Method
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $sm_monusage_method = null;

	/**
	 * Duration (Seconds)
	 *
	 *
	 *
	 * {domain{quantity}}
	 *
	 * @var bcnumeric Domain: quantity Type: bcnumeric
	 */
	public ?bcnumeric $sm_monusage_duration = '0.0000';

	/**
	 * Country Code
	 *
	 *
	 *
	 * {domain{country_code}}
	 *
	 * @var string Domain: country_code Type: char
	 */
	public ?string $sm_monusage_country_code = null;
}