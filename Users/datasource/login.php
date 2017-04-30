<?php

namespace Numbers\Users\Users\DataSource;
class Login extends \Object\DataSource {
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

	public $primary_model;
	public $parameters = [
		'username' => ['name' => 'Username', 'domain' => 'login', 'required' => true],
	];

	public function query($parameters, $options = []) {
		// convert username to lowercase
		$parameters['username'] = strtolower($parameters['username'] . '');
		// create a query object
		$this->query = \Numbers\Users\Users\Model\Users::queryBuilderStatic([
			'alias' => 'a',
			'skip_acl' => true
		])->select();
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
			'inactive' => 'a.um_user_inactive',
			'roles' => 'b.roles',
			'organizations' => 'c.organizations',
			'super_admin' => 'b.super_admin'
		]);
		// joins
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_usrrol_user_id',
				'roles' => $query->db_object->sqlHelper('string_agg', ['expression' => "inner_b.um_role_code", 'delimiter' => ';;']),
				'super_admin' => 'SUM(inner_b.um_role_super_admin)'
			]);
			// join
			$query->join('INNER', new \Numbers\Users\Users\Model\Roles(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_usrrol_role_id', '=', 'inner_b.um_role_id', true], false]
			]);
			$query->groupby(['inner_a.um_usrrol_user_id']);
			$query->where('AND', ['inner_a.um_usrrol_inactive', '=', 0]);
			$query->where('AND', ['inner_b.um_role_inactive', '=', 0]);
		}, 'b', 'ON', [
			['AND', ['a.um_user_id', '=', 'b.um_usrrol_user_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_usrorg_user_id',
				'organizations' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrorg_organization_id)", 'delimiter' => ';;'])
			]);
			// join
			$query->join('INNER', new \Numbers\Users\Organizations\Model\Organizations(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_usrorg_organization_id', '=', 'inner_b.on_organization_id', true], false]
			]);
			$query->groupby(['inner_a.um_usrorg_user_id']);
			$query->where('AND', ['inner_a.um_usrorg_inactive', '=', 0]);
			$query->where('AND', ['inner_b.on_organization_inactive', '=', 0]);
		}, 'c', 'ON', [
			['AND', ['a.um_user_id', '=', 'c.um_usrorg_user_id', true], false]
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

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			if (!empty($v['roles'])) {
				$data[$k]['roles'] = explode(';;', $v['roles']);
			} else {
				$data[$k]['roles'] = [];
			}
			if (!empty($v['organizations'])) {
				$data[$k]['organizations'] = [];
				foreach (explode(';;', $v['organizations']) as $v2) {
					$data[$k]['organizations'][] = (int) $v2;
				}
			} else {
				$data[$k]['organizations'] = [];
			}
		}
		return $data;
	}
}