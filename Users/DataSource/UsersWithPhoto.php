<?php

namespace Numbers\Users\Users\DataSource;
class UsersWithPhoto extends \Numbers\Users\Users\DataSource\Users {
	public $options_map = [
		'um_user_name' => 'name',
		'um_user_company' => 'name',
		'um_user_photo_file_id' => 'photo_id',
		'um_user_inactive' => 'inactive'
	];
	public $options_active = [
		'um_user_inactive' => 0
	];
}