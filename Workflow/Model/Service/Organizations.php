<?php

namespace Numbers\Users\Workflow\Model\Service;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WW';
	public $title = 'W/W Service Organizations';
	public $name = 'ww_service_organizations';
	public $pk = ['ww_servorg_tenant_id', 'ww_servorg_service_id', 'ww_servorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'ww_servorg_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ww_servorg_';
	public $columns = [
		'ww_servorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ww_servorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ww_servorg_service_id' => ['name' => 'Service #', 'domain' => 'service_id'],
		'ww_servorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'ww_servorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ww_service_organizations_pk' => ['type' => 'pk', 'columns' => ['ww_servorg_tenant_id', 'ww_servorg_service_id', 'ww_servorg_organization_id']],
		'ww_servorg_service_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_servorg_tenant_id', 'ww_servorg_service_id'],
			'foreign_model' => '\Numbers\Users\Workflow\Model\Services',
			'foreign_columns' => ['ww_service_tenant_id', 'ww_service_id']
		],
		'ww_servorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ww_servorg_tenant_id', 'ww_servorg_organization_id'],
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