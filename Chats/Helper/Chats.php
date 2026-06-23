<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Helper;

use Numbers\Users\Chats\Model\Chat\Sessions;
use Numbers\Users\Chats\Model\Chat\Users as ChatUsers;
use Numbers\Users\Chats\Model\Chat\UsersAR as ChatUsersAR;
use Numbers\Users\Chats\API\V1\C5\ChatMessages as ChatMessagesAPI;
use Numbers\Users\Chats\Model\Chat\Messages as ChatMessages;
use Numbers\Users\Users\Model\UsersAR;
use Numbers\Users\Chats\Model\Chat\Messages as ChatMessagesModel;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;
use Numbers\Users\Chats\Model\Chats as ChatsModel;
use Numbers\Users\Chats\Model\Chat\Invites;
use Numbers\Users\Chats\Model\Chat\Users;
use Numbers\Users\Users\Helper\Alerts as UserAlerts;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Users\Users\Helper\User\Personalizations;

class Chats
{
    /**
     * Create (helper)
     *
     * @param array $options
     * @return array{c5_chat_uuid: null, error: array, success: bool|string[]}
     */
    public static function create(array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'c5_chat_uuid' => null,
            'c5_chat_id' => null,
        ];
        $model = new ChatsModel();
        $model->db_object->begin();
        $c5_chat_uuid = \Db::uuidTenanted();
        $c5_chat_user_count = !empty($options['um_user_id']) ? 1 : 0;
        $c5_chat_session_count = !empty($options['um_user_id']) ? 0 : 1;
        $collection_result = $model->collection()->merge([
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_uuid' => $c5_chat_uuid,
            'c5_chat_language_code' => $options['c5_chat_language_code'] ?? 'eng',
            'c5_chat_user_count' => $c5_chat_user_count,
            'c5_chat_session_count' => $c5_chat_session_count,
            'c5_chat_message_count' => 0,
            'c5_chat_shareable_link_hash' => null,
            'c5_chat_updated_timestamp' => \Format::now('timestamp'),
            'c5_chat_c5_chatchannel_code' => $options['c5_chatchannel_code'] ?? null,
            'c5_chat_c5_chattype_code' => $options['c5_chattype_code'] ?? 'GENERAL',
            // AI integration, genera new sequence if agent is set
            'c5_chat_ai_agent_code' => $options['c5_chat_ai_agent_code'] ?? null,
            'c5_chat_ai_conversation_code' => !empty($options['c5_chat_ai_agent_code']) ? Sequence::nextval('DEFAULT', 'CON', 'AI', \Tenant::id(), true) : null,
            // welcome
            'c5_chat_provide_welcome' => !empty($options['c5_chat_provide_welcome']) ? 1 : 0,
            // other
            'c5_chat_inactive' => 0
        ]);
        if (!$collection_result['success']) {
            $model->db_object->rollback();
            $result['error'] = array_merge($result['error'], $collection_result['error']);
            return $result;
        }
        if ($c5_chat_user_count) {
            // fetch personalization
            $personalization = [];
            if (!empty($options['um_user_id'])) {
                $personalization = Personalizations::getStatic($options['um_user_id'], 'C5');
            }
            // save
            $collection_user_result = ChatUsers::collectionStatic()->merge([
                'c5_chatuser_tenant_id' => \Tenant::id(),
                'c5_chatuser_c5_chat_id' => $collection_result['new_serials']['c5_chat_id'],
                'c5_chatuser_um_user_id' => $options['um_user_id'],
                'c5_chatuser_um_user_name' => $personalization['um_user_name'] ?? $options['um_user_name'] ?? \User::get('name'),
                'c5_chatuser_avatar_colors' => $personalization['avatar_colors'] ?? Colors::getColorsAndInitials($options['um_user_name'] ?? \User::get('name') ?? 'User'),
                'c5_chatuser_photo_file_id' => $personalization['photo_file_id'] ?? null,
                'c5_chatuser_photo_file_url' => $personalization['photo_file_url'] ?? null,
                'c5_chatuser_icon' => '',
                'c5_chatuser_message_count' => 0,
                'c5_chatuser_no_data_model_role_code' => 'user',
                'c5_chatuser_is_ai_assistant' => 0,
                'c5_chatuser_ai_model_code' => '',
                'c5_chatuser_inactive' => 0
            ]);
            if (!$collection_user_result['success']) {
                $model->db_object->rollback();
                $result['error'] = array_merge($result['error'], $collection_user_result['error']);
                return $result;
            }
        }
        if (!empty($options['um_user_ids'])) {
            //um_user_ids
            $users = \Numbers\Users\Users\Model\Users::getStatic([
                'where' => [
                    'um_user_tenant_id' => \Tenant::id(),
                    'um_user_id;IN' => $options['um_user_ids'],
                ],
                'columns' => [
                    'um_user_id',
                    'um_user_type_id',
                    'um_user_name',
                ],
                'orderby' => [
                    'um_user_name' => SORT_ASC,
                ],
                'pk' => ['um_user_id']
            ]);
            foreach ($users as $k => $v) {
                // fetch personalization
                $personalization = [];
                if (!empty($v['um_user_id'])) {
                    $personalization = Personalizations::getStatic($v['um_user_id'], 'C5');
                }
                // save
                $collection_user_result = ChatUsers::collectionStatic()->merge([
                    'c5_chatuser_tenant_id' => \Tenant::id(),
                    'c5_chatuser_c5_chat_id' => $collection_result['new_serials']['c5_chat_id'],
                    'c5_chatuser_um_user_id' => $v['um_user_id'],
                    'c5_chatuser_um_user_name' => $personalization['um_user_name'] ?? $v['um_user_name'],
                    'c5_chatuser_avatar_colors' => $personalization['avatar_colors'] ?? Colors::getColorsAndInitials($v['um_user_name']),
                    'c5_chatuser_photo_file_id' => $personalization['photo_file_id'] ?? null,
                    'c5_chatuser_photo_file_url' => $personalization['photo_file_url'] ?? null,
                    'c5_chatuser_icon' => '',
                    'c5_chatuser_message_count' => 0,
                    'c5_chatuser_no_data_model_role_code' => $v['um_user_type_id'] == 50 ? 'assistant' : 'user',
                    'c5_chatuser_is_ai_assistant' => $v['um_user_type_id'] == 50 ? 1 : 0,
                    'c5_chatuser_ai_model_code' => '',
                    'c5_chatuser_inactive' => 0
                ]);
                if (!$collection_user_result['success']) {
                    $model->db_object->rollback();
                    $result['error'] = array_merge($result['error'], $collection_user_result['error']);
                    return $result;
                }
            }
        }
        if ($c5_chat_session_count) {
            $collection_session_result = Sessions::collectionStatic()->merge([
                'c5_chatsession_tenant_id' => \Tenant::id(),
                'c5_chatsession_c5_chat_id' => $collection_result['new_serials']['c5_chat_id'],
                'c5_chatsession_sm_session_id' => $options['sm_session_id'],
                'c5_chatsession_um_user_name' => $options['um_user_name'] ?? 'Anonymous',
                'c5_chatsession_avatar_colors' => Colors::getColorsAndInitials($options['um_user_name'] ?? 'Anonymous'),
                'c5_chatsession_inactive' => 0,
            ]);
            if (!$collection_session_result['success']) {
                $model->db_object->rollback();
                $result['error'] = array_merge($result['error'], $collection_session_result['error']);
                return $result;
            }
        }
        $model->db_object->commit();
        $result['success'] = true;
        $result['c5_chat_uuid'] = $c5_chat_uuid;
        $result['c5_chat_id'] = $collection_result['new_serials']['c5_chat_id'];
        return $result;
    }

    /**
      * Acknowledgement (helper)
      *
      * @param array $options
      * @return array{c5_chat_uuid: null, error: array, success: bool|string[]}
      */
    public static function acknowledgement(array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'c5_chatmessage_id' => null,
        ];
        // if we create a thread
        $thread_addition = [];
        if (!empty($options['c5_chatmessage_thread_is_new'])) {
            $thread_addition['c5_chatmessage_thread_c5_chatmessage_id'] = $options['c5_chatmessage_id'];
        }
        // post message
        $new_message_result = \API::runLocal(ChatMessagesAPI::class, 'postPostMessage', array_merge([
            'c5_chatmessage_tenant_id' => $options['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
            'c5_chatmessage_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
            'c5_chatmessage_um_user_id' => null,
            'c5_chatmessage_sm_session_id' => null,
            'c5_chatmessage_um_user_name' => 'Backend',
            'c5_chatmessage_no_data_model_role_code' => 'acknowledgement',
            'c5_chatmessage_is_ai_assistant' => 0,
            'c5_chatmessage_language_code' => $options['c5_chatmessage_language_code'] ?? 'eng',
            'c5_chatmessage_message' => $options['c5_chatmessage_message'],
            'c5_chatmessage_is_form' => $options['c5_chatmessage_is_form'] ?? 0,
            'c5_chatmessage_form_settings_json' => $options['c5_chatmessage_form_settings_json'] ?? null,
            'c5_chatmessage_form_status_id' => $options['c5_chatmessage_form_status_id'] ?? null,
            'c5_chatmessage_form_result_json' => $options['c5_chatmessage_form_result_json'] ?? null,
            'c5_chatmessage_parent_c5_chatmessage_id' => $options['c5_chatmessage_parent_c5_chatmessage_id'] ?? null,
        ], $thread_addition));
        if (!$new_message_result['success']) {
            $result['error'] = array_merge($result['error'], $new_message_result['error']);
            return $result;
        }
        $result['success'] = true;
        $result['c5_chatmessage_id'] = $new_message_result['c5_chatmessage_id'];
        return $result;
    }

    /**
     * Acknowledge by assistant (helper)
     *
     * @param array $options
     * @return array{c5_chat_uuid: null, error: array, success: bool|string[]}
     */
    public static function acknowledgeByAssistant(array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'c5_chatmessage_id' => null,
        ];
        $chat_assistant = \Application::get('chat.assistant');
        if (empty($chat_assistant)) {
            throw new \Exception('Assistant is empty!');
        }
        $user = (new UsersAR())->loadIDByCode($chat_assistant['code'], null, ALL);
        $personalization = [];
        // create chat user
        if ($options['c5_chatmessage_no_data_model_role_code'] == 'assistant') {
            // fetch personalization
            if (!empty($user[0]['um_user_id'])) {
                $personalization = Personalizations::getStatic($user[0]['um_user_id'], 'C5');
            }
            // save
            $color = Colors::getColorsAndInitials($user[0]['um_user_name']);
            $chat_users_ar = new ChatUsersAR();
            $chat_user_result = $chat_users_ar->fill([
                'c5_chatuser_tenant_id' => $options['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
                'c5_chatuser_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
                'c5_chatuser_um_user_id' => $user[0]['um_user_id'],
                'c5_chatuser_um_user_name' => $personalization['um_user_name'] ?? $user[0]['um_user_name'],
                'c5_chatuser_icon' => '',
                'c5_chatuser_avatar_colors' => $personalization['avatar_colors'] ?? $color,
                'c5_chatuser_photo_file_id' => $personalization['photo_file_id'] ?? null,
                'c5_chatuser_photo_file_url' => $personalization['photo_file_url'] ?? null,
                'c5_chatuser_no_data_model_role_code' => 'assistant',
                'c5_chatuser_is_ai_assistant' => 1,
                'c5_chatuser_ai_model_code' => null,
                'c5_chatuser_inactive' => 0
            ])
            ->merge();
            if (!$chat_user_result['success']) {
                $result['error'] = array_merge($result['error'], $chat_user_result['error']);
                return $result;
            }
        }
        // if we create a thread
        $thread_addition = [];
        if (!empty($options['c5_chatmessage_thread_is_new'])) {
            $thread_addition['c5_chatmessage_thread_c5_chatmessage_id'] = $options['c5_chatmessage_id'];
        }
        // check if loading message exists
        $last_loading_result = \SQL2::queryStatic(null, '/Numbers/Users/Chats/SQL/LastLoadingMessages.object.sql', null, [
            'tenant_id' => \Tenant::id(),
            'chat_id' => $options['c5_chatmessage_c5_chat_id'],
        ]);
        if (!empty($last_loading_result['rows'])) {
            $result['success'] = true;
            $result['c5_chatmessage_id'] = $last_loading_result['rows'][0]['c5_chatmessage_id'];
            return $result;
        }
        // post message
        $new_message_result = \API::runLocal(ChatMessagesAPI::class, 'postPostMessage', array_merge([
            'c5_chatmessage_tenant_id' => $options['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
            'c5_chatmessage_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
            'c5_chatmessage_um_user_id' => $user[0]['um_user_id'],
            'c5_chatmessage_sm_session_id' => null,
            'c5_chatmessage_um_user_name' => $user[0]['um_user_name'],
            'c5_chatmessage_no_data_model_role_code' => $options['c5_chatmessage_no_data_model_role_code'] ?? 'assistant',
            'c5_chatmessage_is_ai_assistant' => ($options['c5_chatmessage_no_data_model_role_code'] ?? 'assistant') == 'assistant' ? 1 : 0,
            'c5_chatmessage_language_code' => $options['c5_chatmessage_language_code'] ?? 'eng',
            'c5_chatmessage_message' => $options['c5_chatmessage_message'],
            // flags for daemons
            'c5_chatmessage_is_new' => 0,
            'c5_chatmessage_thread_is_new' => 0,
            // loading
            'c5_chatmessage_is_loading' => $options['c5_chatmessage_is_loading'] ?? 0,
            'c5_chatmessage_is_image' => $options['c5_chatmessage_is_image'] ?? 0,
            'c5_chatmessage_image_settings_json' => $options['c5_chatmessage_image_settings_json'] ?? null,
            // signature and terms
            'c5_chatmessage_um_usrsign_id' => $personalization['um_usrsign_id'] ?? null,
            'c5_chatmessage_um_usrterm_id' => $personalization['um_usrterm_id'] ?? null,
        ], $thread_addition));
        if (!$new_message_result['success']) {
            $result['error'] = array_merge($result['error'], $new_message_result['error']);
            return $result;
        }
        // save chat message
        $result['c5_chatmessage_id'] = $new_message_result['c5_chatmessage_id'];
        // update new flags just in case
        $update_result = ChatMessages::queryBuilderStatic()
            ->update()
            ->set([
                'c5_chatmessage_is_new' => 0,
                'c5_chatmessage_thread_is_new' => 0,
            ])
            ->whereMultiple('AND', [
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_id' => $options['c5_chatmessage_id']
            ])
            ->query();
        if (!$update_result['success']) {
            $result['error'] = array_merge($result['error'], $update_result['error']);
            return $result;
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Update chat user stats
     *
     * @param array $options
     * @return array
     */
    public static function updateChatUserStats(array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
        ];
        $total_messages_by_user = ChatUsers::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'c5_chatuser_um_user_id' => 'c5_chatuser_um_user_id',
                'c5_chatuser_unread_count' => '('. ChatMessagesModel::queryBuilderStatic(['alias' => 'b'])
                    ->select()
                    ->columns([
                        'COUNT(*)'
                    ])
                    ->whereMultiple('AND', [
                        'b.c5_chatmessage_tenant_id' => \Tenant::id(),
                        'b.c5_chatmessage_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
                    ])
                    ->where('AND', ['b.c5_chatmessage_id', '>', 'a.c5_chatuser_unread_c5_chatmessage_id', true])
                    ->where('AND', ['b.c5_chatmessage_thread_c5_chatmessage_id', 'IS', null])
                    ->sql()
                . ')',
                'c5_chatuser_message_count' => '(' . ChatMessagesModel::queryBuilderStatic(['alias' => 'c'])
                    ->select()
                    ->columns([
                        'COUNT(*)'
                    ])
                    ->whereMultiple('AND', [
                        'c.c5_chatmessage_tenant_id' => \Tenant::id(),
                        'c.c5_chatmessage_c5_chat_id' => $options['c5_chatmessage_c5_chat_id']
                    ])
                    ->where('AND', ['a.c5_chatuser_um_user_id', '=', 'c.c5_chatmessage_um_user_id', true])
                    ->sql()
                . ')',
            ])
            ->whereMultiple('AND', [
                'c5_chatuser_tenant_id' => \Tenant::id(),
                'c5_chatuser_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
            ])
            ->query(['c5_chatuser_um_user_id']);
        if (!$total_messages_by_user['success']) {
            return $total_messages_by_user;
        }
        foreach ($total_messages_by_user['rows'] as $k => $v) {
            $update_result = ChatUsers::queryBuilderStatic()
                ->update()
                ->set([
                    'c5_chatuser_message_count' => $v['c5_chatuser_message_count'],
                    'c5_chatuser_unread_count' => $v['c5_chatuser_unread_count'],
                ])
                ->whereMultiple('AND', [
                    'c5_chatuser_tenant_id' => \Tenant::id(),
                    'c5_chatuser_c5_chat_id' => $options['c5_chatmessage_c5_chat_id'],
                    'c5_chatuser_um_user_id' => $v['c5_chatuser_um_user_id'],
                ])
                ->query();
            if (!$update_result['success']) {
                return $update_result;
            }
            // create an alert
            if ($v['c5_chatuser_unread_count'] > 0) {
                $alerts_result = UserAlerts::create([
                    'um_usralert_um_user_id' => $v['c5_chatuser_um_user_id'],
                    'um_usralert_um_usralrttype_code' => 'CHAT_MESSAGE',
                    'um_usralert_record_id' => $options['c5_chatmessage_c5_chat_id'],
                    'um_usralert_record_code' => null,
                    'um_usralert_description' => loc('NF.Form.NewMessageNumber', '{number} new messages(s)', [
                        'number' => $v['c5_chatuser_unread_count'],
                    ]),
                    'um_usralert_loc_json' => loc('NF.Form.NewMessageNumber', '{number} new messages(s)', [
                        'number' => $v['c5_chatuser_unread_count'],
                        '__as_json' => true,
                    ]),
                    'um_usralert_url' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_id=' . $options['c5_chatmessage_c5_chat_id'],
                    'um_usralert_inactive' => 0,
                ]);
                if (!$alerts_result['success']) {
                    return $alerts_result;
                }
            }
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Join
     *
     * @param array $options
     * @return array
     */
    public static function joinChat(array $options = []): array
    {
        $um_user_id = \User::id();
        // fetch personalization
        $personalization = [];
        if (!empty($um_user_id)) {
            $personalization = Personalizations::getStatic($um_user_id, 'C5');
        }
        // save
        $result = Users::collectionStatic()->merge([
            'c5_chatuser_tenant_id' => \Tenant::id(),
            'c5_chatuser_c5_chat_id' => intval($options['c5_chat_id']),
            'c5_chatuser_um_user_id' => \User::id(),
            'c5_chatuser_um_user_name' => $personalization['um_user_name'] ?? \User::get('name'),
            'c5_chatuser_icon' => null,
            'c5_chatuser_avatar_colors' => $personalization['avatar_colors'] ?? Colors::getColorsAndInitials(\User::get('name')),
            'c5_chatuser_photo_file_id' => $personalization['photo_file_id'] ?? null,
            'c5_chatuser_photo_file_url' => $personalization['photo_file_url'] ?? null,
            'c5_chatuser_message_count' => 0,
            'c5_chatuser_no_data_model_role_code' => 'user',
            'c5_chatuser_is_ai_assistant' => 0,
            'c5_chatuser_ai_model_code' => null,
            'c5_chatuser_unread_count' => 0,
            'c5_chatuser_unread_c5_chatmessage_id' => 0,
            'c5_chatuser_inactive' => 0,
        ]);
        if (!$result['success']) {
            return $result;
        }
        $result = Chats::updateChatUserStats([
            'c5_chatmessage_c5_chat_id' => $options['c5_chat_id'],
        ]);
        if (!$result['success']) {
            return $result;
        }
        $result = Invites::collectionStatic()->merge([
            'c5_chatinvite_tenant_id' => \Tenant::id(),
            'c5_chatinvite_c5_chat_id' => $options['c5_chat_id'],
            'c5_chatinvite_um_user_id' => \User::id(),
            'c5_chatinvite_c5_chatchaninvstatus_code' => 'JOINED',
        ]);
        return $result;
    }

    /**
     * Form tool completed
     *
     * @param int $c5_chatmessage_id
     * @param array $form_result_output
     * @return array{error: array, success: bool}
     */
    public static function formToolCompleted(int $c5_chatmessage_id, array $form_result_output): array
    {
        $result = [
            'success' => false,
            'error' => [],
        ];
        $message = ChatMessages::getSingleStatic([
            'where' => [
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_id' => $c5_chatmessage_id,
            ],
            'columns' => ['c5_chatmessage_form_result_json']
        ]);
        if (is_json($message['c5_chatmessage_form_result_json'])) {
            $message['c5_chatmessage_form_result_json'] = json_decode($message['c5_chatmessage_form_result_json'], true);
        }
        $message['c5_chatmessage_form_result_json']['output'] = $form_result_output;
        $update_result = ChatMessages::queryBuilderStatic()
            ->update()
            ->set([
                'c5_chatmessage_form_status_id' => 20,
                'c5_chatmessage_form_result_json' => json_encode($message['c5_chatmessage_form_result_json']),
            ])
            ->whereMultiple('AND', [
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_id' => $c5_chatmessage_id,
            ])
            ->query();
        if (!$update_result['success']) {
            $result['error'] = array_merge($result['error'], $update_result['error']);
            return $result;
        }
        $result['success'] = true;
        return $result;
    }
}
