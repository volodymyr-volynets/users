<?php

namespace Numbers\Users\Organizations\Model;
class Relationships extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Relationships';
	public $name = 'on_relationships';
	public $pk = ['on_relationship_tenant_id', 'on_relationship_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_relationship_';
	public $columns = [
		'on_relationship_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_relationship_code' => ['name' => 'Relationship Code', 'domain' => 'group_code'],
		'on_relationship_name' => ['name' => 'Name', 'domain' => 'name'],
		'on_relationship_model_id' => ['name' => 'Model #', 'domain' => 'group_id'],
		'on_relationship_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_relationships_pk' => ['type' => 'pk', 'columns' => ['on_relationship_tenant_id', 'on_relationship_code']],
		'on_relationship_tenant_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_relationship_tenant_id'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Tenants',
			'foreign_columns' => ['tm_tenant_id']
		],
		'on_relationship_model_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_relationship_model_id'],
			'foreign_model' => '\Numbers\Backend\Db\Common\Model\Models',
			'foreign_columns' => ['sm_model_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = [
		'map' => [
			'on_relationship_tenant_id' => 'wg_audit_tenant_id',
			'on_relationship_code' => 'wg_audit_relationship_code'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 1,
		'scope' => 'global'
	];
}