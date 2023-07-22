<?php

namespace Numbers\Users\Printing\Form\Template;
class CreateVersion extends \Object\Form\Wrapper\Base {
	public $form_link = 'p8_template_create_version';
	public $module_code = 'P8';
	public $title = 'P/8 Create Version (Template)';
	public $options = [
		'segment' => self::SEGMENT_ACTIVATE,
		'actions' => [
			'refresh' => true,
			'back' => true,
		],
		'no_ajax_form_reload' => true
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'p8_template_id' => [
				'p8_template_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Template', 'domain' => 'template_id', 'null' => true, 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Printing\Model\Templates::optionsActive', 'options_params' => ['p8_template_versioned' => 0]],
			],
			'p8_template_version_code' => [
				'p8_template_version_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Version Code', 'domain' => 'version_code', 'required' => true, 'percent' => 50],
				'p8_template_version_name' => ['order' => 2, 'label_name' => 'Version Name', 'domain' => 'name', 'required' => true, 'percent' => 50],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
			]
		]
	];

	public function save(& $form) {
		$model = \Numbers\Users\Printing\Form\Templates::API();
		$model->begin();
		// copy service script
		$result = $model->get([
			'p8_template_id' => $form->values['p8_template_id']
		]);
		$result['values']['p8_template_versioned'] = 1;
		$result['values']['p8_template_version_p8_template_id'] = $form->values['p8_template_id'];
		$result['values']['p8_template_version_code'] = $form->values['p8_template_version_code'];
		$result['values']['p8_template_version_name'] = $form->values['p8_template_version_name'];
		$result['values']['p8_template_code'] = concat_ws(' - ', $result['values']['p8_template_code'], strtoupper($result['values']['p8_template_version_code']));
		unset($result['values']['p8_template_id'], $result['values']['p8_template_optimistic_lock']);
		// process headers
		$headers = \Numbers\Users\Printing\Model\Collection\Headers::getStatic([
			'where' => [
				'p8_header_template_id' => $form->values['p8_template_id']
			],
			'pk' => ['p8_header_id']
		]);
		$result['values']['p8_template_version_headers'] = json_encode($headers['data']);
		$result = $model->save($result['values']);
		if ($result['success']) {
			$form->error(SUCCESS, \Object\Content\Messages::OPERATION_EXECUTED);
			$model->commit();
		} else {
			$form->error(DANGER, $result['error']);
			$model->rollback();
		}
	}
}