<?php

namespace Numbers\Users\Organizations\Model\Service\Executed\Workflow\Owner;
class Types extends \Object\Data {
	public $column_key = 'on_execwfownertype_id';
	public $column_prefix = 'on_execwfownertype_';
	public $orderby;
	public $columns = [
		'on_execwfownertype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_execwfownertype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		100 => ['on_execwfownertype_name' => 'Service Provider Main'],
		110 => ['on_execwfownertype_name' => 'Service Provider Employee'],
		200 => ['on_execwfownertype_name' => 'Call Center Agent']
	];
}