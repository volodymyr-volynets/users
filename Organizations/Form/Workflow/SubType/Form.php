<?php

namespace Numbers\Users\Organizations\Form\Workflow\SubType;
class Form extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_workflow_form_form';
	public $module_code = 'ON';
	public $title = 'O/N Workflow Form Form';
	public $options = [
		'actions' => [
			'refresh' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];
	public $collection = [];

	public function __construct($options = []) {
		$execwflow_id = (int) $options['input']['on_execwflow_id'];
		$execwflow_step_id = (int) $options['input']['on_execwflow_step_id'];
		$execwflow_workflow_id = (int) $options['input']['on_execwflow_workflow_id'];
		// pull fields
		$workflow_fields = \Numbers\Users\Organizations\Model\Service\Workflow\Step\Fields::getStatic([
			'where' => [
				'on_workstpfield_workflow_id' => $execwflow_workflow_id,
				'on_workstpfield_step_id' => $execwflow_step_id,
			],
			'pk' => ['on_workstpfield_field_id'],
			'orderby' => [
				'on_workstpfield_order' => SORT_ASC
			]
		]);
		$all_fields = \Numbers\Users\Organizations\Model\Service\Workflow\Fields::getStatic([
			'pk' => ['on_workfield_id']
		]);
		$all_models = \Numbers\Backend\Db\Common\Model\Models::getStatic([
			'pk' => ['sm_model_id']
		]);
		print_r2($fields);
		// add fields
		foreach ($workflow_fields as $k => $v) {
			// fix text
			$method = $all_fields[$k]['on_workfield_method'];
			if ($method == 'text') $method = 'input';
			$this->elements['top']['row_' . $k]['field_' . $k] = [
				'order' => 1,
				'row_order' => $v['on_workstpfield_order'],
				'label_name' => $all_fields[$k]['on_workfield_name'],
				'domain' => $all_fields[$k]['on_workfield_domain'],
				'type' => $all_fields[$k]['on_workfield_type'],
				'default' => $v['on_workstpfield_default'],
				'method' => $method
			];
			if (!empty($all_fields[$k]['on_workfield_model_id'])) {
				$this->elements['top']['row_' . $k]['field_' . $k]['options_model'] = $all_models[$all_fields[$k]['on_workfield_model_id']]['sm_model_code'];
			}
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function validate(& $form) {

	}

	public function save(& $form) {
		return true;
	}
}