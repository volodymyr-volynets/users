<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Form\List2;

use Object\Form\Wrapper\List2;

class Headers extends List2
{
    public $form_link = 'p8_headers_list';
    public $module_code = 'P8';
    public $title = 'P/8 Headers List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
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
            'p8_header_id' => [
                'p8_header_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Header #', 'domain' => 'header_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.p8_header_id;>='],
                'p8_header_id2' => ['order' => 2, 'label_name' => 'Header #', 'domain' => 'header_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.p8_header_id;<='],
                'p8_header_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.p8_header_inactive;=']
            ],
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.p8_header_name', 'a.p8_header_code'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
                'p8_header_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Header #', 'domain' => 'header_id', 'percent' => 10, 'url_edit' => true],
                'p8_header_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 60],
                'p8_header_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 25],
                'p8_header_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                'blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 10],
                'p8_header_template_id' => ['order' => 2, 'label_name' => 'Template', 'domain' => 'template_id', 'percent' => 90, 'options_model' => '\Numbers\Users\Printing\Model\Templates'],
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Printing\Model\Headers';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'p8_header_id' => SORT_ASC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'p8_header_id' => ['name' => 'Header #'],
        'p8_header_code' => ['name' => 'Code'],
        'p8_header_name' => ['name' => 'Name']
    ];
}
