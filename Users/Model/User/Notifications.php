<?php

namespace Numbers\Users\Users\Model\User;
class Notifications {

	/**
	 * Authorize
	 *
	 * @param string $user_id
	 * @param string $email
	 * @param string $name
	 */
	public static function sendChangeEmail($user_id, $email, $name) {
		$message = "Hello [Name],

We wanted to let you know that your password was changed.

If you did not perform this action, you can recover access by entering [Email] into the form at [Password_Reset_Url].

Please do not reply to this email.

Thank you!";
		$password_reset_url = \Request::host() . 'Numbers/Users/Users/Controller/Password/Reset';
		\Mail::sendSimple($email, 'Your password has changed', i18n(null, $message, [
			'replace' => [
				'[Name]' => $name,
				'[Email]' => $email,
				'[Password_Reset_Url]' => $password_reset_url
			]
		]));
	}
}