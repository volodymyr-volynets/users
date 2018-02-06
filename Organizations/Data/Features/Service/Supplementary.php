<?php

namespace Numbers\Users\Organizations\Data\Features\Service;
class Supplementary extends \Object\Import {
	public $data = [
		'service_channels' => [
			'options' => [
				'pk' => ['on_servchannel_tenant_id', 'on_servchannel_code'],
				'model' => '\Numbers\Users\Organizations\Model\Service\Channels',
				'method' => 'save'
			],
			'data' => [
				[
					'on_servchannel_code' => 'ADD_ORDER',
					'on_servchannel_name' => 'Add Order',
					'on_servchannel_type_id' => 20,
					'on_servchannel_icon' => 'fab fa-firstdraft',
					'on_servchannel_inactive' => 0
				],
			]
		]
	];
}