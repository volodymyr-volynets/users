<?php

namespace Numbers\Users\Organizations\Form\ServiceScript;
class ServiceScripts extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_service_script_service_scripts_form';
	public $module_code = 'ON';
	public $title = 'O/N Service Scripts Form';
	public $options = [
		'actions' => [
			'refresh' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			self::HIDDEN => [
				'on_execsscript_id' => ['label_name' => 'Executed #', 'domain' => 'executed_service_script_id', 'method' => 'hidden']
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];
	public $collection = [];
	public $service_script_values;

	public function __construct($options = []) {
		// preload service script
		if (!empty($options['input']['on_execsscript_id'])) {
			$result = \Numbers\Users\Organizations\Model\Service\Executed\ServiceScripts::getStatic([
				'where' => [
					'on_execsscript_id' => (int) $options['input']['on_execsscript_id']
				],
				'pk' => null
			]);
			$this->service_script_values = json_decode($result[0]['on_execsscript_values'], true);
			// render questions
			$questions = \Numbers\Users\Organizations\Helper\ServiceScript\Helper::getQuestions($result[0]['on_execsscript_service_script_id'], $result[0]['on_execsscript_region_id'], $result[0]['on_execsscript_channel_code']);
			\Numbers\Users\Organizations\Helper\ServiceScript\Helper::renderQuestions($this, $questions['data']);
		}
		// call parent constructor
		parent::__construct($options);
	}

	public function refresh(& $form) {
		if (!$form->submitted) {
			foreach ($this->service_script_values as $k => $v) {
				if (is_array($v) && !empty($v) && empty($form->values[$k])) {
					$form->values[$k] = $v;
				} else if (($form->values[$k] ?? '') == '') {
					$form->values[$k] = $v;
				}
			}
		}
	}

	public function save(& $form) {
		$temp = [];
		foreach ($form->values as $k => $v) {
			if (strpos($k, 'ss_field_') === 0 && strpos($k, '_answer') !== false) {
				if (isset($v)) {
					$temp[$k] = $v;
				}
			}
		}
		$result = \Numbers\Users\Organizations\Model\Service\Executed\ServiceScripts::collectionStatic()->merge([
			'on_execsscript_id' => $form->values['on_execsscript_id'],
			'on_execsscript_values' => json_encode($temp)
		]);
		if (!$result['success']) {
			$form->error(DANGER, $result['error']);
			return;
		}
		return true;
	}

	public function success(& $form) {
		$params = [];
		if (!empty($form->options['bypass_hidden_from_input'])) {
			foreach ($form->options['bypass_hidden_from_input'] as $v) {
				$params[$v] = $form->options['input'][$v] ?? '';
			}
		}
		if (!empty($form->options['collection_current_tab_id'])) {
			$params[$form->options['collection_current_tab_id']] = $form->form_link;
		}
		$url = \Application::get('mvc.full') . '?' . http_build_query2($params) . '#' . $form->options['input']['__anchor'];
		$form->redirect($url);
	}
}