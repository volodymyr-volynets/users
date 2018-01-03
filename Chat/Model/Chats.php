<?php

namespace Numbers\Users\Chat\Model;
class Chats extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'CT';
	public $title = 'C/T Chats';
	public $schema;
	public $name = 'ct_chats';
	public $pk = ['ct_chat_tenant_id', 'ct_chat_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ct_chat_';
	public $columns = [
		'ct_chat_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ct_chat_id' => ['name' => 'Chat #', 'domain' => 'big_id_sequence'],
	];
	public $constraints = [
		'ct_chats_pk' => ['type' => 'pk', 'columns' => ['ct_chat_tenant_id', 'ct_chat_id']],
	];
	public $indexes = [
		//'ct_chats_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ct_chat_name']],
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'ct_chat_name' => 'name'
	];
	public $options_active = [];
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