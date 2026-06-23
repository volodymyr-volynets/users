<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\API\V1\C5;

use Helper\Constant\HTTPConstants;
use Object\Controller\API;
use Numbers\Users\Chats\Model\Chat\MessagesAR;
use Numbers\Users\Chats\Model\Chat\Messages as ChatMessagesModel;
use Numbers\Users\Chats\Model\ChatsAR;
use Numbers\Users\Chats\Model\Chats as Chats;
use Numbers\Users\Chats\Model\Chat\Sessions as ChatSessions;
use Numbers\Users\Chats\Model\Chat\Users as ChatUsers;
use Numbers\Users\Chats\Model\Chat\UsersAR as ChatUsersAR;
use Numbers\Users\Chats\Model\Chat\InvitesAR as ChatInvitesAR;
use Numbers\Users\Chats\Model\Chat\Message\ReactionsAR;
use Numbers\Users\Chats\Model\Chat\Message\Reactions;
use Numbers\Users\Chats\DataSource\Chats as ChatsDataSource;
use Numbers\Users\Users\Model\User\Mentions;
use Numbers\Users\Users\Model\Users;
use Numbers\Users\Chats\Model\Chat\Invites;
use Numbers\Backend\Session\Db\Model\Sessions as SystemSessions;
use Numbers\Users\Chats\Model\Channels as ChatChannels;
use Numbers\Users\Chats\API\V1\C5\ChatMessages as ChatMessagesAPI;
use Numbers\Users\Users\Model\UsersAR;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;
use Numbers\Users\Chats\Model\Groups;
use Object\Query\Builder;
use Numbers\Tenants\Widgets\Batches\Helper\Save as BatchHelperSave;
use Numbers\Tenants\Widgets\Batches\Model\Records as BatchRecordsModel;
use Object\Data\Model\Roles;
use Numbers\Users\Chats\Model\Chat\User\ThreadUnreads as ChatUserThreadUnreads;
use Numbers\Users\Chats\Model\Canvases as ChatCanvases;
use Numbers\Users\Chats\Model\Canvas\Map as ChatCanvasMap;
use Numbers\Users\Chats\Model\Canvas\Lists as ChatCanvasLists;
use Numbers\Users\Chats\Model\Canvas\List2\Users as ChatCanvasList2Users;
use Numbers\Tenants\Tenants\Helper\Sequence as TenantSequenceHelper;
use Numbers\AI\SDK\Model\Agents;
use Numbers\AI\SDK\Model\Settings;
use Numbers\Users\Users\Model\User\Signatures;
use Numbers\Users\Chats\Model\Chat\Messages;
use Numbers\Users\Documents\Base\Base as DocumentBase;
use Numbers\Users\Users\Model\User\Terms;
use Numbers\Tenants\Widgets\Batches\Model\Records;

