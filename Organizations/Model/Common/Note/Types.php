<?php

namespace Numbers\Users\Organizations\Model\Common\Note;
class Types extends \Object\Data {
	public $column_key = 'on_comnottype_code';
	public $column_prefix = 'on_comnottype_';
	public $columns = [
		'on_comnottype_code' => ['name' => 'Type #', 'domain' => 'type_code'],
		'on_comnottype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'GENERAL' => ['on_comnottype_name' => 'General'],
		'WARNING' => ['on_comnottype_name' => 'Warning'],
		'NOTICE' => ['on_comnottype_name' => 'Notice'],
	];
}