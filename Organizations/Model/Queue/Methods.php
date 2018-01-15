<?php

namespace Numbers\Users\Organizations\Model\Queue;
class Methods extends \Object\Data {
	public $column_key = 'on_quemethod_id';
	public $column_prefix = 'on_quemethod_';
	public $columns = [
		'on_quemethod_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_quemethod_name' => ['name' => 'Name', 'type' => 'text'],
		'on_quemethod_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
	];
	public $options_map = [
		'on_quemethod_name' => 'name',
		'on_quemethod_icon' => 'icon_class',
	];
	public $data = [
		10 => ['on_quemethod_name' => 'Round Robin', 'on_quemethod_icon' => 'fab fa-chrome'],
		20 => ['on_quemethod_name' => 'Prioritized', 'on_quemethod_icon' => 'fab fa-docker'],
		30 => ['on_quemethod_name' => 'Cherry Picking', 'on_quemethod_icon' => 'fab fa-sistrix'],
	];
}