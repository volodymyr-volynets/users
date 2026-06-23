#!/usr/bin/env php -c/usr/local/etc/php/8.1/phpd.ini
<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

use Helper\Cmd;
use System\Daemons;
use Numbers\Users\Chats\Model\Chat\Messages as ChatMessages;
use Numbers\Users\Chats\Model\Chats;
use Numbers\Users\Chats\Helper\Chats as ChatsHelper;
use Object\Controller\ExternalAPI;
use System\Config;
use Numbers\AI\SDK\Classes\Agent\PreConfigured;
use Numbers\AI\SDK\Model\RAG\Types;
use Numbers\Users\Widgets\Phases\Model\Steps;

// silence deprecated and notices
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

define('DAEMON_NAME', 'nf_c5_chats_assistantd');

define('DAEMON_UID', 1500);
define('DAEMON_GID', 1500);

define('DAEMON_FORK', empty($argv[1]) || !in_array('--no-pcntl_fork', $argv));

if (DAEMON_FORK) {
    define('DAEMON_PID', '/var/run/' . DAEMON_NAME . '.pid');
} else {
    define('DAEMON_PID', null);
}

define('MAX_RESULT', 100);
define('MIN_SLEEP', 2);
define('MAX_SLEEP', 5);

// must change working directory to public_html
chdir('../../../../../../public_html');

define('DAEMON_ROOT', getcwd());

// autoloading composer first
if (file_exists('../libraries/vendor/autoload.php')) {
    require('../libraries/vendor/autoload.php');
}

// running application
require('../libraries/vendor/numbers/framework/Application.php');
Application::run([
    '__run_only_bootstrap' => 2,
    '__ini_additional_settings' => [
        'db.default.servers.1.persistent' => 1,
        'flag.global.session.start' => 0,
        // disable
        'log.default.db.enabled' => 0,
        'log.file.logs.enabled' => 0,
        //'websockets.default.autoconnect' => 1,
    ]
]);

// disable debug
Debug::$debug = false;

// load additional configuration
$ini_config = Config::ini(__DIR__ . DIRECTORY_SEPARATOR . 'nf_c5_chats_assistantd.ini', Application::get('environment'));

$ini_settings = [
    'memory_limit' => Application::get('daemon.nf_c5_chats_assistantd.memory_limit') ?? $ini_config['daemon']['nf_c5_chats_assistantd']['memory_limit'] ?? '512M',
    'set_time_limit' => Application::get('daemon.nf_c5_chats_assistantd.set_time_limit') ?? $ini_config['daemon']['nf_c5_chats_assistantd']['set_time_limit'] ?? 0,
    'run_min_seconds' => Application::get('daemon.nf_c5_chats_assistantd.run_min_seconds') ?? $ini_config['daemon']['nf_c5_chats_assistantd']['run_min_seconds'] ?? 2,
];

define('DAEMON_LOG', Application::get('daemon.nf_c5_chats_assistantd.error_log') ?? $ini_config['daemon']['nf_c5_chats_assistantd']['error_log'] ?? '/var/log/nf_c5_chats_assistantd.log');
define('DAEMON_DEBUG', Application::get('daemon.nf_c5_chats_assistantd.debug') ?? $ini_config['daemon']['nf_c5_chats_assistantd']['debug'] ?? false);

// increase in memory and unlimited execution time
ini_set('memory_limit', $ini_settings['memory_limit']);
set_time_limit($ini_settings['set_time_limit']);
$ini_settings['max_memory_in_bytes'] = Memory2::getMaxStatic();

