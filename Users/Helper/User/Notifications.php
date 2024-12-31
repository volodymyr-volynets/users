<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\User;

use Numbers\Users\Users\Helper\Notification\Sender;
use Numbers\Users\Users\Model\User\Logins;
use Numbers\Users\Users\Helper\Notification\SMSSender;

class Notifications
{
    /**
     * Send password change email
     *
     * @param int $user_id
     */
    public static function sendPasswordChangeEmail(int $user_id)
    {
        return Sender::notifySingleUser('UM::EMAIL_PASSWORD_CHANGED', $user_id, '', [
            'replace' => [
                'body' => [
                    '[Name]' => null,
                    '[Email]' => null,
                    '[Password_Reset_Url]' => \Request::host() . 'Numbers/Users/Users/Controller/Password/Reset'
                ]
            ]
        ]);
    }

    /**
     * Send password reset email
     *
     * @param int $um_user_id
     */
    public static function sendPasswordResetEmail(int $um_user_id)
    {
        return Sender::notifySingleUser('UM::EMAIL_RESET_PASSWORD', $um_user_id, '', [
            'form' => [
                'input' => [
                    'um_user_id' => $um_user_id
                ]
            ]
        ]);
    }

    /**
     * Send new IP login email
     *
     * @param int $um_usrlogin_id
     */
    public static function sendNewIPLoginEmail(int $um_usrlogin_id)
    {
        $login = Logins::getStatic([
            'where' => [
                'um_usrlogin_tenant_id' => \Tenant::id(),
                'um_usrlogin_id' => $um_usrlogin_id,
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        $input = $login + ['um_user_id' => $login['um_usrlogin_user_id']];
        return Sender::notifySingleUser('UM::EMAIL_NEW_IP_LOGIN', $login['um_usrlogin_user_id'], '', [
            'form' => [
                'input' => $input
            ]
        ]);
    }

    /**
     * Send registration (simple) email
     *
     * @param int $um_user_id
     * @param string string $um_user_login_password
     */
    public static function sendRegistrationSimpleEmail(int $um_user_id, string $um_user_login_password): array
    {
        return Sender::notifySingleUser('UM::EMAIL_REGISTRATION_SIMPLE', $um_user_id, '', [
            'form' => [
                'input' => [
                    'um_user_id' => $um_user_id,
                    '__um_user_login_password' => $um_user_login_password,
                ]
            ]
        ]);
    }

    /**
     * Send invite (simple) email
     *
     * @param int $um_user_id
     * @param string $message
     * @param string $occasion
     * @param string $success_url
     * @return array
     */
    public static function sendInviteSimpleEmail(int $um_user_id, string $message, string $occasion, string $success_url): array
    {
        return Sender::notifySingleUser('UM::EMAIL_INVITE_SIMPLE', $um_user_id, '', [
            'form' => [
                'input' => [
                    'um_user_id' => $um_user_id,
                    'message' => $message,
                    'success_url' => $success_url,
                ],
            ],
            'replace' => [
                'subject' => [
                    '[message_type]' => loc('NF.Form.NewInvite', 'New Invite'),
                    '[occasion]' => $occasion,
                ],
            ],
        ]);
    }

    /**
     * Send invite (simple) SMS
     *
     * @param int $um_user_id
     * @param string $message
     * @param string $occasion
     * @param string $success_url
     * @return array
     */
    public static function sendInviteSimpleSMS(int $um_user_id, string $message, string $occasion, string $success_url): array
    {
        return SMSSender::SMSSingleUser('UM::SMS_INVITE_SIMPLE', $um_user_id, null, [
            'form' => [
                'input' => [
                    'um_user_id' => $um_user_id,
                    'message' => $message,
                    'success_url' => $success_url,
                ],
            ],
            'replace' => [
                'subject' => [
                    '[message_type]' => loc('NF.Form.NewInvite', 'New Invite'),
                    '[occasion]' => $occasion,
                ],
            ],
        ]);
    }
}
