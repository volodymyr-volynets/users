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

use Helper\Ob;
use Numbers\Backend\System\Modules\Model\Module\Features;
use Numbers\Backend\System\Modules\Model\Notifications;
use Numbers\Users\Users\DataSource\Login;
use Numbers\Users\Users\Model\Message\Bodies;
use Numbers\Users\Users\Model\Message\Headers;
use Numbers\Users\Users\Model\Message\Recipients;
use Numbers\Users\Users\Model\Message\Sender\Common;
use Numbers\Users\Users\Model\Message\Sender\Organizations;
use Numbers\Users\Users\Model\Users;
use Object\Keywords\Extractor;
use Numbers\Users\Users\Model\UsersAR;

class Sender
{
    /**
     * Cached notifications
     *
     * @var array
     */
    public static $cached_notifications = [];

    /**
     * Notification log
     *
     * @var array
     */
    protected static $notification_log = [];

    /**
     * Cached notification bodies
     *
     * @var array
     */
    protected static $cached_notification_bodies = [];

    /**
     * Cached from(s)
     *
     * @var array
     */
    protected static $cached_froms = [];

    /**
     * Notify single user
     *
     * @param string $notification_code
     * @param int|null $user_id
     *		0|null - no user
     * @param string $email
     * @param array $options
     *		replace
     *			subject
     *			body
     *		subject
     *		body
     *		important
     *		from_email
     *		from_name
     * @return array
     */
    public static function notifySingleUser(string $notification_code, ?int $user_id, string $email = '', array $options = []): array
    {
        // cache notification
        $notification_name = 'Direct Notification';
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
        // return if no user nor email
        if (empty($user_id) && empty($email)) {
            return ['success' => false, 'error' => ['You must provide email or user #!']];
        }
        // preload email from user
        if (!empty($user_id)) {
            $user = Users::loadByIdStatic($user_id);
            if (empty($email)) {
                $email = $user['um_user_email'];
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
        // from
        $from = self::determineFromSettings(['organization_id' => \User::get('organization_id')]);
        // email template
        $attachments = [];
        $cc = [];
        if (!empty($options['cc'])) {
            $cc = $options['cc'];
        }
        if (!empty(self::$cached_notifications[$notification_code]['sm_notification_email_model_code'])) {
            $form = \Factory::model(self::$cached_notifications[$notification_code]['sm_notification_email_model_code'], false, [$options['form']]);
            $template = Ob::require(\Application::get(['application', 'path_full']) . 'Layout' . DIRECTORY_SEPARATOR . \Application::get('application.layout.email') . '.html');
            $body = str_replace([
                '<!-- [numbers: document title] -->',
                '<!-- [numbers: document body] -->'
            ], [
                '<title>' . ($options['title'] ?? '') . '</title>',
                $form->render()
            ], $template);
            $bytea = true;
            if (method_exists($form, 'attachments')) {
                $attachments = $form->attachments($form->form_object);
            }
            if (method_exists($form, 'cc')) {
                $cc = $form->cc($form->form_object);
            }
        } elseif (!empty($options['calendar_invite'])) {
            if (!empty($options['calendar_invite']['original_date'])) {
                $calendar_invite_original = self::generateCalendarInvite(
                    $email,
                    $options['calendar_invite']['original_date'],
                    i18n(null, $options['calendar_invite']['title']['text'], ['replace' => $options['calendar_invite']['title']['replace'] ?? []]),
                    i18n(null, $options['calendar_invite']['location']['text'], ['replace' => $options['calendar_invite']['location']['replace'] ?? []]),
                    i18n(null, $options['calendar_invite']['summary']['text'], ['replace' => $options['calendar_invite']['summary']['replace'] ?? []]),
                    $options['calendar_invite']['id'],
                    true,
                    $options['from_email'] ?? $from['data']['email']
                );
            }
            $body = self::generateCalendarInvite(
                $email,
                $options['calendar_invite']['date'],
                i18n(null, $options['calendar_invite']['title']['text'], ['replace' => $options['calendar_invite']['title']['replace'] ?? []]),
                i18n(null, $options['calendar_invite']['location']['text'], ['replace' => $options['calendar_invite']['location']['replace'] ?? []]),
                i18n(null, $options['calendar_invite']['summary']['text'], ['replace' => $options['calendar_invite']['summary']['replace'] ?? []]),
                $options['calendar_invite']['id'],
                false,
                $options['from_email'] ?? $from['data']['email']
            );
            $calendar_invite = true;
            $bytea = false;
        } else {
            $body = i18n(null, self::$cached_notifications[$notification_code]['sm_notification_body'], ['replace' => $options['replace']['body'] ?? null]);
            $body = nl2br($body, true);
            $bytea = false;
        }
        // log notification
        $notificatio_data = [
            'notification_code' => $notification_code,
            'user_id' => $user_id,
            'email' => $email,
            'subject' => $subject,
            'body' => $body,
            'bytea' => $bytea,
            'from_email' => $options['from_email'] ?? $from['data']['email'] ?? null,
            'from_name' => $options['from_name'] ?? $from['data']['name'] ?? null,
            'important' => self::$cached_notifications[$notification_code]['sm_notification_important']
        ];
        self::$notification_log[] = $notificatio_data;
        $notificatio_data['body'] = substr(trim(strip_tags($notificatio_data['body'])), 0, 250);
        if (!empty($email)) {
            $send_options = [
                'to' => $email,
                'subject' => $subject,
                'message' => $body,
                'important' => self::$cached_notifications[$notification_code]['sm_notification_important'] ?? false,
                'calendar_invite' => !empty($calendar_invite),
                'calendar_message' => $body,
                'attachments' => $attachments,
                // other fields
                'user_id' => $user_id,
                'notification_code' => $notification_code,
                'notification_name' => $notification_name,
                'notification_data' => $notificatio_data
            ];
            if (!empty($cc)) {
                $send_options['cc'] = $cc;
            }
            if ($from['success']) {
                $send_options['from']['email'] = $options['from_email'] ?? $from['data']['email'];
                $send_options['from']['name'] = $options['from_name'] ?? $from['data']['name'];
            }
            if (!empty($calendar_invite_original)) {
                $send_options2 = $send_options;
                $send_options2['calendar_message'] = $calendar_invite_original;
                \Mail::send($send_options2);
            }
            return \Mail::send($send_options);
        } else {
            return ['success' => true, 'error' => []];
        }
    }

    /**
     * Determine from settings
     *
     * @param array $options
     *		organization_id
     * @return array
     */
    public static function determineFromSettings(array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'data' => [
                'email' => null,
                'name' => null
            ]
        ];
        // see if we cached values
        $cache_id = sha1(serialize($options));
        if (isset(self::$cached_froms[$cache_id])) {
            return self::$cached_froms[$cache_id];
        }
        // load from for particular organization
        if (!empty($options['organization_id'])) {
            $data = Organizations::getStatic([
                'where' => [
                    'um_senderorg_organization_id' => $options['organization_id']
                ],
                'pk' => null
            ]);
            if (!empty($data[0])) {
                $result['success'] = true;
                $result['data']['email'] = $data[0]['um_senderorg_from_email'];
                $result['data']['name'] = $data[0]['um_senderorg_from_name'];
                goto success;
            }
        }
        // default from
        $data = Common::getStatic(['pk' => null]);
        if (!empty($data[0])) {
            $result['success'] = true;
            $result['data']['email'] = $data[0]['um_sendercmn_from_email'];
            $result['data']['name'] = $data[0]['um_sendercmn_from_name'];
            goto success;
        }
        // if we got here means we have to grab from from config
        $data = \Application::get('flag.global.mail.from');
        if (!empty($data['email'])) {
            $result['success'] = true;
            $result['data']['email'] = $data['email'];
            $result['data']['name'] = $data['name'] ?? null;
            goto success;
        }
        $result['error'] = 'Cound not determine from sender!';
        success:
                self::$cached_froms[$cache_id] = $result;
        return $result;
    }

    /**
     * Store single notification
     *
     * @param array $data
     *		notification_code
     *		user_id
     *		email
     *		subject
     *		body
     * @return array
     */
    private function storeSingleNotification(array $data): array
    {
        $result = [
            'success' => false,
            'error' => []
        ];
        // header
        $header = [
            'um_mesheader_type_id' => 10,
            'um_mesheader_notification_code' => $data['notification_code'],
            'um_mesheader_important' => $data['important'],
            'um_mesheader_from_email' => $data['from_email'] ?? '',
            'um_mesheader_from_name' => $data['from_name'] ?? '',
            'um_mesheader_subject' => $data['subject'],
            'um_mesheader_body_id' => null,
            'um_mesheader_keywords' => null
        ];
        $keywords = $data['subject'] . ' ' . $data['from_name'];
        // body
        if (!empty($data['body'])) {
            $body_hash = sha1($data['body']);
            if (!empty(self::$cached_notification_bodies[$body_hash])) {
                $header['um_mesheader_body_id'] = self::$cached_notification_bodies[$body_hash];
            } else {
                if (!empty($data['bytea'])) {
                    $crypt = new \Crypt();
                    $bytea = $crypt->compress($data['body']);
                    $body = strip_tags2($data['body']);
                } else {
                    $bytea = null;
                    $body = $data['body'];
                }
                $body_result = Bodies::collectionStatic()->merge([
                    'um_mesbody_type_id' => 20,
                    'um_mesbody_body' => $body,
                    'um_mesbody_bytea;;bytea' => $bytea,
                ]);
                if (!$body_result['success']) {
                    $result['error'][] = 'Could not store message body!';
                    return $result;
                }
                $header['um_mesheader_body_id'] = self::$cached_notification_bodies[$body_hash] = $body_result['new_serials']['um_mesbody_id'];
            }
            $keywords .= ' ' . strip_tags2($data['body']);
        }
        // process keywords
        $keywords = Extractor::extract($keywords);
        if (!empty($keywords)) {
            $header['um_mesheader_keywords'] = implode(' ', array_keys($keywords));
        }
        // store header
        $header_result = Headers::collectionStatic()->merge($header);
        if (!$header_result['success']) {
            $result['error'][] = 'Could not store message header!';
            return $result;
        }
        // store recipient
        $recipient_result = Recipients::collectionStatic()->merge([
            'um_mesrecip_message_id' => $header_result['new_serials']['um_mesheader_id'],
            'um_mesrecip_type_id' => 10,
            'um_mesrecip_user_id' => $data['user_id'],
            'um_mesrecip_user_email' => $data['email'] ?? null,
            'um_mesrecip_user_phone' => $data['phone'] ?? null,
        ]);
        if (!$recipient_result['success']) {
            $result['error'][] = 'Could not store message recipient!';
            return $result;
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Destroy
     */
    public function destroy()
    {
        if (empty(self::$notification_log)) {
            return;
        }
        // create a transaction
        $model = new Headers();
        $model->db_object->begin();
        foreach (self::$notification_log as $v) {
            $temp = $this->storeSingleNotification($v);
            if (!$temp['success']) {
                $model->db_object->rollback();
                return;
            }
        }
        $model->db_object->commit();
    }

    /**
     * Determine users
     *
     * @param string $notification_code
     * @param int|array type $users
     * @param int|array $organizations
     * @param int $module_id
     * @return array
     */
    public static function determineUsers(string $notification_code, $users = null, $organizations = null, $module_id = null): array
    {
        $users_ids = \Numbers\Users\Users\DataSource\User\Notifications::getStatic([
            'where' => [
                'selected_organizations' => $organizations,
                'module_id' => $module_id,
                'feature_code' => $notification_code,
                'user_ids' => $users,
            ]
        ]);
        // load users
        $all_users = [];
        if (!empty($users_ids)) {
            $all_users = Login::getStatic([
                'where' => [
                    'user_ids' => array_keys($users_ids),
                    'skip_login_enabled' => true,
                ],
                'pk' => ['id'],
                'single_row' => false,
                'cache' => false,
            ]);
            if (!empty($all_users)) {
                \User::$cached_users = array_merge_hard(\User::$cached_users, $all_users);
                // filter
                foreach ($all_users as $k => $v) {
                    if (empty($k)) {
                        continue;
                    }
                    \User::setUser($k);
                    if (!\Can::userNotificationExists($notification_code, $module_id)) {
                        unset($all_users[$k]);
                    }
                }
                \User::setUser(null);
            }
        }
        return array_keys($all_users);
    }

    /**
     * Generate calendar invite
     *
     * @param string $email
     * @param string $date
     * @param string $title
     * @param string $location
     * @param string $summary
     * @param string $id
     * @param bool $delete
     * @return string
     */
    public static function generateCalendarInvite(string $email, string $date, string $title, string $location, string $summary, string $id, bool $delete = false, string $from = ''): string
    {
        $date = gmdate("Ymd\THis\Z", strtotime($date));
        $host = \Request::host(['name_only' => true]);
        $uid =  $id . '@' . $host;
        $result = "BEGIN:VCALENDAR\r\n";
        $result .= "PRODID:-//" . $host . "//NONSGML Ical//\r\n";
        $result .= "VERSION:2.0\r\n";
        $result .= "METHOD:" . ($delete ? 'CANCEL' : 'REQUEST') . "\r\n";
        $result .= "BEGIN:VEVENT\r\n";
        $result .= "UID:" . $uid . "\r\n";
        $result .= "ATTENDEE:MAILTO:" . $email . "\r\n";
        $result .= "ORGANIZER:MAILTO:" . $from . "\r\n";
        $result .= "DESCRIPTION:" . wordwrap(addcslashes($summary, "\n\\,;"), 75, "\r\n ", 1) . "\r\n";
        $result .= "DTSTART:" . $date . "\r\n";
        $result .= "DTSTAMP:" . $date . "\r\n";
        if (!$delete) {
            $result .= "STATUS:CONFIRMED\r\n";
            $result .= "DURATION:PT1H\r\n";
        } else {
            $result .= "STATUS:CANCELLED\r\n";
        }
        $result .= "LOCATION: {$location}\r\n";
        $result .= "SEQUENCE:" . ($_SERVER['REQUEST_TIME']) . "\r\n";
        $result .= "SUMMARY:" . wordwrap(addcslashes($title, "\n\\,;"), 75, "\r\n ", 1) . "\r\n";
        $result .= "URL:" . \Request::host() . "\r\n";
        $result .= "CLASS:PUBLIC\r\n";
        $result .= "END:VEVENT\r\n";
        $result .= "END:VCALENDAR\r\n";
        return $result;
    }

    /**
     * Prepare list of users from emails
     *
     * @param string $emails
     * @return array
     */
    public static function prepareListOfEmails(string $emails): array
    {
        $result = [];
        $emails = str_replace(';', ',', $emails);
        $user_ar = new UsersAR();
        foreach (explode(',', $emails) as $v) {
            // if we have user # we fetch email
            if (is_numeric($v)) {
                $user = $user_ar->loadById((int) $v);
                if (!$user || !$user->um_user_email) {
                    continue;
                }
                $result[$user->um_user_email . '-' . $user->um_user_id] = [
                    'um_user_id' => $user->um_user_id,
                    'um_user_email' => $user->um_user_email,
                ];
            } else {
                // we find user by email
                $email = trim(strtolower($v));
                $user = $user_ar->get([
                    'where' => [
                        'um_user_tenant_id' => \Tenant::id(),
                        'um_user_email' => $email,
                    ],
                    'single_row' => true,
                ]);
                $result[$email . '-' . $user->um_user_id ?? 0] = [
                    'um_user_id' => $user->um_user_id ?? 0,
                    'um_user_email' => $email,
                ];
            }
        }
        return $result;
    }
}
