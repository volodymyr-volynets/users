<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormStandalone;

use Object\Form\Wrapper\Base;

class ChatFormStandaloneNewCanvas extends Base
{
    public $form_link = 'c5_chat_standalone_new_canvas_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone New Canvas Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 200, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 300],
        'chats_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Chats\Model\Canvas\Map',
            'details_pk' => ['c5_chatcanvsmap_c5_chat_id'],
            'required' => false,
            'order' => 35000,
        ],
        'lists_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Chats\Model\Canvas\Lists',
            'details_pk' => ['c5_chatcanvslist_id'],
            'required' => false,
            'order' => 35100,
        ],
    ];
    public $rows = [
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'chats' => ['order' => 200, 'label_name' => 'Chats'],
            'lists' => ['order' => 300, 'label_name' => 'Lists'],
        ]
    ];
    public $elements = [
        'top' => [
            'c5_chatcanvas_code' => [
                'c5_chatcanvas_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 95],
                'c5_chatcanvas_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'chats' => [
                'chats' => ['container' => 'chats_container', 'order' => 100],
            ],
            'lists' => [
                'lists' => ['container' => 'lists_container', 'order' => 100],
            ],
        ],
        'general_container' => [
            'c5_chatcanvas_name' => [
                'c5_chatcanvas_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 50],
                'c5_chatcanvas_c5_canvastype_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Chats\Model\Canvas\CanvasTypes', 'onchange' => 'this.form.submit();'],
            ],
            'c5_chatgroup_icon' => [
                'c5_chatcanvas_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
                'c5_chatcanvas_link_url' => ['order' => 2, 'label_name' => 'Link URL', 'domain' => 'url', 'null' => true, 'percent' => 50],
            ],
            'c5_chatcanvas_html_wysiwyg' => [
                'c5_chatcanvas_html_wysiwyg' => ['order' => 1, 'row_order' => 300, 'label_name' => 'HTML Content', 'type' => 'text', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'wysiwyg', 'wysiwyg_height' => 250],
            ]
        ],
        'chats_container' => [
            'row1' => [
                'c5_chatcanvsmap_c5_chat_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Chats\DataSource\ChatOptions::options', 'onchange' => 'this.form.submit();'],
                'c5_chatcanvsmap_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'c5_chatcanvsmap_tab' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Tab', 'domain' => 'name', 'null' => true, 'required' => true],
                'c5_chatcanvsmap_order' => ['order' => 2, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true],
            ]
        ],
        'lists_container' => [
            'row1' => [
                'c5_chatcanvslist_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
            ],
            'row2' => [
                'c5_chatcanvslist_order' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true, 'percent' => 50],
                'c5_chatcanvslist_group' => ['order' => 2, 'label_name' => 'Group', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'row3' => [
                'c5_chatcanvslist_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea', 'rows' => 3],
            ],
            self::HIDDEN => [
                'c5_chatcanvslist_id' => ['label_name' => 'List #', 'domain' => 'big_id_sequence', 'null' => true, 'method' => 'hidden'],
            ],
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'C5 Canvases',
        'pk' => ['c5_chatcanvas_tenant_id', 'c5_chatcanvas_code'],
        'model' => '\Numbers\Users\Chats\Model\Canvases',
        'details' => [
            '\Numbers\Users\Chats\Model\Canvas\Map' => [
                'name' => 'C5 Canvas Chats',
                'pk' => ['c5_chatcanvsmap_tenant_id', 'c5_chatcanvsmap_c5_chatcanvas_code', 'c5_chatcanvsmap_c5_chat_id'],
                'type' => '1M',
                'map' => ['c5_chatcanvas_tenant_id' => 'c5_chatcanvsmap_tenant_id', 'c5_chatcanvas_code' => 'c5_chatcanvsmap_c5_chatcanvas_code']
            ],
            '\Numbers\Users\Chats\Model\Canvas\Lists' => [
                'name' => 'C5 Canvas Lists',
                'pk' => ['c5_chatcanvslist_tenant_id', 'c5_chatcanvslist_c5_chatcanvas_code', 'c5_chatcanvslist_id'],
                'type' => '1M',
                'map' => ['c5_chatcanvas_tenant_id' => 'c5_chatcanvslist_tenant_id', 'c5_chatcanvas_code' => 'c5_chatcanvslist_c5_chatcanvas_code']
            ],
        ],
    ];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if (!\User::authorized()) {
            $form->error(DANGER, 'Only logged in users can create canvases!');
        }
        if ($form->hasErrors()) {
            return;
        }
    }
}
