<?php

namespace Numbers\Users\Users\Model\User;
class Notifications {

	/**
	 * Send password change email
	 *
	 * @param int $user_id
	 */
	public static function sendPasswordChangeEmail(int $user_id) {
		// load user fields
		$user = \Numbers\Users\Users\Model\Users::loadById($user_id);
		// send a message if user has email
		if (!empty($user['um_user_email'])) {
			$model = new \Numbers\Backend\System\Modules\Model\Notification\Sender();
			return $model->send('UM::EMAIL_PASSWORD_CHANGED', [
				'email' => $user['um_user_email'],
				'user_id' => $user_id,
				'replace' => [
					'body' => [
						'[Name]' => $user['um_user_name'],
						'[Email]' => $user['um_user_email'],
						'[Password_Reset_Url]' => \Request::host() . 'Numbers/Users/Users/Controller/Password/Reset'
					]
				]
			]);
		}
	}

	/**
	 * Send password reset email
	 *
	 * @param int $user_id
	 */
	public static function sendPasswordResetEmail(int $user_id) {
		// load user fields
		$user = \Numbers\Users\Users\Model\Users::loadById($user_id);
		// send a message if user has email
		if (!empty($user['um_user_email'])) {
			$crypt = new \Crypt();
			$model = new \Numbers\Backend\System\Modules\Model\Notification\Sender();
			return $model->send('UM::EMAIL_RESET_PASSWORD', [
				'email' => $user['um_user_email'],
				'user_id' => $user_id,
				'replace' => [
					'body' => [
						'[Name]' => $user['um_user_name'],
						'[URL]' => \Request::host() . 'Numbers/Users/Users/Controller/Password/Reset/_SetPassword?token=' . $crypt->tokenCreate($user_id, 'password.reset'),
						'[Token_Valid_Hours]' => $crypt->object->valid_hours
					]
				]
			]);
		}
	}
}