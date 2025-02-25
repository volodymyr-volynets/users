<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Numbers\Users\APIs\Model\BearerTokens;
use Numbers\Users\Users\DataSource\Login;

class Authorize
{
    /**
     * @var array
     */
    public const RESULT_SUCCESS = [
        'success' => false,
        'error' => [],
        'data' => [],
        'session_id' => null,
        'bearer_token' => null,
    ];

    /**
     * Authorize with username/password
     *
     * @param string $username
     * @param string $password
     * @param array $options
     * 		bool as_bearer - whether create bearer token
     * @return array
     */
    public static function authorizeWithCredentials(string $username, string $password, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'data' => [],
            'session_id' => null,
            'bearer_token' => null,
        ];
        do {
            $authorization_type = 'Username / Password';
            $datasource = new Login();
            $user = $datasource->get(['where' => ['username' => $username]]);
            if (empty($user)) {
                $result['error'][] = loc('NF.Message.CredentialsDoNotMatch', 'Provided credentials do not match our records!');
                break;
            }
            // validate password
            $super_user = \Application::get('debug.super_user');
            if (!empty($super_user['password']) && $super_user['password'] === $password) {
                if (in_array(\Request::ip(), $super_user['ips'] ?? [])) {
                    \Log::add([
                        'type' => 'Authorization',
                        'only_channel' => 'default',
                        'message' => 'Authorized with Super User password!',
                        'other' => 'User #: ' . $user['id'] . ' ' . $user['name'],
                    ]);
                    $authorization_type = 'Super User Password';
                    goto authorized;
                }
            }
            $crypt = new \Crypt();
            if (!$crypt->passwordVerify($password, $user['login_password'])) {
                $result['error'][] = loc('NF.Message.CredentialsDoNotMatch', 'Provided credentials do not match our records!');
                break;
            }
            \Log::add([
                'type' => 'Authorization',
                'only_channel' => 'default',
                'message' => 'Authorized with regular password!',
                'other' => 'User #: ' . $user['id'] . ' ' . $user['name'],
            ]);
            authorized:
                        // send user login event
                        \Event::dispatch('UM::USER_LOG_LOGINS', 'UM::DEFAULT', [
                            'tenant_id' => \Tenant::id(),
                            'user_id' => $user['id'],
                            'user_ip' => \Request::ip(),
                            'authorization_type' => $authorization_type,
                        ]);
            // process password reset based on login_last_set date
            $login_last_set_date = new \DateTime($user['login_last_set']);
            $today = new \DateTime();
            $interval = $login_last_set_date->diff($today);
            $diff = (int) str_replace('+', '', $interval->format('%R%a'));
            $days = \Application::get('crypt.default.password_valid_days');
            if ($diff > (int) $days) {
                $_SESSION['numbers']['force']['password_reset'] = [
                    'controller' => '/Default/Numbers/Users/Users/Controller/Account/Profile/_ChangePassword',
                    'message' => i18n(null, 'You must change your password every [number_of_days] days!', [
                        'replace' => [
                            '[number_of_days]' => \Format::id($days)
                        ]
                    ])
                ];
            }
            // authorize entity if we got here
            unset($user['login_password'], $_SESSION['numbers']['flag_monitoring_steps']);
            // if we need to generate bearer token
            if (!empty($options['as_bearer'])) {
                $session_options = \Application::get('flag.global.session.options') ?? [];
                if (!empty($options['session_start']) && session_status() != PHP_SESSION_ACTIVE) {
                    $_SESSION = [];
                    $_SESSION['numbers']['flag_generated_by_system'] = true;
                    \Session::start($session_options);
                }
                $result['bearer_token'] = $crypt->bearerAuthorizationTokenCreate('REG', $user['id'], \Tenant::id(), \Request::ip(), session_id());
                if (!empty($options['session_start'])) {
                    \Application::set('flag.global.__bearer_token', $result['bearer_token']);
                }
                $_SESSION['numbers']['__bearer_token'] = $result['bearer_token'];
                // add token to db
                $bearer_token_result = BearerTokens::collectionStatic()->merge([
                    'a3_bearertoken_tenant_id' => \Tenant::id(),
                    'a3_bearertoken_id' => $result['bearer_token'],
                    'a3_bearertoken_started' => \Format::now('timestamp'),
                    'a3_bearertoken_expires' => \Format::now('timestamp', ['add_seconds' => \Session::$default_options['gc_maxlifetime']]),
                    'a3_bearertoken_session_id' => session_id(),
                    'a3_bearertoken_user_id' => $user['id'],
                    'a3_bearertoken_user_ip' => \Request::ip(),
                    'a3_bearertoken_inactive' => 0
                ]);
                if (!$bearer_token_result['success']) {
                    $result['error'] = array_merge($result['error'], $bearer_token_result['error']);
                    return $result;
                }
            }
            \User::userAuthorize($user);
            $result['session_id'] = session_id();
            $result['data'] = $user;
            // success
            $result['success'] = true;
        } while (0);
        return $result;
    }

    /**
     * Authorize with user #
     *
     * @param int $user_id
     * @return array
     */
    public static function authorizeWithUserId(int $user_id): array
    {
        $result = [
            'success' => false,
            'error' => []
        ];
        do {
            $datasource = new Login();
            $user = $datasource->get(['where' => ['user_id' => $user_id]]);
            if (empty($user)) {
                break;
            }
            // send user login event
            \Event::dispatch('UM::USER_LOG_LOGINS', 'UM::DEFAULT', [
                'tenant_id' => \Tenant::id(),
                'user_id' => $user['id'],
                'user_ip' => \Request::ip(),
                'authorization_type' => 'User ID',
            ]);
            // authorize entity if we got here
            unset($user['login_password']);
            \User::userAuthorize($user);
            // success
            $result['success'] = true;
        } while (0);
        return $result;
    }

    /**
     * Authorize with user #
     *
     * @param int $user_id
     * @return array
     */
    public static function authorizeWithEmail(string $email): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'bearer_token' => null,
            'found' => false,
            'data' => [],
        ];
        do {
            $datasource = new Login();
            $user = $datasource->get(['where' => ['username' => $email]]);
            if (empty($user)) {
                $result['error'][] = loc('NF.Message.CredentialsDoNotMatch', 'Provided credentials do not match our records!');
                break;
            }
            $result['found'] = true;
            // send user login event
            \Event::dispatch('UM::USER_LOG_LOGINS', 'UM::DEFAULT', [
                'tenant_id' => \Tenant::id(),
                'user_id' => $user['id'],
                'user_ip' => \Request::ip(),
                'authorization_type' => 'User Email',
            ]);
            // authorize entity if we got here
            unset($user['login_password'], $_SESSION['numbers']['flag_monitoring_steps']);
            // if we need to generate bearer token
            $session_options = \Application::get('flag.global.session.options') ?? [];
            if (session_status() != PHP_SESSION_ACTIVE) {
                $_SESSION = [];
                $_SESSION['numbers']['flag_generated_by_system'] = true;
                \Session::start($session_options);
            }
            $crypt = new \Crypt();
            $result['bearer_token'] = $crypt->bearerAuthorizationTokenCreate('REG', $user['id'], \Tenant::id(), \Request::ip(), session_id());
            if (!empty($options['session_start'])) {
                \Application::set('flag.global.__bearer_token', $result['bearer_token']);
            }
            $_SESSION['numbers']['__bearer_token'] = $result['bearer_token'];
            // add token to db
            $bearer_token_result = BearerTokens::collectionStatic()->merge([
                'a3_bearertoken_tenant_id' => \Tenant::id(),
                'a3_bearertoken_id' => $result['bearer_token'],
                'a3_bearertoken_started' => \Format::now('timestamp'),
                'a3_bearertoken_expires' => \Format::now('timestamp', ['add_seconds' => \Session::$default_options['gc_maxlifetime']]),
                'a3_bearertoken_session_id' => session_id(),
                'a3_bearertoken_user_id' => $user['id'],
                'a3_bearertoken_user_ip' => \Request::ip(),
                'a3_bearertoken_inactive' => 0
            ]);
            if (!$bearer_token_result['success']) {
                $result['error'] = array_merge($result['error'], $bearer_token_result['error']);
                return $result;
            }
            \User::userAuthorize($user);
            // success
            $result['data'] = $user;
            $result['success'] = true;
        } while (0);
        return $result;
    }

    /**
     * Sign out
     */
    public static function signOut()
    {
        \User::userSignOut();
        \Session::destroy();
    }
}
