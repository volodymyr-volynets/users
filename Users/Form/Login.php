<?php

namespace Numbers\Users\Users\Form;
class Login extends \Object\Form\Wrapper\Base {
	public $form_link = 'login';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'sign-in'],
				'title' => 'Sign In:'
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
				'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username or Email Address', 'type' => 'varchar', 'length' => 255, 'percent' => 50, 'required' => true, 'autofocus' => true]
			],
			'password' => [
				'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'type' => 'varchar', 'percent' => 50, 'method' => 'password', 'required' => true, 'empty_value' => true]
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
				'forgot' => ['order' => 99, 'button_group' => 'left', 'href' => '/Numbers/Users/Users/Controller/Password/Reset', 'value' => 'Forgot Password?', 'method' => 'a']
			]
		]
	];

	public function save(& $form) {
		$authorize = \Numbers\Users\Users\Model\User\Authorize::authorizeWithCredentials($form->values['username'], $form->values['password']);
		if ($authorize['success']) {
			// if we need to redirect to post login page
			$url = \Application::get('flag.global.default_postlogin_page');
			if (!empty($url)) {
				\Request::redirect($url);
			}
			$form->error('success', 'You have successfully signed in!');
			return true;
		} else {
			$form->error('danger', 'Provided credentials do not match our records!');
			$form->error('danger', null, 'username');
			$form->error('danger', null, 'password');
			return false;
		}
	}
}