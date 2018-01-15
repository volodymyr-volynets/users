<?php

namespace Numbers\Users\Organizations\Model\Service\Workflow\Step;
class SubTypes extends \Object\Data {
	public $column_key = 'on_workstpsubtype_id';
	public $column_prefix = 'on_workstpsubtype_';
	public $orderby;
	public $columns = [
		'on_workstpsubtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_workstpsubtype_name' => ['name' => 'Name', 'type' => 'text'],
		'on_workstpsubtype_icon' => ['name' => 'Icon', 'type' => 'text']
	];
	public $options_map = [
		'on_workstpsubtype_name' => 'name',
		'on_workstpsubtype_icon' => 'icon_class',
	];
	public $data = [
		10 => ['on_workstpsubtype_name' => 'Form', 'on_workstpsubtype_icon' => 'fas fa-database'],
		20 => ['on_workstpsubtype_name' => 'Decision', 'on_workstpsubtype_icon' => 'far fa-question-circle'],
		30 => ['on_workstpsubtype_name' => 'Information', 'on_workstpsubtype_icon' => 'fas fa-info'],
	];
}