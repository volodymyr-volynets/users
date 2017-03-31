<?php

namespace Numbers\Users\Users\DataSource;
class Login extends \Object\Datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row = true;
	public $single_value;
	public $options_map =[];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\Users';
	public $parameters = [
		'username' => ['name' => 'Username', 'domain' => 'login', 'required' => true],
	];

	public function query($parameters, $options = []) {
		// convert username to lowercase
		$parameters['username'] = strtolower($parameters['username'] . '');
		// columns
		$this->query->columns([
			'id' => 'a.um_user_id',
			'code' => 'a.um_user_code',
			'type' => 'a.um_user_type_id',
			'name' => 'a.um_user_name',
			'company' => 'a.um_user_company',
			// contact
			'email' => 'a.um_user_email',
			'phone' => 'a.um_user_phone',
			'cell' => 'a.um_user_cell',
			'fax' => 'a.um_user_fax',
			// login
			'login_username' => 'a.um_user_login_username',
			'login_password' => 'a.um_user_login_password',
			'login_last_set' => 'a.um_user_login_last_set',
			// inactive & hold
			'hold' => 'a.um_user_hold',
			'inactive' => 'a.um_user_inactive'
		]);
		// where
		$this->query->where('AND', ['a.um_user_login_enabled', '=', 1]);
		$this->query->where('AND', ['a.um_user_inactive', '=', 0]);
		if (strpos($parameters['username'], '@') !== false) {
			$this->query->where('AND', ['a.um_user_email', '=', $parameters['username'] . '']);
		} else {
			$this->query->where('AND', ['a.um_user_login_username', '=', $parameters['username'] . '']);
		}
	}
}