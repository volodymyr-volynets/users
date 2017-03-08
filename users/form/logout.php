<?php

class numbers_users_users_form_logout extends object_form_wrapper_base {
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
			self::buttons => [
				self::button_submit => self::button_submit_data
			]
		]
	];

	public function save(& $form) {
		numbers_users_users_model_user_authorize::sign_out();
		request::redirect('/numbers/users/users/controller/logout/confirmed');
		return true;
	}
}