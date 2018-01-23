<?php

namespace Numbers\Users\Organizations\Form\Workflow;
class Workflows extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_workflow_form';
	public $module_code = 'ON';
	public $title = 'O/N Workflows Form';
	public $options = [
		'actions' => [
			'refresh' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'steps_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Organizations\Model\Service\Executed\Workflow\Steps',
			'details_pk' => ['on_execwfstep_id'],
			'order' => 35000
		],
	];
	public $rows = [
		'top' => [
			'on_execwflow_id' => ['order' => 100],
			'on_execwflow_workflow_name' => ['order' => 200],
		],
		'tabs' => [
			'steps' => ['order' => 100, 'label_name' => 'Steps'],
			'canvas' => ['order' => 200, 'label_name' => 'Canvas'],
		],
	];
	public $elements = [
		'top' => [
			'on_execwflow_id' => [
				'on_execwflow_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Executed #', 'domain' => 'executed_workflow_id', 'percent' => 50, 'readonly' => true],
				'on_execwflow_workflow_id' => ['order' => 2, 'label_name' => 'Workflow', 'domain' => 'workflow_id', 'percent' => 50, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Service\Workflows', 'readonly' => true],
			],
			'on_execwflow_workflow_name' => [
				'on_execwflow_workflow_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Workflow Name', 'domain' => 'name', 'percent' => 100],
			],
			'on_execwflow_versioned_workflow_id' => [
				'on_execwflow_status_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Status', 'domain' => 'type_id', 'default' => 10, 'options_model' => '\Numbers\Users\Organizations\Model\Service\Executed\Workflow\Statuses', 'readonly' => true],
				'on_execwflow_versioned_workflow_id' => ['order' => 2, 'label_name' => 'Versioned Workflow', 'domain' => 'workflow_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Service\Workflows', 'readonly' => true],
			]
		],
		'tabs' => [
			'steps' => [
				'steps' => ['container' => 'steps_container', 'order' => 100],
			],
			'canvas' => [
				'canvas' => ['container' => 'canvas_container', 'order' => 100],
			],
		],
		'steps_container' => [
			'row1' => [
				'on_execwfstep_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Step Name', 'domain' => 'name', 'percent' => 100, 'readonly' => true],
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];
	public $collection = [
		'name' => 'Workflows',
		'model' => '\Numbers\Users\Organizations\Model\Service\Executed\Workflows',
		'details' => [
			'\Numbers\Users\Organizations\Model\Service\Executed\Workflow\Steps' => [
				'name' => 'Steps',
				'readonly' => true,
				'pk' => ['on_execwfstep_tenant_id', 'on_execwfstep_execwflow_id', 'on_execwfstep_id'],
				'type' => '1M',
				'map' => ['on_execwflow_tenant_id' => 'on_execwfstep_tenant_id', 'on_execwflow_id' => 'on_execwfstep_execwflow_id']
			]
		]
	];

	public function refresh(& $form) {

	}

	public function validate(& $form) {

	}
}