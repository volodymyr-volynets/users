<?php

namespace Numbers\Users\Users\Override;
class Aliases {
	public $data = [
		'role_id' => [
			'no_data_alias_name' => 'Role #',
			'no_data_alias_model' => '\Numbers\Users\Users\Model\Roles',
			'no_data_alias_column' => 'um_role_code'
		],
		'user_id' => [
			'no_data_alias_name' => 'User #',
			'no_data_alias_model' => '\Numbers\Users\Users\Model\Users',
			'no_data_alias_column' => 'um_user_code'
		],
		'ownertype_id' => [
			'no_data_alias_name' => 'Owner Type #',
			'no_data_alias_model' => '\Numbers\Users\Users\Model\User\Owner\Types',
			'no_data_alias_column' => 'um_ownertype_code'
		]
	];
}