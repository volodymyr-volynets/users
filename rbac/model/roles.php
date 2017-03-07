<?php

class numbers_users_rbac_model_roles extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'RC';
	public $title = 'R/C Roles';
	public $schema;
	public $name = 'rc_roles';
	public $pk = ['rc_role_tenant_id', 'rc_role_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'rc_role_';
	public $columns = [
		'rc_role_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'rc_role_id' => ['name' => 'User #', 'domain' => 'group_id_sequence'],
		'rc_role_code' => ['name' => 'Code', 'domain' => 'code'],
		'rc_role_type_id' => ['name' => 'Type', 'domain' => 'type_id'],
		'rc_role_name' => ['name' => 'Screen Name', 'domain' => 'name'],
		'rc_role_global' => ['name' => 'Global', 'type' => 'boolean'],
		'rc_role_super_admin' => ['name' => 'Super Admin', 'type' => 'boolean'],
		'rc_role_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'rc_roles_pk' => ['type' => 'pk', 'columns' => ['rc_role_tenant_id', 'rc_role_id']],
		'rc_role_code_un' => ['type' => 'unique', 'columns' => ['rc_role_tenant_id', 'rc_role_code']],
		'rc_role_type_id_fk' => [
			'type' => 'fk',
			'columns' => ['rc_role_type_id'],
			'foreign_model' => 'numbers_users_rbac_model_role_types',
			'foreign_columns' => ['rc_roltype_id']
		],
	];
	public $indexes = [
		'rc_roles_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['rc_role_code', 'rc_role_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'rc_role_tenant_id' => 'wg_audit_tenant_id',
			'rc_role_id' => 'wg_audit_role_id'
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
		'field' => 'rc_role_id',
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}