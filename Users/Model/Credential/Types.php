<?php

namespace Numbers\Users\Users\Model\Credential;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Password Types';
	public $schema;
	public $name = 'um_password_types';
	public $pk = ['um_passtype_tenant_id', 'um_passtype_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_passtype_';
	public $columns = [
		'um_passtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_passtype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
		'um_passtype_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_passtype_value_counter' => ['name' => 'Value Counter', 'domain' => 'counter'],
		'um_passtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_password_types_pk' => ['type' => 'pk', 'columns' => ['um_passtype_tenant_id', 'um_passtype_code']],
	];
	public $indexes = [
		'um_password_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_passtype_code', 'um_passtype_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_passtype_tenant_id' => 'wg_audit_tenant_id',
			'um_passtype_code' => 'wg_audit_password_code'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'um_passtype_name' => 'name',
		'um_passtype_inactive' => 'inactive',
	];
	public $options_active = [
		'um_passtype_inactive' => 0
	];
	public $options_skip_i18n = false;
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $who = [];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}