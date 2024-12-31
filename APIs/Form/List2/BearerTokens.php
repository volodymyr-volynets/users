<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Form\List2;

use Object\Form\Wrapper\List2;

class BearerTokens extends List2
{
    public $form_link = 'a3_bearer_tokens_list';
    public $module_code = 'A3';
    public $title = 'A/3 Bearer Tokens List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
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
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.a3_bearertoken_id'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
                'a3_bearertoken_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Token #', 'domain' => 'token', 'percent' => 95, 'url_edit' => true],
                'a3_bearertoken_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                '__attributes' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Attributes', 'type' => 'text', 'percent' => 100, 'custom_renderer' => 'self::renderColumns']
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Users\APIs\Model\BearerTokens';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'a3_bearertoken_expires' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'a3_bearertoken_expires' => ['name' => 'Expires'],
        'a3_bearertoken_started' => ['name' => 'Started'],
        'a3_bearertoken_id' => ['name' => 'Token #'],
    ];

    public function renderColumns(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = [];
        $result['Tenant #'] = $neighbouring_values['a3_bearertoken_tenant_id'];
        $result['User #'] = $neighbouring_values['a3_bearertoken_user_id'];
        $result['User IP'] = $neighbouring_values['a3_bearertoken_user_ip'];
        $result['Session #'] = $neighbouring_values['a3_bearertoken_session_id'];
        $result['Started'] = \Format::datetime($neighbouring_values['a3_bearertoken_started']);
        $result['Expires'] = \Format::datetime($neighbouring_values['a3_bearertoken_expires']);
        $table = [
            'class' => '',
            'width' => '100%',
            'reponsive' => true,
            'header' => ['name' => ['value' => 'Name', 'width' => '20%'], 'value' => ['value' => 'Value', 'width' => '80%']],
            'options' => [],
        ];
        foreach ($result as $k => $v) {
            $table['options'][] = ['name' => ['value' => i18n(null, $k), 'width' => '20%', 'wrap' => true], 'value' => ['value' => $v, 'width' => '80%', 'wrap' => true]];
        }
        return \HTML::table($table);
    }
}
