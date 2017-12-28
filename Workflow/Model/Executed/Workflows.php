<?php

namespace Numbers\Users\Workflow\Model\Executed;
class Workflows extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WW';
	public $title = 'W/W Executed Workflows';
	public $schema;
	public $name = 'ww_executed_workflows';
	public $pk = ['ww_execwflow_tenant_id', 'ww_execwflow_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ww_execwflow_';
	public $columns = [
		'ww_execwflow_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ww_execwflow_id' => ['name' => 'Executed #', 'domain' => 'big_id_sequence'],
		'ww_execwflow_service_id' => ['name' => 'Service #', 'domain' => 'service_id'],
		'ww_execwflow_workflow_id' => ['name' => 'Workflow #', 'domain' => 'workflow_id'],
		'ww_execwflow_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ww_executed_workflows_pk' => ['type' => 'pk', 'columns' => ['ww_execwflow_tenant_id', 'ww_execwflow_id']],
		'ww_execwflow_workflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_execwflow_tenant_id', 'ww_execwflow_workflow_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Workflows',
			'foreign_columns' => ['ww_workflow_tenant_id', 'ww_workflow_id']
		],
		'ww_execwflow_service_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_execwflow_tenant_id', 'ww_execwflow_service_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Services',
			'foreign_columns' => ['ww_service_tenant_id', 'ww_service_id']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
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