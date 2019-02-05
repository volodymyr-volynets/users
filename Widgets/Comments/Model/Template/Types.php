<?php

namespace Numbers\Users\Widgets\Comments\Model\Template;
class Types extends \Object\Data {
	public $column_key = 'um_notetempltype_id';
	public $column_prefix = 'um_notetempltype_';
	public $orderby;
	public $columns = [
		'um_notetempltype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'um_notetempltype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		100 => ['um_notetempltype_name' => 'Comments'],
	];
}