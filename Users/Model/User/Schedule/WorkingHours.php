<?php

namespace Numbers\Users\Users\Model\User\Schedule;
class WorkingHours extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M User Working Hours';
	public $name = 'um_user_working_hours';
	public $pk = ['um_usrschedwrkhrs_tenant_id', 'um_usrschedwrkhrs_user_id', 'um_usrschedwrkhrs_week_day_id'];
	public $tenant = true;
	public $orderby = [
		'um_usrschedwrkhrs_week_day_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_usrschedwrkhrs_';
	public $columns = [
		'um_usrschedwrkhrs_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_usrschedwrkhrs_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_usrschedwrkhrs_week_day_id' => ['name' => 'Week Day #', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Users\Model\User\Schedule\WeekDays'],
		'um_usrschedwrkhrs_work_starts' => ['name' => 'Work Starts', 'type' => 'time'],
		'um_usrschedwrkhrs_work_ends' => ['name' => 'Work Ends', 'type' => 'time'],
		'um_usrschedwrkhrs_lunch_starts' => ['name' => 'Lunch Starts', 'type' => 'time'],
		'um_usrschedwrkhrs_lunch_ends' => ['name' => 'Lunch Ends', 'type' => 'time'],
		'um_usrschedwrkhrs_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_user_working_hours_pk' => ['type' => 'pk', 'columns' => ['um_usrschedwrkhrs_tenant_id', 'um_usrschedwrkhrs_user_id', 'um_usrschedwrkhrs_week_day_id']],
		'um_usrschedwrkhrs_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_usrschedwrkhrs_tenant_id', 'um_usrschedwrkhrs_user_id'],
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