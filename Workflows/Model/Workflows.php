<?php

namespace Numbers\Users\Workflows\Model;
class Workflows extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'W9';
	public $title = 'W/9 Workflows';
	public $schema;
	public $name = 'w9_workflows';
	public $pk = ['w9_workflow_tenant_id', 'w9_workflow_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'w9_workflow_';
	public $columns = [
		'w9_workflow_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'w9_workflow_id' => ['name' => 'Template #', 'domain' => 'workflow_id_sequence'],
		'w9_workflow_code' => ['name' => 'Code', 'domain' => 'group_code'],
		//'w9_workflow_templtype_id' => ['name' => 'Type', 'domain' => 'type_id'],
		'w9_workflow_name' => ['name' => 'Name', 'domain' => 'name'],
		// version
		'w9_workflow_versioned' => ['name' => 'Versioned', 'type' => 'boolean'],
		'w9_workflow_version_w9_workflow_id' => ['name' => 'Version Template #', 'domain' => 'template_id', 'null' => true],
		'w9_workflow_version_code' => ['name' => 'Version Code', 'domain' => 'version_code', 'null' => true],
		'w9_workflow_version_name' => ['name' => 'Version Name', 'domain' => 'name', 'null' => true],
		// other fields
		'w9_workflow_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'w9_workflows_pk' => ['type' => 'pk', 'columns' => ['w9_workflow_tenant_id', 'w9_workflow_id']],
		'w9_workflow_code_un' => ['type' => 'unique', 'columns' => ['w9_workflow_tenant_id', 'w9_workflow_code']],
		/*
		'w9_workflow_templtype_id_fk' => [
			'type' => 'fk',
			'columns' => ['w9_workflow_tenant_id', 'w9_workflow_templtype_id'],
			'foreign_model' => '\Numbers\Users\Printing\Model\Template\Types',
			'foreign_columns' => ['p8_templtype_tenant_id', 'p8_templtype_id']
		],
		*/
		'w9_workflow_version_w9_workflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['w9_workflow_tenant_id', 'w9_workflow_version_w9_workflow_id'],
			'foreign_model' => '\Numbers\Users\Workflows\Model\Workflows',
			'foreign_columns' => ['w9_workflow_tenant_id', 'w9_workflow_id']
		]
	];
	public $indexes = [
		'w9_workflows_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['w9_workflow_code', 'w9_workflow_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'w9_workflow_tenant_id' => 'wg_audit_tenant_id',
			'w9_workflow_id' => 'wg_audit_workflow_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'w9_workflow_name' => 'name',
		'w9_workflow_version_name' => 'name',
		'w9_workflow_inactive' => 'inactive'
	];
	public $options_active = [
		'w9_workflow_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
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