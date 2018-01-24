<?php

namespace Numbers\Users\Organizations\Form\Workflow\SubType;
class Decision extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_workflow_decision_form';
	public $module_code = 'ON';
	public $title = 'O/N Workflow Decision Form';
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
	public static $cached_next_steps;

	public function __construct($options = []) {
		$execwflow_id = (int) $options['input']['on_execwflow_id'];
		$execwflow_step_id = (int) $options['input']['on_execwflow_step_id'];
		$execwflow_workflow_id = (int) $options['input']['on_execwflow_workflow_id'];
		// load next steps
		self::$cached_next_steps = \Numbers\Users\Organizations\Model\Service\Workflow\Step\Next::getStatic([
			'where' => [
				'on_workstpnext_workflow_id' => $execwflow_workflow_id,
				'on_workstpnext_step_id' => $execwflow_step_id,
			],
			'pk' => ['on_workstpnext_next_step_id'],
			'orderby' => [
				'on_workstpnext_name' => SORT_ASC
			]
		]);
		$index = 1;
		foreach (self::$cached_next_steps as $k => $v) {
			$this->elements['top']['row' . $k]['field_' . $k] = [
				'order' => 1,
				'row_order' => $index,
				'label_name' => $v['on_workstpnext_name'],
				'method' => 'checkbox',
				'percent' => 100,
				'onchange' => 'this.form.submit();'
			];
			$index++;
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function refresh(& $form) {
		if (!empty($form->misc_settings['__form_onchange_field_values_key'][0])) {
			foreach (self::$cached_next_steps as $k => $v) {
				if ($form->misc_settings['__form_onchange_field_values_key'][0] != 'field_' . $k) {
					$form->values['field_' . $k] = 0;
				}
			}
		}
	}

	public function validate(& $form) {
		$first = null;
		$form->values['chosen_step'] = null;
		foreach (self::$cached_next_steps as $k => $v) {
			if (!$first) $first = $k;
			if (!empty($form->values['field_' . $k])) {
				$form->values['chosen_step'] = $k;
			}
		}
		if (empty($form->values['chosen_step'])) {
			$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'field_' . $first);
		}
	}

	public function save(& $form) {
		$execwflow_id = (int) $form->options['input']['on_execwflow_id'];
		$execwflow_step_id = (int) $form->options['input']['on_execwflow_step_id'];
		$execwflow_workflow_id = (int) $form->options['input']['on_execwflow_workflow_id'];
		$model = new \Numbers\Users\Organizations\Model\Service\Executed\Workflow\Fields();
		$model->db_object->begin();
		// step 1 update step
		$result = \Numbers\Users\Organizations\Helper\Workflow\Helper::processSingleStep($execwflow_workflow_id, $execwflow_id, $execwflow_step_id, [
			'on_execwfstep_chosen_step_id' => $form->values['chosen_step']
		]);
		if (!$result['success']) {
			$model->db_object->rollback();
			$form->error(DANGER, $result['error']);
			return false;
		}
		$model->db_object->commit();
		return true;
	}

	public function success(& $form) {
		$params = [];
		if (!empty($form->options['bypass_hidden_from_input'])) {
			foreach ($form->options['bypass_hidden_from_input'] as $v) {
				$params[$v] = $form->options['input'][$v] ?? '';
			}
		}
		$url = \Application::get('mvc.full') . '?' . http_build_query2($params) . '#' . $form->options['input']['on_execwflow_anchor'];
		\Request::redirect($url);
	}
}