<?php

namespace Numbers\Users\Users\Model\Team\API;
class Methods extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Team API Methods';
	public $name = 'um_team_api_methods';
	public $pk = ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id', 'um_temapmethod_method_code'];
	public $tenant = true;
	public $orderby = [
		'um_temapmethod_method_code' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_temapmethod_';
	public $columns = [
		'um_temapmethod_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_temapmethod_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
		'um_temapmethod_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'um_temapmethod_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
		'um_temapmethod_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
		'um_temapmethod_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_team_api_methods_pk' => ['type' => 'pk', 'columns' => ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id', 'um_temapmethod_method_code']],
		'um_temapmethod_resource_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Team\APIs',
			'foreign_columns' => ['um_temapi_tenant_id', 'um_temapi_team_id', 'um_temapi_module_id', 'um_temapi_resource_id']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
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