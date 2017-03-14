<?php

class numbers_users_users_model_user_groups extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Groups';
	public $name = 'um_user_groups';
	public $pk = ['um_usrgrp_tenant_id', 'um_usrgrp_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_usrgrp_';
	public $columns = [
		'um_usrgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrgrp_id' => ['name' => 'Group #', 'domain' => 'group_id_sequence'],
		'um_usrgrp_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_usrgrp_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_groups_pk' => ['type' => 'pk', 'columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id']],
	];
	public $indexes = [
		'um_user_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_usrgrp_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_usrgrp_tenant_id' => 'wg_audit_tenant_id',
			'um_usrgrp_id' => 'wg_audit_usrgrp_id'
		]
	];
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation = [
		'field' => 'um_usrgrp_id',
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}