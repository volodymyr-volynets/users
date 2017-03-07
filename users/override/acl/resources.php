<?php

class numbers_users_users_override_acl_resources {
	public $data = [
		'authorization' => [
			'login' => [
				'url' => '/numbers/users/users/controller/login'
			]
		],
		'user_roles' => [
			'anonymous' => [
				'data' => 'SYSTEM_ANONYMOUS'
			],
			'authorized' => [
				'data' => 'SYSTEM_AUTHORIZED'
			]
		]
	];
}