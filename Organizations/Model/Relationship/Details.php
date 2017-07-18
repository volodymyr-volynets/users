<?php

namespace Numbers\Users\Organizations\Model\Relationship;
class Details extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Relationship Details';
	public $name = 'on_relationship_details';
	public $pk = ['on_reldetail_tenant_id', 'on_reldetail_relationship_code', 'on_reldetail_order'];
	public $tenant = true;
	public $orderby = [
		'on_reldetail_order' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'on_reldetail_';
	public $columns = [
		'on_reldetail_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_reldetail_id' => ['name' => '#', 'type' => 'bigserial'],
		'on_reldetail_relationship_code' => ['name' => 'Relationship Code', 'domain' => 'group_code'],
		'on_reldetail_order' => ['name' => 'Order', 'domain' => 'order'],
		'on_reldetail_name' => ['name' => 'Name', 'domain' => 'name'],
		'on_reldetail_model_id' => ['name' => 'Model #', 'domain' => 'group_id'],
		'on_reldetail_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
		'on_reldetail_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_relationship_details_pk' => ['type' => 'pk', 'columns' => ['on_reldetail_tenant_id', 'on_reldetail_relationship_code', 'on_reldetail_order']],
		'on_reldetail_id_un' => ['type' => 'unique', 'columns' => ['on_reldetail_tenant_id', 'on_reldetail_id']],
		'on_reldetail_relationship_code_fk' => [
			'type' => 'fk',
			'columns' => ['on_reldetail_tenant_id', 'on_reldetail_relationship_code'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Relationships',
			'foreign_columns' => ['on_relationship_tenant_id', 'on_relationship_code']
		],
		'on_reldetail_model_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_reldetail_model_id'],
			'foreign_model' => '\Numbers\Backend\Db\Common\Model\Models',
			'foreign_columns' => ['sm_model_id']
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