<?php

namespace Numbers\Users\Organizations\Model\Common\Note;
class Locations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Common Notes Locations';
	public $name = 'on_common_note_locations';
	public $pk = ['on_comnotloc_tenant_id', 'on_comnotloc_comnote_id', 'on_comnotloc_location_id'];
	public $tenant = true;
	public $orderby = [];
	public $limit;
	public $column_prefix = 'on_comnotloc_';
	public $columns = [
		'on_comnotloc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_comnotloc_comnote_id' => ['name' => 'Note #', 'domain' => 'group_id'],
		'on_comnotloc_location_id' => ['name' => 'Location #', 'domain' => 'location_id'],
	];
	public $constraints = [
		'on_common_note_locations_pk' => ['type' => 'pk', 'columns' => ['on_comnotloc_tenant_id', 'on_comnotloc_comnote_id', 'on_comnotloc_location_id']],
		'on_comnotloc_location_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_comnotloc_tenant_id', 'on_comnotloc_location_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Locations',
			'foreign_columns' => ['on_location_tenant_id', 'on_location_id']
		],
		'on_comnotloc_comnote_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_comnotloc_tenant_id', 'on_comnotloc_comnote_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Common\Notes',
			'foreign_columns' => ['on_comnote_tenant_id', 'on_comnote_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}