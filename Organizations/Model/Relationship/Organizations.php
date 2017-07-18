<?php

namespace Numbers\Users\Organizations\Model\Relationship;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Relationship Organizations';
	public $name = 'on_relationship_organizations';
	public $pk = ['on_relorg_tenant_id', 'on_relorg_relationship_code', 'on_relorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'on_relorg_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'on_relorg_';
	public $columns = [
		'on_relorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_relorg_id' => ['name' => '#', 'type' => 'bigserial'],
		'on_relorg_relationship_code' => ['name' => 'Relationship Code', 'domain' => 'group_code'],
		'on_relorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'on_relorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_relationship_organizations_pk' => ['type' => 'pk', 'columns' => ['on_relorg_tenant_id', 'on_relorg_relationship_code', 'on_relorg_organization_id']],
		'on_relorg_relationship_code_fk' => [
			'type' => 'fk',
			'columns' => ['on_relorg_tenant_id', 'on_relorg_relationship_code'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Relationships',
			'foreign_columns' => ['on_relationship_tenant_id', 'on_relationship_code']
		],
		'on_relorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_relorg_tenant_id', 'on_relorg_organization_id'],
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
		'mysqli' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}