<?php

namespace Numbers\Users\Users\API\V1\UM;
class Login extends \Object\Controller\API {
	public $group = ['UM', 'Operations', 'User Management'];
	public $name = 'U/M Login (API V1)';
	public $version = 'V1';
	public $base_url = '/API/V1/UM/Login';
	public $model = \Numbers\Users\Users\Model\Users::class;
	public $pk = ['um_user_id'];
	public $tenant = true;
	public $module = false;
	public $acl = [
		'public' => true,
		'authorized' => false,
		'permission' => false,
	];

	/**
	 * Routes
	 */
	public function routes() {
		\Route::api($this->name, $this->base_url, self::class, $this->route_options)
			->acl('Public');
	}

	/**
	 * Login API
	 */
	public $postLogin_name = 'Login';
	public $postLogin_description = 'Use this API to obtain bearer token for API usage.';
	public $postLogin_columns = [
		'username' => ['required' => true, 'domain' => 'username', 'name' => 'Username'],
		'password' => ['required' => true, 'domain' => 'password_input', 'name' => 'Password'],
	];
	public $postLogin_result_danger = \Validator::RESULT_DANGER;
	public $postLogin_result_success = \Numbers\Users\Users\Model\User\Authorize::RESULT_SUCCESS;
	public function postLogin() {
		return \Numbers\Users\Users\Model\User\Authorize::authorizeWithCredentials($this->values['username'], $this->values['password'], [
			'as_bearer' => true,
			'session_start' => true,
		]);
	}

	/**
	 * Check API
	 */
	public $postCheck_name = 'Check';
	public $postCheck_description = 'Use this API to validate existing bearer token and get uesr data from sessions.';
	public $postCheck_columns = [
		'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'from_application' => 'flag.global.__bearer_token'],
	];
	public $postCheck_result_danger = \Validator::RESULT_DANGER;
	public $postCheck_result_success = RESULT_SUCCESS;
	public function postCheck() {
		if (session_status() != PHP_SESSION_ACTIVE) {
			return ['error' => ['Session is not active!']] + \Validator::RESULT_DANGER;
		}
		// simply check session
		if (!empty($_SESSION['numbers']['user'])) {
			return [
				'success' => true,
				'error' => [],
				'data' => $_SESSION['numbers']['user'],
			];
		} else {
			return [
				'success' => false,
				'error' => ['Bearer token/session expired!'],
				'data' => [],
			];
		}
	}

	/**
	 * Logout API
	 */
	public $postLogout_name = 'Logout';
	public $postLogout_description = 'Use this API to invalidate bearer token.';
	public $postLogout_columns = [
		'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'from_application' => 'flag.global.__bearer_token'],
	];
	public $postLogout_result_danger = \Validator::RESULT_DANGER;
	public $postLogout_result_success = RESULT_SUCCESS;
	public function postLogout() {
		if (session_status() != PHP_SESSION_ACTIVE) {
			session_destroy();
		}
		// todo invalidate bearer token
		return \Numbers\Users\APIs\Model\BearerTokens::collectionStatic()->merge([
			'a3_bearertoken_id' => $this->values['bearer_token'],
			'a3_bearertoken_inactive' => 1,
			'a3_bearertoken_expires' => \Format::now('timestamp'),
		]);
	}
}