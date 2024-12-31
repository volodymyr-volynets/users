<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\API\V1\UM;

use Helper\Constant\HTTPConstants;
use Numbers\Users\APIs\Model\BearerTokens;
use Numbers\Users\Users\Helper\User\Notifications;
use Numbers\Users\Users\Model\User\Authorize;
use Object\Controller\API;

class Login extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Login (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Login';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => false,
        'permission' => false,
    ];

    public $loc = [
        'NF.Message.BearerTokenSessionExpired' => 'Bearer token/session expired!',
        'NF.Message.UserNotFound' => 'User not found!',
    ];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Public');
    }

    /**
     * Login API
     */
    public $postLogin_name = 'Login';
    public $postLogin_description = 'Use this API to obtain bearer token for API usage.';
    public $postLogin_columns = [
        'username' => ['required' => true, 'domain' => 'username', 'name' => 'Username', 'loc' => 'NF.Form.Username'],
        'password' => ['required' => true, 'domain' => 'password_input', 'name' => 'Password', 'loc' => 'NF.Form.Password'],
    ];
    public $postLogin_result_danger = \Validator::RESULT_DANGER;
    public $postLogin_result_success = Authorize::RESULT_SUCCESS;
    public function postLogin()
    {
        $result = Authorize::authorizeWithCredentials($this->values['username'], $this->values['password'], [
            'as_bearer' => true,
            'session_start' => true,
        ]);
        return $this->finish($result['success'] ? HTTPConstants::Status200OK : HTTPConstants::Status400BadRequest, $result);
    }

    /**
     * Check API
     */
    public $postCheck_name = 'Check';
    public $postCheck_description = 'Use this API to validate existing bearer token and get uesr data from sessions.';
    public $postCheck_columns = [
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postCheck_result_danger = \Validator::RESULT_DANGER;
    public $postCheck_result_success = RESULT_SUCCESS;
    public function postCheck()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            return ['error' => ['Session is not active!']] + \Validator::RESULT_DANGER;
        }
        // simply check session
        if (!empty($_SESSION['numbers']['user'])) {
            return $this->finish(HTTPConstants::Status200OK, [
                'success' => true,
                'error' => [],
                'data' => $_SESSION['numbers']['user'],
            ]);
        } else {
            return $this->finish(HTTPConstants::Status401Unauthorized, [
                'success' => false,
                'error' => [loc('NF.Message.BearerTokenSessionExpired', 'Bearer token/session expired!')],
                'data' => [],
            ]);
        }
    }

    /**
     * Logout API
     */
    public $postLogout_name = 'Logout';
    public $postLogout_description = 'Use this API to invalidate bearer token.';
    public $postLogout_columns = [
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postLogout_result_danger = \Validator::RESULT_DANGER;
    public $postLogout_result_success = RESULT_SUCCESS;
    public function postLogout()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        // todo invalidate bearer token
        return BearerTokens::collectionStatic()->merge([
            'a3_bearertoken_id' => $this->values['bearer_token'],
            'a3_bearertoken_inactive' => 1,
            'a3_bearertoken_expires' => \Format::now('timestamp'),
        ]);
    }

    /**
     * Password reset API
     */
    public $postPasswordReset_name = 'Password Reset';
    public $postPasswordReset_description = 'Use this API to reset password.';
    public $postPasswordReset_columns = [
        'username' => ['required' => true, 'domain' => 'username', 'name' => 'Username', 'loc' => 'NF.Form.Username']
    ];
    public $postPasswordReset_result_danger = \Validator::RESULT_DANGER;
    public $postPasswordReset_result_success = Authorize::RESULT_SUCCESS;
    public function postPasswordReset()
    {
        $datasource = new \Numbers\Users\Users\DataSource\Login();
        $user = $datasource->get(['where' => ['username' => $this->values['username']]]);
        if (!empty($user)) {
            $result = Notifications::sendPasswordResetEmail($user['id']);
            return $this->finish($result['success'] ? HTTPConstants::Status200OK : HTTPConstants::Status400BadRequest, $result);
        } else {
            return $this->finish(HTTPConstants::Status400BadRequest, [
                'success' => false,
                'error' => [loc('NF.Message.UserNotFound', 'User not found!')],
            ]);
        }
    }
}
