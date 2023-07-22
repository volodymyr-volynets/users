<?php

namespace Numbers\Users\Users\DataSource;
class OwnerExtended extends \Numbers\Users\Users\DataSource\Owners {
	public $alias_model = true;
	public $options_map = [
		'um_user_name' => 'name',
		'um_user_company' => 'name',
		'um_user_id' => 'name',
		'um_user_inactive' => 'inactive'
	];
}