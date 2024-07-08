<?php

namespace Numbers\Users\Users\Model\Form;
class OverridesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Users\Model\Form\Overrides::class;

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
	public ?int $um_formoverride_tenant_id = NULL;

	/**
	 * Override #
	 *
	 *
	 *
	 * {domain{group_id_sequence}}
	 *
	 * @var int Domain: group_id_sequence Type: serial
	 */
	public ?int $um_formoverride_id = null;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $um_formoverride_module_id = NULL;

	/**
	 * Module Code
	 *
	 *
	 *
	 * {domain{module_code}}
	 *
	 * @var string Domain: module_code Type: char
	 */
	public ?string $um_formoverride_module_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $um_formoverride_name = null;

	/**
	 * Role #
	 *
	 *
	 *
	 * {domain{role_id}}
	 *
	 * @var int Domain: role_id Type: integer
	 */
	public ?int $um_formoverride_role_id = NULL;

	/**
	 * Role Weight
	 *
	 *
	 *
	 * {domain{weight}}
	 *
	 * @var int Domain: weight Type: integer
	 */
	public ?int $um_formoverride_role_weight = NULL;

	/**
	 * Form Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_formoverride_form_code = null;

	/**
	 * Form Field Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $um_formoverride_form_field_code = null;

	/**
	 * Action
	 *
	 *
	 * {options_model{\Numbers\Users\Users\Model\Form\ActionTypes}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $um_formoverride_action = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $um_formoverride_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $um_formoverride_optimistic_lock = 'now()';
}