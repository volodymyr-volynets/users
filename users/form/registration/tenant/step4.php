<?php

class numbers_users_users_form_registration_tenant_step4 {

	/**
	 * Render
	 *
	 * @return string
	 */
	public function render() {
		$input = request::input();
		$options = [
			'type' => 'success',
			'options' => [
				i18n(null, 'Congratulations! You have successfully registered.'),
				i18n(null, 'You can now sign in into your account. [signin].', [
					'replace' => [
						'[signin]' => html::a(['href' => '/numbers/users/users/controller/login', 'value' => i18n(null, 'Sign In')])
					]
				])
			]
		];
		return html::message($options);
	}
}