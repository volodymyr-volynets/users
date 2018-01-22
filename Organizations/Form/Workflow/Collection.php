<?php

namespace Numbers\Users\Organizations\Form\Workflow;
class Collection extends \Object\Form\Wrapper\Collection {
	public $collection_link = 'on_workflow_executing_collection';
	public $data = [];

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
		//print_r2($workflows_data);
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
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function distribute() {

	}
}