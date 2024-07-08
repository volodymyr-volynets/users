<?php

namespace Numbers\Users\APIs\Model;
class BearerTokens extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'A3';
	public $title = 'A/3 Bearer Tokens';
	public $schema;
	public $name = 'a3_bearer_tokens';
	public $pk = ['a3_bearertoken_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'a3_bearertoken_';
	public $columns = [
		'a3_bearertoken_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'a3_bearertoken_id' => ['name' => 'Token #', 'domain' => 'token'],
		'a3_bearertoken_started' => ['name' => 'Datetime Started', 'type' => 'timestamp'],
		'a3_bearertoken_expires' => ['name' => 'Datetime Expires', 'type' => 'timestamp'],
		'a3_bearertoken_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
		'a3_bearertoken_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
		'a3_bearertoken_user_ip' => ['name' => 'User IP', 'domain' => 'ip', 'null' => true],
		'a3_bearertoken_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'a3_bearer_tokens_pk' => ['type' => 'pk', 'columns' => ['a3_bearertoken_tenant_id', 'a3_bearertoken_id']],
	];
	public $indexes = [
		'a3_bearertoken_expires_idx' => ['type' => 'btree', 'columns' => ['a3_bearertoken_expires']],
	];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'global'
	];
}