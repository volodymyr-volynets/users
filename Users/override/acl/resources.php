<?php

namespace Numbers\Users\Users\Override\ACL;
class Resources {
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
				'datasource' => '\Numbers\Users\Users\DataSource\ACL\Controllers'
			]
		],
		'menu' => [
			'primary' => [
				'datasource' => '\Numbers\Users\Users\DataSource\ACL\Menu\Permissions'
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