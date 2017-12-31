<?php

namespace Numbers\Users\Workflow\Model;
class Services extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WW';
	public $title = 'W/W Services';
	public $schema;
	public $name = 'ww_services';
	public $pk = ['ww_service_tenant_id', 'ww_service_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ww_service_';
	public $columns = [
		'ww_service_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ww_service_id' => ['name' => 'Service #', 'domain' => 'service_id_sequence'],
		'ww_service_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
		'ww_service_name' => ['name' => 'Name', 'domain' => 'name'],
		'ww_service_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
		'ww_service_workflow_id' => ['name' => 'Workflow #', 'domain' => 'workflow_id', 'null' => true],
		'ww_service_all_roles' => ['name' => 'All Roles', 'type' => 'boolean'],
		'ww_service_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ww_services_pk' => ['type' => 'pk', 'columns' => ['ww_service_tenant_id', 'ww_service_id']],
		'ww_service_code_un' => ['type' => 'unique', 'columns' => ['ww_service_tenant_id', 'ww_service_code']],
		'ww_service_workflow_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_service_tenant_id', 'ww_service_workflow_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Workflows',
			'foreign_columns' => ['ww_workflow_tenant_id', 'ww_workflow_id']
		],
	];
	public $indexes = [
		'ww_services_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ww_service_code', 'ww_service_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ww_service_tenant_id' => 'wg_audit_tenant_id',
			'ww_service_id' => 'wg_audit_service_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ww_service_name' => 'name',
		'ww_service_icon' => 'icon_class'
	];
	public $options_active = [
		'ww_service_inactive' => 0
	];
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