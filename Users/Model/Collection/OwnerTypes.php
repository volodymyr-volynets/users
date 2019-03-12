<?php

namespace Numbers\Users\Users\Model\Collection;
class OwnerTypes extends \Object\Collection {
	public $data = [
		'name' => 'Owner Types',
		'model' => '\Numbers\Users\Users\Model\User\Owner\Types',
		'details' => [
			'\Numbers\Users\Users\Model\User\Owner\Type\Roles' => [
				'name' => 'Owner Roles',
				'pk' => ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id', 'um_ownertprole_role_id'],
				'type' => '1M',
				'map' => ['um_ownertype_tenant_id' => 'um_ownertprole_tenant_id', 'um_ownertype_id' => 'um_ownertprole_ownertype_id'],
			],
			'\Numbers\Users\Users\Model\User\Owner\Type\Organizations' => [
				'name' => 'Owner Organizations',
				'pk' => ['um_ownertporg_tenant_id', 'um_ownertporg_ownertype_id', 'um_ownertporg_organization_id'],
				'type' => '1M',
				'map' => ['um_ownertype_tenant_id' => 'um_ownertporg_tenant_id', 'um_ownertype_id' => 'um_ownertporg_ownertype_id'],
			]
		]
	];
}