class ChatMessages extends API
{
    public $group = ['C5', 'Operations', 'Chat'];
    public $name = 'C/5 Chat Messages (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/C5/ChatMessages';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => true,
        'permission' => false,
    ];

    public $loc = [];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Public,Authorized');
    }

    /**
     * Post chat message
     */
    public $postPostMessage_name = 'Post chat message';
    public $postPostMessage_description = 'Use this API to post chat message.';
    public $postPostMessage_columns = [
        'c5_chatmessage_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatmessage_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatmessage_um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'c5_chatmessage_sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
        'c5_chatmessage_um_user_name' => ['required' => true, 'name' => 'Name', 'domain' => 'name'],
        'c5_chatmessage_no_data_model_role_code' => ['required' => true, 'name' => 'Role Code', 'domain' => 'lgroup_code'],
        'c5_chatmessage_is_ai_assistant' => ['name' => 'Is A/I Assistant', 'type' => 'boolean'],
        'c5_chatmessage_language_code' => ['required' => true, 'name' => 'Language Code', 'domain' => 'language_code'],
        'c5_chatmessage_message' => ['required' => true, 'name' => 'Message', 'type' => 'text'],
        'c5_chatmessage_is_new' => ['name' => 'Is New', 'type' => 'boolean'],
        'c5_chatmessage_is_loading' => ['name' => 'Is Loading', 'type' => 'boolean'],
        'c5_chatmessage_mention_c5_chatmessage_id' => ['name' => 'Mention Message #', 'domain' => 'message_id', 'null' => true],
        'c5_chatmessage_thread_c5_chatmessage_id' => ['name' => 'Thread Message #', 'domain' => 'message_id', 'null' => true],
        'c5_chatmessage_thread_is_new' => ['name' => 'Is New (Thread)', 'type' => 'boolean'],
        'c5_chatmessage_is_file' => ['name' => 'Is File', 'type' => 'boolean'],
        'c5_chatmessage_um_usrsign_id' => ['name' => 'Signature #', 'domain' => 'signature_id', 'null' => true],
        'c5_chatmessage_um_usrterm_id' => ['name' => 'Term #', 'domain' => 'bigterm_id', 'null' => true],
        'c5_chatmessage_reasoning_json' => ['name' => 'Reasoning (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_is_image' => ['name' => 'Is Image', 'type' => 'boolean'],
        'c5_chatmessage_image_settings_json' => ['name' => 'Image Settings (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_is_sound' => ['name' => 'Is Sound', 'type' => 'boolean'],
        'c5_chatmessage_sound_settings_json' => ['name' => 'Sound Settings (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_is_transcript' => ['name' => 'Is Transcript', 'type' => 'boolean'],
        'c5_chatmessage_transcript_settings_json' => ['name' => 'Transcript Settings (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_is_rag' => ['name' => 'Is RAG', 'type' => 'boolean'],
        'c5_chatmessage_rag_settings_json' => ['name' => 'RAG Settings (JSON)', 'type' => 'json', 'null' => true],
        // form
        'c5_chatmessage_is_form' => ['name' => 'Is Form', 'type' => 'boolean'],
        'c5_chatmessage_form_settings_json' => ['name' => 'Form Settings (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_form_result_json' => ['name' => 'Form Result (JSON)', 'type' => 'json', 'null' => true],
        'c5_chatmessage_form_status_id' => ['name' => 'Form Status #', 'domain' => 'status_id', 'null' => true],
        // other
        'c5_chatmessage_parent_c5_chatmessage_id' => ['name' => 'Parent Message #', 'domain' => 'message_id', 'null' => true],
    ];
    public $postPostMessage_result_danger = \Validator::RESULT_DANGER;
    public $postPostMessage_result_success = RESULT_SUCCESS;
    public function postPostMessage(ChatsAR $chats_ar, ChatUsersAR $chat_users_ar, ChatInvitesAR $chat_invite_ar, MessagesAR $messages_ar)
    {
        $c5_chatmessage_updated_timestamp = \Format::now('timestamp');
        $this->begin();
        // load chat data
        $chat_data = Chats::getStatic([
            'where' => [
                'c5_chat_tenant_id' => \Tenant::id(),
                'c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        // process mentions
        $c5_chatmessage_mention_users_json = [];
        $raw_mentions = [];
        $raw_quick_searches = [];
        $raw_channels = [];
        $raw_batch_records = [];
        $dom = new \DOMDocument();
        $dom->loadHTML($this->values['c5_chatmessage_message']);
        $xpath = new \DOMXpath($dom);
        $items = $xpath->query('//a[@class="mention"]');
        foreach ($items as $k => $v) {
            $mention = $v->getAttribute('data-mention');
            if (str_starts_with($mention, '@')) {
                $raw_mentions[$mention] = $mention;
            } elseif (str_starts_with($mention, '~')) {
                $raw_quick_searches[$mention] = $mention;
            } elseif (str_starts_with($mention, '#')) {
                $raw_channels[$mention] = $mention;
            }
        }
        if (!empty($raw_mentions)) {
            $mentions_helper_result = \Numbers\Users\Chats\Helper\Mentions::processMentions(array_keys($raw_mentions));
            $c5_chatmessage_mention_users_json = $mentions_helper_result['users_json'] ?? [];
            $raw_batch_records = $mentions_helper_result['records'];
            // create invites
            if (!empty($c5_chatmessage_mention_users_json)) {
                $all_user_ids = array_unique(array_values($c5_chatmessage_mention_users_json));
                $all_invited_users = Invites::getStatic([
                    'where' => [
                        'c5_chatinvite_tenant_id' => \Tenant::id(),
                        'c5_chatinvite_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                        'c5_chatinvite_um_user_id;IN' => $all_user_ids,
                    ],
                    'pk' => ['c5_chatinvite_um_user_id'],
                ]);
                $all_chat_users = ChatUsers::getStatic([
                    'where' => [
                        'c5_chatuser_tenant_id' => \Tenant::id(),
                        'c5_chatuser_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                        'c5_chatuser_um_user_id;IN' => $all_user_ids,
                    ],
                    'pk' => ['c5_chatuser_um_user_id'],
                ]);
                foreach ($all_user_ids as $v) {
                    // if user in a chat we continue
                    if (!empty($all_chat_users[$v])) {
                        continue;
                    }
                    // new invites
                    if (empty($all_invited_users[$v])) {
                        $create_invite_result = $chat_invite_ar->fill([
                            'c5_chatinvite_tenant_id' => \Tenant::id(),
                            'c5_chatinvite_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                            'c5_chatinvite_um_user_id' => $v,
                            'c5_chatinvite_um_user_name' => null,
                            'c5_chatinvite_c5_chatchannel_code' => $chat_data['c5_chat_c5_chatchannel_code'],
                            'c5_chatinvite_c5_chatchaninvstatus_code' => 'NEW',
                            'c5_chatinvite_mentions_count' => 1,
                            'c5_chatinvite_inactive' => 0,
                        ])->merge();
                        if (!$create_invite_result['success']) {
                            $this->rollback();
                            return $this->finish(HTTPConstants::Status500InternalServerError, $create_invite_result);
                        }
                    } else {
                        $update_invite_result = $chat_invite_ar->queryBuilder()
                            ->update()
                            ->set([
                                'c5_chatinvite_mentions_count;=;~~' => 'c5_chatinvite_mentions_count + 1'
                            ])
                            ->whereMultiple('AND', [
                                'c5_chatinvite_tenant_id' => \Tenant::id(),
                                'c5_chatinvite_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                                'c5_chatinvite_um_user_id' => $v,
                            ])
                            ->query();
                        if (!$update_invite_result['success']) {
                            $this->rollback();
                            return $this->finish(HTTPConstants::Status500InternalServerError, $update_invite_result);
                        }
                    }
                }
            }
        }
        $c5_chatmessage_have_mention = !empty($c5_chatmessage_mention_users_json);
        // AI in threads
        if (!empty($this->values['c5_chatmessage_thread_c5_chatmessage_id'])) {
            $thread_message_data = ChatMessagesModel::getSingleStatic([
                'where' => [
                    'c5_chatmessage_tenant_id' => \Tenant::id(),
                    'c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                ]
            ]);
            if (!empty($thread_message_data)) {
                // we must see first message
                if ($thread_message_data['c5_chatmessage_thread_c5_chatmessage_id']) {
                    $this->values['c5_chatmessage_thread_c5_chatmessage_id'] = $thread_message_data['c5_chatmessage_thread_c5_chatmessage_id'];
                }
                $thread_is_ai = !empty($thread_message_data['c5_chatmessage_thread_ai_conversation_code']);
                $thread_ai_agent_code = $thread_message_data['c5_chatmessage_thread_ai_agent_code'];
                $thread_ai_conversation_code = $thread_message_data['c5_chatmessage_thread_ai_conversation_code'];
                // fields for context
                $chat_data['c5_chat_ai_agent_code'] = $thread_message_data['c5_chatmessage_thread_ai_agent_code'];
                $chat_data['c5_chat_ai_conversation_code'] = $thread_message_data['c5_chatmessage_thread_ai_conversation_code'];
                // set for assistant
                $this->values['c5_chatmessage_thread_is_new'] = (empty($this->values['c5_chatmessage_is_ai_assistant']) && $thread_is_ai) ? 1 : 0;
            }
        } else {
            $thread_message_data = [];
            $thread_is_ai = false;
            $thread_ai_agent_code = null;
            $thread_ai_conversation_code = null;
        }
        // signature
        if (!empty($this->values['c5_chatmessage_um_usrsign_id'])) {
            $signature = Signatures::getSingleStatic([
                'where' => [
                    'um_usrsign_tenant_id' => \Tenant::id(),
                    'um_usrsign_id' => $this->values['c5_chatmessage_um_usrsign_id'],
                    'um_usrsign_user_id' => $this->values['c5_chatmessage_um_user_id'],
                ]
            ]);
            if (empty($signature)) {
                $this->values['c5_chatmessage_um_usrsign_id'] = null;
            }
        }
        // terms
        if (!empty($this->values['c5_chatmessage_um_usrterm_id'])) {
            $terms = Terms::getSingleStatic([
                'where' => [
                    'um_usrterm_tenant_id' => \Tenant::id(),
                    'um_usrterm_id' => $this->values['c5_chatmessage_um_usrterm_id'],
                    'um_usrterm_user_id' => $this->values['c5_chatmessage_um_user_id'],
                ]
            ]);
            if (empty($terms)) {
                $this->values['c5_chatmessage_um_usrterm_id'] = null;
            }
        }
        // image
        if (!empty($this->values['c5_chatmessage_is_image'])) {
            $this->values['c5_chatmessage_is_image'] = 1;
            $this->values['c5_chatmessage_is_sound'] = 0;
            $this->values['c5_chatmessage_is_transcript'] = 0;
            if (empty($this->values['c5_chatmessage_image_settings_json'])) {
                $this->values['c5_chatmessage_image_settings_json'] = [];
            } elseif (is_json($this->values['c5_chatmessage_image_settings_json'])) {
                $this->values['c5_chatmessage_image_settings_json'] = json_decode($this->values['c5_chatmessage_image_settings_json'], true);
            }
            // check if we pass the agent
            if (!empty($this->values['c5_chatmessage_image_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getSingleStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_code' => $this->values['c5_chatmessage_image_settings_json']['ai_agent_code'],
                        'ai_agent_image' => 1,
                    ]
                ]);
                if (empty($image_agent)) {
                    $this->values['c5_chatmessage_image_settings_json']['ai_agent_code'] = null;
                }
            }
            // if empty or nt valid agent we load
            if (empty($this->values['c5_chatmessage_image_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getPrimaryRecordStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_image' => 1,
                    ]
                ]);
                $this->values['c5_chatmessage_image_settings_json']['ai_agent_code'] = $image_agent['ai_agent_code'];
            }
            // size & quality
            $this->values['c5_chatmessage_image_settings_json']['ai_imgsize_code'] ??= '1024x1024';
            $this->values['c5_chatmessage_image_settings_json']['ai_imgquality_code'] ??= 'high';
        } else {
            $this->values['c5_chatmessage_is_image'] = 0;
            $this->values['c5_chatmessage_image_settings_json'] = null;
        }
        // sound
        if (!empty($this->values['c5_chatmessage_is_sound'])) {
            $this->values['c5_chatmessage_is_sound'] = 1;
            $this->values['c5_chatmessage_is_transcript'] = 0;
            if (empty($this->values['c5_chatmessage_sound_settings_json'])) {
                $this->values['c5_chatmessage_sound_settings_json'] = [];
            } elseif (is_json($this->values['c5_chatmessage_sound_settings_json'])) {
                $this->values['c5_chatmessage_sound_settings_json'] = json_decode($this->values['c5_chatmessage_sound_settings_json'], true);
            }
            // check if we pass the agent
            if (!empty($this->values['c5_chatmessage_sound_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getSingleStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_code' => $this->values['c5_chatmessage_sound_settings_json']['ai_agent_code'],
                        'ai_agent_image' => 1,
                    ]
                ]);
                if (empty($image_agent)) {
                    $this->values['c5_chatmessage_sound_settings_json']['ai_agent_code'] = null;
                }
            }
            // if empty or nt valid agent we load
            if (empty($this->values['c5_chatmessage_sound_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getPrimaryRecordStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_sound' => 1,
                    ]
                ]);
                $this->values['c5_chatmessage_sound_settings_json']['ai_agent_code'] = $image_agent['ai_agent_code'];
            }
            // voice
            $this->values['c5_chatmessage_sound_settings_json']['ai_soundvoice_code'] ??= 'alloy';
        } else {
            $this->values['c5_chatmessage_is_sound'] = 0;
            $this->values['c5_chatmessage_sound_settings_json'] = null;
        }
        // transcript
        if (!empty($this->values['c5_chatmessage_is_transcript'])) {
            $this->values['c5_chatmessage_is_transcript'] = 1;
            if (empty($this->values['c5_chatmessage_transcript_settings_json'])) {
                $this->values['c5_chatmessage_transcript_settings_json'] = [];
            } elseif (is_json($this->values['c5_chatmessage_transcript_settings_json'])) {
                $this->values['c5_chatmessage_transcript_settings_json'] = json_decode($this->values['c5_chatmessage_transcript_settings_json'], true);
            }
            // check if we pass the agent
            if (!empty($this->values['c5_chatmessage_transcript_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getSingleStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_code' => $this->values['c5_chatmessage_transcript_settings_json']['ai_agent_code'],
                        'ai_agent_transcript' => 1,
                    ]
                ]);
                if (empty($image_agent)) {
                    $this->values['c5_chatmessage_transcript_settings_json']['ai_agent_code'] = null;
                }
            }
            // if empty or nt valid agent we load
            if (empty($this->values['c5_chatmessage_transcript_settings_json']['ai_agent_code'])) {
                $image_agent = Agents::getPrimaryRecordStatic([
                    'where' => [
                        'ai_agent_tenant_id' => \Tenant::id(),
                        'ai_agent_transcript' => 1,
                    ]
                ]);
                $this->values['c5_chatmessage_transcript_settings_json']['ai_agent_code'] = $image_agent['ai_agent_code'];
            }
        }
        // RAG
        if (!empty($this->values['c5_chatmessage_is_rag'])) {
            $this->values['c5_chatmessage_is_rag'] = 1;
            if (empty($this->values['c5_chatmessage_rag_settings_json'])) {
                $this->values['c5_chatmessage_rag_settings_json'] = [];
            } elseif (is_json($this->values['c5_chatmessage_rag_settings_json'])) {
                $this->values['c5_chatmessage_rag_settings_json'] = json_decode($this->values['c5_chatmessage_rag_settings_json'], true);
            }
        } else {
            $this->values['c5_chatmessage_is_rag'] = 0;
            $this->values['c5_chatmessage_rag_settings_json'] = null;
        }
        // reasoning
        if (!empty($this->values['c5_chatmessage_reasoning_json'])) {
            if (is_json($this->values['c5_chatmessage_reasoning_json'])) {
                $this->values['c5_chatmessage_reasoning_json'] = json_decode($this->values['c5_chatmessage_reasoning_json'], true);
            }
        } else {
            $this->values['c5_chatmessage_reasoning_json'] = null;
        }
        // form
        if (is_json($this->values['c5_chatmessage_form_settings_json'])) {
            $this->values['c5_chatmessage_form_settings_json'] = json_decode($this->values['c5_chatmessage_form_settings_json'], true);
        }
        if (!empty($this->values['c5_chatmessage_is_form'])) {
            $this->values['c5_chatmessage_is_form'] = 1;
        }
        if (is_json($this->values['c5_chatmessage_form_result_json'])) {
            $this->values['c5_chatmessage_form_result_json'] = json_decode($this->values['c5_chatmessage_form_result_json'], true);
        }
        // no ia we set is_new to 0
        if (!empty($chat_data['c5_chat_no_ai'])) {
            $this->values['c5_chatmessage_thread_is_new'] = 0;
            $this->values['c5_chatmessage_is_new'] = 0;
        }
        // add message
        $new_message_result = $messages_ar->fill([
            'c5_chatmessage_tenant_id' => $this->values['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
            'c5_chatmessage_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            'c5_chatmessage_um_user_id' => $this->values['c5_chatmessage_um_user_id'],
            'c5_chatmessage_sm_session_id' => $this->values['c5_chatmessage_sm_session_id'],
            'c5_chatmessage_um_user_name' => $this->values['c5_chatmessage_um_user_name'],
            'c5_chatmessage_no_data_model_role_code' => $this->values['c5_chatmessage_no_data_model_role_code'],
            'c5_chatmessage_is_ai_assistant' => $this->values['c5_chatmessage_is_ai_assistant'] ?? 0,
            // thread
            'c5_chatmessage_is_thread' => !empty($this->values['c5_chatmessage_thread_c5_chatmessage_id']) ? 1 : 0,
            'c5_chatmessage_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'] ?? null,
            'c5_chatmessage_thread_reply_counter' => 0,
            // message
            'c5_chatmessage_language_code' => $this->values['c5_chatmessage_language_code'],
            'c5_chatmessage_message' => sanitize_string_tags($this->values['c5_chatmessage_message'], 'script_only'),
            'c5_chatmessage_is_edited' => 0,
            'c5_chatmessage_have_mention' => $c5_chatmessage_have_mention,
            'c5_chatmessage_mention_users_json' => $c5_chatmessage_mention_users_json,
            'c5_chatmessage_mention_c5_chatmessage_id' => $this->values['c5_chatmessage_mention_c5_chatmessage_id'] ?? null,
            'c5_chatmessage_have_reaction' => 0,
            'c5_chatmessage_is_answer' => 0,
            'c5_chatmessage_is_question' => 0,
            'c5_chatmessage_is_file' => $this->values['c5_chatmessage_is_file'] ?? 0,
            // AI
            'c5_chatmessage_is_new' => $this->values['c5_chatmessage_is_new'] ?? 0,
            'c5_chatmessage_thread_is_new' => $this->values['c5_chatmessage_thread_is_new'] ?? 0,
            'c5_chatmessage_is_loading' => $this->values['c5_chatmessage_is_loading'] ?? 0,
            'c5_chatmessage_thread_ai_agent_code' => $thread_ai_agent_code,
            'c5_chatmessage_thread_ai_conversation_code' => $thread_ai_conversation_code,
            // signature & terms
            'c5_chatmessage_um_usrsign_id' => $this->values['c5_chatmessage_um_usrsign_id'] ?? null,
            'c5_chatmessage_um_usrterm_id' => $this->values['c5_chatmessage_um_usrterm_id'] ?? null,
            // reasoning
            'c5_chatmessage_reasoning_json' => $this->values['c5_chatmessage_reasoning_json'],
            // image
            'c5_chatmessage_is_image' => $this->values['c5_chatmessage_is_image'],
            'c5_chatmessage_image_settings_json' => $this->values['c5_chatmessage_image_settings_json'],
            // sound
            'c5_chatmessage_is_sound' => $this->values['c5_chatmessage_is_sound'],
            'c5_chatmessage_sound_settings_json' => $this->values['c5_chatmessage_sound_settings_json'],
            // transcript
            'c5_chatmessage_is_transcript' => $this->values['c5_chatmessage_is_transcript'],
            'c5_chatmessage_transcript_settings_json' => $this->values['c5_chatmessage_transcript_settings_json'],
            // RAG
            'c5_chatmessage_is_rag' => $this->values['c5_chatmessage_is_rag'],
            'c5_chatmessage_rag_settings_json' => $this->values['c5_chatmessage_rag_settings_json'],
            // form
            'c5_chatmessage_is_form' => $this->values['c5_chatmessage_is_form'] ?? 0,
            'c5_chatmessage_form_settings_json' => $this->values['c5_chatmessage_form_settings_json'] ?? null,
            'c5_chatmessage_form_result_json' => $this->values['c5_chatmessage_form_result_json'] ?? null,
            'c5_chatmessage_form_status_id' => $this->values['c5_chatmessage_form_status_id'] ?? null,
            // other
            'c5_chatmessage_parent_c5_chatmessage_id' => $this->values['c5_chatmessage_parent_c5_chatmessage_id'] ?? null,
            'c5_chatmessage_updated_timestamp' => $c5_chatmessage_updated_timestamp,
            'c5_chatmessage_inactive' => 0,
        ])->merge();
        if (!$new_message_result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $new_message_result);
        }
        $total_messages = $messages_ar->queryBuilder()
            ->select()
            ->columns([
                'counter' => 'COUNT(*)',
                'user_messages_counter' => "SUM(CASE WHEN c5_chatmessage_no_data_model_role_code = 'user' THEN 1 ELSE 0 END)"
            ])
            ->whereMultiple('AND', [
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            ])
            ->query();
        $total_messages_counter = $total_messages['rows'][0]['counter'] ?? 0;
        $user_counter = $total_messages['rows'][0]['user_messages_counter'] ?? 0;
        $c5_chat_name = [];
        if (empty($chat_data['c5_chat_name'])) {
            $text = trim(strip_tags2($this->values['c5_chatmessage_message']));
            if (strlen($text) > 50) {
                $c5_chat_name['c5_chat_name'] = substr($text, 0, 47) . '...';
            } else {
                $c5_chat_name['c5_chat_name'] = $text;
            }
        }
        $result = $chats_ar->touch([
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            'c5_chat_message_count' => $total_messages_counter,
        ] + $c5_chat_name, ['updated']);
        if (!$result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        // thread
        if (!empty($this->values['c5_chatmessage_thread_c5_chatmessage_id'])) {
            $total_thread_messages_counter = $messages_ar->queryBuilder()
                ->select()
                ->columns([
                    'counter' => 'COUNT(*)',
                ])
                ->whereMultiple('AND', [
                    'c5_chatmessage_tenant_id' => \Tenant::id(),
                    'c5_chatmessage_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                ])
                ->query()['rows'][0]['counter'] ?? 1;
            $thread_result = (new MessagesAR())->fill([
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                'c5_chatmessage_is_thread' => 1,
                'c5_chatmessage_thread_c5_chatmessage_id' => null,
                'c5_chatmessage_thread_reply_counter' => $total_thread_messages_counter,
            ])->merge();
            if (!$thread_result['success']) {
                $this->rollback();
                return $this->finish(HTTPConstants::Status500InternalServerError, $thread_result);
            }
        }
        // update user that posts the message
        if (!empty($this->values['c5_chatmessage_um_user_id'])) {
            $total_user_messages = $messages_ar->queryBuilder()
                ->select()
                ->columns([
                    'counter' => 'COUNT(*)',
                ])
                ->whereMultiple('AND', [
                    'c5_chatmessage_tenant_id' => \Tenant::id(),
                    'c5_chatmessage_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                    'c5_chatmessage_um_user_id' => $this->values['c5_chatmessage_um_user_id']
                ])
                ->query();
            $result = $chat_users_ar->touch([
                'c5_chatuser_tenant_id' => \Tenant::id(),
                'c5_chatuser_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                'c5_chatuser_um_user_id' => $this->values['c5_chatmessage_um_user_id'],
                'c5_chatuser_message_count' => $total_user_messages['rows'][0]['counter'],
                'c5_chatuser_unread_count' => 0,
                'c5_chatuser_unread_c5_chatmessage_id' => $new_message_result['new_serials']['c5_chatmessage_id'],
            ], ['updated']);
            if (!$result['success']) {
                $this->rollback();
                return $this->finish(HTTPConstants::Status500InternalServerError, $result);
            }
        }
        // update other users
        $result = \Numbers\Users\Chats\Helper\Chats::updateChatUserStats([
            'c5_chatmessage_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
        ]);
        if (!$result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        // get records for message and thread
        $message_and_thread_result = \Numbers\Users\Chats\Helper\Mentions::processMessage($this->values['c5_chatmessage_c5_chat_id'], $chat_data['c5_chat_c5_chatchannel_code'], $new_message_result['new_serials']['c5_chatmessage_id'], $this->values['c5_chatmessage_thread_c5_chatmessage_id'] ?? null, $chat_data);
        $raw_batch_records = array_merge_hard($raw_batch_records, $message_and_thread_result['records']);
        // ~ quick searches
        if (!empty($raw_quick_searches)) {
            $quick_searches_result = \Numbers\Users\Chats\Helper\Mentions::processQuickSearches(array_keys($raw_quick_searches));
            $raw_batch_records = array_merge_hard($raw_batch_records, $quick_searches_result['records']);
        }
        // channel mentions
        if (!empty($raw_channels)) {
            $channel_mentions_result = \Numbers\Users\Chats\Helper\Mentions::processChannels(array_keys($raw_channels));
            $raw_batch_records = array_merge_hard($raw_batch_records, $channel_mentions_result['records']);
            // load chat assistant
            $chat_assistant = \Application::get('chat.assistant');
            if (empty($chat_assistant)) {
                throw new \Exception('Assistant is empty!');
            }
            $user = (new UsersAR())->loadIDByCode($chat_assistant['code'], null, ALL);
            foreach ($channel_mentions_result['users_json'] as $k => $v) {
                // we do not post to the same chat
                if ($k == $this->values['c5_chatmessage_c5_chat_id']) {
                    continue;
                }
                // create chat user
                $color = Colors::getColorsAndInitials($user[0]['um_user_name']);
                $chat_users_ar = new ChatUsersAR();
                $chat_user_result = $chat_users_ar->fill([
                    'c5_chatuser_tenant_id' => \Tenant::id(),
                    'c5_chatuser_c5_chat_id' => $k,
                    'c5_chatuser_um_user_id' => $user[0]['um_user_id'],
                    'c5_chatuser_um_user_name' => $user[0]['um_user_name'],
                    'c5_chatuser_icon' => '',
                    'c5_chatuser_avatar_colors' => $color,
                    'c5_chatuser_no_data_model_role_code' => 'assistant',
                    'c5_chatuser_is_ai_assistant' => 1,
                    'c5_chatuser_ai_model_code' => null,
                    'c5_chatuser_inactive' => 0
                ])
                ->merge();
                if (!$chat_user_result['success']) {
                    $this->rollback();
                    return $this->finish(HTTPConstants::Status500InternalServerError, $chat_user_result);
                }
                // if its different chat
                $channel_mentions_new_result = \API::runLocal(ChatMessagesAPI::class, 'postPostMessage', [
                    'c5_chatmessage_tenant_id' => $options['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
                    'c5_chatmessage_c5_chat_id' => $k,
                    'c5_chatmessage_um_user_id' => $user[0]['um_user_id'],
                    'c5_chatmessage_sm_session_id' => null,
                    'c5_chatmessage_um_user_name' => $user[0]['um_user_name'],
                    'c5_chatmessage_no_data_model_role_code' => $options['c5_chatmessage_no_data_model_role_code'] ?? 'assistant',
                    'c5_chatmessage_language_code' => $options['c5_chatmessage_language_code'] ?? 'eng',
                    'c5_chatmessage_message' => $this->values['c5_chatmessage_message'],
                    'c5_chatmessage_is_new' => 0, // leave it at 0
                    'c5_chatmessage_is_loading' => $options['c5_chatmessage_is_loading'] ?? 0,
                    // channel mentions
                    'c5_chatmessage_mention_c5_chatmessage_id' => $new_message_result['new_serials']['c5_chatmessage_id'],
                ]);
                if (!$channel_mentions_new_result['success']) {
                    $this->rollback();
                    return $this->finish(HTTPConstants::Status500InternalServerError, $channel_mentions_new_result);
                }
            }
        }
        // save context
        if (!empty($raw_batch_records)) {
            $batch_helper_save = BatchHelperSave::create(null, 'C5_CHAT_CONVERSATION', $raw_batch_records);
            if (!$batch_helper_save['success']) {
                $this->rollback();
                return $this->finish(HTTPConstants::Status500InternalServerError, $batch_helper_save);
            }
            $batch_update_message_result = (new MessagesAR())->fill([
                'c5_chatmessage_tenant_id' => \Tenant::id(),
                'c5_chatmessage_id' => $new_message_result['new_serials']['c5_chatmessage_id'],
                'c5_chatmessage_tm_batchentry_code' => $batch_helper_save['tm_batchentry_code'],
                'c5_chatmessage_batch_context_counter' => $batch_helper_save['batch_context_counter'],
            ])->merge();
            if (!$batch_update_message_result['success']) {
                $this->rollback();
                return $this->finish(HTTPConstants::Status500InternalServerError, $batch_update_message_result);
            }
        }
        // mark thread as read
        if (!empty($this->values['c5_chatmessage_thread_c5_chatmessage_id'])) {
            $result = ChatUserThreadUnreads::collectionStatic()->merge([
                'c5_chatusrthrdunrd_tenant_id' => $options['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
                'c5_chatusrthrdunrd_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
                'c5_chatusrthrdunrd_um_user_id' => $this->values['c5_chatmessage_um_user_id'],
                'c5_chatusrthrdunrd_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                'c5_chatusrthrdunrd_unread_count' => 0,
                'c5_chatusrthrdunrd_unread_c5_chatmessage_id' => $new_message_result['new_serials']['c5_chatmessage_id'],
                'c5_chatusrthrdunrd_inactive' => 0,
            ]);
        }
        // commit
        $this->commit();
        // update web sockets
        $web_socket_settings = \Application::get('websockets.default');
        $socketio = new \WebSockets('default', $web_socket_settings['submodule'], $web_socket_settings);
        $room_list = ['ChatPageStandalone' . '::' . \Tenant::id() . '_' . $this->values['c5_chatmessage_c5_chat_id']];
        $socketio->connectJoinAndSend($room_list, ['message' => 'Posted new message!']);
        // return
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'c5_chatmessage_id' => $new_message_result['new_serials']['c5_chatmessage_id'],
            'c5_chatmessage_updated_timestamp' => $c5_chatmessage_updated_timestamp,
        ]);
    }

    /**
     * Post chat reaction
     */
    public $postPostReaction_name = 'Post chat reaction';
    public $postPostReaction_description = 'Use this API to post chat reaction.';
    public $postPostReaction_columns = [
        'c5_chatmessreaction_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatmessreaction_c5_chatmessage_id' => ['required' => true, 'name' => 'Message #', 'domain' => 'message_id'],
        'c5_chatmessreaction_um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'c5_chatmessreaction_sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
        'c5_chatmessreaction_um_user_name' => ['required' => true, 'name' => 'Name', 'domain' => 'name'],
        'c5_chatmessreaction_name' => ['required' => true, 'name' => 'Name', 'domain' => 'name'],
        'c5_chatmessreaction_icon' => ['required' => true, 'name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'c5_chatmessreaction_emoji' => ['required' => true, 'name' => 'Emoji', 'domain' => 'emoji', 'null' => true],
    ];
    public $postPostReaction_result_danger = \Validator::RESULT_DANGER;
    public $postPostReaction_result_success = RESULT_SUCCESS;
    public function postPostReaction(ChatsAR $chats_ar, ReactionsAR $reactions_ar)
    {
        $this->begin();
        $result = $reactions_ar->fill([
            'c5_chatmessreaction_tenant_id' => \Tenant::id(),
            'c5_chatmessreaction_c5_chat_id' => $this->values['c5_chatmessreaction_c5_chat_id'],
            'c5_chatmessreaction_c5_chatmessage_id' => $this->values['c5_chatmessreaction_c5_chatmessage_id'],
            'c5_chatmessreaction_um_user_id' => $this->values['c5_chatmessreaction_um_user_id'] ?? null,
            'c5_chatmessreaction_um_user_name' => $this->values['c5_chatmessreaction_um_user_name'] ?? 'Anonymous',
            'c5_chatmessreaction_sm_session_id' => $this->values['c5_chatmessreaction_sm_session_id'] ?? null,
            'c5_chatmessreaction_name' => $this->values['c5_chatmessreaction_name'],
            'c5_chatmessreaction_icon' => $this->values['c5_chatmessreaction_icon'],
            'c5_chatmessreaction_emoji' => $this->values['c5_chatmessreaction_emoji'],
            'c5_chatmessreaction_inactive' => 0,
        ])->merge();
        if (!$result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        $result = $chats_ar->touch([
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_id' => $this->values['c5_chatmessreaction_c5_chat_id'],
        ], ['updated']);
        if (!$result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        $this->commit();
        // update web sockets
        $web_socket_settings = \Application::get('websockets.default');
        $socketio = new \WebSockets('default', $web_socket_settings['submodule'], $web_socket_settings);
        $room_list = ['ChatPageStandalone' . '::' . \Tenant::id() . '_' . $this->values['c5_chatmessreaction_c5_chat_id']];
        $socketio->connectJoinAndSend($room_list, ['message' => 'Posted new reaction!']);
        // return
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
        ]);
    }

    /**
     * Get chat messages
     */
    public $postGetMessages_name = 'Get chat messages';
    public $postGetMessages_description = 'Use this API to get chat messages.';
    public $postGetMessages_columns = [
        'c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
        'c5_chatmessage_is_thread_id' => ['name' => 'Thread Message #', 'domain' => 'message_id', 'null' => true],
    ];
    public $postGetMessages_result_danger = \Validator::RESULT_DANGER;
    public $postGetMessages_result_success = RESULT_SUCCESS;
    public function postGetMessages(MessagesAR $messages_ar)
    {
        $parameters = $this->values;
        $messages_model = new Messages();
        /** @var Builder $message_query */
        $message_query = $messages_ar->queryBuilder(['alias' => 'a'])
            ->select()
            ->columns([
                'a.*',
                'c5_chatuser_um_user_name' => 'COALESCE(b.c5_chatuser_um_user_name, c.c5_chatsession_um_user_name)',
                'c5_chatuser_avatar_colors' => 'COALESCE(b.c5_chatuser_avatar_colors, c.c5_chatsession_avatar_colors)',
                'c5_chatuser_photo_file_id' => 'b.c5_chatuser_photo_file_id',
                'c5_chatuser_photo_file_url' => 'b.c5_chatuser_photo_file_url',
                'current_unread_c5_chatmessage_id' => 'COALESCE(d.c5_chatuser_unread_c5_chatmessage_id, c.c5_chatsession_unread_c5_chatmessage_id)',
                'r.reactions_string',
                'message_user_last_seen' => 's.sm_session_last_requested',
                'c5_chatuser_is_ai_assistant' => 'b.c5_chatuser_is_ai_assistant',
                // mention
                'mention_c5_chatmessage_id' => 'e.c5_chatmessage_id',
                'mention_c5_chatuser_um_user_name' => 'f.c5_chatuser_um_user_name',
                'mention_c5_chatuser_avatar_colors' => 'f.c5_chatuser_avatar_colors',
                'mention_c5_chatmessage_inserted_timestamp' => 'e.c5_chatmessage_inserted_timestamp',
                // signature & terms
                'um_usrsign_content_wysiwyg' => 'signature.um_usrsign_content_wysiwyg',
                'um_usrterm_content_wysiwyg' => 'terms.um_usrterm_content_wysiwyg',
                // attachments ids
                'attachments.wg_document_file_id_1',
                'attachments.wg_document_file_id_2',
                'attachments.wg_document_file_id_3',
                'attachments.wg_document_file_id_4',
                'attachments.wg_document_file_id_5',
                'attachments.wg_document_file_id_6',
                'attachments.wg_document_file_id_7',
                'attachments.wg_document_file_id_8',
                'attachments.wg_document_file_id_9',
                'attachments.wg_document_file_id_10',
                'attachments.wg_document_file_id_11',
                'attachments.wg_document_file_id_12',
                'attachments.wg_document_file_id_13',
                'attachments.wg_document_file_id_14',
                'attachments.wg_document_file_id_15',
                'attachments.wg_document_file_id_16',
                'attachments.wg_document_file_id_17',
                'attachments.wg_document_file_id_18',
                'attachments.wg_document_file_id_19',
                'attachments.wg_document_file_id_20',
                'attachments.wg_document_file_id_21',
                'attachments.wg_document_file_id_22',
                'attachments.wg_document_file_id_23',
                'attachments.wg_document_file_id_24',
                'attachments.wg_document_file_id_25',
                'attachments.wg_document_file_id_26',
                'attachments.wg_document_file_id_27',
                'attachments.wg_document_file_id_28',
                'attachments.wg_document_file_id_29',
                'attachments.wg_document_file_id_30',
                // attachments names
                'attachments.wg_document_filename_1',
                'attachments.wg_document_filename_2',
                'attachments.wg_document_filename_3',
                'attachments.wg_document_filename_4',
                'attachments.wg_document_filename_5',
                'attachments.wg_document_filename_6',
                'attachments.wg_document_filename_7',
                'attachments.wg_document_filename_8',
                'attachments.wg_document_filename_9',
                'attachments.wg_document_filename_10',
                'attachments.wg_document_filename_11',
                'attachments.wg_document_filename_12',
                'attachments.wg_document_filename_13',
                'attachments.wg_document_filename_14',
                'attachments.wg_document_filename_15',
                'attachments.wg_document_filename_16',
                'attachments.wg_document_filename_17',
                'attachments.wg_document_filename_18',
                'attachments.wg_document_filename_19',
                'attachments.wg_document_filename_20',
                'attachments.wg_document_filename_21',
                'attachments.wg_document_filename_22',
                'attachments.wg_document_filename_23',
                'attachments.wg_document_filename_24',
                'attachments.wg_document_filename_25',
                'attachments.wg_document_filename_26',
                'attachments.wg_document_filename_27',
                'attachments.wg_document_filename_28',
                'attachments.wg_document_filename_29',
                'attachments.wg_document_filename_30',
                'attachments.wg_document_metadata_json',
            ])
            // joins
            ->join('LEFT', new ChatUsers(), 'b', 'ON', [
                ['AND', ['b.c5_chatuser_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                ['AND', ['b.c5_chatuser_um_user_id', '=', 'a.c5_chatmessage_um_user_id', true], false]
            ])
            ->join('LEFT', new ChatSessions(), 'c', 'ON', [
                ['AND', ['c.c5_chatsession_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                ['AND', ['c.c5_chatsession_sm_session_id', '=', $parameters['sm_session_id']], false]
            ])
            ->join('LEFT', new ChatUsers(), 'd', 'ON', [
                ['AND', ['d.c5_chatuser_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                ['AND', ['d.c5_chatuser_um_user_id', '=', $parameters['um_user_id']], false]
            ])
            ->join('LEFT', new ChatMessagesModel(), 'e', 'ON', [
                ['AND', ['e.c5_chatmessage_id', '=', 'a.c5_chatmessage_mention_c5_chatmessage_id', true], false]
            ])
            ->join('LEFT', new ChatUsers(), 'f', 'ON', [
                ['AND', ['f.c5_chatuser_c5_chat_id', '=', 'e.c5_chatmessage_c5_chat_id', true], false],
                ['AND', ['f.c5_chatuser_um_user_id', '=', 'e.c5_chatmessage_um_user_id', true], false]
            ])
            ->join('LEFT', new Signatures(), 'signature', 'ON', [
                ['AND', ['a.c5_chatmessage_um_usrsign_id', '=', 'signature.um_usrsign_id', true], false],
            ])
            ->join('LEFT', new Terms(), 'terms', 'ON', [
                ['AND', ['a.c5_chatmessage_um_usrterm_id', '=', 'terms.um_usrterm_id', true], false],
            ])
            ->join('LEFT', \Factory::model($messages_model->documents_model, true), 'attachments', 'ON', [
                ['AND', ['a.c5_chatmessage_id', '=', 'attachments.wg_document_c5_chatmessage_id', true], false],
            ])
            ->join('LEFT', function (& $query) use ($parameters) {
                $query = Reactions::queryBuilderStatic(['alias' => 'inner_r'])->select();
                $query->columns([
                    'inner_r.c5_chatmessreaction_c5_chatmessage_id',
                    'reactions_string' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_r.c5_chatmessreaction_um_user_name, inner_r.c5_chatmessreaction_name, inner_r.c5_chatmessreaction_emoji)", 'delimiter' => ';;'])
                ]);
                $query->where('AND', ['c5_chatmessreaction_c5_chat_id', '=', $parameters['c5_chat_id']]);
                $query->groupby(['inner_r.c5_chatmessreaction_c5_chatmessage_id']);
            }, 'r', 'ON', [
                ['AND', ['a.c5_chatmessage_id', '=', 'r.c5_chatmessreaction_c5_chatmessage_id', true], false]
            ])
            ->join('LEFT', function (& $query) use ($parameters) {
                $query = SystemSessions::queryBuilderStatic(['alias' => 'inner_s'])->select();
                $query->columns([
                    'sm_session_user_id' => 'inner_s.sm_session_user_id',
                    'sm_session_last_requested' => 'MAX(inner_s.sm_session_last_requested)',
                ]);
                $query->where('AND', ['sm_session_tenant_id', '=', \Tenant::id()]);
                $query->groupby(['inner_s.sm_session_user_id']);
            }, 's', 'ON', [
                ['AND', ['a.c5_chatmessage_um_user_id', '=', 's.sm_session_user_id', true], false]
            ])
            ->whereMultiple('AND', [
                'a.c5_chatmessage_tenant_id' => \Tenant::id(),
                'a.c5_chatmessage_c5_chat_id' => $this->values['c5_chat_id'],
            ])
            ->where('AND', function (& $query) use ($parameters) {
                $query->where('OR', function (& $query) use ($parameters) {
                    $query = ChatSessions::queryBuilderStatic(['alias' => 'exists_a'])->select();
                    $query->columns(['exists_a.c5_chatsession_sm_session_id']);
                    $query->where('AND', ['exists_a.c5_chatsession_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true]);
                    $query->where('AND', ['exists_a.c5_chatsession_sm_session_id', '=', $parameters['sm_session_id']]);
                }, 'EXISTS');
                if (!empty($parameters['um_user_id'])) {
                    $query->where('OR', function (& $query) use ($parameters) {
                        $query = ChatUsers::queryBuilderStatic(['alias' => 'exists_b'])->select();
                        $query->columns(['exists_b.c5_chatuser_um_user_id']);
                        $query->where('AND', ['exists_b.c5_chatuser_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true]);
                        $query->where('AND', ['exists_b.c5_chatuser_um_user_id', '=', $parameters['um_user_id']]);
                    }, 'EXISTS');
                }
            });
        // if we are loading thread
        if (!empty($parameters['c5_chatmessage_is_thread_id'])) {
            $message_query = $message_query->where('AND', function (& $query) use ($parameters) {
                $query->where('OR', ['a.c5_chatmessage_id', '=', $parameters['c5_chatmessage_is_thread_id']]);
                $query->where('OR', ['a.c5_chatmessage_thread_c5_chatmessage_id', '=', $parameters['c5_chatmessage_is_thread_id']]);
            });
        } else {
            // in regular chat we get no thread
            $message_query = $message_query->where('AND', ['a.c5_chatmessage_thread_c5_chatmessage_id', 'IS', null]);
        }
        $message_query = $message_query->orderby(['c5_chatmessage_inserted_timestamp' => SORT_ASC]);
        $result = $message_query->query(['c5_chatmessage_id']);
        // we need to set last row
        end($result['rows']);
        $last = key($result['rows']);
        // get all threads
        $threads = [];
        foreach ($result['rows'] as $k => $v) {
            if (!empty($v['c5_chatmessage_thread_reply_counter'])) {
                $threads[$k] = [];
            }
        }
        $thread_query_result = [];
        if (count($threads) > 0) {
            $thread_query = $messages_ar->queryBuilder(['alias' => 'a']);
            $thread_query_result = $thread_query->select()
                ->columns([
                    'c5_chatmessage_thread_c5_chatmessage_id' => 'a.c5_chatmessage_thread_c5_chatmessage_id',
                    'c5_chatuser_um_user_name' => $thread_query->db_object->sqlHelper('string_agg', ['expression' => "COALESCE(b.c5_chatuser_um_user_name, c.c5_chatsession_um_user_name)", 'delimiter' => ';;']),
                    'c5_chatuser_avatar_colors' => $thread_query->db_object->sqlHelper('string_agg', ['expression' => "COALESCE(b.c5_chatuser_avatar_colors, c.c5_chatsession_avatar_colors)", 'delimiter' => ';;']),
                    'c5_chatusrthrdunrd_unread_count' => 'SUM(CASE WHEN d.c5_chatusrthrdunrd_unread_c5_chatmessage_id IS NULL THEN 1 WHEN d.c5_chatusrthrdunrd_unread_c5_chatmessage_id = 0 THEN 1 WHEN d.c5_chatusrthrdunrd_unread_c5_chatmessage_id < a.c5_chatmessage_id THEN 1 ELSE 0 END)',
                    'c5_chatusrthrdunrd_unread_c5_chatmessage_id' => 'MAX(d.c5_chatusrthrdunrd_unread_c5_chatmessage_id)',
                ])
                // joins
                ->join('LEFT', new ChatUsers(), 'b', 'ON', [
                    ['AND', ['b.c5_chatuser_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                    ['AND', ['b.c5_chatuser_um_user_id', '=', 'a.c5_chatmessage_um_user_id', true], false]
                ])
                ->join('LEFT', new ChatSessions(), 'c', 'ON', [
                    ['AND', ['c.c5_chatsession_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                    ['AND', ['c.c5_chatsession_sm_session_id', '=', $parameters['sm_session_id']], false]
                ])
                ->join('LEFT', new ChatUserThreadUnreads(), 'd', 'ON', [
                    ['AND', ['d.c5_chatusrthrdunrd_c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
                    ['AND', ['d.c5_chatusrthrdunrd_um_user_id', '=', $parameters['um_user_id']], false],
                    ['AND', ['d.c5_chatusrthrdunrd_thread_c5_chatmessage_id', '=', 'a.c5_chatmessage_thread_c5_chatmessage_id', true], false]
                ])
                // where
                ->whereMultiple('AND', [
                    'a.c5_chatmessage_tenant_id' => \Tenant::id(),
                    'a.c5_chatmessage_thread_c5_chatmessage_id' => array_keys($threads),
                ])
                ->groupby(['c5_chatmessage_thread_c5_chatmessage_id'])
                ->query('c5_chatmessage_thread_c5_chatmessage_id');
        }
        // process
        foreach ($result['rows'] as $k => $v) {
            // format dates
            $result['rows'][$k]['c5_chatmessage_inserted_formatted'] = \Format::niceTimestamp($result['rows'][$k]['c5_chatmessage_inserted_timestamp'], ['format_time' => 'g:i a']);
            $result['rows'][$k]['mention_c5_chatmessage_inserted_formatted'] = \Format::niceTimestamp($result['rows'][$k]['mention_c5_chatmessage_inserted_timestamp'], ['format_time' => 'g:i a']);
            $result['rows'][$k]['c5_chatmessage_inserted_date_formatted'] = \Format::date($result['rows'][$k]['c5_chatmessage_inserted_timestamp']);
            if ($v['c5_chatmessage_thread_reply_counter'] > 0) {
                $result['rows'][$k]['c5_chatmessage_thread_reply_counter_verbose'] = loc('NF.Form.ReplyNumber', '{number} reply(ies)', [
                    'number' => $v['c5_chatmessage_thread_reply_counter'],
                    '__plural' => $v['c5_chatmessage_thread_reply_counter'],
                ]);
                // uniquer number of users
                $temp1a = explode(';;', $thread_query_result['rows'][$k]['c5_chatuser_um_user_name']);
                $temp1b = explode(';;', $thread_query_result['rows'][$k]['c5_chatuser_avatar_colors']);
                $temp1c = [];
                foreach ($temp1a as $k2 => $v2) {
                    $temp1c[$v2 . '::' . $temp1b[$k2]] = [
                        'name' => $v2,
                        'avatar_colors' => $temp1b[$k2],
                    ];
                }
                $result['rows'][$k]['c5_chatmessage_thread_reply_counter_users'] = array_values($temp1c);
                if (!empty($thread_query_result['rows'][$k]['c5_chatusrthrdunrd_unread_count'])) {
                    $result['rows'][$k]['c5_chatmessage_thread_reply_new_verbose'] = loc('NF.Form.NewNumber', '{number} new', [
                        'number' => $thread_query_result['rows'][$k]['c5_chatusrthrdunrd_unread_count'],
                    ]);
                } else {
                    $result['rows'][$k]['c5_chatmessage_thread_reply_new_verbose'] = null;
                }
                $result['rows'][$k]['c5_chatusrthrdunrd_unread_count'] = $thread_query_result['rows'][$k]['c5_chatusrthrdunrd_unread_count'] ?? 0;
                $result['rows'][$k]['c5_chatusrthrdunrd_unread_c5_chatmessage_id'] = $thread_query_result['rows'][$k]['c5_chatusrthrdunrd_unread_c5_chatmessage_id'] ?? 0;
            } else {
                $result['rows'][$k]['c5_chatmessage_thread_reply_counter_verbose'] = '';
                $result['rows'][$k]['c5_chatmessage_thread_reply_counter_users'] = [];
                // new in thread
                $result['rows'][$k]['c5_chatmessage_thread_reply_new_verbose'] = null;
                $result['rows'][$k]['c5_chatusrthrdunrd_unread_count'] = 0;
                $result['rows'][$k]['c5_chatusrthrdunrd_unread_c5_chatmessage_id'] = 0;
            }
            // for threads we need to push last read into all
            $thread_id = $v['c5_chatmessage_thread_c5_chatmessage_id'];
            if ($thread_id && isset($result['rows'][$thread_id])) {
                $result['rows'][$k]['c5_chatusrthrdunrd_unread_c5_chatmessage_id'] = $thread_query_result['rows'][$thread_id]['c5_chatusrthrdunrd_unread_c5_chatmessage_id'] ?? 0;
            }
            // reactions
            $result['rows'][$k]['reactions_grouped'] = [];
            if (!empty($v['reactions_string'])) {
                $grouped = [];
                $temp = explode(';;', $v['reactions_string']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    if (!isset($grouped[$v2[2]])) {
                        $grouped[$v2[2]] = 0;
                    }
                    $grouped[$v2[2]]++;
                }
                foreach ($grouped as $k2 => $v2) {
                    $result['rows'][$k]['reactions_grouped'][] = $v2 . 'x' . $k2;
                }
                $result['rows'][$k]['reactions_grouped'] = implode(', ', $result['rows'][$k]['reactions_grouped']);
            }
            // last activity duration
            if (!empty($v['message_user_last_seen'])) {
                $ts = new \Datetime2($v['message_user_last_seen'], 'timestamp');
                $result['rows'][$k]['message_user_last_seen'] = $ts->duration(['short' => true, 'min_in' => \Datetime2::MINUTES, 'less_than_min_in' => true]);
            } elseif ($v['c5_chatuser_is_ai_assistant']) {
                $result['rows'][$k]['message_user_last_seen'] = 'ai_assistant';
            } else {
                $result['rows'][$k]['message_user_last_seen'] = 'inactive';
            }
            // attachments
            $result['rows'][$k]['message_attachments'] = [];
            $files = [];
            if (is_json($result['rows'][$k]['wg_document_metadata_json'])) {
                $result['rows'][$k]['wg_document_metadata_json'] = json_decode($result['rows'][$k]['wg_document_metadata_json'], true);
            }
            for ($i = 1; $i <= 30; $i++) {
                if (!isset($result['rows'][$k]['wg_document_file_id_' . $i])) {
                    unset($result['rows'][$k]['wg_document_file_id_' . $i]);
                    unset($result['rows'][$k]['wg_document_filename_' . $i]);
                    continue;
                }
                $file_id = $result['rows'][$k]['wg_document_file_id_' . $i];
                $file_url = null;
                if (isset($result['rows'][$k]['wg_document_metadata_json']['file_id_' . $file_id]['file_url'])) {
                    $file_url = $result['rows'][$k]['wg_document_metadata_json']['file_id_' . $file_id]['file_url'];
                } else {
                    $file_url = DocumentBase::generateURLView($result['rows'][$k]['wg_document_file_id_' . $i], false, $result['rows'][$k]['wg_document_filename_' . $i]);
                }
                if (!empty(getenv('NF_IS_CONTAINER'))) {
                    $file_url = str_replace(['http://localhost/', 'https://localhost/'], \Request::host(), $file_url);
                }
                // todo wg_document_metadata_json
                $result['rows'][$k]['message_attachments'][] = [
                    'file_name' => $result['rows'][$k]['wg_document_filename_' . $i],
                    'file_id' => $result['rows'][$k]['wg_document_file_id_' . $i],
                    'file_url' => $file_url,
                ];
                unset($result['rows'][$k]['wg_document_file_id_' . $i]);
                unset($result['rows'][$k]['wg_document_filename_' . $i]);
            }
            unset($result['rows'][$k]['wg_document_metadata_json']);
            // form settings
            if (!empty($result['rows'][$k]['c5_chatmessage_form_settings_json'])) {
                $result['rows'][$k]['c5_chatmessage_form_settings_json'] = json_decode($result['rows'][$k]['c5_chatmessage_form_settings_json'], true);
            }
            // photo
            if (!empty(getenv('NF_IS_CONTAINER')) & !empty($result['rows'][$k]['c5_chatuser_photo_file_url'])) {
                $result['rows'][$k]['c5_chatuser_photo_file_url'] = str_replace(['http://localhost/', 'https://localhost/'], \Request::host(), $result['rows'][$k]['c5_chatuser_photo_file_url']);
            }
            // hash last
            $row = $result['rows'][$k];
            $row['message_attachments'] = array_column($result['rows'][$k]['message_attachments'], 'file_id');
            $result['rows'][$k]['hash'] = sha1(json_encode($row));
        }
        $data = ChatsDataSource::getStatic([
            'where' => [
                'um_user_id' => $this->values['um_user_id'],
                'sm_session_id' => $this->values['sm_session_id'],
                'load_all' => 1,
            ],
            'pk' => ['c5_chat_id'],
            'single_row' => false,
        ]);
        $chat_channel_data = [];
        $chat_sessions_data = [];
        $chat_direct_messages_data = [];
        foreach ($data as $k => $v) {
            if ($v['c5_chatchannel_code']) {
                $chat_channel_data[] = $v;
            } elseif ($v['c5_chat_c5_chattype_code'] == 'DM') {
                $chat_direct_messages_data[] = $v;
            } else {
                $chat_sessions_data[] = $v;
            }
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => $result['success'],
            'error' => $result['error'],
            'messages' => $result['rows'],
            'last' => $last,
            // side bar data
            'channels' => $chat_channel_data,
            'sessions' => $chat_sessions_data,
            'direct_messages' => $chat_direct_messages_data,
            // chat data
            'chat_data' => $data[$this->values['c5_chat_id']] ?? [],
        ]);
    }

    /**
     * Get chat channels
     */
    public $postGetChannels_name = 'Get chat channels';
    public $postGetChannels_description = 'Use this API to get chat channels.';
    public $postGetChannels_columns = [
        'c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id', 'null' => true],
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'sm_session_id' => ['name' => 'Session #', 'domain' => 'session_id', 'null' => true],
    ];
    public $postGetChannels_result_danger = \Validator::RESULT_DANGER;
    public $postGetChannels_result_success = RESULT_SUCCESS;
    public function postGetChannels()
    {
        $data = ChatsDataSource::getStatic([
            'where' => [
                'um_user_id' => $this->values['um_user_id'],
                'sm_session_id' => $this->values['sm_session_id'],
                'load_all' => 1,
            ],
            'pk' => ['c5_chat_id'],
            'single_row' => false,
        ]);
        $chat_channel_data = [];
        $chat_sessions_data = [];
        $chat_direct_messages_data = [];
        $chat_context = [];
        foreach ($data as $k => $v) {
            if ($v['c5_chatchannel_code']) {
                $chat_channel_data[] = $v;
            } elseif ($v['c5_chat_c5_chattype_code'] == 'DM') {
                $chat_direct_messages_data[] = $v;
            } else {
                $chat_sessions_data[] = $v;
            }
            if ($k == $this->values['c5_chat_id']) {
                $chat_context = $v['context'];
            }
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'channels' => $chat_channel_data,
            'sessions' => $chat_sessions_data,
            'direct_messages' => $chat_direct_messages_data,
            'context' => $chat_context,
        ]);
    }

    /**
     * Get chat channels
     */
    public $postPostNoAI_name = 'Post No AI';
    public $postPostNoAI_description = 'Use this API to set no ai flag.';
    public $postPostNoAI_columns = [
        'c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id', 'null' => true],
        'c5_chat_no_ai' => ['name' => 'No AI', 'type' => 'boolean'],
    ];
    public $postPostNoAI_result_danger = \Validator::RESULT_DANGER;
    public $postPostNoAI_result_success = RESULT_SUCCESS;
    public function postPostNoAI(ChatsAR $chats_ar)
    {
        $result = $chats_ar->fill([
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_id' => $this->values['c5_chat_id'],
            'c5_chat_no_ai' => $this->values['c5_chat_no_ai'],
        ])->merge();
        return $this->finish(HTTPConstants::Status200OK, $result);
    }

    /**
     * Get chat mentions
     */
    public $postGetMentions_name = 'Get chat mentions';
    public $postGetMentions_description = 'Use this API to get chat mentions.';
    public $postGetMentions_columns = [
        'um_user_name' => ['required' => true, 'name' => 'Name', 'domain' => 'name'],
    ];
    public $postGetMentions_result_danger = \Validator::RESULT_DANGER;
    public $postGetMentions_result_success = RESULT_SUCCESS;
    public function postGetMentions()
    {
        $parameters = $this->values;
        $result = Mentions::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'id' => 'a.um_usrmention_mention',
                'user_id' => 'a.um_usrmention_user_id::varchar',
                'name' => 'b.um_user_name',
                'type' => "'user'",
            ])
            // joins
            ->join('LEFT', new Users(), 'b', 'ON', [
                ['AND', ['a.um_usrmention_user_id', '=', 'b.um_user_id', true], false],
            ])
            ->where('AND', function (& $query) use ($parameters) {
                $query->where('OR', ['a.um_usrmention_mention', 'LIKE%', $parameters['um_user_name']]);
                $query->where('OR', ['b.um_user_name', 'LIKE%', $parameters['um_user_name']]);
            })
            ->union('UNION ALL', function (& $query2) use ($parameters) {
                $query2 =  Groups::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_groups'])->select();
                $query2->columns([
                    'id' => 'inner_groups.c5_chatgroup_mention',
                    'user_id' => 'inner_groups.c5_chatgroup_code',
                    'name' => 'inner_groups.c5_chatgroup_name',
                    'type' => "'group'",
                ]);
                if (!empty($parameters['um_user_name'])) {
                    $query2->where('AND', function (& $query) use ($parameters) {
                        $query->where('OR', ['inner_groups.c5_chatgroup_code', 'LIKE%', $parameters['um_user_name']]);
                        $query->where('OR', ['inner_groups.c5_chatgroup_name', 'LIKE%', $parameters['um_user_name']]);
                        $query->where('OR', ['inner_groups.c5_chatgroup_mention', 'LIKE%', $parameters['um_user_name']]);
                    });
                }
                $query2->orderby(['name' => SORT_ASC]);
                $query2->limit(10);
            })
            ->query('id');
        $mentions = array_values($result['rows']);
        foreach ($mentions as $k => $v) {
            $mentions[$k]['text'] = $v['id'] . ' - ' . $v['name'];
            if ($v['type'] == 'user') {
                $mentions[$k]['link'] = "javascript:window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_user_profile_form', {um_user_id: " . $v['user_id'] . "});";
            } elseif ($v['type'] == 'group') {
                $mentions[$k]['link'] = "javascript:window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_group_form', {c5_chatgroup_code: '" . $v['user_id'] . "'});";
            }
            $mentions[$k]['userId'] = $v['user_id'];
            unset($mentions[$k]['user_id'], $mentions[$k]['type']);
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => $result['success'],
            'error' => $result['error'],
            'mentions' => $mentions,
        ]);
    }

    /**
     * Post unseen
     */
    public $postRemoveUnseen_name = 'Post unseen';
    public $postRemoveUnseen_description = 'Use this API to post unseen.';
    public $postRemoveUnseen_columns = [
        'c5_chatuser_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatuser_um_user_id' => ['required' => true, 'name' => 'User #', 'domain' => 'user_id', 'null' => true],
        'c5_chatuser_unread_c5_chatmessage_id' => ['required' => true, 'name' => 'Message #', 'domain' => 'message_id'],
        'c5_chatmessage_is_thread' => ['name' => 'Is Thread', 'type' => 'boolean'],
        'c5_chatmessage_thread_c5_chatmessage_id' => ['name' => 'Thread Message #', 'domain' => 'message_id', 'null' => true],
    ];
    public $postRemoveUnseen_result_danger = \Validator::RESULT_DANGER;
    public $postRemoveUnseen_result_success = RESULT_SUCCESS;
    public function postRemoveUnseen(ChatsAR $chats_ar, ChatUsersAR $chat_users_ar)
    {
        $this->begin();
        if (!empty($this->values['c5_chatmessage_is_thread'])) {
            $read_result = ChatUserThreadUnreads::queryBuilderStatic()
                ->select()
                ->columns('*')
                ->whereMultiple('AND', [
                    'c5_chatusrthrdunrd_tenant_id' => \Tenant::id(),
                    'c5_chatusrthrdunrd_c5_chat_id' => $this->values['c5_chatuser_c5_chat_id'],
                    'c5_chatusrthrdunrd_um_user_id' => $this->values['c5_chatuser_um_user_id'],
                    'c5_chatusrthrdunrd_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                ])
                ->query();
            if (empty($read_result['rows'])) {
                $result = ChatUserThreadUnreads::collectionStatic()->merge([
                    'c5_chatusrthrdunrd_tenant_id' => \Tenant::id(),
                    'c5_chatusrthrdunrd_c5_chat_id' => $this->values['c5_chatuser_c5_chat_id'],
                    'c5_chatusrthrdunrd_um_user_id' => $this->values['c5_chatuser_um_user_id'],
                    'c5_chatusrthrdunrd_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                    'c5_chatusrthrdunrd_unread_count' => 0,
                    'c5_chatusrthrdunrd_unread_c5_chatmessage_id' => $this->values['c5_chatuser_unread_c5_chatmessage_id'],
                    'c5_chatusrthrdunrd_inactive' => 0,
                ]);
            } else {
                $result = ChatUserThreadUnreads::queryBuilderStatic()
                    ->update()
                    ->set([
                        'c5_chatusrthrdunrd_unread_c5_chatmessage_id' => $this->values['c5_chatuser_unread_c5_chatmessage_id'],
                    ])
                    ->whereMultiple('AND', [
                        'c5_chatusrthrdunrd_tenant_id' => \Tenant::id(),
                        'c5_chatusrthrdunrd_c5_chat_id' => $this->values['c5_chatuser_c5_chat_id'],
                        'c5_chatusrthrdunrd_um_user_id' => $this->values['c5_chatuser_um_user_id'],
                        'c5_chatusrthrdunrd_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
                    ])
                    ->where('AND', ['c5_chatusrthrdunrd_unread_c5_chatmessage_id', '<', $this->values['c5_chatuser_unread_c5_chatmessage_id']])
                    ->query();
            }
        } else {
            // update the cursor
            $result = ChatUsers::queryBuilderStatic()
                ->update()
                ->set([
                    'c5_chatuser_unread_c5_chatmessage_id' => $this->values['c5_chatuser_unread_c5_chatmessage_id'],
                ])
                ->whereMultiple('AND', [
                    'c5_chatuser_tenant_id' => \Tenant::id(),
                    'c5_chatuser_c5_chat_id' => $this->values['c5_chatuser_c5_chat_id'],
                    'c5_chatuser_um_user_id' => $this->values['c5_chatuser_um_user_id'],
                ])
                ->where('AND', ['c5_chatuser_unread_c5_chatmessage_id', '<', $this->values['c5_chatuser_unread_c5_chatmessage_id']])
                ->query();
        }
        if (!$result['success']) {
            $this->rollback();
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        // update other users
        $result = \Numbers\Users\Chats\Helper\Chats::updateChatUserStats([
            'c5_chatmessage_c5_chat_id' => $this->values['c5_chatuser_c5_chat_id'],
        ]);
        $this->commit();
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
        ]);
    }

    /**
     * Get chat quick search and mentions
     */
    public $postGetQuickSearchAndMentions_name = 'Get chat quick search and mentions';
    public $postGetQuickSearchAndMentions_description = 'Use this API to get chat quick search and mentions.';
    public $postGetQuickSearchAndMentions_columns = [
        'query_text' => ['required' => true, 'name' => 'Query Text', 'domain' => 'name'],
    ];
    public $postGetQuickSearchAndMentions_result_danger = \Validator::RESULT_DANGER;
    public $postGetQuickSearchAndMentions_result_success = RESULT_SUCCESS;
    public function postGetQuickSearchAndMentions()
    {
        $parameters = $this->values;
        $keyed_word = explode(':', $this->values['query_text']);
        $parameters['query_keyword'] = trim($keyed_word[0] ?? '');
        $parameters['query_actual'] = trim($keyed_word[1] ?? '');
        $supported_locales = \Application::get('flag.global.loc.supported_locales.AN');
        $qsm = \Application::get('qsm') ?? [];
        $stop_words = [];
        $found = [];
        $mentions = [];
        $negative_index = -1;
        foreach ($qsm as $module_code => $v) {
            foreach ($v as $module_name => $v2) {
                foreach ($v2 as $column_key => $v3) {
                    $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['name'] = $v3['name'];
                    $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'] = [$v3['name']];
                    foreach ($supported_locales as $v4) {
                        $stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'][] = loc($v3['loc'], '', ['locale_code' => $v4['locale']]);
                    }
                    $description = \I18n::textToLoc('NF.System', $v3['description'], [
                        'translate' => true,
                    ]);
                    $mentions[] = [
                        'id' => '~[' . loc($v3['loc'], $v3['name']) . ': XXXXXX]',
                        'userId' => $negative_index,
                        'name' => $description,
                        'text' => loc($v3['loc'], $v3['name']) . ': ' . 'XXXXXX',
                    ];
                    $negative_index--;
                    // check if we have key word
                    foreach ($stop_words[$module_code . '::' . $module_name . '::' . $column_key]['all'] as $v5) {
                        if (strcasecmp($parameters['query_keyword'], $v5) == 0) {
                            $found = $v3;
                            goto found_label;
                        }
                    }
                }
            }
        }
        // if we have a key word
        found_label:
        if (!empty($found)) {
            $model = \Factory::model($found['model']);
            $result = $model->queryBuilder(['alias' => 'a'])
                ->select()
                ->columns([
                    'id' => 'a.' . $found['column_key'],
                    'user_id' => 'a.' . $found['column_id'],
                    'name' => 'a.' . $found['column_name'],
                ])
                ->where('AND', function (& $query) use ($parameters, $found) {
                    if (!empty($found['column_id_numeric']) && is_numeric($parameters['query_actual'])) {
                        $query->where('OR', ['a.' . $found['column_id'], '=', (int) $parameters['query_actual']]);
                    }
                    if (!empty($found['column_name'])) {
                        $query->where('OR', ['a.' . $found['column_name'], 'LIKE%', $parameters['query_actual']]);
                    }
                    if ($found['column_key'] != $found['column_id']) {
                        $query->where('OR', ['a.' . $found['column_key'], 'LIKE%', $parameters['query_actual']]);
                    }
                })
                ->limit(10);
            if (!empty($found['column_orderby'])) {
                $result->orderby([$found['column_orderby'] => SORT_ASC]);
            }
            $result = $result->query('id');
            $mentions = array_values($result['rows']);
            foreach ($mentions as $k => $v) {
                $mentions[$k]['id'] = '~' . loc($found['loc'], $found['name']) . ': ' . $mentions[$k]['id'];
                $mentions[$k]['text'] = $mentions[$k]['id'];
                if (isset($v['name'])) {
                    // strip tags
                    $v['name'] = strip_tags2($v['name']);
                    $mentions[$k]['name'] = $v['name'] = substr_character_length($v['name'], 25, '...');
                    // append to text
                    $mentions[$k]['text'] .= ' - ' . $v['name'];
                }
                $mentions[$k]['userId'] = $v['user_id'];
                unset($mentions[$k]['user_id']);
                // todo add links to quick preview
                if (!empty($found['have_batches'])) {
                    $mention_model = \Factory::model($found['model'], true);
                    $mentions[$k]['link'] = $mention_model->batchesGetEditEndpoint($v['user_id']);
                } else {
                    $mentions[$k]['link'] = 'javascript:void(0)';
                }
            }
            return $this->finish(HTTPConstants::Status200OK, [
                'success' => $result['success'],
                'error' => $result['error'],
                'mentions' => $mentions,
            ]);
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'mentions' => $mentions,
        ]);
    }

    /**
     * Get chat mentions
     */
    public $postGetChannelMentions_name = 'Get chat channel mentions';
    public $postGetChannelMentions_description = 'Use this API to get chat channel mentions.';
    public $postGetChannelMentions_columns = [
        'query_text' => ['required' => true, 'name' => 'Query Text', 'domain' => 'name'],
    ];
    public $postGetChannelMentions_result_danger = \Validator::RESULT_DANGER;
    public $postGetChannelMentions_result_success = RESULT_SUCCESS;
    public function postGetChannelMentions()
    {
        $parameters = $this->values;
        $result = ChatChannels::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'id' => 'a.c5_chatchannel_mention',
                'user_id' => 'a.c5_chatchannel_code',
                'name' => 'a.c5_chatchannel_name',
                'channel_uuid' => 'b.c5_chat_uuid',
            ])
            // joins
            ->join('LEFT', new Chats(), 'b', 'ON', [
                ['AND', ['a.c5_chatchannel_code', '=', 'b.c5_chat_c5_chatchannel_code', true], false],
            ])
            ->where('AND', condition: function (& $query) use ($parameters) {
                $query->where('OR', ['a.c5_chatchannel_mention', 'LIKE%', $parameters['query_text']]);
                $query->where('OR', ['a.c5_chatchannel_name', 'LIKE%', $parameters['query_text']]);
            })
            ->limit(10)
            ->query('id');
        $mentions = array_values($result['rows']);
        foreach ($mentions as $k => $v) {
            $mentions[$k]['text'] = $v['id'] . ' - ' . $v['name'];
            $mentions[$k]['link'] = \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                'c5_chatchannel_code' => $v['user_id'],
            ], [
                'return_value' => true
            ]);
            $mentions[$k]['userId'] = $v['user_id'];
            unset($mentions[$k]['user_id']);
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => $result['success'],
            'error' => $result['error'],
            'mentions' => $mentions,
        ]);
    }

    /**
     * Get context
     */
    public $postGetContext_name = 'Get context';
    public $postGetContext_description = 'Use this API to get context.';
    public $postGetContext_columns = [
        'c5_chatmessage_id' => ['required' => true, 'name' => 'Message #', 'domain' => 'message_id'],
    ];
    public $postGetContext_result_danger = \Validator::RESULT_DANGER;
    public $postGetContext_result_success = RESULT_SUCCESS;
    public function postGetContext()
    {
        $success = false;
        $batch_code = ChatMessagesModel::getByColumnStatic('c5_chatmessage_id', $this->values['c5_chatmessage_id'], 'c5_chatmessage_tm_batchentry_code');
        $batch_data = [];
        if (!empty($batch_code)) {
            $batch_data = BatchRecordsModel::getStatic([
                'where' => [
                    'tm_batchrecord_tenant_id' => \Tenant::id(),
                    'tm_batchrecord_tm_batchentry_code' => $batch_code,
                ],
                'pk' => ['tm_batchrecord_id']
            ]);
            $batch_role_types = Roles::optionsStatic();
            foreach ($batch_data as $k => $v) {
                $batch_data[$k]['tm_batchrecord_no_data_model_role_name'] = $batch_role_types[$v['tm_batchrecord_no_data_model_role_code']]['name'];
            }
            $success = true;
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => $success,
            'error' => [],
            'data' => array_values($batch_data),
        ]);
    }

    /**
     * Get canvases
     */
    public $postGetCanvases_name = 'Get canvases';
    public $postGetCanvases_description = 'Use this API to get canvases.';
    public $postGetCanvases_columns = [
        'c5_chatcanvsmap_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatcanvslstuser_um_user_id' => ['required' => true, 'name' => 'User #', 'domain' => 'user_id'],
        'c5_chatcanvslist_id' => ['name' => 'List #', 'domain' => 'big_id', 'null' => true],
        'c5_chatcanvslist_c5_chatcanvas_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'c5_chatcanvslstuser_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $postGetCanvases_result_danger = \Validator::RESULT_DANGER;
    public $postGetCanvases_result_success = RESULT_SUCCESS;
    public function postGetCanvases()
    {
        // if we click on checkbox
        if ($this->values['c5_chatcanvslist_id']) {
            $click_result = ChatCanvasList2Users::collectionStatic()->merge([
                'c5_chatcanvslstuser_tenant_id' => \Tenant::id(),
                'c5_chatcanvslstuser_c5_chatcanvslist_id' => $this->values['c5_chatcanvslist_id'],
                'c5_chatcanvslstuser_um_user_id' => $this->values['c5_chatcanvslstuser_um_user_id'],
                'c5_chatcanvslstuser_c5_chat_id' => $this->values['c5_chatcanvsmap_c5_chat_id'],
                'c5_chatcanvslstuser_c5_chatcanvas_code' => $this->values['c5_chatcanvslist_c5_chatcanvas_code'],
                'c5_chatcanvslstuser_inactive' => $this->values['c5_chatcanvslstuser_inactive'],
            ]);
            if (!$click_result['success']) {
                return $this->finish(HTTPConstants::Status500InternalServerError, $click_result);
            }
        }

        $parameters = $this->values;
        $result = ChatCanvasMap::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns(['a.*', 'b.*'])
            ->join('INNER', new ChatCanvases(), 'b', 'ON', [
                ['AND', ['a.c5_chatcanvsmap_c5_chatcanvas_code', '=', 'b.c5_chatcanvas_code', true], false],
            ])
            ->whereMultiple('AND', [
                'a.c5_chatcanvsmap_tenant_id' => \Tenant::id(),
                'a.c5_chatcanvsmap_c5_chat_id' => $this->values['c5_chatcanvsmap_c5_chat_id'],
            ])
            ->where('AND', function (& $query) use ($parameters) {
                if (!empty($parameters['c5_chatcanvslist_c5_chatcanvas_code'])) {
                    $query->where('OR', ['a.c5_chatcanvsmap_c5_chatcanvas_code', '=', $parameters['c5_chatcanvslist_c5_chatcanvas_code']]);
                } else {
                    $query->where('OR', 'TRUE');
                }
            })
            ->orderby(['c5_chatcanvsmap_tab' => SORT_ASC, 'c5_chatcanvsmap_order' => SORT_ASC])
            ->query(['c5_chatcanvsmap_tab', 'c5_chatcanvsmap_c5_chatcanvas_code']);

        foreach ($result['rows'] as $k => $v) {
            foreach ($v as $k2 => $v2) {
                if ($v2['c5_chatcanvas_c5_canvastype_code'] == 'LIST') {
                    $result['rows'][$k][$k2]['c5_chatcanvas_list'] = ChatCanvasLists::queryBuilderStatic(['alias' => 'a'])
                        ->select()
                        ->columns([
                            'a.*',
                            'b.c5_chatcanvslstuser_um_user_id',
                        ])
                        ->join('LEFT', new ChatCanvasList2Users(), 'b', 'ON', [
                            ['AND', ['b.c5_chatcanvslstuser_c5_chat_id', '=', $this->values['c5_chatcanvsmap_c5_chat_id'], false], false],
                            ['AND', ['b.c5_chatcanvslstuser_um_user_id', '=', $this->values['c5_chatcanvslstuser_um_user_id'], false], false],
                            ['AND', ['b.c5_chatcanvslstuser_c5_chatcanvas_code', '=', 'a.c5_chatcanvslist_c5_chatcanvas_code', true], false],
                            ['AND', ['b.c5_chatcanvslstuser_c5_chatcanvslist_id', '=', 'a.c5_chatcanvslist_id', true], false],
                            ['AND', ['b.c5_chatcanvslstuser_inactive', '=', 0, false], false],
                        ])
                        ->whereMultiple('AND', [
                            'a.c5_chatcanvslist_tenant_id' => \Tenant::id(),
                            'a.c5_chatcanvslist_c5_chatcanvas_code' => $k2,
                        ])
                        ->orderby(['c5_chatcanvslist_order' => SORT_ASC])
                        ->query(['c5_chatcanvslist_group', 'c5_chatcanvslist_id'])['rows'] ?? [];
                }
            }
        }

        return $this->finish(HTTPConstants::isSuccess($result['success']), [
            'success' => $result['success'],
            'error' => $result['error'],
            'data' => $result['rows'],
        ]);
    }

    /**
     * Get context
     */
    public $postUpdateMessageAI_name = 'Update Message';
    public $postUpdateMessageAI_description = 'Use this API to update message to process with AI.';
    public $postUpdateMessageAI_columns = [
        'c5_chatmessage_id' => ['required' => true, 'name' => 'Message #', 'domain' => 'message_id'],
        'c5_chatmessage_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
    ];
    public $postUpdateMessageAI_result_danger = \Validator::RESULT_DANGER;
    public $postUpdateMessageAI_result_success = RESULT_SUCCESS;
    public function postUpdateMessageAI(MessagesAR $messagesAR)
    {
        // load chat data
        $chat_data = Chats::getSingleStatic([
            'where' => [
                'c5_chat_tenant_id' => \Tenant::id(),
                'c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            ]
        ]);
        // if there's no agent assigned to the chat
        if (empty($chat_data['c5_chat_ai_agent_code'])) {
            $default_agent = Agents::getSingleStatic([
                'where' => [
                    'ai_agent_tenant_id' => \Tenant::id(),
                    'ai_agent_default' => 1,
                    'ai_agent_embedding' => 0,
                ],
                'orderby' => [
                    'ai_agent_weight' => SORT_DESC,
                ]
            ]);
            if (!empty($default_agent)) {
                $agent_code = $default_agent['ai_agent_code'];
            } else {
                $settings = Settings::getSingleStatic([
                    'where' => [
                        'ai_setting_tenant_id' => \Tenant::id(),
                    ]
                ]);
                if (!empty($settings)) {
                    $agent_code = $settings['ai_setting_default_ai_agent_code'];
                } else {
                    throw new \Exception('C/5 Cannot determine default agent!');
                }
            }
        } else {
            $agent_code = $chat_data['c5_chat_ai_agent_code'];
        }
        // conversation new is assigned
        $conversation_code = TenantSequenceHelper::nextval('DEFAULT', 'CON', 'AI', \Tenant::id(), true);
        // update thread
        $thread_result = $messagesAR->fill([
            'c5_chatmessage_tenant_id' => \Tenant::id(),
            'c5_chatmessage_id' => $this->values['c5_chatmessage_id'],
            'c5_chatmessage_thread_ai_agent_code' => $agent_code,
            'c5_chatmessage_thread_ai_conversation_code' => $conversation_code,
            'c5_chatmessage_thread_is_new' => 1,
        ])->merge();
        return $this->finish(HTTPConstants::Status200OK, $thread_result);
    }

    /**
     * Get context
     */
    public $postPostUploadFiles_name = 'Upload files';
    public $postPostUploadFiles_description = 'Use this API to upload files.';
    public $postPostUploadFiles_columns = [
        'c5_chatmessage_id' => ['required' => true, 'name' => 'Message #', 'domain' => 'message_id'],
    ];
    public $postPostUploadFiles_result_danger = \Validator::RESULT_DANGER;
    public $postPostUploadFiles_result_success = RESULT_SUCCESS;
    public function postPostUploadFiles(MessagesAR $messagesAR)
    {
        $result = [
            'success' => false,
            'error' => [],
        ];
        $files = \Request::input('files');
        if (empty($files)) {
            $result['error'][] = 'No files uploaded';
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        // fetch default catalog from AI settings
        $default_catalog = Settings::getSingleStatic([
            'where' => [
                'ai_setting_tenant_id' => \Tenant::id(),
            ]
        ]);
        if (empty($default_catalog['ai_setting_default_dt_catalog_code'])) {
            $result['error'][] = 'No files uploaded';
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        // upload files to the catalog
        $file_model = new DocumentBase();
        $catalog =  $file_model->fetchCatalogByCode($default_catalog['ai_setting_default_dt_catalog_code']);
        $file_ids = [];
        $file_names = [];
        foreach ($files as $k => $v) {
            $file_result = $file_model->upload($v, $catalog, []);
            if (!$file_result['success']) {
                $result['error'] = array_merge($result['error'], $file_result['error']);
                return $this->finish(HTTPConstants::Status400BadRequest, $result);
            }
            $file_ids[] = $file_result['file_id'];
            $file_names[] = $file_result['file_name'];
        }
        // generate document array
        $document = [
            'wg_document_tenant_id' => \Tenant::id(),
            'wg_document_c5_chatmessage_id' => $this->values['c5_chatmessage_id'],
            'wg_document_id' => null,
            'wg_document_important' => 0,
            'wg_document_public' => 0,
            'wg_document_catalog_code' => $default_catalog['ai_setting_default_dt_catalog_code'],
            'wg_document_readonly' => 1,
            'wg_document_approval_status_id' => 10,
            'wg_document_have_types' => 0,
            'wg_document_needs_transfer' => 0,
            'wg_document_comment' => 'Uploaded in C/5 Chat',
            'wg_document_inserted_user_name' => null,
            'wg_document_external_integtype_code' => null,
            'wg_document_external_id' => null,
            'wg_document_metadata_json' => [],
        ];
        $index = 1;
        foreach ($file_ids as $k => $v) {
            $document['wg_document_file_id_' . $index] = $v;
            $document['wg_document_filename_' . $index] = $file_names[$k];
            $document['wg_document_metadata_json']['file_id_' . $v]['file_url'] = DocumentBase::generateURLView($v, false, $file_names[$k]);
            $index++;
        }
        // save
        $messages_model = new Messages();
        $document_result = \Factory::model($messages_model->documents_model, true)->collection()->merge($document);
        if (!$document_result['success']) {
            $result['error'] = array_merge($result['error'], $document_result['error']);
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        // success if here
        $result['success'] = true;
        return $this->finish(HTTPConstants::isSuccess($result['success']), [
            'success' => $result['success'],
            'error' => $result['error'],
            'file_ids' => $file_ids,
        ]);
    }

    /**
     * Get chat current context
     */
    public $postGetCurrentContext_name = 'Get context for chat';
    public $postGetCurrentContext_description = 'Use this API to get context for chat.';
    public $postGetCurrentContext_columns = [
        'c5_chatmessage_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatmessage_c5_chat_id' => ['required' => true, 'name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatmessage_thread_c5_chatmessage_id' => ['name' => 'Thread Message #', 'domain' => 'message_id', 'null' => true],
        'tm_batchrecord_is_context' => ['name' => 'Is Context', 'type' => 'boolean'],
    ];
    public $postGetCurrentContext_result_danger = \Validator::RESULT_DANGER;
    public $postGetCurrentContext_result_success = RESULT_SUCCESS;
    public function postGetCurrentContext(ChatsAR $chats_ar, ChatUsersAR $chat_users_ar, ChatInvitesAR $chat_invite_ar, MessagesAR $messages_ar)
    {
        $result = [
            'success' => false,
            'error' => [],
            'context' => [],
        ];
        $thread = [];
        $is_thread = false;
        if (!empty($this->values['c5_chatmessage_thread_c5_chatmessage_id'])) {
            $thread = [
                'c5_chatmessage_thread_c5_chatmessage_id' => $this->values['c5_chatmessage_thread_c5_chatmessage_id'],
            ];
            $is_thread = true;
        } else {
            $thread = [
                'c5_chatmessage_thread_c5_chatmessage_id;IS' => null,
            ];
        }
        $batches = Messages::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'c5_chatmessage_tm_batchentry_code',
                'c5_chatmessage_is_thread',
            ])
            ->whereMultiple('AND', [
                'c5_chatmessage_tenant_id' => $this->values['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
                'c5_chatmessage_c5_chat_id' => $this->values['c5_chatmessage_c5_chat_id'],
            ] + $thread)
            ->query()['rows'];

        $batch_records = Records::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                '*',
            ])
            ->whereMultiple('AND', [
                'tm_batchrecord_tenant_id' => $this->values['c5_chatmessage_tenant_id'] ?? \Tenant::id(),
                'tm_batchrecord_tm_batchentry_code' => array_column($batches, 'c5_chatmessage_tm_batchentry_code'),
                'tm_batchrecord_is_context' => $this->values['tm_batchrecord_is_context'] ?? [0, 1],
            ])
            ->query()['rows'];
        $result['context'] = $batch_records;

        return $this->finish(HTTPConstants::isSuccess($result['success']), [
            'success' => $result['success'],
            'error' => $result['error'],
            'context' => $result['context'],
        ]);
    }
}
