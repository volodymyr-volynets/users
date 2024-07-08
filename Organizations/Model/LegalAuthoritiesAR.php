<?php

namespace Numbers\Users\Organizations\Model;
class LegalAuthoritiesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\LegalAuthorities::class;

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
	public ?int $on_authority_tenant_id = NULL;

	/**
	 * Authority #
	 *
	 *
	 *
	 * {domain{authority_id_sequence}}
	 *
	 * @var int Domain: authority_id_sequence Type: serial
	 */
	public ?int $on_authority_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $on_authority_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $on_authority_name = null;

	/**
	 * Effective From
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_authority_effective_from = null;

	/**
	 * Effective To
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $on_authority_effective_to = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_authority_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_authority_optimistic_lock = 'now()';
}