<?php

namespace Numbers\Users\Organizations\Form\Workflow;
class Collection extends \Object\Form\Wrapper\Collection {
	public $collection_link = 'on_workflow_executing_collection';
	public $data = [];
	public $__options;

	public function __construct($options = []) {
		$on_execwflow_linked_type_code = $options['input']['on_execwflow_linked_type_code'];
		$on_execwflow_linked_module_id = (int) $options['input']['on_execwflow_linked_module_id'];
		$on_execwflow_linked_id = (int) $options['input']['on_execwflow_linked_id'];
		$workflows_data = [];
		$workflows_model = new \Numbers\Users\Organizations\Model\Service\Executed\Workflows();
		if (!empty($on_execwflow_linked_id) && !empty($on_execwflow_linked_module_id) && !empty($on_execwflow_linked_type_code)) {
			$workflows_data = $workflows_model->get([
				'where' => [
					'on_execwflow_linked_type_code' => $on_execwflow_linked_type_code,
					'on_execwflow_linked_module_id' => $on_execwflow_linked_module_id,
					'on_execwflow_linked_id' => $on_execwflow_linked_id,
				],
				'pk' => ['on_execwflow_id'],
				'orderby' => [
					'on_execwflow_id' => SORT_DESC
				]
			]);
		}
		if (empty($workflows_data)) {
			$this->data = [
				self::MAIN_SCREEN => [
					'options' => [
						'type' => 'forms',
						'segment' => \Object\Form\Parent2::SEGMENT_WORKFLOWS,
						'its_own_segment' => true
					],
					'order' => 1000,
					self::ROWS => [
						self::MAIN_ROW => [
							'order' => 100,
							self::FORMS => [
								'no_workflows_found' => [
									'model' => '\Numbers\Users\Organizations\Form\Workflow\NoWorkflowsFound',
									'options' => [
										'percent' => 100,
									],
									'order' => 1
								]
							]
						],
					]
				]
			];
		} else {
			$this->data = [
				self::MAIN_SCREEN => [
					'options' => [
						'type' => 'forms',
					],
					'order' => 1000,
					self::ROWS => []
				]
			];
			$index = 1;
			foreach ($workflows_data as $k => $v) {
				$options['input']['on_execwflow_id'] = $k;
				$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k]['order'] = $index;
				$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k][self::FORMS]['on_workflow_form_id_' . $k] = [
					'model' => '\Numbers\Users\Organizations\Form\Workflow\Workflows',
					//'bypass_input' => ($options['__parent_options']['bypass_input'] ?? []),
					'options' => [
						'form_link' => 'on_workflow_form_id_' . $k,
						'segment' => \Object\Form\Parent2::SEGMENT_WORKFLOWS,
						'percent' => 100,
						'input' => $options['input'],
						'bypass_hidden_from_input' => ($options['__parent_options']['bypass_input'] ?? []),
					],
					'order' => $index
				];
				$index++;
				// render next step
				$next_result = \Numbers\Users\Organizations\Helper\Workflow\Helper::prepareForRenderNextStep($v['on_execwflow_workflow_id'], $k);
				if ($next_result['success']) {
					$options['input']['on_execwflow_id'] = $k;
					$options['input']['on_execwflow_step_id'] = $next_result['step_id'];
					$options['input']['on_execwflow_workflow_id'] = $v['on_execwflow_workflow_id'];
					$options['input']['on_execwflow_anchor'] = "form_on_workflow_form_id_{$k}_form_anchor";
					$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k . '_next']['order'] = $index;
					$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k . '_next'][self::FORMS]['on_workflow_form_id_' . $k . '_next'] = [
						'model' => $next_result['form_model'],
						'options' => [
							'form_link' => 'on_workflow_form_id_' . $k . '_next',
							'segment' => ['type' => 'warning',
								'header' => [
									'icon' => ['type' => ' fab fa-hubspot'],
									'title' => 'Workflow Next Step: ' . $next_result['step_name'],
								]
							],
							'percent' => 100,
							'input' => $options['input'],
							'bypass_hidden_from_input' => ($options['__parent_options']['bypass_input'] ?? []),
						],
						'order' => $index
					];
					$index++;
				}
			}
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function distribute() {

	}
}