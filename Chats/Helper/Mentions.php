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

use Numbers\Users\Chats\Model\Groups as ChatGroupsModel;
use Numbers\Users\Chats\Model\Group\Users as ChatGroupUsersModel;
use Numbers\Backend\Db\Common\Model\Models as ModelsModel;
use Numbers\Users\Users\Model\User\Mentions as UserMentionsModel;
use Numbers\Users\Users\Model\Users as UsersModel;
use Numbers\Users\Chats\Model\Channels as ChatChannelsModel;
use Numbers\Users\Chats\Model\Chats as ChatsModel;
use Numbers\AI\SDK\Model\Agents;

class Mentions
{
    /**
     * Process mentions
     *
     * @param string|array $mention
     * @throws \Exception
     * @return array[]|array{error: array, mention: string, records: array, success: bool, users_json: array}
     */
    public static function processMentions(string|array $mentions): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'mention' => $mentions,
            'records' => [],
            'users_json' => [],
        ];
        if (is_string($mentions)) {
            $mentions = [$mentions];
        }
        // check group mentions
        $group_mention_result = ChatGroupsModel::getStatic([
            'where' => [
                'c5_chatgroup_tenant_id' => \Tenant::id(),
                'c5_chatgroup_mention;IN' => $mentions,
            ],
            'columns' => [
                'c5_chatgroup_code',
                'c5_chatgroup_name',
                'c5_chatgroup_mention',
            ],
            'pk' => ['c5_chatgroup_mention'],
        ]);
        foreach ($group_mention_result as $k => $v) {
            // add group if found
            $result['records'][$k . '::GROUP'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Groups', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Groups',
                'tm_batchrecord_no_data_model_role_code' => 'group',
                'tm_batchrecord_field_code' => 'c5_chatgroup_code',
                'tm_batchrecord_field_name' => 'C/5 Chat Group Code',
                'tm_batchrecord_field_value_id' => null,
                'tm_batchrecord_field_value_code' => $v['c5_chatgroup_code'],
                'tm_batchrecord_field_value_name' => $v['c5_chatgroup_name'],
                'tm_batchrecord_inactive' => 0,
            ];
            $group_mention_users_result = ChatGroupUsersModel::getStatic([
                'where' => [
                    'c5_chatgrpuser_tenant_id' => \Tenant::id(),
                    'c5_chatgrpuser_c5_chatgroup_code' => $v['c5_chatgroup_code'],
                ],
                'pk' => ['c5_chatgrpuser_um_user_id'],
            ]);
            foreach ($group_mention_users_result as $k2 => $v2) {
                $result['users_json'][$k . '::' . $k2] = $k2;
                // add users if found
                $result['records'][$k . '::' . $k2] = [
                    'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Users\Model\Users', null, null, ['first' => true]),
                    'tm_batchrecord_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                    'tm_batchrecord_no_data_model_role_code' => 'group_user',
                    'tm_batchrecord_field_code' => 'um_user_id',
                    'tm_batchrecord_field_name' => 'U/M User #',
                    'tm_batchrecord_field_value_id' => $k2,
                    'tm_batchrecord_field_value_code' => null,
                    'tm_batchrecord_field_value_name' => UsersModel::getByColumnStatic('um_user_id', $k2, 'um_user_name'),
                    'tm_batchrecord_inactive' => 0,
                ];
            }
        }
        // check user mentions
        $mention_result = UserMentionsModel::getStatic([
            'where' => [
                'um_usrmention_tenant_id' => \Tenant::id(),
                'um_usrmention_mention;IN' => $mentions,
            ],
            'columns' => [
                'um_usrmention_user_id',
                'um_usrmention_mention',
            ],
            'pk' => ['um_usrmention_mention'],
        ]);
        foreach ($mention_result as $k => $v) {
            // add users if found
            $result['records'][$k . '::' . $v['um_usrmention_user_id']] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Users\Model\Users', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                'tm_batchrecord_no_data_model_role_code' => 'user_mention',
                'tm_batchrecord_field_code' => 'um_user_id',
                'tm_batchrecord_field_name' => 'U/M User #',
                'tm_batchrecord_field_value_id' => $v['um_usrmention_user_id'],
                'tm_batchrecord_field_value_code' => null,
                'tm_batchrecord_field_value_name' => UsersModel::getByColumnStatic('um_user_id', $v['um_usrmention_user_id'], 'um_user_name'),
                'tm_batchrecord_inactive' => 0,
            ];
            $result['users_json'][$k] = $v['um_usrmention_user_id'];
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Process channels
     *
     * @param string|array $mention
     * @throws \Exception
     * @return array[]|array{error: array, mention: string, records: array, success: bool, users_json: array}
     */
    public static function processChannels(string|array $mentions): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'mention' => $mentions,
            'records' => [],
            'users_json' => [],
        ];
        if (is_string($mentions)) {
            $mentions = [$mentions];
        }
        $channel_mentions_result = ChatChannelsModel::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'a.c5_chatchannel_code',
                'a.c5_chatchannel_name',
                'b.c5_chat_id',
                'b.c5_chat_name',
            ])
            // joins
            ->join('LEFT', new ChatsModel(), 'b', 'ON', [
                ['AND', ['a.c5_chatchannel_code', '=', 'b.c5_chat_c5_chatchannel_code', true], false],
            ])
            ->whereMultiple('AND', [
                'c5_chatchannel_tenant_id' => \Tenant::id(),
                'c5_chatchannel_mention;IN' => $mentions,
            ])
            ->query('c5_chat_id');
        foreach ($channel_mentions_result['rows'] as $k => $v) {
            $result['records'][$v['c5_chatchannel_code'] . '::CHANNEL'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Channels', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Channels',
                'tm_batchrecord_no_data_model_role_code' => 'channel',
                'tm_batchrecord_field_code' => 'c5_chatchannel_code',
                'tm_batchrecord_field_name' => 'C/5 Chat Channel Code',
                'tm_batchrecord_field_value_id' => null,
                'tm_batchrecord_field_value_code' => $v['c5_chatchannel_code'],
                'tm_batchrecord_field_value_name' => $v['c5_chatchannel_name'],
                'tm_batchrecord_inactive' => 0,
            ];
            $result['records'][$v['c5_chat_id'] . '::CHAT'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Chats', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chats',
                'tm_batchrecord_no_data_model_role_code' => 'chat',
                'tm_batchrecord_field_code' => 'c5_chat_id',
                'tm_batchrecord_field_name' => 'C/5 Chat Channel Code',
                'tm_batchrecord_field_value_id' => $v['c5_chat_id'],
                'tm_batchrecord_field_value_code' => null,
                'tm_batchrecord_field_value_name' => $v['c5_chat_name'] ?: ('Chat # ' . $v['c5_chat_id']),
                'tm_batchrecord_inactive' => 0,
            ];
        }
        $result['users_json'] = $channel_mentions_result['rows'];
        $result['success'] = true;
        return $result;
    }

    /**
     * Process message
     *
     * @param int $chat_id
     * @param string|null $channel_code
     * @param int $message_id
     * @param int|null $thread_id
     * @return array[]|array{error: array, message_id: int, records: array, success: bool, thread_id: int|null}
     */
    public static function processMessage(int $chat_id, ?string $channel_code, int $message_id, ?int $thread_id = null, array $chat_data = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'message_id' => $message_id,
            'thread_id' => $thread_id,
            'records' => [],
        ];
        // chat record
        $result['records'][$chat_id . '::CHAT'] = [
            'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Chats', null, null, ['first' => true]),
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chats',
            'tm_batchrecord_no_data_model_role_code' => 'chat',
            'tm_batchrecord_field_code' => 'c5_chat_id',
            'tm_batchrecord_field_name' => 'C/5 Chat #',
            'tm_batchrecord_field_value_id' => $chat_id,
            'tm_batchrecord_field_value_code' => null,
            'tm_batchrecord_field_value_name' => 'Chat #' . $chat_id,
            'tm_batchrecord_inactive' => 0,
        ];
        // channel record
        if (!empty($channel_code)) {
            $result['records'][$channel_code . '::CHANNEL'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Channels', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Channels',
                'tm_batchrecord_no_data_model_role_code' => 'channel',
                'tm_batchrecord_field_code' => 'c5_chatchannel_code',
                'tm_batchrecord_field_name' => 'C/5 Chat Channel Code',
                'tm_batchrecord_field_value_id' => null,
                'tm_batchrecord_field_value_code' => $channel_code,
                'tm_batchrecord_field_value_name' => 'Channel: ' . ChatChannelsModel::getByColumnStatic('c5_chatchannel_code', $channel_code, 'c5_chatchannel_name'),
                'tm_batchrecord_inactive' => 0,
            ];
        }
        // message record
        $result['records'][$message_id . '::MESSAGE'] = [
            'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Chat\Messages', null, null, ['first' => true]),
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chat\Messages',
            'tm_batchrecord_no_data_model_role_code' => 'message',
            'tm_batchrecord_field_code' => 'c5_chatmessage_id',
            'tm_batchrecord_field_name' => 'C/5 Message #',
            'tm_batchrecord_field_value_id' => $message_id,
            'tm_batchrecord_field_value_code' => null,
            'tm_batchrecord_field_value_name' => 'Message #' . $message_id,
            'tm_batchrecord_inactive' => 0,
        ];
        // thread record
        if ($thread_id) {
            $result['records'][$thread_id . '::THREAD'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Chat\Messages', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chat\Messages',
                'tm_batchrecord_no_data_model_role_code' => 'thread',
                'tm_batchrecord_field_code' => 'c5_chatmessage_id',
                'tm_batchrecord_field_name' => 'C/5 Message #',
                'tm_batchrecord_field_value_id' => $thread_id,
                'tm_batchrecord_field_value_code' => null,
                'tm_batchrecord_field_value_name' => 'Thread #' . $thread_id,
                'tm_batchrecord_inactive' => 0,
            ];
        }
        // agent
        if (!empty($chat_data['c5_chat_ai_agent_code'])) {
            $result['records'][$chat_data['c5_chat_ai_agent_code'] . '::AGENT'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\AI\SDK\Model\Agents', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\AI\SDK\Model\Agents',
                'tm_batchrecord_no_data_model_role_code' => 'agent',
                'tm_batchrecord_field_code' => 'c5_chat_ai_agent_code',
                'tm_batchrecord_field_name' => 'A/I Agent Code',
                'tm_batchrecord_field_value_id' => null,
                'tm_batchrecord_field_value_code' => $chat_data['c5_chat_ai_agent_code'],
                'tm_batchrecord_field_value_name' => Agents::getByColumnStatic('ai_agent_code', $chat_data['c5_chat_ai_agent_code'], 'ai_agent_name'),
                'tm_batchrecord_inactive' => 0,
            ];
        }
        // conversation
        if (!empty($chat_data['c5_chat_ai_conversation_code'])) {
            $result['records'][$chat_data['c5_chat_ai_conversation_code'] . '::CONVERSATION'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\AI\SDK\Model\Conversations', null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => '\Numbers\AI\SDK\Model\Conversations',
                'tm_batchrecord_no_data_model_role_code' => 'conversation',
                'tm_batchrecord_field_code' => 'c5_chat_ai_conversation_code',
                'tm_batchrecord_field_name' => 'A/I Conversation Code',
                'tm_batchrecord_field_value_id' => null,
                'tm_batchrecord_field_value_code' => $chat_data['c5_chat_ai_conversation_code'],
                'tm_batchrecord_field_value_name' => 'A/I Conversation',
                'tm_batchrecord_inactive' => 0,
            ];
        }
        // success
        $result['success'] = true;
        return $result;
    }

    /**
     * Process mentions
     *
     * @param string|array $mention
     * @throws \Exception
     * @return array[]|array{error: array, mention: string, records: array, success: bool, users_json: array}
     */
    public static function processQuickSearches(string|array $mentions): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'mention' => $mentions,
            'records' => [],
            'users_json' => [],
        ];
        if (is_string($mentions)) {
            $mentions = [$mentions];
        }
        foreach ($mentions as $v) {
            $found = self::determineQuickSearchType($v);
            if (empty($found)) {
                continue;
            }
            $model = \Factory::model($found['model']);
            $keyed_word = explode(':', $v);
            $query_actual = trim($keyed_word[1] ?? '');
            $model_result = $model->queryBuilder(['alias' => 'a'])
                ->select()
                ->columns([
                    'id' => 'a.' . $found['column_key'],
                    'user_id' => 'a.' . $found['column_id'],
                    'name' => 'a.' . $found['column_name'],
                ])
                ->where('AND', function (& $query) use ($found, $query_actual) {
                    if (!empty($found['column_id_numeric']) && is_numeric($query_actual)) {
                        $query->where('AND', ['a.' . $found['column_id'], '=', (int) $query_actual]);
                    } else {
                        $query->where('AND', ['a.' . $found['column_key'], '=', (string) $query_actual]);
                    }
                })
                ->limit(1)
                ->query();
            $result['records'][$v . '::QUICK_SEARCH'] = [
                'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic($found['model'], null, null, ['first' => true]),
                'tm_batchrecord_sm_model_code' => $found['model'],
                'tm_batchrecord_no_data_model_role_code' => $found['role'] ?? 'secondary',
                'tm_batchrecord_field_code' => $found['column_id'],
                'tm_batchrecord_field_name' => $found['name'],
                'tm_batchrecord_field_value_id' => !empty($found['column_id_numeric']) ? $model_result['rows'][0]['user_id'] : null,
                'tm_batchrecord_field_value_code' => empty($found['column_id_numeric']) ? $model_result['rows'][0]['user_id'] : null,
                'tm_batchrecord_field_value_name' => $model_result['rows'][0]['name'],
                'tm_batchrecord_inactive' => 0,
            ];
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Determine quick search type
     *
     * @param string $mention
     * @return array|null
     */
    private static function determineQuickSearchType(string $mention): array|null
    {
        $parameters = [];
        $keyed_word = explode(':', $mention);
        $parameters['query_keyword'] = ltrim(trim($keyed_word[0] ?? ''), '~');
        $parameters['query_actual'] = trim($keyed_word[1] ?? '');
        $supported_locales = \Application::get('flag.global.loc.supported_locales.AN');
        $qsm = \Application::get('qsm') ?? [];
        $stop_words = [];
        $negative_index = -1;
        foreach ($qsm as $module_code => $v) {
            foreach ($v as $module_name => $v2) {
                foreach ($v2 as $column_key => $v3) {
                    $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['name'] = $v3['name'];
                    $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'] = [$v3['name']];
                    foreach ($supported_locales as $v4) {
                        $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'][] = loc($v3['loc'], '', ['locale_code' => $v4['locale']]);
                    }
                    // check if we have key word
                    foreach ($stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'] as $v5) {
                        if (strcasecmp($parameters['query_keyword'], $v5) == 0) {
                            return $v3;
                        }
                    }
                }
            }
        }
        return null;
    }
}
