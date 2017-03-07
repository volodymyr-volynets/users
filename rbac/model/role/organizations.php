<?php

class numbers_users_rbac_model_role_organizations extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'RC';
	public $title = 'R/C Role Organizations';
	public $name = 'rc_role_organizations';
	public $pk = ['rc_rolorg_structure_code', 'rc_rolorg_user_id', 'rc_rolorg_organization_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'rc_rolorg_';
	public $columns = [
		'rc_rolorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'rc_rolorg_structure_code' => ['name' => 'Structure Code', 'domain' => 'type_code'],
		'rc_rolorg_role_id' => ['name' => 'Role #', 'domain' => 'group_id'],
		'rc_rolorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'rc_rolorg_unique' => ['name' => 'Unique', 'type' => 'smallint', 'null' => true],
	];
	public $constraints = [
		'rc_role_organizations_pk' => ['type' => 'pk', 'columns' => ['rc_rolorg_tenant_id', 'rc_rolorg_structure_code', 'rc_rolorg_role_id', 'rc_rolorg_organization_id']],
		'rc_rolorg_unique_un' => ['type' => 'unique', 'columns' => ['rc_rolorg_tenant_id', 'rc_rolorg_structure_code', 'rc_rolorg_role_id', 'rc_rolorg_unique']],
		'rc_rolorg_structure_code_fk' => [
			'type' => 'fk',
			'columns' => ['rc_rolorg_tenant_id', 'rc_rolorg_structure_code'],
			'foreign_model' => 'numbers_tenants_tenants_model_structure_types',
			'foreign_columns' => ['tm_structure_tenant_id', 'tm_structure_code']
		],
		'rc_rolorg_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['rc_rolorg_tenant_id', 'rc_rolorg_role_id'],
			'foreign_model' => 'numbers_users_rbac_model_roles',
			'foreign_columns' => ['rc_role_tenant_id', 'rc_role_id']
		],
		'rc_rolorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['rc_rolorg_tenant_id', 'rc_rolorg_organization_id'],
			'foreign_model' => 'numbers_users_organizations_model_organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
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