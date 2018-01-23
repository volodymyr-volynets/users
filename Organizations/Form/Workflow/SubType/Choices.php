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
				'user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users'],
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
		print_r2($form->values);
	}
}