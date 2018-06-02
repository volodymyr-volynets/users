<?php

namespace Numbers\Users\APIs\Helper;
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
			'error' => [],
			'session' => null,
			'auth_tkt' => null
		];
		do {
			$username = strtolower($username);
			$model = new \Numbers\Users\APIs\Model\Users();
			$api_user = $model->get([
				'where' => [
					'ua_apiusr_login_username' => $username
				],
				'pk' => null
			]);
			if (empty($api_user)) {
				$result['error'][] = 'API user not found!';
				break;
			}
			// validate password
			$crypt = new \Crypt();
			if (!$crypt->passwordVerify($password, $api_user[0]['ua_apiusr_login_password'])) {
				$result['error'][] = 'Invalid credentials!';
				break;
			}
			// fetch user
			$datasource = new \Numbers\Users\Users\DataSource\Login();
			$user = $datasource->get(['where' => ['user_id' => $api_user[0]['ua_apiusr_user_id']]]);
			// authorize entity if we got here
			unset($user['login_password'], $api_user[0]['ua_apiusr_login_password']);
			$user['api_user'] = $api_user[0];
			\User::userAuthorize($user);
			// success
			$result['success'] = true;
			$result['session'] = session_id();
			$result['auth_tkt'] = $crypt->tokenCreate($api_user[0]['ua_apiusr_user_id'], $api_user[0]['ua_apiusr_id']);
		} while(0);
		return $result;
	}

	/**
	 * Sign out
	 *
	 * @param string $session_id
	 * @return array
	 */
	public static function signOut($session_id) {
		// todo
		\User::userSignOut();
		\Session::destroy();
		return [
			'success' => true,
			'error' => []
		];
	}
}