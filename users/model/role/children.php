<?php

class numbers_users_users_model_role_children extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Role Children';
	public $name = 'um_role_children';
	public $pk = ['um_rolrol_tenant_id', 'um_rolrol_structure_code', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'];
	public $tenant = true;
	public $orderby = [
		'um_rolrol_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_rolrol_';
	public $columns = [
		'um_rolrol_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_rolrol_id' => ['name' => '#', 'type' => 'bigserial'],
		'um_rolrol_structure_code' => ['name' => 'Structure Code', 'domain' => 'type_code'],
		'um_rolrol_parent_role_id' => ['name' => 'Parent Role #', 'domain' => 'group_id'],
		'um_rolrol_child_role_id' => ['name' => 'Child Role #', 'domain' => 'group_id'],
		'um_rolrol_unique' => ['name' => 'Unique', 'type' => 'smallint', 'null' => true, 'default' => null],
		'um_rolrol_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_role_children_pk' => ['type' => 'pk', 'columns' => ['um_rolrol_tenant_id', 'um_rolrol_structure_code', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id']],
		'um_rolrol_unique_un' => ['type' => 'unique', 'columns' => ['um_rolrol_tenant_id', 'um_rolrol_structure_code', 'um_rolrol_parent_role_id', 'um_rolrol_unique']],
		'um_rolrol_structure_code_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolrol_tenant_id', 'um_rolrol_structure_code'],
			'foreign_model' => 'numbers_tenants_tenants_model_structure_types',
			'foreign_columns' => ['tm_structure_tenant_id', 'tm_structure_code']
		],
		'um_rolrol_parent_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id'],
			'foreign_model' => 'numbers_users_users_model_roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		],
		'um_rolrol_child_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolrol_tenant_id', 'um_rolrol_child_role_id'],
			'foreign_model' => 'numbers_users_users_model_roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
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