<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form;

use Object\Form\Wrapper\Base;

class ChatFormRightRail extends Base
{
    public $form_link = 'c5_chat_right_rail_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Right Rail Form';
    public $options = [
        'segment' => [
            'type' => 'info',
            'header' => [
                'icon' => ['type' => 'fa-solid fa-message'],
                'title' => 'Chat',
                'loc' => 'NF.System.Chat'
            ],
        ],
        'actions' => [
            'refresh' => true,
        ],
        'skip_web_sockets' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'chat' => ['default_row_type' => 'grid', 'order' => 200, 'custom_renderer' => 'self::renderChatRightRailContainer']
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            self::HIDDEN => [
                'c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
                'c5_chat_uuid' => ['name' => 'UUID', 'domain' => 'uuid'],
            ],
        ],
    ];
    public $collection = [
        'name' => 'C5 Chats',
        'pk' => ['c5_chat_tenant_id', 'c5_chat_uuid'],
        'model' => '\Numbers\Users\Chats\Model\Chats'
    ];

    public $subforms = [
        'c5_chat_right_rail_new_chat_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormRightRail\ChatFormRightRailNewChat',
            'label_name' => 'New Chat',
            'icon' => 'material-symbols-outlined light new_window',
            'actions' => [
                // dod not enable this is missing context
                //'new' => ['name' => 'New Chat', 'append' => true, 'icon' => 'material-symbols-outlined light new_window'],
            ]
        ],
        'c5_chat_right_rail_add_prompt_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormRightRail\ChatFormRightRailAddPrompt',
            'label_name' => 'Add Prompt',
            'icon' => 'fa-solid fa-terminal',
            'actions' => [
                'edit' => ['name' => 'Add Prompt', 'append' => true, 'icon' => 'fa-solid fa-terminal'],
            ]
        ],
    ];

    public function renderChatRightRailContainer(& $form)
    {
        $input = array_merge_hard(\Request::input(), $form->values);
        $result = \Template::renderStatic(\Template::REACT_TSX, '/Numbers/Users/Chats/View/ChatPageRightRail.template.react.tsx', [
            '__root' => 'numbers_right_rail_container',
            '__component' => 'ChatPageRightRail',
            '__load' => ['Internalization', 'Users'],
            '__localStorage' => ['Internalization.Settings' => 'i18n', 'Users.BearerToken' => ''],
            // parameters
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_uuid' => $input['c5_chat_uuid'],
            'c5_chat_id' => $form->values['c5_chat_id'],
            'chat_data' => $form->options['chat_data'],
            'um_user_id' => \User::id(),
            // context
            '__run_uuid' => \Db::uuidTenanted(),
            '__context' => \Context::getChatStatic(),
            // permissions
            'acl_can' => [
                'CreateChatChannels' => \Application::$controller->canSubresourceCached('C5::CHAT_CHANNELS', 'Record_New'),
                'CreateChatGroups' => \Application::$controller->canSubresourceCached('C5::CHAT_GROUPS', 'Record_New'),
                'CreateChatCanvases' => \Application::$controller->canSubresourceCached('C5::CHAT_CANVASES', 'Record_New'),
                'CreateChatMessages' => true,
                'AllowChatUserMentions' => \User::authorized(),
                'AllowChatOtherMentions' => \User::authorized(),
                'AllowChatChannelMentions' => \User::authorized(),
                'CreateChatDirectMessages' => \User::authorized(),
                'AllowChatCanvases' => \User::authorized(),
            ],
            // dates as per server
            'date_today' => \Format::date(\Format::now('date')),
            'date_yesterday' => \Format::date(\Format::now('date', ['add_seconds' => -1 * 60 * 60 * 24])),
        ]);
        return $result;
    }
}
