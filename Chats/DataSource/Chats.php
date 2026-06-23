<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\DataSource;

use Object\DataSource;
use Numbers\Users\Chats\Model\Chat\Sessions;
use Numbers\Users\Chats\Model\Chat\Users;
use Numbers\Users\Chats\Model\Chat\Invites;
use Numbers\Backend\Session\Db\Model\Sessions as SystemSessions;
use Numbers\Users\Chats\Model\Channels;
use Numbers\Users\Chats\Model\Chat\ChatTypes;
use Object\Data\Model\Roles;
use Numbers\Tenants\Widgets\Batches\Model\Records;

class Chats extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['c5_chat_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row = false;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Chats\Model\Chats';
    public $parameters = [
        'c5_chat_uuid' => ['name' => 'UUID', 'domain' => 'uuid'],
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id'],
        'c5_chatchannel_code' => ['name' => 'Channel Code', 'domain' => 'group_code'],
        'load_nearest_5' => ['name' => 'Load Nearest 5', 'type' => 'boolean'],
        'load_all' => ['name' => 'Load All', 'type' => 'boolean'],
        'skip_channels' => ['name' => 'Skip Channels', 'type' => 'boolean'],
        'only_channels' => ['name' => 'Only Channels', 'type' => 'boolean'],
        'for_current_user' => ['name' => 'For Current User', 'type' => 'boolean'],
        'c5_chat_provide_welcome' => ['name' => 'Provide Welcome', 'type' => 'boolean'],
    ];

    public function query($parameters, $options = [])
    {
        if (!empty($parameters['for_current_user'])) {
            $parameters['um_user_id'] = \User::id();
        }
        // columns
        $this->query->columns([
            // chats
            'a.c5_chat_tenant_id',
            'a.c5_chat_id',
            'a.c5_chat_uuid',
            'a.c5_chat_name',
            'a.c5_chat_language_code',
            'a.c5_chat_user_count',
            'a.c5_chat_session_count',
            'a.c5_chat_message_count',
            'a.c5_chat_shareable_link_hash',
            'a.c5_chat_c5_chatchannel_code',
            'a.c5_chat_c5_chattype_code',
            'a.c5_chat_no_ai',
            'a.c5_chat_inactive',
            // chat users
            'b.c5_chatuser_um_user_id',
            'b.c5_chatuser_um_user_name',
            'b.c5_chatuser_avatar_colors',
            'b.c5_chatuser_icon',
            'b.c5_chatuser_message_count',
            'b.c5_chatuser_no_data_model_role_code',
            'b.c5_chatuser_is_ai_assistant',
            'b.c5_chatuser_ai_model_code',
            'b.c5_chatuser_unread_count',
            'b.c5_chatuser_inactive',
            // chat sessions
            'c.c5_chatsession_sm_session_id',
            'c.c5_chatsession_um_user_name',
            'c.c5_chatsession_avatar_colors',
            'c.c5_chatsession_message_count',
            'c.c5_chatsession_unread_count',
            'c.c5_chatsession_inactive',
            // unread counter
            'c5_chatuser_unread_counter' => 'COALESCE(b.c5_chatuser_unread_count, c.c5_chatsession_unread_count)',
            // invites
            'd.c5_chatinvite_um_user_id',
            'd.c5_chatinvite_mentions_count',
            'd.c5_chatinvite_c5_chatchaninvstatus_code',
            // channel
            'g.c5_chatchannel_code',
            'g.c5_chatchannel_name',
            'g.c5_chatchannel_icon',
            'g.c5_chatchannel_mention',
            'g.c5_chatchannel_global',
            'g.c5_chatchannel_inactive',
            // context from batches
            'bc.context_string',
            // all users name and avatars
            'c5_user_avatars_string' => 'e.avatars_string',
            'c5_session_avatars_string' => 'f.avatars_string',
        ]);
        // joins
        $this->query->join('LEFT', new Users(), 'b', 'ON', [
            ['AND', ['b.c5_chatuser_c5_chat_id', '=', 'a.c5_chat_id', true], false],
            ['AND', ['b.c5_chatuser_um_user_id', '=', $parameters['um_user_id']], false]
        ]);
        $this->query->join('LEFT', new Sessions(), 'c', 'ON', [
            ['AND', ['c.c5_chatsession_c5_chat_id', '=', 'a.c5_chat_id', true], false],
            ['AND', ['c.c5_chatsession_sm_session_id', '=', $parameters['sm_session_id']], false]
        ]);
        $this->query->join('LEFT', new Invites(), 'd', 'ON', [
            ['AND', ['d.c5_chatinvite_c5_chat_id', '=', 'a.c5_chat_id', true], false],
            ['AND', ['d.c5_chatinvite_um_user_id', '=', $parameters['um_user_id']], false],
            ['AND', ['d.c5_chatinvite_c5_chatchaninvstatus_code', '=', 'NEW'], false],
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Users::queryBuilderStatic(['alias' => 'e_inner'])->select();
            $query->columns(columns: [
                'e_inner.c5_chatuser_c5_chat_id',
                'avatars_string' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', e_inner.c5_chatuser_um_user_id, e_inner.c5_chatuser_um_user_name, e_inner.c5_chatuser_avatar_colors, e_inner.c5_chatuser_inserted_timestamp, e_inner.c5_chatuser_is_ai_assistant, e_inner.c5_chatuser_photo_file_url)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['e_inner.c5_chatuser_c5_chat_id']);
        }, 'e', 'ON', [
            ['AND', ['a.c5_chat_id', '=', 'e.c5_chatuser_c5_chat_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Sessions::queryBuilderStatic(['alias' => 'f_inner'])->select();
            $query->columns(columns: [
                'f_inner.c5_chatsession_c5_chat_id',
                'avatars_string' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', f_inner.c5_chatsession_sm_session_id, f_inner.c5_chatsession_um_user_name, f_inner.c5_chatsession_avatar_colors, f_inner.c5_chatsession_inserted_timestamp, '0', '')", 'delimiter' => ';;'])
            ]);
            $query->groupby(['f_inner.c5_chatsession_c5_chat_id']);
        }, 'f', 'ON', [
            ['AND', ['a.c5_chat_id', '=', 'f.c5_chatsession_c5_chat_id', true], false]
        ]);
        $this->query->join('LEFT', new Channels(), 'g', 'ON', [
            ['AND', ['a.c5_chat_c5_chatchannel_code', '=', 'g.c5_chatchannel_code', true], false],
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Records::queryBuilderStatic(['alias' => 'batch_inner'])->select();
            $query->columns(columns: [
                'batch_inner.tm_batchrecord_tm_batchentry_code',
                'context_string' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', batch_inner.tm_batchrecord_sm_model_code, batch_inner.tm_batchrecord_field_code, batch_inner.tm_batchrecord_field_name, batch_inner.tm_batchrecord_field_value_id, COALESCE(batch_inner.tm_batchrecord_field_value_code, ''), batch_inner.tm_batchrecord_field_value_name, batch_inner.tm_batchrecord_is_context, batch_inner.tm_batchrecord_no_data_model_role_code, COALESCE(batch_inner.tm_batchrecord_module_id, 0))", 'delimiter' => ';;'])
            ]);
            $query->groupby(['batch_inner.tm_batchrecord_tm_batchentry_code']);
        }, 'bc', 'ON', [
            ['AND', ['a.c5_chat_tm_batchentry_code', '=', 'bc.tm_batchrecord_tm_batchentry_code', true], false]
        ]);
        // where
        if (!empty($parameters['c5_chatchannel_code'])) {
            $this->query->where('AND', ['a.c5_chat_c5_chatchannel_code', '=', $parameters['c5_chatchannel_code']]);
            $this->query->limit(1);
            $parameters['c5_chat_uuid'] = null;
        }
        if (!empty($parameters['c5_chat_uuid'])) {
            $this->query->where('AND', ['a.c5_chat_uuid', '=', $parameters['c5_chat_uuid']]);
            $this->query->limit(1);
        }
        if (empty($parameters['c5_chat_provide_welcome'])) {
            $this->query->where('AND', function (& $query) use ($parameters) {
                $query->where('OR', function (& $query) use ($parameters) {
                    $query = Sessions::queryBuilderStatic(['alias' => 'exists_a'])->select();
                    $query->columns(['exists_a.c5_chatsession_sm_session_id']);
                    $query->where('AND', ['exists_a.c5_chatsession_c5_chat_id', '=', 'a.c5_chat_id', true]);
                    $query->where('AND', ['exists_a.c5_chatsession_sm_session_id', '=', $parameters['sm_session_id']]);
                }, 'EXISTS');
                if (!empty($parameters['um_user_id'])) {
                    $query->where('OR', function (& $query) use ($parameters) {
                        $query = Users::queryBuilderStatic(['alias' => 'exists_b'])->select();
                        $query->columns(['exists_b.c5_chatuser_um_user_id']);
                        $query->where('AND', ['exists_b.c5_chatuser_c5_chat_id', '=', 'a.c5_chat_id', true]);
                        $query->where('AND', ['exists_b.c5_chatuser_um_user_id', '=', $parameters['um_user_id']]);
                    }, 'EXISTS');
                    $query->where('OR', function (& $query) use ($parameters) {
                        $query = Invites::queryBuilderStatic(['alias' => 'exists_c'])->select();
                        $query->columns(['exists_c.c5_chatinvite_um_user_id']);
                        $query->where('AND', ['exists_c.c5_chatinvite_c5_chat_id', '=', 'a.c5_chat_id', true]);
                        $query->where('AND', ['exists_c.c5_chatinvite_um_user_id', '=', $parameters['um_user_id']]);
                        $query->where('AND', ['exists_c.c5_chatinvite_c5_chatchaninvstatus_code', '=', 'NEW']);
                    }, 'EXISTS');
                }
                // global channels
                $query->where('OR', function (& $query) use ($parameters) {
                    $query->where('AND', ['g.c5_chatchannel_code', 'IS NOT', null]);
                    $query->where('AND', ['g.c5_chatchannel_global', '=', 1]);
                });
            });
        }
        if (!empty($parameters['skip_channels'])) {
            $this->query->where('AND', ['a.c5_chat_c5_chatchannel_code', 'IS', null]);
        } elseif (!empty($parameters['only_channels'])) {
            $this->query->where('AND', ['a.c5_chat_c5_chatchannel_code', 'IS NOT', null]);
        }
        if (!empty($parameters['c5_chat_provide_welcome'])) {
            $this->query->where('AND', ['a.c5_chat_provide_welcome', '=', 1]);
        }
        if (!empty($parameters['load_all'])) {
            $this->query->orderby(['c5_chat_updated_timestamp' => SORT_DESC]);
            $this->query->limit(5000);
        } elseif (!empty($parameters['load_nearest_5'])) {
            $this->query->orderby(['c5_chat_updated_timestamp' => SORT_DESC]);
            $this->query->limit(5);
        } else {
            $this->query->limit(1);
        }
    }

    public function process($data, $options = [])
    {
        $all_users = [];
        $all_user_populated = [];
        $all_sessions = [];
        $all_session_populated = [];
        $types = ChatTypes::optionsStatic();
        // step 1 get all users
        foreach ($data as $k => $v) {
            // channels
            if ($v['c5_chatchannel_mention']) {
                $data[$k]['channel_mention_short'] = ltrim($v['c5_chatchannel_mention'], '#');
            }
            // chat name
            $data[$k]['c5_chattype_name'] = $types[$v['c5_chat_c5_chattype_code']]['name'];
            $data[$k]['c5_chattype_name_translated'] = \I18n::textToLoc('NF.Form', $types[$v['c5_chat_c5_chattype_code']]['name'], [
                'translate' => true,
            ]);
            // avatars
            $data[$k]['c5_avatar_string_all'] = [];
            foreach (['c5_user_avatars_string', 'c5_session_avatars_string'] as $v0) {
                if (!empty($v[$v0])) {
                    foreach (explode(';;', $v[$v0]) as $v2) {
                        $temp = explode('::', $v2);
                        $key = $v0 == 'c5_user_avatars_string' ? (int) $temp[0] : $temp[0];
                        $photo_url = $temp[5] ?? null;
                        if (!empty(getenv('NF_IS_CONTAINER'))) {
                            $photo_url = str_replace(['http://localhost/', 'https://localhost/'], \Request::host(), $photo_url);
                        }
                        $data[$k]['c5_avatar_string_all'][] = [
                            'name' => $temp[1],
                            'avatar_colors' => $temp[2],
                            'photo_file_url' => $photo_url,
                            'inserted' => $temp[3],
                            'last_seen' => null,
                            // other columns
                            'type' => $v0 == 'c5_user_avatars_string' ? 'user' : 'session',
                            'um_user_id' => $v0 == 'c5_user_avatars_string' ? (int) $temp[0] : null,
                            'sm_session_id' => $v0 == 'c5_session_avatars_string' ? $temp[0] : null,
                            'is_ai_assistant' => !empty($temp[4]),
                            'current_user' => $v0 == 'c5_user_avatars_string' && (((int) $temp[0]) == $options['parameters']['um_user_id'] ?? '') ? 1 : 0,
                        ];
                        if ($v0 == 'c5_user_avatars_string') {
                            $all_users[$key] = $key;
                        } else {
                            $all_sessions[$key] = $key;
                        }
                    }
                }
                unset($data[$k][$v0]);
            }
            if (count($data[$k]['c5_avatar_string_all']) > 0) {
                array_key_sort($data[$k]['c5_avatar_string_all'], ['current_user' => SORT_ASC, 'inserted' => SORT_ASC]);
            }
            $data[$k]['c5_avatar_string_all'] = array_values($data[$k]['c5_avatar_string_all']);
            // context from batches
            $data[$k]['context'] = [];
            if (!empty($v['context_string'])) {
                $batch_role_types = Roles::optionsStatic();
                foreach (explode(';;', $v['context_string']) as $k2 => $v2) {
                    $temp = explode('::', $v2);
                    $data[$k]['context'][$k2] = [
                        'tm_batchrecord_sm_model_code' => $temp[0],
                        'tm_batchrecord_field_code' => $temp[1],
                        'tm_batchrecord_field_name' => $temp[2],
                        'tm_batchrecord_field_value_id' => $temp[3],
                        'tm_batchrecord_field_value_code' => $temp[4],
                        'tm_batchrecord_field_value_name' => $temp[5],
                        'tm_batchrecord_is_context' => !empty($temp[6]),
                        'tm_batchrecord_no_data_model_role_code' => $temp[7],
                        'tm_batchrecord_module_id' => $temp[8] ?? null,
                    ];
                    $data[$k]['context'][$k2]['tm_batchrecord_no_data_model_role_name'] = $batch_role_types[$data[$k]['context'][$k2]['tm_batchrecord_no_data_model_role_code']]['name'];
                }
            }
            unset($data[$k]['context_string']);
        }
        // step 2: get user status
        $query = SystemSessions::queryBuilderStatic(['alias' => 'a'])->select();
        $query->columns([
            'sm_session_id' => 'a.sm_session_id',
            'sm_session_user_id' => 'a.sm_session_user_id',
            'sm_session_last_requested' => 'MAX(a.sm_session_last_requested)',
        ]);
        $query->where('AND', ['a.sm_session_tenant_id', '=', \Tenant::id()]);
        if (!empty($all_users)) {
            $query->where('AND', ['a.sm_session_user_id', 'IN', array_values($all_users)]);
        }
        if (!empty($all_sessions)) {
            $query->where('AND', ['a.sm_session_id', 'IN', array_values($all_sessions)]);
        }
        $query->groupby(['a.sm_session_id', 'a.sm_session_user_id']);
        $result = $query->query();
        foreach ($result['rows'] as $k => $v) {
            if ($v['sm_session_user_id']) {
                $all_user_populated[$v['sm_session_user_id']] = $v['sm_session_last_requested'];
            }
            $all_session_populated[$v['sm_session_id']] = $v['sm_session_last_requested'];
        }
        // step 3: put status back to users
        foreach ($data as $k => $v) {
            foreach ($data[$k]['c5_avatar_string_all'] as $k2 => $v2) {
                if ($data[$k]['c5_avatar_string_all'][$k2]['type'] == 'user') {
                    $data[$k]['c5_avatar_string_all'][$k2]['last_seen'] = $all_user_populated[$v2['um_user_id']] ?? null;
                } else {
                    $data[$k]['c5_avatar_string_all'][$k2]['last_seen'] = $all_session_populated[$v2['sm_session_id']] ?? null;
                }
                // last activity duration
                if (!empty($data[$k]['c5_avatar_string_all'][$k2]['last_seen'])) {
                    $ts = new \Datetime2($data[$k]['c5_avatar_string_all'][$k2]['last_seen'], 'timestamp');
                    $data[$k]['c5_avatar_string_all'][$k2]['last_seen'] = $ts->duration(['short' => true, 'min_in' => \Datetime2::MINUTES, 'less_than_min_in' => true]);
                } elseif ($data[$k]['c5_avatar_string_all'][$k2]['is_ai_assistant']) {
                    $data[$k]['c5_avatar_string_all'][$k2]['last_seen'] = 'ai_assistant';
                } else {
                    $data[$k]['c5_avatar_string_all'][$k2]['last_seen'] = 'inactive';
                }
            }
        }
        return $data;
    }
}
