<?php

namespace Numbers\Users\Users\Model\User\Assignment;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Assignment Types';
	public $name = 'um_user_assignment_types';
	public $pk = ['um_assignusrtype_tenant_id', 'um_assignusrtype_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_assignusrtype_';
	public $columns = [
		'um_assignusrtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_assignusrtype_id' => ['name' => 'Assignment #', 'domain' => 'assignment_id_sequence'],
		'um_assignusrtype_code' => ['name' => 'Type Code', 'domain' => 'type_code'],
		'um_assignusrtype_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_assignusrtype_parent_role_id' => ['name' => 'Parent Role #', 'domain' => 'role_id'],
		'um_assignusrtype_child_role_id' => ['name' => 'Child Role #', 'domain' => 'role_id'],
		'um_assignusrtype_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
		'um_assignusrtype_mandatory' => ['name' => 'Mandatory', 'type' => 'boolean'],
		'um_assignusrtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_assignment_types_pk' => ['type' => 'pk', 'columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_id']],
		'um_assignusrtype_code_un' => ['type' => 'unique', 'columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_code']],
		'um_assignusrtype_child_role_id_un' => ['type' => 'unique', 'columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_id', 'um_assignusrtype_parent_role_id', 'um_assignusrtype_child_role_id']],
		'um_assignusrtype_parent_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_parent_role_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		],
		'um_assignusrtype_child_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_assignusrtype_tenant_id', 'um_assignusrtype_child_role_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
		]
	];
	public $indexes = [
		'um_user_assignment_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_assignusrtype_code', 'um_assignusrtype_name']]
	];
	public $history = false;
	public $audit = false;
	public $options_map = [
		'um_assignusrtype_name' => 'name',
		'um_assignusrtype_parent_role_id' => 'um_assignusrtype_parent_role_id',
		'um_assignusrtype_child_role_id' => 'um_assignusrtype_child_role_id',
		'um_assignusrtype_code' => ['field' => 'um_assignusrtype_code', 'i18n' => false],
		'um_assignusrtype_inactive' => 'inactive',
	];
	public $options_active = [
		'um_assignusrtype_inactive' => 0
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

	/**
	 * @see $this->options()
	 */
	public function optionsJson($options = []) {
		$data = $this->options($options);
		$result = [];
		foreach ($data as $k => $v) {
			// add item
			$key = \Object\Table\Options::optionJsonFormatKey([
				'assignment_code' => $v['um_assignusrtype_code'],
				'parent_role_id' => (int) $v['um_assignusrtype_parent_role_id'],
				'child_role_id' => (int) $v['um_assignusrtype_child_role_id']
			]);
			// filter
			if (!\Object\Table\Options::processOptionsExistingValuesAndSkipValues($key, $options['existing_values'] ?? null, $options['skip_values'] ?? null)) continue;
			$result[$key] = ['name' => $v['name']];
		}
		return $result;
	}
}