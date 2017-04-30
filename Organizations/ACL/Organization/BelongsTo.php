<?php

namespace Numbers\Users\Organizations\ACL\Organization;
class BelongsTo extends \Object\ACL\Registered {
	public $models = [
		'\Numbers\Users\Organizations\Model\Organizations' => []
	];
	public function execute(\Numbers\Backend\Db\Common\Query\Builder & $query, array $options = []) {
		if (!\User::get('super_admin')) {
			$query->where('AND', function (& $query) use ($options) {
				if (!empty($options['existing_values'])) {
					$query->where('OR', ['a.on_organization_id', '=', $options['existing_values']]);
				}
				$organizations = \User::get('organizations');
				if (!empty($organizations)) {
					$query->where('OR', ['a.on_organization_id', 'IN', $organizations, false]);
				} else {
					$query->where('OR', 'FALSE');
				}
			});
		}
	}
}