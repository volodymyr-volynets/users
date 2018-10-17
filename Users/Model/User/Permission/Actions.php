<?php

namespace Numbers\Users\Users\Model\User\Permission;
class Actions extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Permission Actions';
	public $name = 'um_user_permission_actions';
	public $pk = ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id'];
	public $tenant = true;
	public $orderby = [
		'um_usrperaction_action_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_usrperaction_';
	public $columns = [
		'um_usrperaction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrperaction_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_usrperaction_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'um_usrperaction_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
		'um_usrperaction_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
		'um_usrperaction_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
		'um_usrperaction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_permission_actions_pk' => ['type' => 'pk', 'columns' => ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id']],
		'um_usrperaction_resource_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Permissions',
			'foreign_columns' => ['um_usrperm_tenant_id', 'um_usrperm_user_id', 'um_usrperm_module_id', 'um_usrperm_resource_id']
		],
		'um_usrperaction_action_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id'],
			'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Map',
			'foreign_columns' => ['sm_rsrcmp_resource_id', 'sm_rsrcmp_method_code', 'sm_rsrcmp_action_id']
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