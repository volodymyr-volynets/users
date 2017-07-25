<?php

namespace Numbers\Users\Organizations\Model;
class StrategicBusinessUnits extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Strategic Business Units';
	public $schema;
	public $name = 'on_sbus';
	public $pk = ['on_sbu_tenant_id', 'on_sbu_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_sbu_';
	public $columns = [
		'on_sbu_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_sbu_id' => ['name' => 'SBU #', 'domain' => 'sbu_id_sequence'],
		'on_sbu_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'on_sbu_name' => ['name' => 'Name', 'domain' => 'name'],
		'on_sbu_default_organization_id' => ['name' => 'Default Organization #', 'domain' => 'organization_id'],
		// contact
		'on_sbu_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'on_sbu_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
		'on_sbu_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'on_sbu_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
		'on_sbu_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
		'on_sbu_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
		// inactive & hold
		'on_sbu_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'on_sbu_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_sbus_pk' => ['type' => 'pk', 'columns' => ['on_sbu_tenant_id', 'on_sbu_id']],
		'on_sbu_code_un' => ['type' => 'unique', 'columns' => ['on_sbu_tenant_id', 'on_sbu_code']],
		'on_sbu_default_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_sbu_tenant_id', 'on_sbu_default_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		]
	];
	public $indexes = [
		'on_sbus_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_sbu_code', 'on_sbu_name', 'on_sbu_phone', 'on_sbu_email']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'on_sbu_tenant_id' => 'wg_audit_tenant_id',
			'on_sbu_id' => 'wg_audit_sbu_id'
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

	public $relation = [
		'field' => 'on_sbu_id',
	];

	public $who = [
		'inserted' => true
	];

	public $addresses = [
		'map' => [
			'on_sbu_tenant_id' => 'wg_address_tenant_id',
			'on_sbu_id' => 'wg_address_sbu_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}