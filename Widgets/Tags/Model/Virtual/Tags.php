<?php

namespace Numbers\Users\Widgets\Tags\Model\Virtual;
class Tags extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = ['wg_tag_id'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_tag_'; // must not change it
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
		'inserted' => true
	];

	/**
	 * Constructor
	 */
	public function __construct($class, $virtual_class_name, $options = []) {
		// add regular columns
		$this->columns['wg_tag_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_tag_id'] = ['name' => 'Tag #', 'domain' => 'big_id_sequence'];
		$this->determineModelMap($class, 'tags', $virtual_class_name, $options);
		$this->columns['wg_tag_global_tag_id'] = ['name' => 'Global Tag #', 'domain' => 'big_id'];
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => ['wg_tag_tenant_id', 'wg_tag_id']
		];
		$this->constraints[$this->name . '_parent_fk'] = [
			'type' => 'fk',
			'columns' => array_values($this->map),
			'foreign_model' => $class,
			'foreign_columns' => array_keys($this->map)
		];
		$this->constraints[$this->name . '_global_fk'] = [
			'type' => 'fk',
			'columns' => ['wg_tag_tenant_id', 'wg_tag_global_tag_id'],
			'foreign_model' => '\Numbers\Users\Widgets\Tags\Model\Tags',
			'foreign_columns' => ['um_tag_tenant_id', 'um_tag_id']
		];
		// construct table
		parent::__construct($options);
	}
}