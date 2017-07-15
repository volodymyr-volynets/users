<?php

namespace Numbers\Users\Users\Model\User;
class Authorize {

	/**
	 * Authorize with username/password
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
	 * Authorize with user #
	 *
	 * @param int $user_id
	 * @return array
	 */
	public static function authorizeWithUserId(int $user_id) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$datasource = new \Numbers\Users\Users\DataSource\Login();
			$user = $datasource->get(['where' => ['user_id' => $user_id]]);
			if (empty($user)) break;
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