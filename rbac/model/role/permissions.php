<?php

class numbers_users_rbac_model_role_permissions extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'RC';
	public $title = 'R/C Role Permissions';
	public $name = 'rc_role_permissions';
	public $pk = ['rc_rolperm_role_id', 'rc_rolperm_resource_id', 'rc_rolperm_method_code', 'rc_rolperm_action_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'rc_rolperm_';
	public $columns = [
		'rc_rolperm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'rc_rolperm_role_id' => ['name' => 'Role #', 'domain' => 'group_id'],
		'rc_rolperm_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
		'rc_rolperm_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
		'rc_rolperm_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
	];
	public $constraints = [
		'rc_role_permissions_pk' => ['type' => 'pk', 'columns' => ['rc_rolperm_tenant_id', 'rc_rolperm_role_id', 'rc_rolperm_resource_id', 'rc_rolperm_method_code', 'rc_rolperm_action_id']],
		'rc_rolperm_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['rc_rolperm_tenant_id', 'rc_rolperm_role_id'],
			'foreign_model' => 'numbers_users_rbac_model_roles',
			'foreign_columns' => ['rc_role_tenant_id', 'rc_role_id']
		],
		'rc_rolperm_resource_id_fk' => [
			'type' => 'fk',
			'columns' => ['rc_rolperm_resource_id', 'rc_rolperm_method_code', 'rc_rolperm_action_id'],
			'foreign_model' => 'numbers_backend_system_modules_model_resource_map',
			'foreign_columns' => ['sm_rsrcmp_resource_id', 'sm_rsrcmp_method_code', 'sm_rsrcmp_action_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}