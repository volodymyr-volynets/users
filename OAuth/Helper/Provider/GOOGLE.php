<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\OAuth\Helper\Provider;

use League\OAuth2\Client\Provider\Google;

$provider = new Google([
    'clientId'     => \Application::get('oauth.provider.GOOGLE.client_id'),
    'clientSecret' => \Application::get('oauth.provider.GOOGLE.secret'),
    'redirectUri'  => \Request::host() . ltrim(\Application::get('oauth.provider.GOOGLE.redirect_url'), '/')
]);

if (!empty($_GET['error'])) {
    // if error
    throw new \Exception('OAuth: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));
} elseif (empty($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth']['oauth2state'] = $provider->getState();
    \Request::redirect($authUrl);
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth']['oauth2state'])) {
    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth']['oauth2state']);
    throw new \Exception('OAuth: Invalid state');
} else {
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    try {
        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);
        $_SESSION['oauth']['user'] = [
            'um_user_name' => $ownerDetails->getName(),
            'um_user_email' => $ownerDetails->getEmail(),
        ];
        $_SESSION['oauth']['authorized'] = [
            'token' => $token->getToken(),
            'refresh_token' => $token->getRefreshToken(),
            'expires' => $token->getExpires()
        ];
    } catch (\Exception $e) {
        // Failed to get user details
        throw new \Exception('OAuth: ' . $e->getMessage());
    }
}
