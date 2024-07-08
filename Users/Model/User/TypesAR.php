<?php

namespace Numbers\Users\Users\Model\User;
class TypesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\User\Types::class;

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
	 * Type #
	 *
	 *
	 *
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_usrtype_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_usrtype_name = null;

	/**
	 * API
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrtype_api = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_usrtype_inactive = 0;
}