<?php

namespace Numbers\Users\Organizations\Helper\ABAC;
class Environment {

	/**
	 * Get organizations
	 */
	public function getOrganizations() {
		$result = \User::get('organizations');
		if (!empty($result)) {
			$query = \Object\Query\Builder::quick()->withRecursive('temp_org_env_1000', ['id', 'parent_id'], function(& $query) {
				$query = \Numbers\Users\Organizations\Model\Organizations::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_a'])->select();
				$query->columns([
					'id' => 'inner_a.on_organization_id',
					'parent_id' => 'inner_a.on_organization_parent_organization_id'
				]);
				$query->where('AND', ['inner_a.on_organization_id', '=', \User::get('organizations')]);
				$query->union('UNION ALL', function(& $query2) {
					$query2 = \Numbers\Users\Organizations\Model\Organizations::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_b'])->select();
					$query2->columns([
						'id' => 'inner_b.on_organization_id',
						'parent_id' => 'inner_b.on_organization_parent_organization_id'
					]);
					$query2->from('temp_org_env_1000', 'inner_b2');
					$query2->where('AND', ['inner_b.on_organization_parent_organization_id', '=', 'inner_b2.id', true]);
				});
			});
			$result = $query->query();
			return array_extract_values_by_key($result['rows'], 'id');
		} else {
			return [];
		}
	}
}