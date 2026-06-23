<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Event;

use Object\Event\EventSubscriberBase;
use Helper\IPDecoder;
use Numbers\Users\Users\Helper\User\Notifications;
use Numbers\Users\Users\Model\User\Logins;
use Numbers\Users\Users\Model\User\PIIs;
use Numbers\Users\Users\Model\Users;

class UserLoginSubscriber extends EventSubscriberBase
{
    public $code = "UM::USER_LOGIN_SUBSCRIBER";
    public $name = "U/M User Login (Subscriber)";

    /**
     * Execute
     *
     * @param string $request_id
     * @param string $event_code
     * @param mixed $data
     * @param array $options
     * @return array
     */
    public function execute(string $request_id, string $event_code, mixed $data, array $options = []): array
    {
        $ip_found = Logins::getStatic([
            'where' => [
                'um_usrlogin_tenant_id' => $data['tenant_id'],
                'um_usrlogin_user_id' => $data['user_id'],
                'um_usrlogin_ip_address' => $data['user_ip'],
                'um_usrlogin_inactive' => 0,
            ],
            'pk' => null,
            'limit' => 1,
            'signle_row' => true
        ]);
        $new = 0;
        if (empty($ip_found)) {
            $new = 1;
        }
        // decode
        $ip_decoder = new IPDecoder();
        $ip_data = $ip_decoder->get($data['user_ip']);
        $result = Logins::collectionStatic()->merge([
            'um_usrlogin_tenant_id' => $data['tenant_id'],
            'um_usrlogin_user_id' => $data['user_id'],
            'um_usrlogin_ip_address' => $data['user_ip'],
            'um_usrlogin_ip_description' => $ip_data['data']['ip_description'] ?? 'Unknown',
            'um_usrlogin_ip_provider' => $ip_data['data']['ip_provider'] ?? 'Unknown',
            'um_usrlogin_authorization_type' => $data['authorization_type'] ?? 'Unknown',
            'um_usrlogin_ip_new' => $new,
            'um_usrlogin_inactive' => 0
        ]);
        if (!$result['success']) {
            return $result;
        }
        // update users record
        $users_result = Users::collectionStatic()->merge([
            'um_user_tenant_id' => $data['tenant_id'],
            'um_user_id' => $data['user_id'],
            'um_user_ip' => $data['user_ip'],
        ], [
            'skip_optimistic_lock' => true,
        ]);
        if (!$users_result['success']) {
            return $users_result;
        }
        // update pii record
        $pii_result = PIIs::collectionStatic()->merge([
            'um_usrpii_tenant_id' => $data['tenant_id'],
            'um_usrpii_user_id' => $data['user_id'],
            'um_usrpii_datetime_of_last_login' => \Format::now('timestamp'),
            'um_usrpii_last_login_in_days' => 0,
        ]);
        if (!$pii_result['success']) {
            return $pii_result;
        }
        // send notification if new IP
        if ($new) {
            Notifications::sendNewIPLoginEmail($result['new_serials']['um_usrlogin_id']);
        }
        return ['success' => true, 'error' => [], 'user_id' => $data['user_id']];
    }
}
