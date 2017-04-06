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
		$model = new \Numbers\Backend\System\Modules\Model\Notification\Sender();
		return $model->send('UM::EMAIL_PASSWORD_CHANGED', [
			'email' => $email,
			'user_id' => $user_id,
			'replace' => [
				'body' => [
					'[Name]' => $name,
					'[Email]' => $email,
					'[Password_Reset_Url]' => \Request::host() . 'Numbers/Users/Users/Controller/Password/Reset'
				]
			]
		]);
	}
}