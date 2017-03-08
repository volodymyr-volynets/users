<?php

class numbers_users_users_model_user_authorize {

	/**
	 * Authorize
	 *
	 * @param string $username
	 * @param string $password
	 * @return array
	 */
	public static function authorize_with_credentials($username, $password) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$datasource = new numbers_users_users_datasource_login();
			$user = $datasource->get(['where' => ['username' => $username]]);
			if (empty($user)) break;
			// validate password
			$crypt = new crypt();
			if (!$crypt->password_verify($password, $user['login_password'])) break;
			// todo: process password reset based on login_last_set date
			// authorize entity if we got here
			unset($user['login_password']);
			user::user_authorize($user);
			// success
			$result['success'] = true;
		} while(0);
		return $result;
	}

	/**
	 * Sign out
	 */
	public static function sign_out() {
		user::user_sign_out();
		session::destroy();
	}
}