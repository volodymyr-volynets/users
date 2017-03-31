<?php

namespace Numbers\Users\Users\Model\User;
class Authorize {

	/**
	 * Authorize
	 *
	 * @param string $username
	 * @param string $password
	 * @return array
	 */
	public static function authorizeWithCredentials($username, $password) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$datasource = new \Numbers\Users\Users\DataSource\Login();
			$user = $datasource->get(['where' => ['username' => $username]]);
			if (empty($user)) break;
			// validate password
			$crypt = new \Crypt();
			if (!$crypt->passwordVerify($password, $user['login_password'])) break;
			// todo: process password reset based on login_last_set date
			// authorize entity if we got here
			unset($user['login_password']);
			\User::userAuthorize($user);
			// success
			$result['success'] = true;
		} while(0);
		return $result;
	}

	/**
	 * Sign out
	 */
	public static function signOut() {
		\User::userSignOut();
		\Session::destroy();
	}
}