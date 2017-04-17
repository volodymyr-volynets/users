<?php

namespace Numbers\Users\Organizations\ACL\Organization;
class BelongsTo extends \Object\ACL\Registered {
	public $models = [
		'\Numbers\Users\Organizations\Model\Organizations' => []
	];
	public function execute(\Numbers\Backend\Db\Common\Query\Builder & $query, array $options = []) {
		if (!\User::get('super_admin')) {
			$query->where('AND', ['a.on_organization_id', 'IN', \User::get('organizations'), false]);
		}
	}
}