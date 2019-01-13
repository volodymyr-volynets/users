<?php

namespace Numbers\Users\Widgets\Documents\Model\Virtual;
class Documents extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = ['wg_document_id'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_document_'; // must not change it
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
		'approved' => true
	];

	public $collection; // a must

	/**
	 * Constructor
	 */
	public function __construct($class, $virtual_class_name, $options = []) {
		// add regular columns
		$this->columns['wg_document_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_document_id'] = ['name' => 'Document #', 'domain' => 'big_id_sequence'];
		$this->determineModelMap($class, 'documents', $virtual_class_name, $options);
		$this->columns['wg_document_important'] = ['name' => 'Important', 'type' => 'boolean'];
		$this->columns['wg_document_public'] = ['name' => 'Public', 'type' => 'boolean'];
		$this->columns['wg_document_catalog_code'] = ['name' => 'Catalog', 'domain' => 'group_code'];
		$this->columns['wg_document_readonly'] = ['name' => 'Readonly', 'type' => 'boolean'];
		$this->columns['wg_document_approval_status_id'] = ['name' => 'Approval Status', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Widgets\Documents\Model\Statuses'];
		$this->columns['wg_document_have_types'] = ['name' => 'Have Types', 'type' => 'boolean'];
		$this->columns['wg_document_file_id_1'] = ['name' => 'File 1', 'domain' => 'file_id'];
		$this->columns['wg_document_file_id_2'] = ['name' => 'File 2', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_3'] = ['name' => 'File 3', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_4'] = ['name' => 'File 4', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_5'] = ['name' => 'File 5', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_6'] = ['name' => 'File 6', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_7'] = ['name' => 'File 7', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_8'] = ['name' => 'File 8', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_9'] = ['name' => 'File 9', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_10'] = ['name' => 'File 10', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_11'] = ['name' => 'File 11', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_12'] = ['name' => 'File 12', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_13'] = ['name' => 'File 13', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_14'] = ['name' => 'File 14', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_15'] = ['name' => 'File 15', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_16'] = ['name' => 'File 16', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_17'] = ['name' => 'File 17', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_18'] = ['name' => 'File 18', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_19'] = ['name' => 'File 19', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_20'] = ['name' => 'File 20', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_21'] = ['name' => 'File 21', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_22'] = ['name' => 'File 22', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_23'] = ['name' => 'File 23', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_24'] = ['name' => 'File 24', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_25'] = ['name' => 'File 25', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_26'] = ['name' => 'File 26', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_27'] = ['name' => 'File 27', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_28'] = ['name' => 'File 28', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_29'] = ['name' => 'File 29', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_file_id_30'] = ['name' => 'File 30', 'domain' => 'file_id', 'null' => true];
		$this->columns['wg_document_filetype_id_1'] = ['name' => 'Type 1', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_2'] = ['name' => 'Type 2', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_3'] = ['name' => 'Type 3', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_4'] = ['name' => 'Type 4', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_5'] = ['name' => 'Type 5', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_6'] = ['name' => 'Type 6', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_7'] = ['name' => 'Type 7', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_8'] = ['name' => 'Type 8', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_9'] = ['name' => 'Type 9', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_10'] = ['name' => 'Type 10', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_11'] = ['name' => 'Type 11', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_12'] = ['name' => 'Type 12', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_13'] = ['name' => 'Type 13', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_14'] = ['name' => 'Type 14', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_15'] = ['name' => 'Type 15', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_16'] = ['name' => 'Type 16', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_17'] = ['name' => 'Type 17', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_18'] = ['name' => 'Type 18', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_19'] = ['name' => 'Type 19', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_20'] = ['name' => 'Type 20', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_21'] = ['name' => 'Type 21', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_22'] = ['name' => 'Type 22', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_23'] = ['name' => 'Type 23', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_24'] = ['name' => 'Type 24', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_25'] = ['name' => 'Type 25', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_26'] = ['name' => 'Type 26', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_27'] = ['name' => 'Type 27', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_28'] = ['name' => 'Type 28', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_29'] = ['name' => 'Type 29', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_filetype_id_30'] = ['name' => 'Type 30', 'domain' => 'type_id', 'null' => true];
		$this->columns['wg_document_comment'] = ['name' => 'Comment', 'domain' => 'comment', 'null' => true];
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => ['wg_document_tenant_id', 'wg_document_id']
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

	/**
	 * Merge
	 *
	 * @param array $data
	 * @param array $options
	 * @return array
	 */
	public function merge(array $data, array $options = []) : array {
		$data['wg_document_tenant_id'] = \Tenant::id();
		if (empty($data['wg_document_id'])) {
			$data['wg_document_id'] = $this->sequence('wg_document_id');
			$this->processWhoColumns(['inserted'], $data);
		}
		if (!empty($data['wg_document_approval_status_id']) && $data['wg_document_approval_status_id'] > 20) {
			$this->processWhoColumns(['approved'], $data);
		}
		$result = $this->db_object->save($this->full_table_name, $data, ['wg_document_tenant_id', 'wg_document_id'], ['primary_key' => ['wg_document_tenant_id', 'wg_document_id']]);
		$this->resetCache(); // reset cache tags
		return $result;
	}
}