<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Numbers\Users\Users\Model\User\Authorize;
use Object\Form\Wrapper\Base;

class Login extends Base
{
    public $form_link = 'um_login';
    public $module_code = 'UM';
    public $title = 'U/M Login';
    public $options = [
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'panels' => ['default_row_type' => 'grid', 'order' => 50, 'type' => 'panels'],
        'login_container' => ['default_row_type' => 'grid', 'order' => 100],
        'sso_container' => ['default_row_type' => 'grid', 'order' => 200],
        'register_container' => ['default_row_type' => 'grid', 'order' => 300]
    ];
    public $rows = [
        'panels' => [
            'left' => ['order' => 100, 'label_name' => 'Sign In', 'loc' => 'NF.Form.SignIn', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'primary', 'percent' => 50],
            'right1' => ['order' => 200, 'label_name' => 'Single Sign On', 'loc' => 'NF.Form.SingleSignOn', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'primary', 'percent' => 25],
            'right2' => ['order' => 300, 'label_name' => 'Register', 'loc' => 'NF.Form.Register', 'panel_icon' => ['type' => 'fa-regular fa-registered'], 'panel_type' => 'warning', 'percent' => 25],
        ]
    ];
    public $elements = [
        'panels' => [
            'left' => [
                'login' => ['container' => 'login_container', 'order' => 100],
            ],
            'right1' => [
                'sso' => ['container' => 'sso_container', 'order' => 100],
            ],
            'right2' => [
                'register' => ['container' => 'register_container', 'order' => 100],
            ]
        ],
        'login_container' => [
            'username' => [
                'username' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Username, Email Address or Phone', 'loc' => 'NF.Form.UsernameEmailPhone', 'type' => 'varchar', 'length' => 255, 'percent' => 100, 'required' => true, 'autofocus' => true]
            ],
            'password' => [
                'password' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Password', 'loc' => 'NF.Form.Password', 'type' => 'varchar', 'percent' => 100, 'method' => 'password', 'required' => true, 'empty_value' => true, 'method_renderer' => 'self::renderNewPasswordMethodRenderer']
            ],
            self::WIDE_BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
                'forgot' => ['order' => 99, 'href' => '/Numbers/Users/Users/Controller/Password/Reset', 'value' => 'Forgot Password?', 'loc' => 'NF.Form.ForgotPassword', 'method' => 'a']
            ]
        ],
        'sso_container' => [
            'sso' => [
                'sso' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'null' => true, 'custom_renderer' => 'self::renderSSO'],
            ]
        ],
        'register_container' => [
            'register' => [
                'register' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'null' => true, 'custom_renderer' => 'self::renderRegister'],
            ]
        ]
    ];
    public $loc = [
        'NF.Message.CredentialsDoNotMatch' => 'Provided credentials do not match our records!',
        'NF.Message.UserAccountIsOnHoldCallSupportOrTryAgainLater' => 'User account in on hold, please contact support or try logging again later!',
        'NF.Message.SuccessfullySignedIn' => 'You have successfully signed in!',
        'NF.Name.Facebook' => 'Facebook',
        'NF.Name.Google' => 'Google',
    ];

    public function save(& $form)
    {
        $authorize = Authorize::authorizeWithCredentials(
            $form->values['username'],
            $form->values['password'],
            ['as_bearer' => true]
        );
        if ($authorize['success']) {
            // MFA
            if ($authorize['mfa']) {
                $_SESSION['numbers']['flag_mfa_redirect'] = true;
                \Request::redirect(\Application::get('flag.global.default_mfa_page'));
            }
            // link from email
            if (!empty($_SESSION['numbers']['tokens']['email_token'])) {
                $href = $_SESSION['numbers']['tokens']['email_token']['data']['href'];
                unset($_SESSION['numbers']['tokens']['email_token']['data']['href']);
                \Request::redirect($href);
            }
            // if we have post login url
            if (isset($_SESSION['numbers']['__post_login_url'])) {
                $url = $_SESSION['numbers']['__post_login_url'];
                unset($_SESSION['numbers']['__post_login_url']);
                \Request::redirect($url);
            }
            // if we need to redirect to post login page
            $url = \Application::get('flag.global.default_postlogin_page');
            if (!empty($url)) {
                \Request::redirect($url);
            }
            // redirect to dashboard
            $url = \Request::buildFromName('U/M Welcome Dashboard', 'Index');
            \Request::redirect($url, null, [
                '__message' => loc('NF.Message.SuccessfullyLoggedIn', 'Successfully logged in!'),
            ]);
            $form->error('success', ['NF.Message.SuccessfullySignedIn' => 'You have successfully signed in!']);
            return true;
        } elseif ($authorize['hold']) {
            $form->error('danger', ['NF.Message.UserAccountIsOnHoldCallSupportOrTryAgainLater' => 'User account in on hold, please contact support or try logging again later!']);
            return false;
        } else {
            $form->error('danger', ['NF.Message.CredentialsDoNotMatch' => 'Provided credentials do not match our records!']);
            $form->error('danger', null, 'username');
            $form->error('danger', null, 'password');
            return false;
        }
    }

    public function renderSSO(& $form, & $options, & $value, & $neighbouring_values)
    {
        $crypt = new \Crypt();
        $success_url = $_SESSION['numbers']['__post_login_url'] ?? \Application::get('flag.global.default_postlogin_page') ?? \Request::buildFromName('U/M Welcome Dashboard', 'Index');
        $fail_url = \Application::get('flag.global.default_login_page');
        $providers = \Application::get('oauth.provider') ?? [];
        $links = [];
        foreach ($providers as $k => $v) {
            if (empty($v['autoconnect'])) {
                continue;
            }
            $token = $crypt->tokenCreate(0, 'oauth.link', [
                'provider' => $k,
                '__domain' => \Request::host(),
                '__success_url' => $success_url,
                '__fail_url' => $fail_url,
                'registration_allow' => false,
            ]);
            $name = loc($v['loc'], $this->loc[$v['loc']]);
            $links[] = \HTML::a(['href' => \Application::get('oauth.handler_url') . '?token=' . $token, 'value' => \HTML::icon(['type' => $v['icon'] ?? 'fa-solid fa-x-ray']) . ' ' . $name]);
        }
        return implode('<br/>', $links);
    }

    public function renderRegister(& $form, & $options, & $value, & $neighbouring_values)
    {
        $links = [];
        $registrations = \Application::get('registration') ?? [];
        foreach ($registrations as $v) {
            foreach ($v as $v2) {
                $loc_key = \String2::createStatic($v2['name'])->englishOnly(true)->toString();
                $links[] = \HTML::a(['href' => $v2['link'], 'class' => 'text-primary', 'value' => \HTML::icon(['type' => $v['icon'] ?? 'fa-solid fa-x-ray']) . ' ' . loc('NF.System.' . $loc_key, $v2['name'])]);
            }
        }
        return implode('<br/>', $links);
    }

    public function renderNewPasswordMethodRenderer(& $form, & $options, & $value, & $neighbouring_values)
    {
        $id = $options['options']['id'];
        $result = [
            'left' => '',
            'value' => $value,
            'right' => [],
        ];
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.View', 'View'), 'onclick' => "$('#" . $id . "').attr('type', 'input');"]);
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.Paste', 'Paste'), 'onclick' => "Numbers.Form.pasteFromClipboard('#" . $id . "');"]);
        return \HTML::inputGroup($result);
    }
}
