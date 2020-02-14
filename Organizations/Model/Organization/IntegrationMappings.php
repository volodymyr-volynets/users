<?php

namespace Numbers\Users\Organizations\Model\Organization;
class IntegrationMappings extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Organization Integration Mappings';
	public $name = 'on_organization_integration_mappings';
	public $pk = ['on_orgintegmap_tenant_id', 'on_orgintegmap_organization_id', 'on_orgintegmap_integtype_code', 'on_orgintegmap_code'];
	public $tenant = true;
	public $orderby = [
		'on_orgintegmap_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'on_orgintegmap_';
	public $columns = [
		'on_orgintegmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_orgintegmap_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'on_orgintegmap_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'on_orgintegmap_integtype_code' => ['name' => 'Integration Type', 'domain' => 'group_code'],
		'on_orgintegmap_code' => ['name' => 'Code', 'domain' => 'code'],
		'on_orgintegmap_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
		'on_orgintegmap_default' => ['name' => 'Default', 'type' => 'boolean'],
		'on_orgintegmap_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_organization_integration_mappings_pk' => ['type' => 'pk', 'columns' => ['on_orgintegmap_tenant_id', 'on_orgintegmap_organization_id', 'on_orgintegmap_integtype_code', 'on_orgintegmap_code']],
		'on_orgintegmap_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_orgintegmap_tenant_id', 'on_orgintegmap_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		],
		'on_orgintegmap_integtype_code_fk' => [
			'type' => 'fk',
			'columns' => ['on_orgintegmap_tenant_id', 'on_orgintegmap_integtype_code'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
			'foreign_columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [
		'on_orgintegmap_name' => 'name',
		'on_orgintegmap_inactive' => 'inactve'
	];
	public $options_active = [
		'on_orgintegmap_inactive' => 0
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