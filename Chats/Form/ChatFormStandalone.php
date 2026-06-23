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

class ChatFormStandalone extends Base
{
    public $form_link = 'c5_chat_standalone_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Form';
    public $options = [
        'segment' => [
            'type' => 'primary',
            'header' => [
                'icon' => ['type' => 'fa-solid fa-message'],
                'title' => 'Chat',
                'loc' => 'NF.System.Chat'
            ],
        ],
        'actions' => [
            'refresh' => true,
            'home' => ['sort' => PHP_INT_MIN, 'href' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat', 'value' => 'Home', 'icon' => 'fa-solid fa-home']
        ],
        'skip_web_sockets' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'chat' => ['default_row_type' => 'grid', 'order' => 200, 'custom_renderer' => 'self::renderChatStandaloneContainer']
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
        'c5_chat_standalone_new_chat_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewChat',
            'label_name' => 'New Chat',
            'icon' => 'material-symbols-outlined light new_window',
            'actions' => [
                'new' => ['name' => 'New Chat', 'append' => true, 'icon' => 'material-symbols-outlined light new_window'],
            ]
        ],
        'c5_chat_standalone_new_channel_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewChannel',
            'label_name' => 'New Channel',
            'icon' => 'material-symbols-outlined light move_group',
            'acl_subresource_hide' => ['C5::CHAT_CHANNELS', 'Record_New'],
            'actions' => [
                'new' => ['name' => 'New Channel', 'append' => true, 'icon' => 'material-symbols-outlined light move_group'],
            ]
        ],
        'c5_chat_standalone_new_dm_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewDirectMessage',
            'label_name' => 'New Direct Message',
            'icon' => 'material-symbols-outlined light contacts_product',
            'acl_need_authorized' => true,
            'actions' => [
                'new' => ['name' => 'New Direct Message', 'append' => true, 'icon' => 'material-symbols-outlined light contacts_product'],
            ]
        ],
        'c5_chat_standalone_new_message_on_channel_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewMessageOnChannel',
            'label_name' => 'New Channel Message',
            'icon' => 'material-symbols-outlined light move_group',
            'acl_need_authorized' => true,
            'actions' => [
                'new' => ['name' => 'New Channel Message', 'append' => true, 'icon' => 'material-symbols-outlined light move_group'],
            ]
        ],
        'c5_chat_standalone_user_profile_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneProfile',
            'label_name' => 'View User Profile',
            'acl_need_authorized' => true,
            'actions' => [
                'view_user' => ['name' => 'View User'],
            ]
        ],
        'c5_chat_standalone_new_group_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewGroup',
            'label_name' => 'New Group',
            'icon' => 'fa-regular fa-object-group',
            'acl_subresource_hide' => ['C5::CHAT_GROUPS', 'Record_New'],
            'actions' => [
                'new' => ['name' => 'New Group', 'append' => true, 'icon' => 'fa-regular fa-object-group'],
            ]
        ],
        'c5_chat_standalone_groups_list' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\List2\ChatFormStandaloneGroupsList2',
            'label_name' => 'Groups',
            'icon' => 'fa-regular fa-object-group',
            'acl_subresource_hide' => ['C5::CHAT_GROUPS', 'Record_View'],
            'actions' => [
                'edit' => ['name' => 'Edit Group', 'append' => true, 'icon' => 'fa-regular fa-object-group'],
            ]
        ],
        'c5_chat_standalone_new_canvas_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewCanvas',
            'label_name' => 'Edit Canvas',
            'icon' => 'fa-solid fa-cube',
            'acl_subresource_hide' => ['C5::CHAT_CANVASES', 'Record_View'],
            'actions' => [
                'new' => ['name' => 'New Canvas', 'append' => true],
                'edit' => ['name' => 'Edit Canvas', 'append' => true, 'url_edit' => true],
            ]
        ],
        'c5_chat_standalone_canvases_list' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\List2\ChatFormStandaloneCanvasesList2',
            'label_name' => 'Canvases',
            'icon' => 'fa-solid fa-cube',
            'acl_subresource_hide' => ['C5::CHAT_CANVASES', 'Record_View'],
            'actions' => [
                'edit' => ['name' => 'Edit Canvas', 'append' => true, 'icon' => 'fa-solid fa-cube'],
            ]
        ],
        // change agent
        'c5_chat_standalone_change_agent_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneChangeAgent',
            'label_name' => 'Change Agent',
            'icon' => 'material-symbols-outlined light engineering',
            'actions' => [
                'edit' => ['name' => 'Change Agent', 'append' => true, 'icon' => 'material-symbols-outlined light engineering'],
            ]
        ],
        'c5_chat_standalone_change_thread_agent_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneChangeThreadAgent',
            'label_name' => 'Change Agent',
            'icon' => 'material-symbols-outlined light engineering',
            'actions' => [
                'edit' => ['name' => 'Change Agent', 'append' => true, 'icon' => 'material-symbols-outlined light engineering'],
            ]
        ],
        'c5_chat_standalone_change_signature_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneChangeSignature',
            'label_name' => 'Change Signature',
            'icon' => 'fa-solid fa-signature',
            'actions' => [
                'edit' => ['name' => 'Change Signature', 'append' => true, 'icon' => 'fa-solid fa-signature'],
            ]
        ],
        'c5_chat_standalone_change_terms_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneChangeTerms',
            'label_name' => 'Change Terms',
            'icon' => 'fa-solid fa-anchor-circle-exclamation',
            'actions' => [
                'edit' => ['name' => 'Change Terms', 'append' => true, 'icon' => 'fa-solid fa-anchor-circle-exclamation'],
            ]
        ],
        'c5_chat_standalone_add_prompt_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneAddPrompt',
            'label_name' => 'Add Prompt',
            'icon' => 'fa-solid fa-terminal',
            'actions' => [
                'edit' => ['name' => 'Add Prompt', 'append' => true, 'icon' => 'fa-solid fa-terminal'],
            ]
        ],
        'c5_chat_standalone_add_image_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneAddImage',
            'label_name' => 'Image Generation Settings',
            'icon' => 'fa-regular fa-file-image',
            'actions' => [
                'edit' => ['name' => 'Image Generation Settings', 'append' => true, 'icon' => 'fa-regular fa-file-image'],
            ]
        ],
        'c5_chat_standalone_add_sound_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneAddSound',
            'label_name' => 'Sound Generation Settings',
            'icon' => 'fa-regular fa-file-audio',
            'actions' => [
                'edit' => ['name' => 'Sound Generation Settings', 'append' => true, 'icon' => 'fa-regular fa-file-audio'],
            ]
        ],
        'c5_chat_standalone_add_transcript_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneAddTranscript',
            'label_name' => 'Transcript Settings',
            'icon' => 'fa-solid fa-f',
            'actions' => [
                'edit' => ['name' => 'Transcript Settings', 'append' => true, 'icon' => 'fa-solid fa-f'],
            ]
        ],
        'c5_chat_standalone_add_rag_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneAddRAG',
            'label_name' => 'RAG Settings',
            'icon' => 'fa-solid fa-file-fragment',
            'actions' => [
                'edit' => ['name' => 'Transcript Settings', 'append' => true, 'icon' => 'fa-solid fa-file-fragment'],
            ]
        ]
    ];

    public function renderChatStandaloneContainer(& $form)
    {
        $input = array_merge_hard(\Request::input(), $form->values);
        $result = \Template::renderStatic(\Template::REACT_TSX, '/Numbers/Users/Chats/View/ChatPageStandalone.template.react.tsx', [
            '__root' => 'numbers_controller_and_view',
            '__component' => 'ChatPageStandalone',
            '__load' => ['Internalization', 'Users'],
            '__localStorage' => ['Internalization.Settings' => 'i18n', 'Users.BearerToken' => ''],
            // parameters
            'c5_chat_tenant_id' => \Tenant::id(),
            'c5_chat_uuid' => $input['c5_chat_uuid'],
            'c5_chat_id' => $form->values['c5_chat_id'],
            'chat_data' => $form->options['chat_data'],
            'um_user_id' => \User::id(),
            '__run_uuid' => \Db::uuidTenanted(),
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
