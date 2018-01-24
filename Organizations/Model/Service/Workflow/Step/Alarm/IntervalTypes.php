<?php

namespace Numbers\Users\Organizations\Model\Service\Workflow\Step\Alarm;
class IntervalTypes extends \Object\Data {
	public $column_key = 'on_workstpinttype_id';
	public $column_prefix = 'on_workstpinttype_';
	public $orderby = [
		'on_workstpinttype_id' => SORT_ASC
	];
	public $columns = [
		'on_workstpinttype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_workstpinttype_name' => ['name' => 'Name', 'type' => 'text'],
	];
	public $options_map = [
		'on_workstpinttype_name' => 'name',
	];
	public $data = [
		10 => ['on_workstpinttype_name' => 'Minutes'],
		20 => ['on_workstpinttype_name' => 'Hours'],
		30 => ['on_workstpinttype_name' => 'Days'],
		40 => ['on_workstpinttype_name' => 'Month'],
		50 => ['on_workstpinttype_name' => 'Years'],
	];
}