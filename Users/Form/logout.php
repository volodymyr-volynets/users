<?php

class numbers_users_users_form_logout extends \Object\Form\Wrapper\Base {
	public $form_link = 'login';
	public $options = [
		'segment' => [
			'type' => 'danger',
			'header' => [
				'icon' => ['type' => 'sign-out'],
				'title' => 'Sign Out:'
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
			'confirmation' => [
				'confirmation' => ['order' => 1, 'row_order' => 100, 'label_name' => null, 'value' => 'Do you really want to sign out?', 'method' => 'div', 'type' => 'text', 'percent' => 100]
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
			]
		]
	];

	public function save(& $form) {
		\Numbers\Users\Users\Model\User\Authorize::sign_out();
		\Request::redirect('/numbers/users/users/controller/logout/confirmed');
		return true;
	}
}