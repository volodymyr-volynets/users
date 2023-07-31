<?php

namespace Numbers\Users\Organizations\Model\Customer;
class SigningOfficers extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Customer Signing Officers';
	public $name = 'on_customer_signing_officers';
	public $pk = ['on_custsignofficer_tenant_id', 'on_custsignofficer_customer_id', 'on_custsignofficer_id'];
	public $tenant = true;
	public $orderby = [
		'on_custsignofficer_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'on_custsignofficer_';
	public $columns = [
		'on_custsignofficer_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_custsignofficer_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'on_custsignofficer_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id'],
		'on_custsignofficer_id' => ['name' => 'Detail #', 'domain' => 'detail_id'],
		'on_custsignofficer_custsigntype_code' => ['name' => 'Signing Type', 'domain' => 'type_code', 'options_model' => \Numbers\Users\Organizations\Model\Customer\SigningTypes::class],
		'on_custsignofficer_um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
		'on_custsignofficer_name' => ['name' => 'Name', 'domain' => 'name'],
		'on_custsignofficer_title' => ['name' => 'Title', 'domain' => 'name'],
		'on_custsignofficer_email' => ['name' => 'Primary Email', 'domain' => 'email'],
		'on_custsignofficer_cell' => ['name' => 'Cell Phone', 'domain' => 'phone'],
		'on_custsignofficer_primary' => ['name' => 'Primary', 'type' => 'boolean'],
		'on_custsignofficer_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_customer_signing_officers_pk' => ['type' => 'pk', 'columns' => ['on_custsignofficer_tenant_id', 'on_custsignofficer_customer_id', 'on_custsignofficer_id']],
		'on_custsignofficer_customer_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_custsignofficer_tenant_id', 'on_custsignofficer_customer_id'],
			'foreign_model' => \Numbers\Users\Organizations\Model\Customers::class,
			'foreign_columns' => ['on_customer_tenant_id', 'on_customer_id']
		],
		'on_custsignofficer_um_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_custsignofficer_tenant_id', 'on_custsignofficer_um_user_id'],
			'foreign_model' => \Numbers\Users\Users\Model\Users::class,
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [
		'on_custsignofficer_name' => 'name',
		'on_custsignofficer_title' => 'name',
		'on_custsignofficer_inactive' => 'inactve'
	];
	public $options_active = [
		'on_custsignofficer_inactive' => 0
	];
	public const selectOptionsActive = '\Numbers\Users\Organizations\Model\Customer\SigningOfficers::optionsActive';
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