<?php

namespace Numbers\Users\Users\Model\User;
class Assignments extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Assignments';
	public $name = 'um_user_assigments';
	public $pk = ['um_usrassign_tenant_id', 'um_usrassign_assignusrtype_id', 'um_usrassign_parent_user_id', 'um_usrassign_child_user_id'];
	public $tenant = true;
	public $orderby = [];
	public $limit;
	public $column_prefix = 'um_usrassign_';
	public $columns = [
		'um_usrassign_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrassign_assignusrtype_id' => ['name' => 'Assignment #', 'domain' => 'assignment_id'],
		'um_usrassign_parent_role_id' => ['name' => 'Parent Role #', 'domain' => 'role_id'],
		'um_usrassign_parent_user_id' => ['name' => 'Parent User #', 'domain' => 'user_id'],
		'um_usrassign_child_role_id' => ['name' => 'Child Role #', 'domain' => 'role_id'],
		'um_usrassign_child_user_id' => ['name' => 'Child User #', 'domain' => 'user_id'],
		'um_usrassign_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_assigments_pk' => ['type' => 'pk', 'columns' => ['um_usrassign_tenant_id', 'um_usrassign_assignusrtype_id', 'um_usrassign_parent_user_id', 'um_usrassign_child_user_id']],
		'um_usrassign_parent_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrassign_tenant_id', 'um_usrassign_parent_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
		'um_usrassign_child_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrassign_tenant_id', 'um_usrassign_child_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
		'um_usrassign_assignusrtype_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrassign_tenant_id', 'um_usrassign_assignusrtype_id', 'um_usrassign_parent_role_id', 'um_usrassign_child_role_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Assignment\Types',
			'foreign_columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_id', 'um_assignusrtype_parent_role_id', 'um_assignusrtype_child_role_id']
		]
	];
	public $indexes = [];
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
		'scope' => 'enterprise'
	];
}