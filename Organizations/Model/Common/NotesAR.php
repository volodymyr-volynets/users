<?php

namespace Numbers\Users\Organizations\Model\Common;
class NotesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Organizations\Model\Common\Notes::class;

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
	public ?int $on_comnote_tenant_id = NULL;

	/**
	 * Note #
	 *
	 *
	 *
	 * {domain{group_id_sequence}}
	 *
	 * @var int Domain: group_id_sequence Type: serial
	 */
	public ?int $on_comnote_id = null;

	/**
	 * Type
	 *
	 *
	 * {options_model{\Numbers\Users\Organizations\Model\Common\Note\Types}}
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $on_comnote_type_code = null;

	/**
	 * Comment
	 *
	 *
	 *
	 * {domain{comment}}
	 *
	 * @var string Domain: comment Type: text
	 */
	public ?string $on_comnote_comment = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $on_comnote_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $on_comnote_optimistic_lock = 'now()';
}