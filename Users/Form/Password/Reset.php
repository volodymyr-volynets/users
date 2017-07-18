<?php

namespace Numbers\Users\Users\Form\Password;
class Reset extends \Object\Form\Wrapper\Base {
	public $form_link = 'password_reset';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'asterisk'],
				'title' => 'Password Reset:'
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
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
				'login' => ['order' => 99, 'button_group' => 'left', 'href' => '/Numbers/Users/Users/Controller/Login', 'value' => 'Sign In', 'method' => 'a']
			]
		]
	];

	public function save(& $form) {
		$datasource = new \Numbers\Users\Users\DataSource\Login();
		$user = $datasource->get(['where' => ['username' => $form->values['username']]]);
		if (!empty($user)) {
			// send email
			\Numbers\Users\Users\Model\User\Notifications::sendPasswordResetEmail($user['id']);
		}
		$form->error(SUCCESS, 'Please check your email and click the link provided to reset your password.');
		return true;
	}
}