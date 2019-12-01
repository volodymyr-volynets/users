<?php

namespace Numbers\Users\Users\Model\Aliases;
class Users extends \Numbers\Users\Users\Model\Users {
	public $options_map = [
		'um_user_name' => 'name',
		'um_user_company' => 'name',
		'um_user_id' => 'name',
		'um_user_inactive' => 'inactive'
	];
	public $alias_model = true;
	public $alias_for = '\Numbers\Users\Users\Model\Users';
}