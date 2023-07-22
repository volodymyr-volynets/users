<?php

namespace Numbers\Users\Printing\Model;
class Headers extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'P8';
	public $title = 'P/8 Headers';
	public $schema;
	public $name = 'p8_headers';
	public $pk = ['p8_header_tenant_id', 'p8_header_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'p8_header_';
	public $columns = [
		'p8_header_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'p8_header_id' => ['name' => 'Header #', 'domain' => 'header_id_sequence'],
		'p8_header_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'p8_header_name' => ['name' => 'Name', 'domain' => 'name'],
		'p8_header_template_id' => ['name' => 'Template #', 'domain' => 'template_id'],
		'p8_header_data_model_code' => ['name' => 'Data Model Code', 'domain' => 'code', 'null' => true],
		'p8_header_skip_rendering' => ['name' => 'Skip Rendering', 'type' => 'boolean'],
		'p8_header_start_at_rows' => ['name' => 'Start At Rows', 'domain' => 'order'],
		'p8_header_start_at_page' => ['name' => 'Start At Page', 'domain' => 'order'],
		'p8_header_switch_to_max' => ['name' => 'Switch To Max', 'type' => 'boolean'],
		'p8_header_font_family' => ['name' => 'Font Family', 'domain' => 'font_family', 'null' => true],
		'p8_header_font_style' => ['name' => 'Font Style', 'domain' => 'font_style', 'null' => true],
		'p8_header_font_size' => ['name' => 'Font Size', 'domain' => 'font_size', 'null' => true],
		//'p8_header_paralel_header_id' => ['name' => 'Paralel Header #', 'domain' => 'header_id', 'null' => true],
		'p8_header_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'p8_headers_pk' => ['type' => 'pk', 'columns' => ['p8_header_tenant_id', 'p8_header_id']],
		'p8_header_code_un' => ['type' => 'unique', 'columns' => ['p8_header_tenant_id', 'p8_header_code']],
		'p8_header_template_id_fk' => [
			'type' => 'fk',
			'columns' => ['p8_header_tenant_id', 'p8_header_template_id'],
			'foreign_model' => '\Numbers\Users\Printing\Model\Templates',
			'foreign_columns' => ['p8_template_tenant_id', 'p8_template_id']
		],
	    /*
		'p8_header_paralel_header_id_fk' =>[
			'type' => 'fk',
			'columns' => ['p8_header_tenant_id', 'p8_header_paralel_header_id'],
			'foreign_model' => '\Numbers\Users\Printing\Model\Headers',
			'foreign_columns' => ['p8_header_tenant_id', 'p8_header_id']
		]
	    */
	];
	public $indexes = [
		'p8_headers_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['p8_header_code', 'p8_header_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'p8_header_tenant_id' => 'wg_audit_tenant_id',
			'p8_header_id' => 'wg_audit_header_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'p8_header_name' => 'name',
		'p8_header_inactive' => 'inactive'
	];
	public $options_active = [
		'p8_header_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}