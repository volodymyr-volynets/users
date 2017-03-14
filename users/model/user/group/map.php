<?php

class numbers_users_users_model_user_group_map extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Group Map';
	public $name = 'um_user_group_map';
	public $pk = ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id'];
	public $orderby;
	public $limit;
	public $column_prefix = 'um_usrgrmap_';
	public $columns = [
		'um_usrgrmap_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrgrmap_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_usrgrmap_group_id' => ['name' => 'Group #', 'domain' => 'group_id']
	];
	public $constraints = [
		'um_user_group_map_pk' => ['type' => 'pk', 'columns' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id']],
		'um_usrgrmap_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id'],
			'foreign_model' => 'numbers_users_users_model_users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
		'um_usrgrmap_group_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_group_id'],
			'foreign_model' => 'numbers_users_users_model_user_groups',
			'foreign_columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id'],
			'options' => [
				'match' => 'simple',
				'update' => 'no action',
				'delete' => 'no action'
			]
		]
	];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}