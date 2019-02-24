<?php

namespace Numbers\Users\Widgets\CheckIn\Model\Virtual;
class CheckIn extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = ['wg_checkin_id'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_checkin_'; // must not change it
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
		$this->columns['wg_checkin_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_checkin_id'] = ['name' => 'Check In #', 'domain' => 'big_id_sequence'];
		$this->determineModelMap($class, 'checkins', $virtual_class_name, $options);
		$this->columns['wg_checkin_checkin_timestamp'] = ['name' => 'Check In Timestamp', 'type' => 'timestamp'];
		$this->columns['wg_checkin_checkin_latitude'] = ['name' => 'Check In Latitude', 'domain' => 'geo_coordinate'];
		$this->columns['wg_checkin_checkin_longitude'] = ['name' => 'Check In Longitude', 'domain' => 'geo_coordinate'];
		$this->columns['wg_checkin_checkout_timestamp'] = ['name' => 'Check Out Timestamp', 'type' => 'timestamp', 'null' => true];
		$this->columns['wg_checkin_checkout_latitude'] = ['name' => 'Check Out Latitude', 'domain' => 'geo_coordinate', 'null' => true];
		$this->columns['wg_checkin_checkout_longitude'] = ['name' => 'Check Out Longitude', 'domain' => 'geo_coordinate', 'null' => true];
		$this->columns['wg_checkin_signature'] = ['name' => 'Signature', 'domain' => 'signature', 'null' => true];
		$this->columns['wg_checkin_legacy_signature'] = ['name' => 'Signature (Legacy)', 'domain' => 'signature', 'null' => true];
		$this->columns['wg_checkin_duration'] = ['name' => 'Duration', 'type' => 'numeric', 'null' => true];
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => ['wg_checkin_tenant_id', 'wg_checkin_id']
		];
		$this->constraints[$this->name . '_parent_fk'] = [
			'type' => 'fk',
			'columns' => array_values($this->map),
			'foreign_model' => $class,
			'foreign_columns' => array_keys($this->map)
		];
		// construct table
		parent::__construct($options);
	}
}