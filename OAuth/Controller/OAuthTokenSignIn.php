<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\OAuth\Controller;

use Numbers\Users\Users\API\V1\UM\Registration;
use Numbers\Users\Users\Model\User\Authorize;
use Object\Controller;

class OAuthTokenSignIn extends Controller
{
    public $title = 'OAuth Sign In';
    public $icon = 'fas fa-cogs';
    public $acl = [
        'public' => true,
        'authorized' => true,
        'permission' => false,
    ];

    public function actionIndex()
    {
        \Application::set('flag.global.__skip_layout', 'no_menu');
        $token = \Request::input('token');
        $crypt = new \Crypt();
        try {
            $decrypted = $crypt->tokenVerify($token, ['oauth.link']);
            $_SESSION['oauth'] = [
                'auth_tkt' => $token,
                'decrypted' => $decrypted,
                'oauth2state' => null,
                'provider' => $decrypted['data']['provider'],
                'provider_php_script' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Helper' . DIRECTORY_SEPARATOR . 'Provider' . DIRECTORY_SEPARATOR . $decrypted['data']['provider'] . '.php',
                'user' => [],
                'authorized' => [],
                'registration' => [
                    'allow' => $decrypted['data']['registration_allow'] ?? false,
                    'scope' => $decrypted['data']['scope'] ?? null,
                ]
            ];
            if (!require_if_exists($_SESSION['oauth']['provider_php_script'])) {
                throw new \Exception('OAuth: Provider not found!');
            }
        } catch (\Exception $e) {
            \Request::redirect($decrypted['data']['__fail_url'], $decrypted['data']['__domain'], [
                '__error' => $e->getMessage()
            ]);
        }
    }

    public function actionCallback()
    {
        try {
            if (empty($_SESSION['oauth']) || !require_if_exists($_SESSION['oauth']['provider_php_script'])) {
                throw new \Exception('OAuth: Provider not found!');
            }
            if (empty($_SESSION['oauth']['user']['um_user_email'])) {
                throw new \Exception('OAuth: Unable to fetch user email!');
            }
            // log in
            $authorize = Authorize::authorizeWithEmail($_SESSION['oauth']['user']['um_user_email']);
            if (!$authorize['success']) {
                if (empty($_SESSION['oauth']['registration']['allow'])) {
                    throw new \Exception('OAuth: Email not found!');
                }
                // we register
                $input = $_SESSION['oauth']['user'] + ['__provider' => $_SESSION['oauth']['provider']];
                $register = \API::runLocal(Registration::class, 'postSimple', $input, [
                    'scope' => $_SESSION['oauth']['registration']['scope'],
                ]);
                if (!$register['success']) {
                    throw new \Exception(implode("\n", $register['error']));
                }
                // if we registered we authorize again
                $authorize = Authorize::authorizeWithEmail($_SESSION['oauth']['user']['um_user_email']);
                if (!$authorize['success']) {
                    throw new \Exception('OAuth: Unable to authorize after registration!');
                }
            }
            // redirect
            $crypt = new \Crypt();
            $auth_tkt = $crypt->tokenCreate(0, 'bearer.token', $authorize['bearer_token']);
            $oauth = $_SESSION['oauth'];
            unset($_SESSION['oauth']);
            \Request::redirect($oauth['decrypted']['data']['__success_url'], $oauth['decrypted']['data']['__domain'], [
                '__message' => 'Successfully logged in!',
                '__token' => $auth_tkt,
            ]);
        } catch (\Exception $e) {
            $oauth = $_SESSION['oauth'];
            unset($_SESSION['oauth']);
            \Request::redirect($oauth['decrypted']['data']['__fail_url'], $oauth['decrypted']['data']['__domain'], [
                '__error' => $e->getMessage()
            ]);
        }
    }
}
