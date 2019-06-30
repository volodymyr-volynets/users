<?php

namespace Numbers\Users\Users\DataSource\Owner;
class Roles extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['code', 'role_id', 'organization_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [];
	public $options_active = [];
	public $column_prefix = 'um_user_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\User\Owner\Types';
	public $parameters = [];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'id' => 'a.um_ownertype_id',
			'code' => 'a.um_ownertype_code',
			'role_id' => 'b.um_ownertprole_role_id',
			'organization_id' => 'c.um_ownertporg_organization_id',
		]);
		$this->query->join('INNER', new \Numbers\Users\Users\Model\User\Owner\Type\Roles(), 'b', 'ON', [
			['AND', ['a.um_ownertype_id', '=', 'b.um_ownertprole_ownertype_id', true], false],
		]);
		$this->query->join('INNER', new \Numbers\Users\Users\Model\User\Owner\Type\Organizations(), 'c', 'ON', [
			['AND', ['a.um_ownertype_id', '=', 'c.um_ownertporg_ownertype_id', true], false],
		]);
	}
}