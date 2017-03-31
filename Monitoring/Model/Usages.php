<?php

namespace Numbers\Users\Monitoring\Model;
class Usages extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MN';
	public $title = 'M/N Monitoring';
	public $name = 'mn_usages';
	public $pk = ['mn_usage_tenant_id', 'mn_usage_session_id', 'mn_usage_user_id', 'mn_usage_timestamp'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'mn_usage_';
	public $columns = [
		'mn_usage_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mn_usage_session_id' => ['name' => 'Session #', 'type' => 'bigint'],
		'mn_usage_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'mn_usage_timestamp' => ['name' => 'Timestamp', 'type' => 'timestamp'],
		'mn_usage_actions' => ['name' => 'Actions', 'type' => 'json'],
	];
	public $constraints = [
		'mn_usages_pk' => ['type' => 'pk', 'columns' => ['mn_usage_tenant_id', 'mn_usage_session_id', 'mn_usage_user_id', 'mn_usage_timestamp']],
		'mn_usage_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['mn_usage_tenant_id', 'mn_usage_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
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