// main try/catch block
try {
    // init the daemon
    Daemons::initialize();

    // init socket io
    $web_socket_settings = Application::get('websockets.default');
    $socketio = new WebSockets('default', $web_socket_settings['submodule'], $web_socket_settings);

    $locks = [];

    // main loop
    Daemons::loop(function () use ($socketio, $locks, $ini_settings) {
        // start of a loop
        $start = microtime(true);
        if (DAEMON_DEBUG) {
            error_log("nf_c5_chats_assistantd: Loop started on " . date('Y-m-d H:i:s'), 0);
        }
        // fetch chats first
        $chats_welcomes = Numbers\Users\Chats\DataSource\Chats::getStatic([
            'where' => [
                'c5_chat_provide_welcome' => 1,
                'load_all' => 1,
            ],
        ]);
        foreach ($chats_welcomes as $k => $v) {
            // find model
            $chat_welcome_filtered = array_filter($v['context'], function ($value) {
                return $value['tm_batchrecord_no_data_model_role_code'] == 'context_record';
            });
            $chat_welcome_model_code = current($chat_welcome_filtered)['tm_batchrecord_sm_model_code'];
            // find owner
            $chat_welcome_filtered_2 = array_filter($v['context'], function ($value) {
                return $value['tm_batchrecord_no_data_model_role_code'] == 'owner_type';
            });
            $chat_welcome_owner_code = current($chat_welcome_filtered_2)['tm_batchrecord_field_value_code'];
            // if we have model and owner type
            $chat_welcome_grouped_message = [];
            if (!empty($chat_welcome_model_code) && !empty($chat_welcome_owner_code)) {
                $chat_welcomes = Steps::getStatic([
                    'where' => [
                        'wg_phasestep_tenant_id' => $v['c5_chat_tenant_id'],
                        'wg_phasestep_wg_phasestptype_code' => 'WELCOME',
                        'wg_phasestep_um_ownertype_code' => $chat_welcome_owner_code,
                        'wg_phasestep_sm_model_code' => $chat_welcome_model_code,
                    ],
                    'pk' => ['wg_phasestep_code']
                ]);
                $chat_welcome_filtered_3 = current($chat_welcome_filtered);
                foreach ($chat_welcomes as $k2 => $v2) {
                    $chat_welcome_model = Factory::model($v2['wg_phasestep_model'], true);
                    $chat_welcome_summary = $chat_welcome_model->generateWelcomeMessage([
                        'um_ownertype_code' => $chat_welcome_owner_code,
                        'sm_model_code' => $chat_welcome_model_code,
                        'tm_tenant_id' => $v['c5_chat_tenant_id'],
                        // other settings
                        'step_options' => $v2,
                        'welcome_options' => $v,
                        // pk
                        'pk' => [
                            $chat_welcome_filtered_3['tm_batchrecord_field_code'] => $chat_welcome_filtered_3['tm_batchrecord_field_value_id'] ?? $chat_welcome_filtered_3['tm_batchrecord_field_value_code'],
                        ]
                    ]);
                    if ($chat_welcome_summary['success']) {
                        $chat_welcome_grouped_message[] = $chat_welcome_summary['summary'];
                    } else {
                        $chat_welcome_grouped_message[] = implode('<br/>', $chat_welcome_summary['error']);
                    }
                }
            }
            // create a message
            $acknowledge_result = ChatsHelper::acknowledgeByAssistant([
                'c5_chatmessage_tenant_id' => $v['c5_chat_tenant_id'],
                'c5_chatmessage_id' => null,
                'c5_chatmessage_c5_chat_id' => $v['c5_chat_id'],
                'c5_chatmessage_language_code' => $v['c5_chat_language_code'],
                'c5_chatmessage_no_data_model_role_code' => 'assistant',
                'c5_chatmessage_message' => implode('<hr/>', $chat_welcome_grouped_message),
                'c5_chatmessage_is_loading' => 0,
                'c5_chatmessage_thread_is_new' => 0,
            ]);
            // update welcome flag
            $chat_welcome_result = Chats::collectionStatic()->merge([
                'c5_chat_tenant_id' => $v['c5_chat_tenant_id'],
                'c5_chat_id' => $v['c5_chat_id'],
                'c5_chat_provide_welcome' => 0,
            ]);
            if ($chat_welcome_result['success']) {
                // post to sockets
                $room_list = ['ChatPageStandalone' . '::' . $v['c5_chat_tenant_id'] . '_' . $v['c5_chat_id']];
                $socketio->connectJoinAndSend($room_list, ['message' => 'Updating welcome message.']);
            }
        }
        // main loop for messages
        $new_messages_result = ChatMessages::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->columns([
                'a.*',
                'b.*',
                'c.*',
                'd_c5_chatmessage_form_result_json' => 'd.c5_chatmessage_form_result_json',
            ])
            ->join('INNER', new Chats(), 'b', 'ON', [
                ['AND', ['b.c5_chat_id', '=', 'a.c5_chatmessage_c5_chat_id', true], false],
            ])
            ->join('LEFT', Factory::getWidgetModel(new ChatMessages(), 'documents'), 'c', 'ON', [
                ['AND', ['a.c5_chatmessage_id', '=', 'c.wg_document_c5_chatmessage_id', true], false],
            ])
            ->join('LEFT', new ChatMessages(), 'd', 'ON', [
                ['AND', ['a.c5_chatmessage_id', '=', 'd.c5_chatmessage_parent_c5_chatmessage_id', true], false],
            ])
            ->where('AND', function ($query) {
                $query->where('OR', function ($query2) {
                    $query2->whereMultiple('AND', [
                        'a.c5_chatmessage_is_new' => 1,
                        'b.c5_chat_c5_chattype_code' => 'GENERAL',
                        'b.c5_chat_inactive' => 0,
                        // just in case if AI is disabled on a chat
                        'b.c5_chat_no_ai' => 0,
                    ]);
                });
                $query->where('OR', function ($query2) {
                    $query2->whereMultiple('AND', [
                        'a.c5_chatmessage_thread_is_new' => 1,
                        // just in case if AI is disabled on a chat
                        'b.c5_chat_no_ai' => 0,
                    ]);
                });
                $query->where('OR', function ($query2) {
                    $query2->whereMultiple('AND', [
                        'a.c5_chatmessage_is_loading' => 1,
                        'd.c5_chatmessage_form_status_id' => 20,
                    ]);
                });
            })
            ->query('c5_chatmessage_id');
        // create loading message
        if (DAEMON_DEBUG) {
            error_log("nf_c5_chats_assistantd: Loaded messages count:" . count($new_messages_result['rows']), 0);
        }
        $send_to_ia = [];
        foreach ($new_messages_result['rows'] as $k => $v) {
            // check lock
            $lock_name = $k . '::' . ($v['c5_chatmessage_thread_is_new'] ? 'thread' : 'channel');
            if (!empty($locks['c5_chatmessage_is_new'][$lock_name])) {
                continue;
            }
            // set lock
            $locks['c5_chatmessage_is_new'][$lock_name] = true;
            // if we have form result
            if (!empty($v['d_c5_chatmessage_form_result_json'])) {
                $acknowledge_result = [
                    'success' => true,
                    'error' => [],
                    'c5_chatmessage_id' => $v['c5_chatmessage_id'],
                ];
                goto label_process_ai_result;
            }
            // update new flags
            $update_is_new_result = ChatMessages::queryBuilderStatic()
                ->update()
                ->set([
                    'c5_chatmessage_is_new' => 0,
                    'c5_chatmessage_thread_is_new' => 0,
                ])
                ->whereMultiple('AND', [
                    'c5_chatmessage_tenant_id' => $v['c5_chatmessage_tenant_id'],
                    'c5_chatmessage_id' => $v['c5_chatmessage_id']
                ])
                ->query();
            if (DAEMON_DEBUG) {
                error_log("nf_c5_chats_assistantd: Updated as not new :" . $v['c5_chatmessage_id'], 0);
            }
            if (!$update_is_new_result['success']) {
                continue;
            }
            // update
            $acknowledge_result = ChatsHelper::acknowledgeByAssistant([
                'c5_chatmessage_tenant_id' => $v['c5_chatmessage_tenant_id'],
                'c5_chatmessage_id' => $v['c5_chatmessage_id'],
                'c5_chatmessage_c5_chat_id' => $v['c5_chatmessage_c5_chat_id'],
                'c5_chatmessage_language_code' => $v['c5_chatmessage_language_code'],
                'c5_chatmessage_no_data_model_role_code' => 'assistant',
                'c5_chatmessage_message' => 'Loading...',
                'c5_chatmessage_is_loading' => 1,
                'c5_chatmessage_thread_is_new' => !empty($v['c5_chatmessage_thread_is_new']) ? 1 : 0,
                // for image response inherits from previous message
                'c5_chatmessage_is_image' => !empty($v['c5_chatmessage_is_image']) ? 1 : 0,
                'c5_chatmessage_image_settings_json' => $v['c5_chatmessage_image_settings_json'],
            ]);
            label_process_ai_result:
                        // process attachments
                        $attachments = [];
            for ($i = 1; $i <= 30; $i++) {
                if (isset($v['wg_document_file_id_' . $i])) {
                    $attachments[] = [
                        'dt_file_id' => $v['wg_document_file_id_' . $i],
                        'filename' => $v['wg_document_filename_' . $i],
                        'mime' => null,
                    ];
                }
            }
            $send_to_ia[] = [
                'c5_chatmessage_tenant_id' => $v['c5_chatmessage_tenant_id'],
                'c5_chatmessage_id' => $acknowledge_result['c5_chatmessage_id'],
                'c5_chatmessage_c5_chat_id' => $v['c5_chatmessage_c5_chat_id'],
                'c5_chatmessage_message' => $v['c5_chatmessage_message'],
                // agent and conversation, from thread first
                'c5_chat_ai_agent_code' => $v['c5_chatmessage_thread_ai_agent_code'] ?? $v['c5_chat_ai_agent_code'],
                'c5_chat_ai_conversation_code' => $v['c5_chatmessage_thread_ai_conversation_code'] ?? $v['c5_chat_ai_conversation_code'],
                // thread
                'c5_chatmessage_thread_is_new' => $v['c5_chatmessage_thread_is_new'],
                'c5_chatmessage_thread_c5_chatmessage_id' => $v['c5_chatmessage_id'],
                // reasoning
                'c5_chatmessage_reasoning_json' => is_json($v['c5_chatmessage_reasoning_json']) ? json_decode($v['c5_chatmessage_reasoning_json'], true) : $v['c5_chatmessage_reasoning_json'],
                // attachments
                'c5_chatmessage_is_file' => !empty($v['c5_chatmessage_is_file']) || !empty($attachments),
                'c5_chatmessage_attachments' => $attachments,
                // image
                'c5_chatmessage_is_image' => $v['c5_chatmessage_is_image'],
                'c5_chatmessage_image_settings_json' => $v['c5_chatmessage_image_settings_json'],
                // sound
                'c5_chatmessage_is_sound' => $v['c5_chatmessage_is_sound'],
                'c5_chatmessage_sound_settings_json' => $v['c5_chatmessage_sound_settings_json'],
                // transcript
                'c5_chatmessage_is_transcript' => $v['c5_chatmessage_is_transcript'],
                'c5_chatmessage_transcript_settings_json' => $v['c5_chatmessage_transcript_settings_json'],
                // RAG applies context to the prompt
                'c5_chatmessage_is_rag' => $v['c5_chatmessage_is_rag'],
                'c5_chatmessage_rag_settings_json' => $v['c5_chatmessage_rag_settings_json'],
                // form result
                'd_c5_chatmessage_form_result_json' => $v['d_c5_chatmessage_form_result_json'],
            ];
            if ($acknowledge_result['success']) {
                // post to sockets
                $room_list = ['ChatPageStandalone' . '::' . $v['c5_chatmessage_tenant_id'] . '_' . $v['c5_chatmessage_c5_chat_id']];
                $socketio->connectJoinAndSend($room_list, ['message' => 'Acknowledged! Loading...']);
            }
        }
        // run in parallel fiber
        $fiber = new Fiber2();
        foreach ($send_to_ia as $k => $v) {
            $fiber->add($k, function ($var) use ($socketio) {
                // logging
                if (DAEMON_DEBUG) {
                    error_log("nf_c5_chats_assistantd: Added to Fiber " . $var['c5_chatmessage_id'], 0);
                }
                // prompt new
                $prompt_new = null;
                // rag
                $rag_context = '';
                if ($var['c5_chatmessage_is_rag']) {
                    $rag_settings = is_json($var['c5_chatmessage_rag_settings_json']) ? json_decode($var['c5_chatmessage_rag_settings_json'], true) : $var['c5_chatmessage_rag_settings_json'];
                    $rag_type = Types::getSingleStatic([
                        'where' => [
                            'ai_ragtype_tenant_id' => $var['c5_chatmessage_tenant_id'],
                            'ai_ragtype_code' => $rag_settings['ai_ragtype_code'],
                        ]
                    ]);
                    if (!empty($rag_type)) {
                        // prompt
                        $prompt_input = strip_tags2($var['c5_chatmessage_message']);
                        // fetch RAG context
                        $rag_result = Factory::model($rag_type['ai_ragtype_model'], true)->queryBuilder(['alias' => 'a'])
                            ->select()
                            ->columns($rag_type['ai_ragtype_content_field_code'])
                            ->whereMultiple('AND', [
                                $rag_type['ai_ragtype_key_field_code'] => $rag_settings['ai_ragtype_code'],
                            ])
                            ->embeddingsSearch('AND', [$rag_type['ai_ragtype_embeddings_field_code']], $prompt_input, 'euclidean_distance', null, true, SORT_ASC)
                            ->limit($rag_type['ai_ragtype_fetch_counter'])
                            ->query();
                        if (count($rag_result['rows']) > 0) {
                            $prompt_new = 'Answer the question using the context below.' . "\n\n";
                            $prompt_new .= 'Context:' . "\n";
                            $prompt_new .= implode("\n---\n", array_column($rag_result['rows'], $rag_type['ai_ragtype_content_field_code'])) . "\n\n";
                            $prompt_new .= 'Question:' . "\n";
                            $prompt_new .= $prompt_input;
                        }
                    }
                }
                // image generation
                if ($var['c5_chatmessage_is_image']) {
                    $settings = is_json($var['c5_chatmessage_image_settings_json']) ? json_decode($var['c5_chatmessage_image_settings_json'], true) : $var['c5_chatmessage_image_settings_json'];
                    $agent = new PreConfigured($settings['ai_agent_code']);
                    $response = $agent->image($var['c5_chatmessage_message'], [
                        'conversation_code' => $var['c5_chat_ai_conversation_code'],
                        'size' => $settings['ai_imgsize_code'],
                        'quality' => $settings['ai_imgquality_code'],
                    ]);
                } elseif ($var['c5_chatmessage_is_sound']) {
                    $settings = is_json($var['c5_chatmessage_sound_settings_json']) ? json_decode($var['c5_chatmessage_sound_settings_json'], true) : $var['c5_chatmessage_sound_settings_json'];
                    $agent = new PreConfigured($settings['ai_agent_code']);
                    $response = $agent->sound($var['c5_chatmessage_message'], [
                        'conversation_code' => $var['c5_chat_ai_conversation_code'],
                        'voice' => $settings['ai_soundvoice_code'],
                    ]);
                } elseif ($var['c5_chatmessage_is_transcript']) {
                    $settings = is_json($var['c5_chatmessage_transcript_settings_json']) ? json_decode($var['c5_chatmessage_transcript_settings_json'], true) : $var['c5_chatmessage_transcript_settings_json'];
                    $agent = new PreConfigured($settings['ai_agent_code']);
                    $response = $agent->transcript($var['c5_chatmessage_message'], [
                        'conversation_code' => $var['c5_chat_ai_conversation_code'],
                        'attachments' => $var['c5_chatmessage_attachments'],
                    ]);
                } elseif (!empty($var['d_c5_chatmessage_form_result_json'])) {
                    if (is_json($var['d_c5_chatmessage_form_result_json'])) {
                        $var['d_c5_chatmessage_form_result_json'] = json_decode($var['d_c5_chatmessage_form_result_json'], true);
                    }
                    $previous_response_id = $var['d_c5_chatmessage_form_result_json']['previous_response_id'];
                    unset($var['d_c5_chatmessage_form_result_json']['previous_response_id']);
                    $var['d_c5_chatmessage_form_result_json']['output'] = json_encode($var['d_c5_chatmessage_form_result_json']['output']);
                    $agent = new PreConfigured($var['c5_chat_ai_agent_code']);
                    $response = $agent->prompt([$var['d_c5_chatmessage_form_result_json']], [
                        'conversation_code' => $var['c5_chat_ai_conversation_code'],
                        'previous_response_id' => $previous_response_id,
                        'original_prompt' => 'Form tool call.'
                    ]);
                } else {
                    $agent = new PreConfigured($var['c5_chat_ai_agent_code']);
                    $response = $agent->prompt($prompt_new ?? $var['c5_chatmessage_message'], [
                        'conversation_code' => $var['c5_chat_ai_conversation_code'],
                        'reasoning' => $var['c5_chatmessage_reasoning_json'],
                        'attachments' => $var['c5_chatmessage_attachments'],
                        'original_prompt' => $var['c5_chatmessage_message'],
                    ], function ($publish_type, $publish_data) use ($var, $socketio) {
                        if ($publish_type == 'ai_sdk_model_function_call' || $publish_type == 'ai_sdk_model_function_result') {
                            $publish_result = ChatsHelper::acknowledgement([
                                'c5_chatmessage_tenant_id' => $var['c5_chatmessage_tenant_id'],
                                'c5_chatmessage_id' => $var['c5_chatmessage_id'],
                                'c5_chatmessage_c5_chat_id' => $var['c5_chatmessage_c5_chat_id'],
                                'c5_chatmessage_language_code' => $var['c5_chatmessage_language_code'],
                                'c5_chatmessage_message' => $publish_data['html'] ?? $publish_data['text'],
                                'c5_chatmessage_thread_is_new' => !empty($var['c5_chatmessage_thread_is_new']) ? 1 : 0,
                                'c5_chatmessage_parent_c5_chatmessage_id' => $var['c5_chatmessage_id'],
                            ]);
                            if ($publish_result['success']) {
                                // post to sockets
                                $room_list = ['ChatPageStandalone' . '::' . $var['c5_chatmessage_tenant_id'] . '_' . $var['c5_chatmessage_c5_chat_id']];
                                $socketio->connectJoinAndSend($room_list, ['message' => 'Acknowledgement! Published!']);
                            }
                        }
                        if ($publish_type == 'ai_sdk_model_form_call') {
                            $publish_result = ChatsHelper::acknowledgement([
                                'c5_chatmessage_tenant_id' => $var['c5_chatmessage_tenant_id'],
                                'c5_chatmessage_id' => $var['c5_chatmessage_id'],
                                'c5_chatmessage_c5_chat_id' => $var['c5_chatmessage_c5_chat_id'],
                                'c5_chatmessage_language_code' => $var['c5_chatmessage_language_code'],
                                'c5_chatmessage_message' => $publish_data['html'] ?? $publish_data['text'],
                                'c5_chatmessage_thread_is_new' => !empty($var['c5_chatmessage_thread_is_new']) ? 1 : 0,
                                // form fields
                                'c5_chatmessage_is_form' => 1,
                                'c5_chatmessage_form_settings_json' => $publish_data['form_settings_json'],
                                'c5_chatmessage_form_status_id' => 10,
                                'c5_chatmessage_form_result_json' => $publish_data['form_result_json'],
                                'c5_chatmessage_parent_c5_chatmessage_id' => $var['c5_chatmessage_id'],
                            ]);
                            if ($publish_result['success']) {
                                // post to sockets
                                $room_list = ['ChatPageStandalone' . '::' . $var['c5_chatmessage_tenant_id'] . '_' . $var['c5_chatmessage_c5_chat_id']];
                                $socketio->connectJoinAndSend($room_list, ['message' => 'Acknowledgement! Published!']);
                            }
                        }
                    });
                }
                // logging
                if (DAEMON_DEBUG) {
                    error_log("nf_c5_chats_assistantd: Called prompt " . $var['c5_chatmessage_id'] . ' ' . $var['c5_chatmessage_message'], 0);
                }
                return $response;
            }, [$v]);
        }
        // iterate
        foreach ($fiber->iterate() as $k => $v) {
            $v_params = $send_to_ia[$k];
            if (DAEMON_DEBUG) {
                error_log("nf_c5_chats_assistantd: Iteration params " . json_encode($v_params), 0);
            }
            if ($v instanceof Throwable) {
                $new_message = print_r2($v->getMessage(), 'Error Occurred', true, ['is_html' => true]);
            } elseif (!$v['success']) {
                if (count($v['error']) > 0) {
                    $new_message = print_r2(implode("\n\n", $v['error']), 'Error Occurred', true, ['is_html' => true]);
                } else {
                    $new_message = print_r2('Unknown Error!', 'Error Occurred', true, ['is_html' => true]);
                }
            } elseif (!empty($v_params['c5_chatmessage_is_image'])) {
                $v['documents_data']['wg_document_c5_chatmessage_id'] = $v_params['c5_chatmessage_id'];
                $documents_result = Factory::getWidgetModel(new ChatMessages(), 'documents')->collection()->merge($v['documents_data']);
                if (!$documents_result['success']) {
                    $new_message = print_r2('Could not save documents in model Chat Messages!', 'Error Occurred', true, ['is_html' => true]);
                } else {
                    $new_message = loc('NF.Form.GeneratedImages', 'Generated image(s)!');
                }
            } elseif (!empty($v_params['c5_chatmessage_is_sound'])) {
                $v['documents_data']['wg_document_c5_chatmessage_id'] = $v_params['c5_chatmessage_id'];
                $documents_result = Factory::getWidgetModel(new ChatMessages(), 'documents')->collection()->merge($v['documents_data']);
                if (!$documents_result['success']) {
                    $new_message = print_r2('Could not save documents in model Chat Messages!', 'Error Occurred', true, ['is_html' => true]);
                } else {
                    $new_message = loc('NF.Form.GeneratedSound', 'Generated sound(s)!');
                }
            } elseif (!empty($v['have_forms'])) {
                // for forms we have to wait until form completes
                continue;
            } else {
                $new_message = [];
                foreach ($v['content'] as $v2) {
                    // we skip function calls
                    if ($v2['type'] == 'function_call') {
                        continue;
                    }
                    // assemble message
                    $new_message[] = $v2['html'] ?? $v2['text'];
                }
                $new_message = implode("<br/><br/>", $new_message);
            }
            // update messages
            $update_assistant_record = ChatMessages::queryBuilderStatic()
                ->update()
                ->set([
                    'c5_chatmessage_message' => $new_message,
                    'c5_chatmessage_is_loading' => 0,
                ])
                ->whereMultiple('AND', [
                    'c5_chatmessage_tenant_id' => $v_params['c5_chatmessage_tenant_id'],
                    'c5_chatmessage_id' => $v_params['c5_chatmessage_id'],
                    'c5_chatmessage_c5_chat_id' => $v_params['c5_chatmessage_c5_chat_id'],
                ])
                ->query();
            if ($update_assistant_record['success']) {
                // post to sockets
                $room_list = ['ChatPageStandalone' . '::' . $v_params['c5_chatmessage_tenant_id'] . '_' . $v_params['c5_chatmessage_c5_chat_id']];
                $socketio->connectJoinAndSend($room_list, ['message' => 'Updating response.']);
            }
            // logging
            if (DAEMON_DEBUG) {
                error_log("nf_c5_chats_assistantd: Iterating through results " . $v_params['c5_chatmessage_id'] . ' ' . $new_message, 0);
            }
        }
        // free up memory
        if (Daemons::checkMemoryIfUsed($ini_settings['max_memory_in_bytes'])) {
            throw new Exception('Memory over limit!');
        }
        // sleep if faster
        Daemons::pauseExecutionIfLess($start, $ini_settings['run_min_seconds']);
        // logging
        if (DAEMON_DEBUG) {
            error_log("nf_c5_chats_assistantd: Loop ended on: " . date('Y-m-d H:i:s'), 0);
        }
    });
} catch (Exception $e) {
    Cmd::message($e->getMessage(), 'red');
}

// destroy the daemon
Daemons::destroy();

// close socket connection
$socketio->close();
