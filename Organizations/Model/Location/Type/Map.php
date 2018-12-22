<?php

namespace Numbers\Users\Organizations\Model\Location\Type;
class Map extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Location Type Map';
	public $name = 'on_location_type_map';
	public $pk = ['on_loctpmap_tenant_id', 'on_loctpmap_location_id', 'on_loctpmap_type_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_loctpmap_';
	public $columns = [
		'on_loctpmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_loctpmap_location_id' => ['name' => 'Location #', 'domain' => 'location_id'],
		'on_loctpmap_type_code' => ['name' => 'Type Code', 'domain' => 'type_code'],
	];
	public $constraints = [
		'on_location_type_map_pk' => ['type' => 'pk', 'columns' => ['on_loctpmap_tenant_id', 'on_loctpmap_location_id', 'on_loctpmap_type_code']],
		'on_loctpmap_location_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_loctpmap_tenant_id', 'on_loctpmap_location_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Locations',
			'foreign_columns' => ['on_location_tenant_id', 'on_location_id']
		],
	];
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