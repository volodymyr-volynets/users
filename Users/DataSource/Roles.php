<?php

namespace Numbers\Users\Users\DataSource;
class Roles extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_role_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'um_role_name' => 'name',
		'um_role_icon' => 'icon_class',
		'um_role_inactive' => 'inactive'
	];
	public $options_active =[
		'um_role_inactive' => 0
	];
	public $column_prefix = 'um_role_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = true;

	public $primary_model = '\Numbers\Users\Users\Model\Roles';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed']
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns(['a.*']);
		// selected organizations
		$this->query->where('AND', function (& $query) use ($parameters) {
			if (!empty($parameters['existing_values'])) {
				$query->where('OR', ['a.um_role_id', '=', $parameters['existing_values']]);
			}
			if (!empty($parameters['selected_organizations'])) {
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\Role\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_a.um_rolorg_role_id', '=', 'a.um_role_id', true]);
					$query->where('AND', ['inner_a.um_rolorg_organization_id', 'IN', $parameters['selected_organizations'], false]);
				}, true);
			} else {
				$query->where('OR', 'FALSE');
			}
		});
		// only managed roles should be displayed
		if (!\User::get('super_admin')) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				if (!empty($parameters['existing_values'])) {
					$query->where('OR', ['a.um_role_id', '=', $parameters['existing_values']]);
				}
				$roles = \User::get('roles');
				if (!empty($roles)) {
					$query->where('OR', function (& $query) use ($roles) {
						$query = \Numbers\Users\Users\Model\Role\Manages::queryBuilderStatic(['alias' => 'inner_b'])->select();
						$query->columns(1);
						$query->join('INNER', new \Numbers\Users\Users\Model\Roles(), 'inner_c', 'ON', [
							['AND', ['inner_b.um_rolman_parent_role_id', '=', 'inner_c.um_role_id', true], false]
						]);
						$query->where('AND', ['inner_b.um_rolman_child_role_id', '=', 'a.um_role_id', true]);
						$query->where('AND', ['inner_b.um_rolman_assign_roles', '=', 1, false]);
						$query->where('AND', ['inner_c.um_role_code', 'IN', $roles, false]);
					}, true);
				} else {
					$query->where('OR', 'FALSE');
				}
			});
		}
	}
}