<?php

namespace Numbers\Users\Users\Model\User\Schedule;
class WeekDays extends \Object\Data {
	public $column_key = 'um_usrweekday_id';
	public $column_prefix = 'um_usrweekday_';
	public $orderby = [
		'um_usrweekday_id' => SORT_ASC
	];
	public $columns = [
		'um_usrweekday_id' => ['name' => 'Week Day #', 'domain' => 'type_id'],
		'um_usrweekday_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		1 => ['um_usrweekday_name' => 'Monday'],
		2 => ['um_usrweekday_name' => 'Tuesday'],
		3 => ['um_usrweekday_name' => 'Wednesday'],
		4 => ['um_usrweekday_name' => 'Thursday'],
		5 => ['um_usrweekday_name' => 'Friday'],
		6 => ['um_usrweekday_name' => 'Saturday'],
		7 => ['um_usrweekday_name' => 'Sunday']
	];
}