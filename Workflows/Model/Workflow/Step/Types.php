<?php

namespace Numbers\Users\Workflows\Model\Workflow\Step;
class Types extends \Object\Data {
	public $module_code = 'W9';
	public $title = 'W/9 Workflow Step Types';
	public $column_key = 'w9_wrkflstptype_id';
	public $column_prefix = 'w9_wrkflstptype_';
	public $orderby;
	public $columns = [
		'w9_wrkflstptype_id' => ['name' => 'Type', 'domain' => 'type_id'],
		'w9_wrkflstptype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['w9_wrkflstptype_name' => 'System Page'],
		20 => ['w9_wrkflstptype_name' => 'Other System'],
	];
}