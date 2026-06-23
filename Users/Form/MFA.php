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

use Object\Form\Wrapper\Base;
use Numbers\Users\Users\Helper\User\Notifications;
use Numbers\Users\Users\Model\Users;
use Numbers\Users\Users\Model\MFA\UserMFAOptions;
use Object\Validator\Phone;
use Helper\QRCode;
use Numbers\Users\Users\Model\Settings;

class MFA extends Base
{
    public $form_link = 'um_login';
    public $module_code = 'UM';
    public $title = 'U/M Login';
    public $options = [
        //'no_ajax_form_reload' => true
    ];
    public $containers = [
        'panels' => ['default_row_type' => 'grid', 'order' => 50, 'type' => 'panels'],
        'code_container' => ['default_row_type' => 'grid', 'order' => 100],
        'submit_container' => ['default_row_type' => 'grid', 'order' => 200],
    ];
    public $rows = [
        'panels' => [
            'left' => ['order' => 100, 'label_name' => 'Generate Code', 'loc' => 'NF.Form.GenerateCode', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'danger', 'percent' => 50],
            'right' => ['order' => 200, 'label_name' => 'Submit Code', 'loc' => 'NF.Form.SubmitCode', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'primary', 'percent' => 50],
        ]
    ];
    public $elements = [
        'panels' => [
            'left' => [
                'code1' => ['container' => 'code_container', 'order' => 100],
            ],
            'right' => [
                'code2' => ['container' => 'submit_container', 'order' => 100],
            ],
        ],
        'code_container' => [
            'um_mfatype_code' => [
                'um_mfatype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'loc' => 'NF.Form.Type', 'domain' => 'group_code', 'percent' => 100, 'required' => 'c', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\MFA\UserMFAOptions::generateUserOptions', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();']
            ],
            'qr_code' => [
                'qr_code' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'domain' => 'name', 'percent' => 100, 'custom_renderer' => 'self::renderQRCode'],
            ],
            self::WIDE_BUTTONS => [
                self::BUTTON_SUBMIT_GENERATE => self::BUTTON_SUBMIT_GENERATE_DATA,
            ],
        ],
        'submit_container' => [
            'um_user_last_mfa_code' => [
                'um_user_last_mfa_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'MFA Code', 'loc' => 'NF.Form.MFACode', 'domain' => 'mfa_code', 'percent' => 100, 'required' => 'c', 'maxlength' => 6, 'autofocus' => true]
            ],
            self::WIDE_BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
            ]
        ],
    ];
    public $loc = [
        'NF.Form.GenerateCode' => 'Generate Code',
        'NF.Form.SubmitCode' => 'Submit Code',
    ];

    public function refresh(& $form)
    {
        if (empty($form->values['um_mfatype_code'])) {
            $form->values['um_mfatype_code'] = \User::get('um_user_um_mfatype_code');
        }
    }

    public function validate(& $form)
    {
        // generate code
        if (!empty($form->process_submit[self::BUTTON_SUBMIT_GENERATE])) {
            $form->validateQuickRequired('um_mfatype_code');
            if (!$form->hasErrors()) {
                if ($form->values['um_mfatype_code'] == 'TOTP_AUTHENTICATOR') {
                    $result = Users::collectionStatic()->merge([
                        'um_user_tenant_id' => \Tenant::id(),
                        'um_user_id' => \User::id(),
                        'um_user_um_mfatype_code' => $form->values['um_mfatype_code'],
                    ], [
                        'skip_optimistic_lock' => true,
                    ]);
                    $form->error(SUCCESS, loc('NF.Form.CheckAuthenticatorApp', 'Check Authenticator Application!'));
                } else {
                    $all_options = (new UserMFAOptions())->generateUserOptions();
                    $mfa_code = rand(100000, 999999) . '';
                    $message = loc('NF.Form.YourVerificationCodeIsCode', 'Your verification code is: {mfa_code}', ['mfa_code' => $mfa_code]);
                    $occasion = loc('NF.Form.VerificationCodeEnclosed', 'Verification code enclosed');
                    $result = Users::collectionStatic()->merge([
                        'um_user_tenant_id' => \Tenant::id(),
                        'um_user_id' => \User::id(),
                        'um_user_um_mfatype_code' => $form->values['um_mfatype_code'],
                        'um_user_last_mfa_code' => $mfa_code,
                    ], [
                        'skip_optimistic_lock' => true,
                    ]);
                    if ($result['success']) {
                        $value = $all_options[$form->values['um_mfatype_code']]['user_value'];
                        if (str_starts_with($form->values['um_mfatype_code'], 'EMAIL_')) {
                            Notifications::sendMFASimpleEmail(\User::id(), $value, $message, $occasion);
                        } elseif (str_starts_with($form->values['um_mfatype_code'], 'SMS_')) {
                            $value = Phone::plainNumber($value) . '';
                            Notifications::sendMFAToSMS($value, $message, $occasion);
                        }
                        $form->error(SUCCESS, loc('NF.Form.SuccessfullyGeneratedMfaCode', 'Successfully generated MFA code!'));
                    } else {
                        $form->error(DANGER, $result['error'], 'um_mfatype_code');
                    }
                }
            }
        }
        // submit code
        if (!empty($form->process_submit[self::BUTTON_SUBMIT])) {
            $form->validateQuickRequired('um_user_last_mfa_code');
            if (!$form->hasErrors()) {
                $user = Users::getSingleStatic([
                    'where' => [
                        'um_user_tenant_id' => \Tenant::id(),
                        'um_user_id' => \User::id(),
                    ],
                    'columns' => ['um_user_last_mfa_code', 'um_user_um_mfatype_code', 'um_user_totp_encrypted']
                ]);
                if ($user['um_user_um_mfatype_code'] == 'TOTP_AUTHENTICATOR') {
                    // decrypt from db
                    $crypt3 = new \Crypt();
                    $secret = $crypt3->decrypt(\User::get('um_user_totp_encrypted'));
                    // validate TOTP
                    $crypt2 = new \Crypt('totp');
                    $result = $crypt2->totpSetSettings($secret, 6, 30)->totpValidate($form->values['um_user_last_mfa_code'], 1);
                    if (!$result) {
                        goto error_label;
                    }
                    // success with authenticator
                    $_SESSION['numbers']['flag_mfa_redirect'] = false;
                    $form->error(SUCCESS, loc('NF.Message.SuccessfullyLoggedIn', 'Successfully logged in!'));
                    $url = \Application::get('flag.global.default_postlogin_page');
                    \Request::redirect($url);
                } elseif ($user['um_user_last_mfa_code'] == $form->values['um_user_last_mfa_code']) {
                    $_SESSION['numbers']['flag_mfa_redirect'] = false;
                    $result = Users::collectionStatic()->merge([
                        'um_user_tenant_id' => \Tenant::id(),
                        'um_user_id' => \User::id(),
                        'um_user_last_mfa_code' => null,
                    ], [
                        'skip_optimistic_lock' => true,
                    ]);
                    $form->error(SUCCESS, loc('NF.Message.SuccessfullyLoggedIn', 'Successfully logged in!'));
                    $url = \Application::get('flag.global.default_postlogin_page');
                    \Request::redirect($url);
                } else {
                    error_label:
                                        $form->error(DANGER, loc('NF.Form.InvalidMFACode', 'Invalid MFA code!'), 'um_user_last_mfa_code');
                }
            }
        }
    }

    public function renderQRCode(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($form->values['um_mfatype_code'] == 'TOTP_AUTHENTICATOR') {
            $secret = Users::getSingleStatic([
                'where' => [
                    'um_user_tenant_id' => \Tenant::id(),
                    'um_user_id' => \User::id(),
                ],
                'columns' => ['um_user_totp_encrypted']
            ])['um_user_totp_encrypted'];
            $new_secret = false;
            if (empty($secret)) {
                $crypt1 = new \Crypt('default');
                $secret = $crypt1->passwordStringGenerate(16);
                $secret_encrypted = $crypt1->encrypt($secret, null, true);
                $result = Users::collectionStatic()->merge([
                    'um_user_tenant_id' => \Tenant::id(),
                    'um_user_id' => \User::id(),
                    'um_user_totp_encrypted' => $secret_encrypted,
                ], [
                    'skip_optimistic_lock' => true,
                ]);
                if ($result['success']) {
                    $secret_encrypted = \User::set('um_user_totp_encrypted', $secret_encrypted);
                    $new_secret = true;
                } else {
                    $form->error(DANGER, $result['error'], 'um_mfatype_code');
                    return;
                }
            }
            // for new secrets we generate QR code
            if ($new_secret) {
                $settings = Settings::getSingleStatic();
                $crypt2 = new \Crypt('totp');
                $url = $crypt2->totpSetSettings($secret, 6, 30)->totpGetDeepLinkUrl(\User::get('email'), $settings['um_setting_totp_issuer'] ?? 'NumbersSoft Inc');
                return '<div><h3>' . loc('NF.Form.ScanWithTheApp', 'Scan with the app!') . '</h3>' . QRCode::renderQRCode($url) . '<hr/></div>';
            }
        }
        return '';
    }
}
