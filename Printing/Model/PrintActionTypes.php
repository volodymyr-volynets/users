<?php

namespace Numbers\Users\Printing\Model;
class PrintActionTypes extends \Object\Data {
	public $module_code = 'P8';
	public $title = 'P/8 Print Action Types';
	public $column_key = 'p8_printactiontype_code';
	public $column_prefix = 'p8_printactiontype_';
	public $orderby;
	public $columns = [
		'p8_printactiontype_code' => ['name' => 'Action Type', 'domain' => 'type_code'],
		'p8_printactiontype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'PDF' => ['p8_printactiontype_name' => 'Print as PDF'],
		'HTML' => ['p8_printactiontype_name' => 'Print as HTML'],
		'EMAIL' => ['p8_printactiontype_name' => 'Send Email'],
		'QUEUE' => ['p8_printactiontype_name' => 'Add to Print Queue'],
	];
}