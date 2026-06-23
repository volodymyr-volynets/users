<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Data;

use Object\Import;

class System2 extends Import
{
    public $data = [
        'subresources' => [
            'options' => [
                'pk' => ['sm_rsrsubres_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Subresources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_rsrsubres_id' => '::id::C5::CHAT_CHANNELS',
                    'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Chats\Controller\ChatPageStandalone',
                    'sm_rsrsubres_parent_rsrsubres_id' => null,
                    'sm_rsrsubres_code' => 'C5::CHAT_CHANNELS',
                    'sm_rsrsubres_name' => 'C/5 Chat Channels',
                    'sm_rsrsubres_icon' => 'fa-solid fa-hashtag',
                    'sm_rsrsubres_module_code' => 'C5',
                    'sm_rsrsubres_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
                        [
                            'sm_rsrsubftr_feature_code' => 'C5::CHATS',
                            'sm_rsrsubftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
                        [
                            'sm_rsrsubmap_action_id' => '::id::All_Actions',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_View',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_New',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Edit',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Join',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Delete',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                    ]
                ],
                [
                    'sm_rsrsubres_id' => '::id::C5::CHAT_GROUPS',
                    'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Chats\Controller\ChatPageStandalone',
                    'sm_rsrsubres_parent_rsrsubres_id' => null,
                    'sm_rsrsubres_code' => 'C5::CHAT_GROUPS',
                    'sm_rsrsubres_name' => 'C/5 Chat Groups',
                    'sm_rsrsubres_icon' => 'fa-regular fa-object-group',
                    'sm_rsrsubres_module_code' => 'C5',
                    'sm_rsrsubres_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
                        [
                            'sm_rsrsubftr_feature_code' => 'C5::CHATS',
                            'sm_rsrsubftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
                        [
                            'sm_rsrsubmap_action_id' => '::id::All_Actions',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_View',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_New',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Edit',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Join',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Delete',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                    ]
                ],
                [
                    'sm_rsrsubres_id' => '::id::C5::CHAT_CANVASES',
                    'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Chats\Controller\ChatPageStandalone',
                    'sm_rsrsubres_parent_rsrsubres_id' => null,
                    'sm_rsrsubres_code' => 'C5::CHAT_CANVASES',
                    'sm_rsrsubres_name' => 'C/5 Chat Canvases',
                    'sm_rsrsubres_icon' => 'fa-solid fa-cube',
                    'sm_rsrsubres_module_code' => 'C5',
                    'sm_rsrsubres_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
                        [
                            'sm_rsrsubftr_feature_code' => 'C5::CHATS',
                            'sm_rsrsubftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
                        [
                            'sm_rsrsubmap_action_id' => '::id::All_Actions',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_View',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_New',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Edit',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Join',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                        [
                            'sm_rsrsubmap_action_id' => '::id::Record_Delete',
                            'sm_rsrsubmap_inactive' => 0
                        ],
                    ]
                ],
            ]
        ]
    ];
}
