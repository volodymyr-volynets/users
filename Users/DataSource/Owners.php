<?php

namespace Numbers\Users\Users\DataSource;
class Owners extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_user_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [
		'um_user_name' => 'name',
		'um_user_company' => 'name',
		'um_user_inactive' => 'inactive'
	];
	public $options_active = [
		'um_user_inactive' => 0
	];
	public $column_prefix = 'um_user_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\Users';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
		'owner_type_code' => ['name' => 'Owner Type Code', 'domain' => 'group_code'],
		'owner_type_id' => ['name' => 'Owner Type #', 'domain' => 'type_id'],
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'um_user_id' => 'a.um_user_id',
			'um_user_name' => 'a.um_user_name',
			'um_user_company' => 'a.um_user_company',
			'um_user_inactive' => 'a.um_user_inactive'
		]);
		// selected roles
		if (!empty($parameters['selected_organizations'])) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				// allow existing values
				if (!empty($parameters['existing_values'])) {
					$query->where('OR', ['a.um_user_id', '=', $parameters['existing_values']]);
				}
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'inner_p'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_p.um_usrorg_user_id', '=', 'a.um_user_id', true]);
					$query->where('AND', ['inner_p.um_usrorg_organization_id', '=', $parameters['selected_organizations']]);
				}, true);
			});
		}
		// owner type
		$this->query->where('AND', function (& $query) use ($parameters) {
			// allow existing values
			if (!empty($parameters['existing_values'])) {
				$query->where('OR', ['a.um_user_id', '=', $parameters['existing_values']]);
			}
			$query->where('OR', function (& $query) use ($parameters) {
				// organizations are setup
				$query->where('AND', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\User\Owner\Types::queryBuilderStatic(['alias' => 'inner_w1'])->select();
					$query->join('INNER', new \Numbers\Users\Users\Model\User\Owner\Type\Organizations(), 'inner_w2', 'ON', [
						['AND', ['inner_w2.um_ownertporg_ownertype_id', '=', 'inner_w1.um_ownertype_id', true], false],
					]);
					$query->join('INNER', new \Numbers\Users\Users\Model\User\Organizations(), 'inner_w3', 'ON', [
						['AND', ['inner_w2.um_ownertporg_organization_id', '=', 'inner_w3.um_usrorg_organization_id', true], false],
						['AND', ['inner_w3.um_usrorg_user_id', '=', 'a.um_user_id', true], false],
					]);
					$query->columns(1);
					if (!empty($parameters['owner_type_code'])) {
						$query->where('AND', ['inner_w1.um_ownertype_code', '=', $parameters['owner_type_code']]);
					} else {
						$query->where('AND', ['inner_w1.um_ownertype_id', '=', $parameters['owner_type_id']]);
					}
				}, 'EXISTS');
				// roles are setup
				$query->where('AND', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\User\Owner\Types::queryBuilderStatic(['alias' => 'inner_v1'])->select();
					$query->join('INNER', new \Numbers\Users\Users\Model\User\Owner\Type\Roles(), 'inner_v2', 'ON', [
						['AND', ['inner_v2.um_ownertprole_ownertype_id', '=', 'inner_v1.um_ownertype_id', true], false],
					]);
					$query->join('INNER', new \Numbers\Users\Users\Model\User\Roles(), 'inner_v3', 'ON', [
						['AND', ['inner_v2.um_ownertprole_role_id', '=', 'inner_v3.um_usrrol_role_id', true], false],
						['AND', ['inner_v3.um_usrrol_user_id', '=', 'a.um_user_id', true], false],
					]);
					$query->columns(1);
					if (!empty($parameters['owner_type_code'])) {
						$query->where('AND', ['inner_v1.um_ownertype_code', '=', $parameters['owner_type_code']]);
					} else {
						$query->where('AND', ['inner_v1.um_ownertype_id', '=', $parameters['owner_type_id']]);
					}
				}, 'EXISTS');
			});
		});
	}

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			// we only show company if not the same
			if (isset($v['um_user_name']) && $v['um_user_name'] == $v['um_user_company']) {
				$data[$k]['um_user_company'] = null;
			}
		}
		return $data;
	}
}