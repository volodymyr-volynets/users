<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

use Object\Import;

class Notifications extends Import
{
    public $data = [
        'features' => [
            'options' => [
                'pk' => ['sm_feature_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_PASSWORD_CHANGED',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Password Changed',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_TENANT_CONFIRMATION',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Tenant Confirmation',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_TENANT_CONFIRMATION2',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Tenant Confirmation (Email)',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_RESET_PASSWORD',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Reset Password',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_USERS_CHANGED',
                    'sm_feature_type' => 20,
                    'sm_feature_name' => 'U/M Email Users Record Changed',
                    'sm_feature_icon' => 'fas fa-users',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_common_notification_feature_code' => 'SM::EMAIL_COMMON_RECORD_CHANGE',
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_SEND_MESSAGE',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Send Message',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_NEW_IP_LOGIN',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email New IP Login',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_REGISTRATION_SIMPLE',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Registration (Simple)',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::EMAIL_INVITE_SIMPLE',
                    'sm_feature_type' => 21,
                    'sm_feature_name' => 'U/M Email Invite (Simple)',
                    'sm_feature_icon' => 'far fa-envelope',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'UM',
                    'sm_feature_code' => 'UM::SMS_INVITE_SIMPLE',
                    'sm_feature_type' => 26,
                    'sm_feature_name' => 'U/M SMS Invite (Simple)',
                    'sm_feature_icon' => 'fas fa-sms',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
            ]
        ],
        'notifications' => [
            'options' => [
                'pk' => ['sm_notification_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Notifications',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_notification_code' => 'UM::EMAIL_PASSWORD_CHANGED',
                    'sm_notification_name' => 'U/M Email Password Changed',
                    'sm_notification_subject' => 'Your Password Has Changed',
                    'sm_notification_body' => 'Hello [Name],

We wanted to let you know that your password was changed.

If you did not perform this action, you can recover access by entering [Email] into the form at [Password_Reset_Url].

Please do not reply to this email.

Thank you!',
                    'sm_notification_important' => 1,
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_TENANT_CONFIRMATION2',
                    'sm_notification_name' => 'U/M Email Tenant Confirmation (Emails)',
                    'sm_notification_subject' => 'Tenant Registration Confirmation',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\Email\TenantConfirmEmail',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_TENANT_CONFIRMATION',
                    'sm_notification_name' => 'U/M Email Tenant Confirmation',
                    'sm_notification_subject' => 'Tenant Registration Confirmation',
                    'sm_notification_body' => 'Thank you for registering new tenant,

<a href="[URL]" target="_parent">Click here</a> to continue the registration process.

Or paste this into a browser:

[URL]

Please note that this link is only active for [Token_Valid_Hours] hours after receipt. After this time limit has expired the token will not work and you will need to resubmit the registration request.

Thank you!',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_RESET_PASSWORD',
                    'sm_notification_name' => 'U/M Email Reset Password',
                    'sm_notification_subject' => 'Password Reset Request',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\Email\PasswordReset',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_SEND_MESSAGE',
                    'sm_notification_name' => 'U/M Email Send Messsage',
                    'sm_notification_subject' => '',
                    'sm_notification_body' => '',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_NEW_IP_LOGIN',
                    'sm_notification_name' => 'U/M Email New IP Login',
                    'sm_notification_subject' => 'Login From New IP Address',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\Email\NewIPLogin',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_REGISTRATION_SIMPLE',
                    'sm_notification_name' => 'U/M Email Registration (Simple)',
                    'sm_notification_subject' => 'New Registration',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\Email\UsersRegisterSimple',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::EMAIL_INVITE_SIMPLE',
                    'sm_notification_name' => 'U/M Email Invite (Simple)',
                    'sm_notification_subject' => '[message_type]: [occasion]',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\Email\UsersInviteSimple',
                    'sm_notification_inactive' => 0
                ],
                [
                    'sm_notification_code' => 'UM::SMS_INVITE_SIMPLE',
                    'sm_notification_name' => 'U/M SMS Invite (Simple)',
                    'sm_notification_subject' => '[message_type]: [occasion]',
                    'sm_notification_body' => '',
                    'sm_notification_important' => 1,
                    'sm_notification_email_model_code' => '\Numbers\Users\Users\SMS\UsersInviteSimple',
                    'sm_notification_inactive' => 0
                ],
            ]
        ],
    ];
}
