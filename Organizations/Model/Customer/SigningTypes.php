<?php

namespace Numbers\Users\Organizations\Model\Customer;
class SigningTypes extends \Object\Data {
	public $module_code = 'ON';
	public $title = 'O/N Customer Signing Types';
	public $column_key = 'on_custsigntype_code';
	public $column_prefix = 'on_custsigntype_';
	public $orderby = ['on_custsigntype_order' => SORT_ASC];
	public $columns = [
		'on_custsigntype_code' => ['name' => 'Signing Type', 'domain' => 'type_code'],
		'on_custsigntype_name' => ['name' => 'Name', 'type' => 'text'],
		'on_custsigntype_order' => ['name' => 'Order', 'domain' => 'order']
	];
	public $data = [
		'OWNER' => ['on_custsigntype_name' => 'Owner', 'on_custsigntype_order' => 1000],
		'OFFICER' => ['on_custsigntype_name' => 'Officer', 'on_custsigntype_order' => 2000],
		'WITNESS' => ['on_custsigntype_name' => 'Witness', 'on_custsigntype_order' => 3000],
	];
	public $options_map = [
		'on_custsigntype_name' => 'name',
		'on_custsigntype_order' => 'order'
	];
}