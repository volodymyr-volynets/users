<?php

namespace Numbers\Users\Users\Model\User;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Organizations';
	public $name = 'um_user_organizations';
	public $pk = ['um_usrorg_tenant_id', 'um_usrorg_structure_code', 'um_usrorg_user_id', 'um_usrorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'um_usrorg_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_usrorg_';
	public $columns = [
		'um_usrorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrorg_id' => ['name' => '#', 'type' => 'bigserial'],
		'um_usrorg_structure_code' => ['name' => 'Structure Code', 'domain' => 'type_code'],
		'um_usrorg_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_usrorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'um_usrorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_organizations_pk' => ['type' => 'pk', 'columns' => ['um_usrorg_tenant_id', 'um_usrorg_structure_code', 'um_usrorg_user_id', 'um_usrorg_organization_id']],
		'um_usrorg_structure_code_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrorg_tenant_id', 'um_usrorg_structure_code'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Structure\Types',
			'foreign_columns' => ['tm_structure_tenant_id', 'tm_structure_code']
		],
		'um_usrorg_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrorg_tenant_id', 'um_usrorg_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
		'um_usrorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrorg_tenant_id', 'um_usrorg_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
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