<?php

namespace Numbers\Users\Users\Model\Team\Permission;
class Actions extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Team Permission Actions';
	public $name = 'um_team_permission_actions';
	public $pk = ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id'];
	public $tenant = true;
	public $orderby = [
		'um_temperaction_action_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_temperaction_';
	public $columns = [
		'um_temperaction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_temperaction_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
		'um_temperaction_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'um_temperaction_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
		'um_temperaction_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
		'um_temperaction_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
		'um_temperaction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_team_permission_actions_pk' => ['type' => 'pk', 'columns' => ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id']],
		'um_temperaction_resource_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Team\Permissions',
			'foreign_columns' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id']
		],
		'um_temperaction_action_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id'],
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