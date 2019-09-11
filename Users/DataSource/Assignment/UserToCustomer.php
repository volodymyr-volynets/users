<?php

namespace Numbers\Users\Users\DataSource\Assignment;
class UserToCustomer extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['customer_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [];
	public $options_active = [];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\User\Assignment\Customer\Customers';
	public $parameters = [
		'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'customer_id' => 'a.um_assigncustomer_customer_id',
			'customer_name' => 'b.on_customer_name',
			'organization_id' => 'a.um_assigncustomer_organization_id',
			'organization_name' => 'c.on_organization_name',
		]);
		$this->query->join('INNER', new \Numbers\Users\Organizations\Model\Customers(), 'b', 'ON', [
			['AND', ['b.on_customer_id', '=', 'a.um_assigncustomer_customer_id', true], false]
		]);
		$this->query->join('INNER', new \Numbers\Users\Organizations\Model\Organizations(), 'c', 'ON', [
			['AND', ['c.on_organization_id', '=', 'a.um_assigncustomer_organization_id', true], false]
		]);
		$this->query->where('AND', ['a.um_assigncustomer_user_id', '=', $parameters['user_id']]);
		$this->query->orderby(['c.on_organization_name' => SORT_ASC, 'b.on_customer_name' => SORT_ASC]);
	}
}