<?php

namespace Numbers\Users\Organizations\Form\ServiceScript;
class Collection extends \Object\Form\Wrapper\Collection {
	public $collection_link = 'on_service_script_executing_collection';
	public $data = [];
	public $__options;

	public function __construct($options = []) {
		$linked_type_code = $options['input']['__linked_type_code'];
		$linked_module_id = (int) $options['input']['__linked_module_id'];
		$linked_id = (int) $options['input']['__linked_id'];
		$data = [];
		if (!empty($linked_id) && !empty($linked_module_id) && !empty($linked_type_code)) {
			$model = new \Numbers\Users\Organizations\Model\Service\Executed\ServiceScripts();
			$data = $model->get([
				'where' => [
					'on_execsscript_linked_type_code' => $linked_type_code,
					'on_execsscript_linked_module_id' => $linked_module_id,
					'on_execsscript_linked_id' => $linked_id,
				],
				'pk' => ['on_execsscript_id'],
				'orderby' => [
					'on_execsscript_id' => SORT_DESC
				]
			]);
		}
		if (empty($data)) {
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
			foreach ($data as $k => $v) {
				$input = $options['input'];
				$input['on_execsscript_id'] = $k;
				$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k] = [
					'order' => $index,
					'options' => [
						'type' => 'tabs',
						'segment' => [
							'type' => 'warning',
							'header' => [
								'icon' => ['type' => 'fas fa-question-circle'],
								'title' => 'Service Scripts'
							]
						],
						'its_own_segment' => true
					]
				];
				$this->data[self::MAIN_SCREEN][self::ROWS]['row' . $k][self::FORMS]['on_service_script_form_id_' . $k] = [
					'model' => '\Numbers\Users\Organizations\Form\ServiceScript\ServiceScripts',
					'options' => [
						'label_name' => $v['on_execsscript_service_script_name'],
						'form_link' => 'on_service_script_form_id_' . $k,
						'percent' => 100,
						'input' => $input,
						'bypass_hidden_from_input' => ($options['__parent_options']['bypass_input'] ?? []),
					],
					'order' => $index
				];
				$index++;
			}
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function distribute() {

	}
}