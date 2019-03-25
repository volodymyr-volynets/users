<?php

namespace Numbers\Users\Users\Model\User;
class Flags extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Permission Flags';
	public $name = 'um_user_system_flags';
	public $pk = ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id', 'um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'];
	public $tenant = true;
	public $orderby = [
		'um_usrsysflag_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_usrsysflag_';
	public $columns = [
		'um_usrsysflag_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrsysflag_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'um_usrsysflag_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_usrsysflag_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'um_usrsysflag_sysflag_id' => ['name' => 'Subresource #', 'domain' => 'resource_id'],
		'um_usrsysflag_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
		'um_usrsysflag_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_system_flags_pk' => ['type' => 'pk', 'columns' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id', 'um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id']],
		'um_usrsysflag_sysflag_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrsysflag_sysflag_id'],
			'foreign_model' => '\Numbers\Backend\System\Modules\Model\System\Flags',
			'foreign_columns' => ['sm_sysflag_id']
		],
		'um_usrsysflag_action_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
			'foreign_model' => '\Numbers\Backend\System\Modules\Model\System\Flag\Map',
			'foreign_columns' => ['sm_sysflgmap_sysflag_id', 'sm_sysflgmap_action_id']
		],
		'um_usrsysflag_module_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_module_id'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
			'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
		],
		'um_usrsysflag_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
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