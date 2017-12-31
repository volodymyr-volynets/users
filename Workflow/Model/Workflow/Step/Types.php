<?php

namespace Numbers\Users\Workflow\Model\Workflow\Step;
class Types extends \Object\Data {
	public $column_key = 'ww_wrkstptype_id';
	public $column_prefix = 'ww_wrkstptype_';
	public $orderby;
	public $columns = [
		'ww_wrkstptype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'ww_wrkstptype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['ww_wrkstptype_name' => 'Begin'],
		20 => ['ww_wrkstptype_name' => 'Intermediate'],
		30 => ['ww_wrkstptype_name' => 'End']
	];
}