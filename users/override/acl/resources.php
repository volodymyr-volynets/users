<?php

class numbers_users_users_override_acl_resources {
	public $data = [
		'application_structure' => [
			'tenant' => [
				'tenant_datasource' => 'numbers_tenants_tenants_datasource_tenants',
				'column_prefix' => 'tm_tenant_'
			]
		],
		'authorization' => [
			'login' => [
				'url' => '/numbers/users/users/controller/login'
			]
		],
		'controllers' => [
			'primary' => [
				'datasource' => 'numbers_users_users_datasource_acl_controllers'
			]
		],
		'menu' => [
			'primary' => [
				'datasource' => 'numbers_users_users_datasource_acl_menu_permissions'
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