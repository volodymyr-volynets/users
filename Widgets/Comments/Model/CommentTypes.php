<?php

namespace Numbers\Users\Widgets\Comments\Model;
class CommentTypes extends \Object\Data {
	public $module_code = 'UM';
	public $title = 'U/M Note Comment Types';
	public $column_key = 'um_notecommtype_id';
	public $column_prefix = 'um_notecommtype_';
	public $orderby;
	public $columns = [
		'um_notecommtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'um_notecommtype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['um_notecommtype_name' => 'API'],
		20 => ['um_notecommtype_name' => 'Regular'],
	];
}