<?php

class numbers_users_users_model_role_organizations extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Role Organizations';
	public $name = 'um_role_organizations';
	public $pk = ['um_rolorg_structure_code', 'um_rolorg_role_id', 'um_rolorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'um_rolorg_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_rolorg_';
	public $columns = [
		'um_rolorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_rolorg_id' => ['name' => '#', 'type' => 'bigserial'],
		'um_rolorg_structure_code' => ['name' => 'Structure Code', 'domain' => 'type_code'],
		'um_rolorg_role_id' => ['name' => 'Role #', 'domain' => 'group_id'],
		'um_rolorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'um_rolorg_unique' => ['name' => 'Unique', 'type' => 'smallint', 'null' => true],
		'um_rolorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_role_organizations_pk' => ['type' => 'pk', 'columns' => ['um_rolorg_tenant_id', 'um_rolorg_structure_code', 'um_rolorg_role_id', 'um_rolorg_organization_id']],
		'um_rolorg_unique_un' => ['type' => 'unique', 'columns' => ['um_rolorg_tenant_id', 'um_rolorg_structure_code', 'um_rolorg_role_id', 'um_rolorg_unique']],
		'um_rolorg_structure_code_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolorg_tenant_id', 'um_rolorg_structure_code'],
			'foreign_model' => 'numbers_tenants_tenants_model_structure_types',
			'foreign_columns' => ['tm_structure_tenant_id', 'tm_structure_code']
		],
		'um_rolorg_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolorg_tenant_id', 'um_rolorg_role_id'],
			'foreign_model' => 'numbers_users_users_model_roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		],
		'um_rolorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_rolorg_tenant_id', 'um_rolorg_organization_id'],
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

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}