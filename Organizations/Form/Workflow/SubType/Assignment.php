<?php

namespace Numbers\Users\Organizations\Form\Workflow\SubType;
class Assignment extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_workflow_assignment_form';
	public $module_code = 'ON';
	public $title = 'O/N Workflow Assignments Form';
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
		'top' => [
			'user_id' => [
				'user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users'],
			],
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];
	public $collection = [];

	public function validate(& $form) {

	}

	public function save(& $form) {
		$execwflow_id = (int) $form->options['input']['on_execwflow_id'];
		$execwflow_step_id = (int) $form->options['input']['on_execwflow_step_id'];
		$execwflow_workflow_id = (int) $form->options['input']['on_execwflow_workflow_id'];
		$model = new \Numbers\Users\Organizations\Model\Service\Executed\Workflow\Owners();
		$model->db_object->begin();
		// step 1 add owner
		$result = $model->collection()->merge([
			'on_execwfowner_execwflow_id' => $execwflow_id,
			'on_execwfowner_type_id' => 100,
			'on_execwfowner_user_id' => $form->values['user_id'],
		]);
		if (!$result['success']) {
			$model->db_object->rollback();
			$form->error(DANGER, $result['error']);
			return false;
		}
		// step 2 update step
		$result = \Numbers\Users\Organizations\Helper\Workflow\Helper::processSingleStep($execwflow_workflow_id, $execwflow_id, $execwflow_step_id);
		if (!$result['success']) {
			$model->db_object->rollback();
			$form->error(DANGER, $result['error']);
			return false;
		}
		$model->db_object->commit();
		return true;
	}
}