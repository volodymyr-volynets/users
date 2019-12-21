<?php

namespace Numbers\Users\Users\Model\Credential;
class MyPasswords extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M My Passwords';
	public $schema;
	public $name = 'um_my_passwords';
	public $pk = ['um_mypasswd_tenant_id', 'um_mypasswd_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_mypasswd_';
	public $columns = [
		'um_mypasswd_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_mypasswd_id' => ['name' => 'Password #', 'domain' => 'password_id_sequence'],
		'um_mypasswd_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_mypasswd_value_counter' => ['name' => 'Value Counter', 'domain' => 'counter'],
		'um_mypasswd_passtype_code' => ['name' => 'Type Code', 'domain' => 'group_code', 'null' => true],
		'um_mypasswd_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_my_passwords_pk' => ['type' => 'pk', 'columns' => ['um_mypasswd_tenant_id', 'um_mypasswd_id']],
		'um_mypasswd_passtype_code_fk' => [
			'type' => 'fk',
			'columns' => ['um_mypasswd_tenant_id', 'um_mypasswd_passtype_code'],
			'foreign_model' => '\Numbers\Users\Users\Model\Credential\Types',
			'foreign_columns' => ['um_passtype_tenant_id', 'um_passtype_code']
		],
	];
	public $indexes = [
		'um_my_passwords_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_mypasswd_name']]
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = true;
	public $options_map = [
		'um_mypasswd_name' => 'name',
		'um_mypasswd_inactive' => 'inactive'
	];
	public $options_active = [
		'um_mypasswd_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $who = [
		'inserted' => true,
		'updated' => true,
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}