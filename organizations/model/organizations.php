<?php

class numbers_users_organizations_model_organizations extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Organizations';
	public $schema;
	public $name = 'on_organizations';
	public $pk = ['on_organization_tenant_id', 'on_organization_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_organization_';
	public $columns = [
		'on_organization_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id_sequence'],
		'on_organization_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'on_organization_type_code' => ['name' => 'Type', 'domain' => 'type_code', 'null' => true],
		'on_organization_name' => ['name' => 'Screen Name', 'domain' => 'name'],
		// contact
		'on_organization_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'on_organization_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
		'on_organization_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'on_organization_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
		'on_organization_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
		'on_organization_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
		// inactive & hold
		'on_organization_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'on_organization_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_organizations_pk' => ['type' => 'pk', 'columns' => ['on_organization_tenant_id', 'on_organization_id']],
		'on_organization_code_un' => ['type' => 'unique', 'columns' => ['on_organization_tenant_id', 'on_organization_code']],
		'on_organization_type_code_fk' => [
			'type' => 'fk',
			'columns' => ['on_organization_tenant_id', 'on_organization_type_code'],
			'foreign_model' => 'numbers_users_organizations_model_organization_types',
			'foreign_columns' => ['on_orgtype_tenant_id', 'on_orgtype_code']
		]
	];
	public $indexes = [
		'on_organizations_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_organization_code', 'on_organization_name', 'on_organization_phone', 'on_organization_email']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'on_organization_tenant_id' => 'wg_audit_tenant_id',
			'on_organization_id' => 'wg_audit_organization_id'
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
		'field' => 'on_organization_id',
	];

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $addresses = [
		'map' => [
			'on_organization_id' => 'wg_address_organization_id'
		]
	];

	public $attributes = [
		'map' => [
			'on_organization_id' => 'wg_attribute_organization_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}