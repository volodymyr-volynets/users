<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormStandalone\List2;

use Object\Form\Wrapper\List2;

class ChatFormStandaloneCanvasesList2 extends List2
{
    public $form_link = 'c5_chat_standalone_canvases_list';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Canvases List';
    public $options = [
        'actions' => [
            'refresh' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fa-solid fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ],
        'skip_web_sockets' => true,
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
    ];
    public $rows = [
        'tabs' => [
            'filter' => ['order' => 100, 'label_name' => 'Filter'],
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'filter' => [
                'filter' => ['container' => 'filter', 'order' => 100]
            ],
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'filter' => [
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.c5_chatcanvas_code', 'a.c5_chatcanvas_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
            ]
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
        self::LIST_CONTAINER => [
            'row1' => [
                'c5_chatcanvas_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 25, 'url_edit' => true],
                'c5_chatcanvas_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 35],
                'c5_chatcanvas_c5_canvastype_code' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'group_code', 'options_model' => '\Numbers\Users\Chats\Model\Canvas\CanvasTypes', 'percent' => 35],
                'c5_chatcanvas_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Chats\Model\Canvases';
    public $query_primary_parameters = [];
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'c5_chatcanvas_inserted_timestamp' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'c5_chatcanvas_inserted_timestamp' => ['name' => 'Inserted'],
        'c5_chatcanvas_code' => ['name' => 'Code'],
        'c5_chatcanvas_name' => ['name' => 'Name'],
    ];

    public $subforms = [
        'c5_chat_standalone_new_canvas_form' => [
            'form' => '\Numbers\Users\Chats\Form\Collection\ChatFormStandalone\ChatFormStandaloneNewCanvas',
            'label_name' => 'Edit Canvas',
            'actions' => [
                'new' => ['name' => 'New'],
                'edit' => ['name' => 'Edit', 'url_edit' => true],
            ]
        ]
    ];
}
