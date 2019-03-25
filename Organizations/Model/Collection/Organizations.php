<?php

namespace Numbers\Users\Organizations\Model\Collection;
class Organizations extends \Object\Collection {
	public $data = [
		'name' => 'Organizations',
		'model' => '\Numbers\Users\Organizations\Model\Organizations',
		'details' => [
			'\Numbers\Users\Organizations\Model\Organization\Type\Map' => [
				'name' => 'Types',
				'pk' => ['on_orgtpmap_tenant_id', 'on_orgtpmap_organization_id', 'on_orgtpmap_type_code'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgtpmap_tenant_id', 'on_organization_id' => 'on_orgtpmap_organization_id']
			],
			'\Numbers\Users\Organizations\Model\Organization\BusinessHours' => [
				'name' => 'Business Hours',
				'pk' => ['on_orgbhour_tenant_id', 'on_orgbhour_organization_id', 'on_orgbhour_day_id'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgbhour_tenant_id', 'on_organization_id' => 'on_orgbhour_organization_id'],
			]
		]
	];
}