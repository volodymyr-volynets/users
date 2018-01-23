<?php

namespace Numbers\Users\Organizations\Data\Features\Workflow;
class Supplementary extends \Object\Import {
	public $data = [
		'workflow_fields' => [
			'options' => [
				'pk' => ['on_workfield_tenant_id', 'on_workfield_code'],
				'model' => '\Numbers\Users\Organizations\Model\Service\Workflow\Fields',
				'method' => 'save'
			],
			'data' => [
				[
					'on_workfield_code' => 'SYSTEM_BOOK_DATE',
					'on_workfield_name' => 'Book Date',
					'on_workfield_method' => 'text',
					'on_workfield_model_id' => null,
					'on_workfield_domain' => null,
					'on_workfield_type' => 'timestamp',
					'on_workfield_php_type' => 'string',
					'on_workfield_icon' => 'far fa-calendar-plus',
					'on_workfield_inactive' => 0
				]
			]
		]
	];
}