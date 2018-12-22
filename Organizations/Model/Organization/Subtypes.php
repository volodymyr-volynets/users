<?php

namespace Numbers\Users\Organizations\Model\Organization;
class Subtypes extends \Object\Data {
	public $column_key = 'on_orgclass_id';
	public $column_prefix = 'on_orgclass_';
	public $columns = [
		'on_orgclass_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_orgclass_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['on_orgclass_name' => 'Primary'],
		20 => ['on_orgclass_name' => 'Customer'],
	];
}