<?php

namespace Numbers\Users\Organizations\Model\Location;
class Types extends \Object\Data {
	public $column_key = 'on_loctype_code';
	public $column_prefix = 'on_loctype_';
	public $columns = [
		'on_loctype_code' => ['name' => 'Type #', 'domain' => 'type_code'],
		'on_loctype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'WAREHOUSE' => ['on_loctype_name' => 'Warehouse'],
		'DIST_CENTER' => ['on_loctype_name' => 'Distribution Center'],
		'STORE' => ['on_loctype_name' => 'Store'],
		'SERVICE_LOC' => ['on_loctype_name' => 'Service Location'],
		'CONSTRUCTION' => ['on_loctype_name' => 'Construction Site'],
		'MAINTENANCE' => ['on_loctype_name' => 'Maintenance'],
		'OPERATING' => ['on_loctype_name' => 'Operating Location'],
	];
}