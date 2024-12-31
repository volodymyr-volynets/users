<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Notification;

use Numbers\Backend\System\Modules\Model\Module\Features;
use Numbers\Backend\System\Modules\Model\Notifications;
use Numbers\Users\Users\Model\Users;

class SMSSender extends Sender
{
    /**
     * Notify single user
     *
     * @param string $notification_code
     * @param int|null $user_id
     *		0|null - no user
     * @param int|null $phone
     * @param array $options
     *		replace
     *			subject
     *			body
     *		subject
     *		body
     *		important
     *		from_phone
     * @return array
     */
    public static function SMSSingleUser(string $notification_code, ?int $user_id, ?int $phone = null, array $options = []): array
    {
        // cache notification
        $notification_name = 'Direct SMS';
        if (!empty($options['subject'])) {
            self::$cached_notifications[$notification_code]['sm_notification_subject'] = $options['subject'];
            self::$cached_notifications[$notification_code]['sm_notification_body'] = $options['body'] ?? '';
            self::$cached_notifications[$notification_code]['sm_notification_important'] = $options['important'] ?? false;
        } elseif (!isset(self::$cached_notifications[$notification_code])) {
            $query = Features::queryBuilderStatic()->select();
            $query->join('LEFT', new Notifications(), 'b', 'ON', [
                ['OR', ['a.sm_feature_code', '=', 'b.sm_notification_code', true], false],
                ['OR', ['a.sm_feature_common_notification_feature_code', '=', 'b.sm_notification_code', true], false]
            ]);
            $query->where('AND', ['a.sm_feature_inactive', '=', 0]);
            $query->where('AND', ['b.sm_notification_inactive', '=', 0]);
            $query->where('AND', ['a.sm_feature_code', '=', $notification_code]);
            $data = $query->query();
            self::$cached_notifications[$notification_code] = $data['rows'][0] ?? false;
            $notification_name = $data['rows'][0]['sm_feature_name'] ?? '';
        }
        // return if no notification found
        if (empty(self::$cached_notifications[$notification_code])) {
            return ['success' => false, 'error' => ['Notification not found!']];
        }
        // return if no user nor phone
        if (empty($user_id) && empty($phone)) {
            return ['success' => false, 'error' => ['You must provide phone or user #!']];
        }
        // preload email from user
        if (!empty($user_id)) {
            $user = Users::loadByIdStatic($user_id);
            if (empty($phone)) {
                $phone = $user['um_user_numeric_phone'];
            }
            // we might as well preset replaces
            $replaces = [
                'um_user_email' => '[Email]',
                'um_user_name' => '[Name]',
            ];
            foreach (['body', 'subject'] as $v) {
                if (empty($options['replace'][$v])) {
                    continue;
                }
                foreach ($replaces as $k2 => $v2) {
                    if (array_key_exists($v2, $options['replace'][$v]) && !isset($options['replace'][$v][$v2])) {
                        $options['replace'][$v][$v2] = $user[$k2];
                    }
                }
            }
        }
        // run through translations
        $subject = i18n(null, self::$cached_notifications[$notification_code]['sm_notification_subject'], ['replace' => $options['replace']['subject'] ?? null]);
        $subject = strip_tags2($subject); // a must
        // SMS template
        if (!empty(self::$cached_notifications[$notification_code]['sm_notification_email_model_code'])) {
            $form = \Factory::model(self::$cached_notifications[$notification_code]['sm_notification_email_model_code'], false, [$options['form']]);
            $body = $form->render();
            $bytea = true;
        } else {
            $body = i18n(null, self::$cached_notifications[$notification_code]['sm_notification_body'], ['replace' => $options['replace']['body'] ?? null]);
            $body = nl2br($body, true);
            $bytea = false;
        }
        // log notification
        $notificatio_data = [
            'notification_code' => $notification_code,
            'user_id' => $user_id,
            'email' => null,
            'phone' => $phone,
            'subject' => $subject,
            'body' => $body,
            'bytea' => $bytea,
            'from_email' => \Application::get('flag.global.sms.delivery.from'),
            'from_name' => \Application::get('flag.global.sms.delivery.name'),
            'important' => self::$cached_notifications[$notification_code]['sm_notification_important']
        ];
        self::$notification_log[] = $notificatio_data;
        $notificatio_data['body'] = substr(trim(strip_tags($notificatio_data['body'])), 0, 250);
        if (!empty($phone)) {
            $send_options = [
                'to' => $phone,
                'message' => $body,
                'important' => self::$cached_notifications[$notification_code]['sm_notification_important'] ?? false,
                // other fields
                'user_id' => $user_id,
                'notification_code' => $notification_code,
                'notification_name' => $notification_name,
                'notification_data' => $notificatio_data
            ];
            return \SMS::send($send_options);
        } else {
            return ['success' => true, 'error' => []];
        }
    }
}
