<?php

namespace Numbers\Users\Users\ACL\Role;
class RoleBelongsTo extends \Object\ACL\Registered {
	public $models = [
		'\Numbers\Users\Users\Model\Roles' => []
	];
	public function execute(\Numbers\Backend\Db\Common\Query\Builder & $query, array $options = []) {
		if (!\User::get('super_admin')) {
			$query->where('AND', function (& $query) {
				$query = \Numbers\Users\Users\Model\Role\Organizations::queryBuilderStatic(['alias' => 'acl_users_role_belongs_to'])->select();
				$query->columns(['acl_users_role_belongs_to.um_rolorg_organization_id']);
				$query->where('AND', ['acl_users_role_belongs_to.um_rolorg_role_id', '=', 'a.um_role_id', true]);
				$query->where('AND', ['acl_users_role_belongs_to.um_rolorg_structure_code', '=', 'BELONGS_TO', false]);
				$query->where('AND', ['acl_users_role_belongs_to.um_rolorg_organization_id', 'IN', \User::get('organizations'), false]);
			}, true);
		}
	}
}