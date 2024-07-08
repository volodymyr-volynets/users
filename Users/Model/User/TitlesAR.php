<?php

namespace Numbers\Users\Users\Model\User;
class TitlesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Titles::class;

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
	public ?int $um_usrtitle_tenant_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{personal_title}}
	 *
	 * @var string Domain: personal_title Type: varchar
	 */
	public ?string $um_usrtitle_name = null;

	/**
	 * Order
	 *
	 *
	 *
	 * {domain{order}}
	 *
	 * @var int Domain: order Type: integer
	 */
	public ?int $um_usrtitle_order = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrtitle_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_usrtitle_optimistic_lock = 'now()';
}