<?php

namespace Numbers\Users\Organizations\Model\Organization;
class Holidays extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Organization Holidays';
	public $name = 'on_organization_holidays';
	public $pk = ['on_holiday_tenant_id', 'on_holiday_id'];
	public $tenant = true;
	public $orderby = [
		'on_holiday_date' => SORT_DESC
	];
	public $limit;
	public $column_prefix = 'on_holiday_';
	public $columns = [
		'on_holiday_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_holiday_id' => ['name' => 'Holiday #', 'domain' => 'holiday_id_sequence'],
		'on_holiday_date' => ['name' => 'Date', 'type' => 'date'],
		'on_holiday_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
		'on_holiday_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'on_holiday_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_organization_holidays_pk' => ['type' => 'pk', 'columns' => ['on_holiday_tenant_id', 'on_holiday_id']],
		'on_holiday_date_un' => ['type' => 'unique', 'columns' => ['on_holiday_tenant_id', 'on_holiday_date', 'on_holiday_organization_id']],
		'on_holiday_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_holiday_tenant_id', 'on_holiday_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		]
	];
	public $indexes = [
		'on_organization_holidays_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_holiday_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'on_holiday_tenant_id' => 'wg_audit_tenant_id',
			'on_holiday_id' => 'wg_audit_holiday_id'
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