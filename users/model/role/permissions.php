<?php

class numbers_users_users_model_role_permissions extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Role Permissions';
	public $name = 'um_role_permissions';
	public $pk = ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'];
	public $tenant = true;
	public $orderby = [
		'um_rolperm_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_rolperm_';
	public $columns = [
		'um_rolperm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_rolperm_id' => ['name' => '#', 'type' => 'bigserial'],
		'um_rolperm_role_id' => ['name' => 'Role #', 'domain' => 'group_id'],
		'um_rolperm_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
		'um_rolperm_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
		'um_rolperm_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
		'um_rolperm_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_role_permissions_pk' => ['type' => 'pk', 'columns' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id']],
		'um_rolperm_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolperm_tenant_id', 'um_rolperm_role_id'],
			'foreign_model' => 'numbers_users_users_model_roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		],
		'um_rolperm_resource_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
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

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}