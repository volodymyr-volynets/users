<?php

namespace Numbers\Users\Widgets\Voters\Model;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Voter Types';
	public $name = 'um_voter_types';
	public $pk = ['um_vtrtype_tenant_id', 'um_vtrtype_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_vtrtype_';
	public $columns = [
		'um_vtrtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_vtrtype_code' => ['name' => 'Code', 'domain' => 'type_code'],
		'um_vtrtype_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_vtrtype_pass_percent' => ['name' => 'Percent Pass', 'domain' => 'percent'],
		'um_vtrtype_ownertype_id' => ['name' => 'Owner Type #', 'domain' => 'type_id'],
		'um_vtrtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_voter_types_pk' => ['type' => 'pk', 'columns' => ['um_vtrtype_tenant_id', 'um_vtrtype_code']],
	];
	public $indexes = [
		'um_voter_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_vtrtype_code', 'um_vtrtype_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_vtrtype_tenant_id' => 'wg_audit_tenant_id',
			'um_vtrtype_code' => 'wg_audit_vtrtype_code'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'um_vtrtype_name' => 'name',
		'um_vtrtype_inactive' => 'inactive'
	];
	public $options_active = [
		'um_vtrtype_inactive' => 0
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