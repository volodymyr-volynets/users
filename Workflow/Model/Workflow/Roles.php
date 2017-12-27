<?php

namespace Numbers\Users\Workflow\Model\Workflow;
class Roles extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WW';
	public $title = 'W/W Workflow Roles';
	public $name = 'ww_workflow_roles';
	public $pk = ['ww_wrkflwrol_tenant_id', 'ww_wrkflwrol_workflow_id', 'ww_wrkflwrol_role_id'];
	public $tenant = true;
	public $orderby = [
		'ww_wrkflwrol_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ww_wrkflwrol_';
	public $columns = [
		'ww_wrkflwrol_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ww_wrkflwrol_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ww_wrkflwrol_workflow_id' => ['name' => 'Workflow #', 'domain' => 'workflow_id'],
		'ww_wrkflwrol_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
		'ww_wrkflwrol_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ww_workflow_roles_pk' => ['type' => 'pk', 'columns' => ['ww_wrkflwrol_tenant_id', 'ww_wrkflwrol_workflow_id', 'ww_wrkflwrol_role_id']],
		'ww_wrkflwrol_workflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_wrkflwrol_tenant_id', 'ww_wrkflwrol_workflow_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Workflows',
			'foreign_columns' => ['ww_workflow_tenant_id', 'ww_workflow_id']
		],
		'ww_wrkflwrol_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_wrkflwrol_tenant_id', 'ww_wrkflwrol_role_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		]
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