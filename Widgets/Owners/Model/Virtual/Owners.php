<?php

namespace Numbers\Users\Widgets\Owners\Model\Virtual;
class Owners extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = ['wg_owner_id'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_owner_'; // must not change it
	public $columns = [];
	public $constraints = [];
	public $indexes = [];
	public $history = false;
	public $audit = false; // must not change it
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation; // must not change it
	public $attributes = false; // must not change it

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	/**
	 * Constructor
	 */
	public function __construct($class, $virtual_class_name, $options = []) {
		// add regular columns
		$this->columns['wg_owner_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_owner_id'] = ['name' => 'Owner #', 'domain' => 'big_id_sequence'];
		$this->determineModelMap($class, 'owners', $virtual_class_name, $options);
		$this->columns['wg_owner_assigned_ownertype_id'] = ['name' => 'Assigned Owner Type #', 'domain' => 'type_id'];
		$this->columns['wg_owner_assigned_user_id'] = ['name' => 'Assigned User #', 'domain' => 'user_id'];
		$this->columns['wg_owner_assigned_inactive'] = ['name' => 'Assigned Inactive', 'type' => 'boolean'];
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => ['wg_owner_tenant_id', 'wg_owner_id']
		];
		$this->constraints[$this->name . '_parent_fk'] = [
			'type' => 'fk',
			'columns' => array_values($this->map),
			'foreign_model' => $class,
			'foreign_columns' => array_keys($this->map)
		];
		$this->constraints[$this->name . '_assigned_user_id_fk'] = [
			'type' => 'fk',
			'columns' => ['wg_owner_tenant_id', 'wg_owner_assigned_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		];
		$this->constraints[$this->name . '_assigned_ownertype_id_fk'] = [
			'type' => 'fk',
			'columns' => ['wg_owner_tenant_id', 'wg_owner_assigned_ownertype_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Owner\Types',
			'foreign_columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']
		];
		// construct table
		parent::__construct($options);
	}
}