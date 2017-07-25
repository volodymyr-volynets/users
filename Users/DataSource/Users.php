<?php

namespace Numbers\Users\Users\DataSource;
class Users extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_user_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'um_user_name' => 'name'
	];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\Users';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
		'skip_himself' => ['name' => 'Skip Himself', 'type' => 'boolean']
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns(['a.*']);
		// acl for not super admins
		if (!\User::get('super_admin')) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				// allow existing values
				if (!empty($parameters['existing_values'])) {
					$query->where('OR', ['a.um_user_id', '=', $parameters['existing_values']]);
				}
				// user can see him self
				if (empty($parameters['skip_himself'])) {
					$query->where('OR', ['a.um_user_id', '=', \User::id(), false]);
				}
				// user can see roles he can assign
				$query->where('OR', function (& $query) {
					$roles = \User::get('roles');
					if (!empty($roles)) {
						$query->where('AND', function (& $query) {
							$query = \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'inner_a'])->select();
							$query->columns(1);
							// join
							$query->join('INNER', new \Numbers\Users\Users\Model\Role\Manages(), 'inner_b', 'ON', [
								['AND', ['inner_a.um_usrrol_role_id', '=', 'inner_b.um_rolman_child_role_id', true], false]
							]);
							$query->join('INNER', new \Numbers\Users\Users\Model\Roles(), 'inner_c', 'ON', [
								['AND', ['inner_b.um_rolman_parent_role_id', '=', 'inner_c.um_role_id', true], false]
							]);
							$query->where('AND', ['inner_a.um_usrrol_user_id', '=', 'a.um_user_id', true]);
							$query->where('AND', ['inner_b.um_rolman_assign_roles', '=', 1, false]);
							$query->where('AND', ['inner_c.um_role_code', 'IN', \User::get('roles'), false]);
						}, true);
					} else {
						$query->where('AND', 'FALSE');
					}
					// user is assigned to organization
					$organizations = \User::get('organizations');
					if (!empty($organizations)) {
						$query->where('AND', function (& $query) {
							$query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'inner_d'])->select();
							$query->columns(1);
							$query->where('AND', ['inner_d.um_usrorg_user_id', '=', 'a.um_user_id', true]);
							$query->where('AND', ['inner_d.um_usrorg_organization_id', 'IN', \User::get('organizations'), false]);
						}, true);
					} else {
						$query->where('AND', 'FALSE');
					}
				});
			});
		}
	}
}