<?php

namespace Numbers\Users\Organizations\Model\Service\Executed\Workflow;
class Owners extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Executed Workflow Owners';
	public $schema;
	public $name = 'on_executed_workflow_owners';
	public $pk = ['on_execwfowner_tenant_id', 'on_execwfowner_execwflow_id', 'on_execwfowner_type_id', 'on_execwfowner_user_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_execwfowner_';
	public $columns = [
		'on_execwfowner_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_execwfowner_execwflow_id' => ['name' => 'Executed #', 'domain' => 'executed_workflow_id'],
		'on_execwfowner_type_id' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Organizations\Model\Service\Executed\Workflow\Owner\Types'],
		'on_execwfowner_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
	];
	public $constraints = [
		'on_executed_workflow_owners_pk' => ['type' => 'pk', 'columns' => ['on_execwfowner_tenant_id', 'on_execwfowner_execwflow_id', 'on_execwfowner_type_id', 'on_execwfowner_user_id']],
		'on_execwfowner_execwflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_execwfowner_tenant_id', 'on_execwfowner_execwflow_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Service\Executed\Workflows',
			'foreign_columns' => ['on_execwflow_tenant_id', 'on_execwflow_id']
		],
		'on_execwfowner_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_execwfowner_tenant_id', 'on_execwfowner_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		]
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