<?php

class numbers_users_users_controller_logout_confirmed extends object_controller {
	public function action_index() {
		$options = [
			'type' => 'default',
			'options' => [
				i18n(null, 'Congratulations! You have successfully signed out.'),
				i18n(null, 'You can now sign in into your account. [signin].', [
					'replace' => [
						'[signin]' => html::a(['href' => request::host(['mvc' => '/numbers/users/users/controller/login']), 'value' => i18n(null, 'Sign In')])
					]
				])
			]
		];
		return html::segment([
			'type' => 'success',
			'header' => [
				'icon' => ['type' => 'sign-out'],
				'title' => 'Sign Out:'
			],
			'value' => html::message($options)
		]);
	}
}