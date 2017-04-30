<?php

namespace Numbers\Users\Users\ACL\User;
class UserBelongsTo extends \Object\ACL\Registered {
	public $models = [
		'\Numbers\Users\Users\Model\Users' => []
	];
	public function execute(\Numbers\Backend\Db\Common\Query\Builder & $query, array $options = []) {
		if (!\User::get('super_admin')) {
			$query->where('AND', function (& $query) use ($options) {
				if (!empty($options['existing_values'])) {
					$query->where('OR', ['a.um_user_id', '=', $options['existing_values']]);
				}
				// user can see him self
				$query->where('OR', ['a.um_user_id', '=', \User::id(), false]);
				// user can see roles he can assign
				$query->where('OR', function (& $query) {
					$query->where('AND', function (& $query) {
						$query = \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'acl_users_user_belongs_to'])->select();
						$query->columns(1);
						// join
						$query->join('INNER', new \Numbers\Users\Users\Model\Role\Manages(), 'acl_users_user_belongs_to_inner_b', 'ON', [
							['AND', ['acl_users_user_belongs_to.um_usrrol_role_id', '=', 'acl_users_user_belongs_to_inner_b.um_rolman_child_role_id', true], false]
						]);
						$query->join('INNER', new \Numbers\Users\Users\Model\Roles(), 'acl_users_user_belongs_to_inner_c', 'ON', [
							['AND', ['acl_users_user_belongs_to_inner_b.um_rolman_parent_role_id', '=', 'acl_users_user_belongs_to_inner_c.um_role_id', true], false]
						]);
						$query->where('AND', ['acl_users_user_belongs_to.um_usrrol_user_id', '=', 'a.um_user_id', true]);
						$query->where('AND', ['acl_users_user_belongs_to.um_usrrol_structure_code', '=', 'BELONGS_TO', false]);
						$query->where('AND', ['acl_users_user_belongs_to_inner_b.um_rolman_assign_roles', '=', 1, false]);
						$query->where('AND', ['acl_users_user_belongs_to_inner_c.um_role_code', 'IN', \User::get('roles'), false]);
					}, true);
					// user is assigmed to organization
					$query->where('AND', function (& $query) {
						$query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'acl_users_user_belongs_to2'])->select();
						$query->columns(1);
						$query->where('AND', ['acl_users_user_belongs_to2.um_usrorg_user_id', '=', 'a.um_user_id', true]);
						$query->where('AND', ['acl_users_user_belongs_to2.um_usrorg_structure_code', '=', 'BELONGS_TO', false]);
						$query->where('AND', ['acl_users_user_belongs_to2.um_usrorg_organization_id', 'IN', \User::get('organizations'), false]);
					}, true);
				});
			});
		}
	}
}