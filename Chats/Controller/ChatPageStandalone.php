<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Controller;

use Object\Controller;
use Numbers\Users\Chats\DataSource\Chats;
use Numbers\Users\Chats\Form\ChatFormStandalone;
use Numbers\Users\Chats\Form\ChatFormRightRail;
use Numbers\Users\Chats\Helper\Chats as ChatsHelper;
use Numbers\Users\Chats\Model\Chat\Messages as ChatMessages;
use Numbers\Users\Chats\Model\Chats as ChatsModel;

class ChatPageStandalone extends Controller
{
    public function __construct(array $options = [])
    {
        parent::__construct($options);
        // redirect if user is not authorized
        /*
        if (!\User::authorized()) {
            $_SESSION['numbers']['__post_login_url'] = \Request::buildFromName('C/5 Chat (Standalone)', $this->method_code) . '?' . http_build_query($_GET);
            \Request::redirect(\Request::buildFromName('U/M Sign In', 'Index') . '?__message=' . loc('NF.Message.SignInToContinueTheGame', 'Sign in to continue the game.'));
        }
        */
    }

    #[\View(array('type' => 'react', 'component' => 'ChatPageStandalone', 'root' => 'numbers_controller_and_view', 'path' => '/Numbers/Users/Chats/View/ChatPageStandalone.template.react.tsx'))]
    public function actionChat()
    {
        \Layout::$title_override = \I18n::textToLoc('NF.System', 'C/5 Chat', [
            'translate' => true,
        ]);
        $input = \Request::input();
        // if its a sub-form
        if (\Application::get('flag.global.__ajax')) {
            $chat_data = [];
            goto render_form_action;
        }
        if (!empty($input['c5_chat_id']) && empty($input['c5_chat_uuid'])) {
            $input['c5_chat_id'] = (int) $input['c5_chat_id'];
            $chat_model_data = ChatsModel::queryBuilderStatic(['alias' => 'a'])
                ->select()
                ->columns([
                    'c5_chat_uuid',
                ])
                ->whereMultiple('AND', [
                    'a.c5_chat_tenant_id' => \Tenant::id(),
                    'a.c5_chat_id' => $input['c5_chat_id'],
                ])
                ->query();
            if (!empty($chat_model_data['rows'][0])) {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_model_data['rows'][0]['c5_chat_uuid'],
                ]);
            } else {
                unset($input['c5_chat_id']);
            }
        }
        // if we have message id
        if (!empty($input['c5_chatmessage_id'])) {
            $input['c5_chatmessage_id'] = (int) $input['c5_chatmessage_id'];
            $chat_message_data = ChatMessages::queryBuilderStatic(['alias' => 'a'])
                ->select()
                ->columns([
                    'c5_chat_uuid',
                    'c5_chatmessage_id',
                ])
                ->join('INNER', new ChatsModel(), 'b', 'ON', [
                    ['AND', ['a.c5_chatmessage_c5_chat_id', '=', 'b.c5_chat_id', true], false],
                ])
                ->whereMultiple('AND', [
                    'a.c5_chatmessage_tenant_id' => \Tenant::id(),
                    'a.c5_chatmessage_id' => $input['c5_chatmessage_id'],
                ])
                ->query();
            if (!empty($chat_message_data['rows'][0])) {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_message_data['rows'][0]['c5_chat_uuid'],
                ], [
                    'anchor' => 'c5-cm-id-' . $input['c5_chatmessage_id'] . '-a',
                ]);
            } else {
                unset($input['c5_chatmessage_id']);
            }
        }
        // if we are going to channel
        if (!empty($input['c5_chatchannel_code'])) {
            $chat_data = Chats::getStatic([
                'where' => [
                    'c5_chatchannel_code' => $input['c5_chatchannel_code'],
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                ],
                'pk' => ['c5_chat_id'],
                'single_row' => true,
            ]);
            if (empty($chat_data)) {
                $channel_result = ChatsHelper::create([
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                    'um_user_name' => \User::get('name'),
                    'c5_chatchannel_code' => $input['c5_chatchannel_code'],
                    'c5_chattype_code' => 'CHANNEL',
                ]);
                if ($channel_result['success']) {
                    \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                        'c5_chat_uuid' => $channel_result['c5_chat_uuid'],
                    ]);
                } else {
                    \Layout::addMessage($channel_result['error'], DANGER);
                }
            } else {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_data['c5_chat_uuid'],
                ]);
            }
        }
        // if we have chat uuid
        if (!empty($input['c5_chat_uuid'])) {
            if (!empty($input['c5_chatinvite_um_user_id']) && !empty($input['c5_chat_id']) && \User::id() == (int) $input['c5_chatinvite_um_user_id']) {
                $join_result = ChatsHelper::joinChat([
                    'c5_chat_id' => intval($input['c5_chat_id']),
                ]);
                if (!$join_result['success']) {
                    \Layout::addMessage($join_result['error'], DANGER);
                }
            }
            $chat_data = Chats::getStatic([
                'where' => [
                    'c5_chat_uuid' => $input['c5_chat_uuid'],
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                ],
                'pk' => ['c5_chat_id'],
                'single_row' => true,
            ]);
        } else {
            $chat_data = [];
        }
        render_form_action:
                $form = new ChatFormStandalone([
                    'input' => array_merge_hard($input, $chat_data),
                    'chat_data' => $chat_data,
                ]);
        echo $form->render();
    }

    #[\View(array('type' => 'react', 'component' => 'ChatPageRightRail', 'root' => 'numbers_right_rail_container', 'path' => '/Numbers/Users/Chats/View/ChatPageRightRail.template.react.tsx'))]
    public function actionRightRail()
    {
        $input = \Request::input('__right_rail_input') ?? [];
        // if its a sub-form
        if (\Application::get('flag.global.__ajax')) {
            $chat_data = [];
            goto render_form_action;
        }
        if (!empty($input['c5_chat_id']) && empty($input['c5_chat_uuid'])) {
            $input['c5_chat_id'] = (int) $input['c5_chat_id'];
            $chat_model_data = ChatsModel::queryBuilderStatic(['alias' => 'a'])
                ->select()
                ->columns([
                    'c5_chat_uuid',
                ])
                ->whereMultiple('AND', [
                    'a.c5_chat_tenant_id' => \Tenant::id(),
                    'a.c5_chat_id' => $input['c5_chat_id'],
                ])
                ->query();
            if (!empty($chat_model_data['rows'][0])) {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_model_data['rows'][0]['c5_chat_uuid'],
                ]);
            } else {
                unset($input['c5_chat_id']);
            }
        }
        // if we have message id
        if (!empty($input['c5_chatmessage_id'])) {
            $input['c5_chatmessage_id'] = (int) $input['c5_chatmessage_id'];
            $chat_message_data = ChatMessages::queryBuilderStatic(['alias' => 'a'])
                ->select()
                ->columns([
                    'c5_chat_uuid',
                    'c5_chatmessage_id',
                ])
                ->join('INNER', new ChatsModel(), 'b', 'ON', [
                    ['AND', ['a.c5_chatmessage_c5_chat_id', '=', 'b.c5_chat_id', true], false],
                ])
                ->whereMultiple('AND', [
                    'a.c5_chatmessage_tenant_id' => \Tenant::id(),
                    'a.c5_chatmessage_id' => $input['c5_chatmessage_id'],
                ])
                ->query();
            if (!empty($chat_message_data['rows'][0])) {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_message_data['rows'][0]['c5_chat_uuid'],
                ], [
                    'anchor' => 'c5-cm-id-' . $input['c5_chatmessage_id'] . '-a',
                ]);
            } else {
                unset($input['c5_chatmessage_id']);
            }
        }
        // if we are going to channel
        if (!empty($input['c5_chatchannel_code'])) {
            $chat_data = Chats::getStatic([
                'where' => [
                    'c5_chatchannel_code' => $input['c5_chatchannel_code'],
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                ],
                'pk' => ['c5_chat_id'],
                'single_row' => true,
            ]);
            if (empty($chat_data)) {
                $channel_result = ChatsHelper::create([
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                    'um_user_name' => \User::get('name'),
                    'c5_chatchannel_code' => $input['c5_chatchannel_code'],
                    'c5_chattype_code' => 'CHANNEL',
                ]);
                if ($channel_result['success']) {
                    \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                        'c5_chat_uuid' => $channel_result['c5_chat_uuid'],
                    ]);
                } else {
                    \Layout::addMessage($channel_result['error'], DANGER);
                }
            } else {
                // we need to change url to uuid
                \Request::redirect('/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', null, [
                    'c5_chat_uuid' => $chat_data['c5_chat_uuid'],
                ]);
            }
        }
        // if we have chat uuid
        if (!empty($input['c5_chat_uuid'])) {
            if (!empty($input['c5_chatinvite_um_user_id']) && !empty($input['c5_chat_id']) && \User::id() == (int) $input['c5_chatinvite_um_user_id']) {
                $join_result = ChatsHelper::joinChat([
                    'c5_chat_id' => intval($input['c5_chat_id']),
                ]);
                if (!$join_result['success']) {
                    \Layout::addMessage($join_result['error'], DANGER);
                }
            }
            $chat_data = Chats::getStatic([
                'where' => [
                    'c5_chat_uuid' => $input['c5_chat_uuid'],
                    'um_user_id' => \User::id(),
                    'sm_session_id' => session_id(),
                ],
                'pk' => ['c5_chat_id'],
                'single_row' => true,
            ]);
        } else {
            $chat_data = [];
        }
        render_form_action:
                $form = new ChatFormRightRail([
                    'input' => array_merge_hard($input, $chat_data),
                    'chat_data' => $chat_data,
                ]);
        return $form->render();
    }
}
