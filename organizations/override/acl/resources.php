<?php

class numbers_users_organizations_override_acl_resources {
	public $data = [
		'application.structure' => [
			'organization' => [
				'datasource' => 'numbers_tenants_tenants_datasource_tenants',
				'column_prefix' => 'tm_tenant_'
			]
		]
	];
}