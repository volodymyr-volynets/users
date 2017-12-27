<?php

namespace Numbers\Users\Workflow\Model\Workflow;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WW';
	public $title = 'W/W Workflow Organizations';
	public $name = 'ww_workflow_organizations';
	public $pk = ['ww_wrkflworg_tenant_id', 'ww_wrkflworg_workflow_id', 'ww_wrkflworg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'ww_wrkflworg_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ww_wrkflworg_';
	public $columns = [
		'ww_wrkflworg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ww_wrkflworg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ww_wrkflworg_workflow_id' => ['name' => 'Workflow #', 'domain' => 'workflow_id'],
		'ww_wrkflworg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'ww_wrkflworg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ww_workflow_organizations_pk' => ['type' => 'pk', 'columns' => ['ww_wrkflworg_tenant_id', 'ww_wrkflworg_workflow_id', 'ww_wrkflworg_organization_id']],
		'ww_wrkflworg_workflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_wrkflworg_tenant_id', 'ww_wrkflworg_workflow_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Workflows',
			'foreign_columns' => ['ww_workflow_tenant_id', 'ww_workflow_id']
		],
		'ww_wrkflworg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_wrkflworg_tenant_id', 'ww_wrkflworg_organization_id'],
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