<?php

class numbers_users_users_model_roles extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Roles';
	public $schema;
	public $name = 'um_roles';
	public $pk = ['um_role_tenant_id', 'um_role_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_role_';
	public $columns = [
		'um_role_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_role_id' => ['name' => 'Role #', 'domain' => 'group_id_sequence'],
		'um_role_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'um_role_type_id' => ['name' => 'Type', 'domain' => 'type_id'],
		'um_role_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_role_global' => ['name' => 'Global', 'type' => 'boolean'],
		'um_role_super_admin' => ['name' => 'Super Admin', 'type' => 'boolean'],
		'um_role_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_roles_pk' => ['type' => 'pk', 'columns' => ['um_role_tenant_id', 'um_role_id']],
		'um_role_code_un' => ['type' => 'unique', 'columns' => ['um_role_tenant_id', 'um_role_code']],
		'um_role_type_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_role_type_id'],
			'foreign_model' => 'numbers_users_users_model_role_types',
			'foreign_columns' => ['um_roltype_id']
		],
	];
	public $indexes = [
		'um_roles_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_role_code', 'um_role_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_role_tenant_id' => 'wg_audit_tenant_id',
			'um_role_id' => 'wg_audit_role_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation = [
		'field' => 'um_role_id',
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}