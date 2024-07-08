<?php

namespace Numbers\Users\Documents\Base\Model;
class CatalogsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Documents\Base\Model\Catalogs::class;

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
	public ?int $dt_catalog_tenant_id = NULL;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $dt_catalog_code = null;

	/**
	 * Storage #
	 *
	 *
	 * {options_model{\Numbers\Users\Documents\Base\Model\Storages}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $dt_catalog_storage_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $dt_catalog_name = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $dt_catalog_organization_id = NULL;

	/**
	 * Readonly
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_catalog_readonly = 0;

	/**
	 * Approval
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_catalog_approval = 0;

	/**
	 * Temporary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_catalog_temporary = 0;

	/**
	 * Primary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_catalog_primary = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_catalog_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $dt_catalog_optimistic_lock = 'now()';
}