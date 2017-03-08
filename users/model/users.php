<?php

class numbers_users_users_model_users extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Users';
	public $schema;
	public $name = 'um_users';
	public $pk = ['um_user_tenant_id', 'um_user_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_user_';
	public $columns = [
		'um_user_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_user_id' => ['name' => 'User #', 'domain' => 'user_id_sequence'],
		'um_user_code' => ['name' => 'Code', 'domain' => 'code', 'null' => true],
		'um_user_type' => ['name' => 'Type', 'domain' => 'type_id'],
		'um_user_name' => ['name' => 'Screen Name', 'domain' => 'name'],
		'um_user_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
		// personal information
		'um_user_title' => ['name' => 'Title', 'domain' => 'personal_title', 'null' => true],
		'um_user_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
		'um_user_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
		// contact
		'um_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'um_user_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
		'um_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'um_user_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
		'um_user_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
		'um_user_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
		// login
		'um_user_login_enabled' => ['name' => 'Login Enabled', 'type' => 'boolean'],
		'um_user_login_username' => ['name' => 'Username', 'domain' => 'login', 'null' => true],
		'um_user_login_password' => ['name' => 'Password', 'domain' => 'password', 'null' => true],
		'um_user_login_last_set' => ['name' => 'Last Set', 'type' => 'date', 'null' => true],
		// inactive & hold
		'um_user_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'um_user_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_users_pk' => ['type' => 'pk', 'columns' => ['um_user_tenant_id', 'um_user_id']],
		'um_user_code_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_code']],
		'um_user_email_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_email']],
		'um_user_login_username_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_login_username']],
		'um_user_type_fk' => [
			'type' => 'fk',
			'columns' => ['um_user_type'],
			'foreign_model' => 'numbers_users_users_model_user_types',
			'foreign_columns' => ['um_usrtype_id']
		],
		'um_user_title_fk' => [
			'type' => 'fk',
			'columns' => ['um_user_tenant_id', 'um_user_title'],
			'foreign_model' => 'numbers_users_users_model_user_titles',
			'foreign_columns' => ['um_usrtitle_tenant_id', 'um_usrtitle_name']
		],
	];
	public $indexes = [
		'um_users_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_user_code', 'um_user_name', 'um_user_phone', 'um_user_email']],
		'um_users_fulltext_simple_idx' => ['type' => 'fulltext', 'columns' => ['um_user_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_user_tenant_id' => 'wg_audit_tenant_id',
			'um_user_id' => 'wg_audit_user_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation = [
		'field' => 'um_user_id',
	];

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $addresses = [
		'map' => [
			'um_user_id' => 'wg_address_user_id'
		]
	];

	public $attributes = [
		'map' => [
			'um_user_id' => 'wg_attribute_user_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}