<?php

namespace Numbers\Users\Users\Form;
class ReLogin extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_relogin';
	public $module_code = 'UM';
	public $title = 'U/M Re-Login';
	public $options = [
		'segment' => [
			'type' => 'danger',
			'header' => [
				'icon' => ['type' => 'fas fa-sign-in-alt'],
				'title' => 'Re-Authorization Required:'
			]
		],
		'no_ajax_form_reload' => true
	];
	public $containers = [
		'login' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'login' => [
			'username' => [
				'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username or Email Address', 'type' => 'varchar', 'length' => 255, 'percent' => 50, 'required' => true, 'readonly' => true]
			],
			'password' => [
				'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'type' => 'varchar', 'percent' => 50, 'method' => 'password', 'required' => true, 'empty_value' => true, 'autofocus' => true]
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
			]
		]
	];

	public function refresh (& $form) {
		$form->error(WARNING, \Numbers\Users\Users\Helper\Messages::REAUTHORIZATION_REQUIRED);
	}

	public function save(& $form) {
		$authorize = \Numbers\Users\Users\Model\User\Authorize::authorizeWithCredentials($form->values['username'], $form->values['password']);
		if ($authorize['success']) {
			$_SESSION['numbers']['relogins'][$form->options['__other_controller']]['authenticated'] = true;
			return true;
		} else {
			$form->error('danger', 'Provided credentials do not match our records!');
			$form->error('danger', null, 'username');
			$form->error('danger', null, 'password');
			return false;
		}
	}

	public function success(& $form) {
		if (!$form->hasErrors()) {
			$form->refresh();
		}
	}
}