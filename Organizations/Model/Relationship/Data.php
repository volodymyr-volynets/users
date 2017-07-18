<?php

namespace Numbers\Users\Organizations\Model\Relationship;
class Data extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Relationship Data';
	public $name = 'on_relationship_data';
	public $pk = ['on_reldata_tenant_id', 'on_reldata_id'];
	public $tenant = true;
	public $orderby = [];
	public $limit;
	public $column_prefix = 'on_reldata_';
	public $columns = [
		'on_reldata_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_reldata_id' => ['name' => '#', 'type' => 'bigserial'],
		'on_reldata_relationship_code' => ['name' => 'Relationship Code', 'domain' => 'group_code'],
		'on_reldata_sequence' => ['name' => 'Sequence', 'type' => 'bigint'],
		'on_reldata_parent_detail_id' => ['name' => 'Parent Detail #', 'type' => 'bigserial'],
		'on_reldata_parent_id' => ['name' => 'Parent #', 'type' => 'bigint', 'null' => true],
		'on_reldata_parent_code' => ['name' => 'Parent Code', 'domain' => 'code', 'null' => true],
		'on_reldata_child_detail_id' => ['name' => 'Child Detail #', 'type' => 'bigserial'],
		'on_reldata_child_id' => ['name' => 'Child #', 'type' => 'bigint', 'null' => true],
		'on_reldata_child_code' => ['name' => 'Child Code', 'domain' => 'code', 'null' => true],
		'on_reldata_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_relationship_data_pk' => ['type' => 'pk', 'columns' => ['on_reldata_tenant_id', 'on_reldata_id']],
		'on_reldata_sequence_un' => ['type' => 'unique', 'columns' => ['on_reldata_tenant_id', 'on_reldata_relationship_code', 'on_reldata_sequence', 'on_reldata_parent_detail_id', 'on_reldata_parent_id', 'on_reldata_parent_code', 'on_reldata_child_detail_id', 'on_reldata_child_id', 'on_reldata_child_code']],
		'on_reldata_relationship_code_fk' => [
			'type' => 'fk',
			'columns' => ['on_reldata_tenant_id', 'on_reldata_relationship_code'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Relationships',
			'foreign_columns' => ['on_relationship_tenant_id', 'on_relationship_code']
		],
		'on_reldata_parent_detail_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_reldata_tenant_id', 'on_reldata_parent_detail_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Relationship\Details',
			'foreign_columns' => ['on_reldetail_tenant_id', 'on_reldetail_id']
		],
		'on_reldata_child_detail_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_reldata_tenant_id', 'on_reldata_child_detail_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Relationship\Details',
			'foreign_columns' => ['on_reldetail_tenant_id', 'on_reldetail_id']
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