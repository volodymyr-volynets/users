<?php

class numbers_users_rbac_model_role_types extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'RC';
	public $title = 'R/C Role Types';
	public $name = 'rc_role_types';
	public $pk = ['rc_roltype_id'];
	public $orderby;
	public $limit;
	public $column_prefix = 'rc_roltype_';
	public $columns = [
		'rc_roltype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'rc_roltype_name' => ['name' => 'Name', 'domain' => 'name'],
		'rc_roltype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'rc_role_types_pk' => ['type' => 'pk', 'columns' => ['rc_roltype_id']]
	];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 2,
		'scope' => 'global'
	];
}