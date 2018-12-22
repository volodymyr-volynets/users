<?php

namespace Numbers\Users\Users\Model\User\Owner;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Owner Types';
	public $name = 'um_owner_types';
	public $pk = ['um_ownertype_tenant_id', 'um_ownertype_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_ownertype_';
	public $columns = [
		'um_ownertype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_ownertype_id' => ['name' => 'Type #', 'domain' => 'type_id_sequence'],
		'um_ownertype_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'um_ownertype_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_ownertype_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
		'um_ownertype_can_delete' => ['name' => 'Can Delete', 'type' => 'boolean'],
		'um_ownertype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_owner_types_pk' => ['type' => 'pk', 'columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']],
		'um_ownertype_code_un' => ['type' => 'unique', 'columns' => ['um_ownertype_tenant_id', 'um_ownertype_code']],
	];
	public $indexes = [
		'um_owner_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_ownertype_name', 'um_ownertype_code']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_ownertype_tenant_id' => 'wg_audit_tenant_id',
			'um_ownertype_id' => 'wg_audit_owner_type_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
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