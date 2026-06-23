<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller;

use Object\Controller\Public2;
use Numbers\Users\Users\Model\User\Authorize;

class BasicAuth extends Public2
{
    public function actionIndex()
    {
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            $authorize = Authorize::authorizeWithCredentials(
                $_SERVER['PHP_AUTH_USER'],
                $_SERVER['PHP_AUTH_PW'],
                ['as_bearer' => true]
            );
            if ($authorize['success']) {
                $url = \Request::input('redirect_url');
                if (empty($url)) {
                    $url = \Application::get('flag.global.default_postlogin_page');
                }
                \Request::redirect($url, null, [
                    '__message' => loc('NF.Message.SuccessfullyLoggedIn', 'Successfully logged in!'),
                ]);
            }
        }
        // Authentication failed
        header('WWW-Authenticate: Basic realm="' . loc('NF.Form.RestrictedArea', 'Restricted Area') . '"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Invalid credentials. Please try again.';
        exit;
    }
}
