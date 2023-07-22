<?php

namespace Numbers\Users\Users\DataSource\User;
class Organizations extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [
		'name' => 'name',
		'icon' => 'icon_class',
		'photo_id' => 'photo_id',
		'primary' => 'primary',
		'inactive' => 'inactive'
	];
	public $options_active = [
		'inactive' => 0
	];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\User\Organizations';
	public $parameters = [
		'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
		'primary' => ['name' => 'Primary', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'id' => 'a.um_usrorg_organization_id',
			'name' => 'b.on_organization_name',
			'icon' => 'b.on_organization_icon',
			'photo_id' => 'b.on_organization_logo_file_id',
			'primary' => 'a.um_usrorg_primary',
			'inactive' => 'a.um_usrorg_inactive'
		]);
		// joins
		$this->query->join('INNER', new \Numbers\Users\Organizations\Model\Organizations(), 'b', 'ON', [
			['AND', ['a.um_usrorg_organization_id', '=', 'b.on_organization_id', true], false]
		]);
		// where
		$this->query->where('AND', ['a.um_usrorg_user_id', '=', $parameters['user_id']]);
		if (!empty($parameters['primary'])) {
			$this->query->where('AND', ['a.um_usrorg_primary', '=', 1]);
		}
	}
}