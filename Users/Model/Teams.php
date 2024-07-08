<?php

namespace Numbers\Users\Users\Model;
class Teams extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Teams';
	public $name = 'um_user_teams';
	public $pk = ['um_team_tenant_id', 'um_team_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_team_';
	public $columns = [
		'um_team_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_team_id' => ['name' => 'Team #', 'domain' => 'team_id_sequence'],
		'um_team_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
		'um_team_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_team_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
		'um_team_weight' => ['name' => 'Weight', 'domain' => 'weight', 'null' => true], // based on this field priorities would be set
		'um_team_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_teams_pk' => ['type' => 'pk', 'columns' => ['um_team_tenant_id', 'um_team_id']],
		'um_team_code_un' => ['type' => 'unique', 'columns' => ['um_team_tenant_id', 'um_team_code']],
	];
	public $indexes = [
		'um_user_teams_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_team_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_team_tenant_id' => 'wg_audit_tenant_id',
			'um_team_id' => 'wg_audit_team_id'
		]
	];
	public $options_map = [
		'um_team_name' => 'name',
		'um_team_icon' => 'icon_class',
		'um_team_inactive' => 'inactive',
	];
	public $options_active = [
		'um_team_inactive' => 0
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