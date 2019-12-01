<?php

namespace Numbers\Users\Users\Form\APIs;
class Login extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_api_login';
	public $module_code = 'UM';
	public $title = 'U/M API Login';
	public $options = [];
	public $containers = [];
	public $rows = [];
	public $elements = [
		'login' => [
			'username' => [
				'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username or Email Address', 'type' => 'varchar', 'length' => 255, 'percent' => 50, 'required' => true, 'autofocus' => true]
			],
			'password' => [
				'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'type' => 'varchar', 'percent' => 50, 'method' => 'password', 'required' => true, 'empty_value' => true]
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
			]
		]
	];

	public function validate(& $form) {
		$authorize = \Numbers\Users\Users\Model\User\Authorize::authorizeWithCredentials($form->values['username'], $form->values['password']);
		if ($authorize['success']) {
			$form->api_values['session_id'] = $authorize['session_id'];
		} else {
			$form->error('danger', 'Provided credentials do not match our records!');
			$form->error('danger', null, 'username');
			$form->error('danger', null, 'password');
		}
	}
}