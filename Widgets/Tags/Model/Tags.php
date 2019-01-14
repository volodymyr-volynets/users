<?php

namespace Numbers\Users\Widgets\Tags\Model;
class Tags extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Tag Globals';
	public $schema;
	public $name = 'um_tag_globals';
	public $pk = ['um_tag_tenant_id', 'um_tag_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_tag_';
	public $columns = [
		'um_tag_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_tag_id' => ['name' => 'Tag #', 'domain' => 'big_id_sequence'],
		'um_tag_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_tag_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_tag_globals_pk' => ['type' => 'pk', 'columns' => ['um_tag_tenant_id', 'um_tag_id']],
		'um_tag_name_un' => ['type' => 'unique', 'columns' => ['um_tag_tenant_id', 'um_tag_name']],
	];
	public $indexes = [
		'um_tag_globals_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_tag_name']],
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'um_tag_name' => 'name'
	];
	public $options_active = [
		'um_tag_inactive' => 0
	];
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