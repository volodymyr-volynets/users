<?php

namespace Numbers\Users\Organizations\Model\Collection;
class Brands extends \Object\Collection {
	public $data = [
		'name' => 'Brands',
		'model' => '\Numbers\Users\Organizations\Model\Brands',
		'details' => [
			'\Numbers\Users\Organizations\Model\Brand\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['on_brndorg_tenant_id', 'on_brndorg_brand_id', 'on_brndorg_organization_id'],
				'type' => '1M',
				'map' => ['on_brand_tenant_id' => 'on_brndorg_tenant_id', 'on_brand_id' => 'on_brndorg_brand_id'],
			],
			'\Numbers\Users\Organizations\Model\Brand\Trademarks' => [
				'name' => 'Trademarks',
				'pk' => ['on_brndtrdmrk_tenant_id', 'on_brndtrdmrk_brand_id', 'on_brndtrdmrk_trademark_id'],
				'type' => '1M',
				'map' => ['on_brand_tenant_id' => 'on_brndtrdmrk_tenant_id', 'on_brand_id' => 'on_brndtrdmrk_brand_id'],
			]
		]
	];
}