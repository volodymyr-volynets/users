<?php

namespace Numbers\Users\Users\Helper;
class Roles {

	/**
	 * Create role
	 *
	 * @param array $data
	 * @param array $organizations
	 * @return bool
	 */
	public static function createRole(array $data, array $organizations) : bool {
		// create role
		$role = \Numbers\Users\Users\Model\Roles::getStatic([
			'where' => [
				'um_role_code' => $data['um_role_code']
			],
			'pk' => null,
			'single_row' => true,
		]);
		if (empty($role)) {
			$temp = \Numbers\Users\Users\Model\Roles::collectionStatic()->merge($data);
			$role['um_role_id'] = $temp['new_serials']['um_role_id'];
		}
		// add new organizations to roles
		$old_role_organizations = \Numbers\Users\Users\Model\Role\Organizations::getStatic([
			'where' => [
				'um_rolorg_role_id' => $role['um_role_id'],
			],
			'pk' => ['um_rolorg_organization_id']
		]);
		$all_roles = array_unique(array_merge($organizations, array_keys($old_role_organizations)));
		foreach ($all_roles as $k => $v) {
			\Numbers\Users\Users\Model\Role\Organizations::collectionStatic()->merge([
				'um_rolorg_role_id' => $role['um_role_id'],
				'um_rolorg_organization_id' => $v,
				'um_rolorg_inactive' => 0
			]);
		}
		return true;
	}
}