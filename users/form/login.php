<?php

class numbers_users_users_form_login extends object_form_wrapper_base {
	public $form_link = 'login';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'sign-in'],
				'title' => 'Sign in:'
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
				'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username or Email Address', 'type' => 'varchar', 'length' => 255, 'row_order' => 100, 'percent' => 50, 'required' => true, 'autofocus' => true]
			],
			'password' => [
				'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'type' => 'varchar', 'percent' => 50, 'method' => 'password', 'required' => true, 'empty_value' => true]
			],
			self::buttons => [
				self::button_submit => self::button_submit_data,
				'forgot' => ['order' => 99, 'button_group' => 'left', 'href' => '/numbers/data/entities/misc/login/controller/password', 'value' => 'Forgot Password?', 'method' => 'a']
			]
		]
	];

	public function save(& $form) {
		do {
			$datasource = new numbers_users_users_datasource_login();
			$user = $datasource->get(['where' => ['username' => $form->values['username']]]);
			if (empty($user)) break;
			// validate password
			$crypt = new crypt();
			if (!$crypt->password_verify($form->values['password'], $user['login_password'])) break;
			// todo: process password reset based on em_entpass_last_set date
			// authorize entity if we got here
			user::user_authorize($user);
			// if we need to redirect to post login page
			$url = application::get('flag.global.default_postlogin_page');
			if (!empty($url)) {
				request::redirect($postlogin);
			}
			$form->error('success', 'You have successfully logged in!');
			return true;
		} while(0);
		$form->error('danger', 'Provided credentials do not match our records!');
		$form->error('danger', null, 'username');
		$form->error('danger', null, 'password');
		return false;
	}
}