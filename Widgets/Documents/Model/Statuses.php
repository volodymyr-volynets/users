<?php

namespace Numbers\Users\Widgets\Documents\Model;
class Statuses extends \Object\Data {
	public $column_key = 'wg_docstatus_id';
	public $column_prefix = 'wg_docstatus_';
	public $columns = [
		'wg_docstatus_id' => ['name' => '#', 'type' => 'smallint'],
		'wg_docstatus_name' => ['name' => 'Name', 'type' => 'text'],
	];
	public $options_map = [
		'wg_docstatus_name' => 'name'
	];
	public $orderby = [
		'wg_docstatus_id' => SORT_ASC
	];
	public $data = [
		10 => ['wg_docstatus_name' => 'Not Required'],
		20 => ['wg_docstatus_name' => 'Required'],
		30 => ['wg_docstatus_name' => 'Approved'],
		40 => ['wg_docstatus_name' => 'Declined'],
	];
}