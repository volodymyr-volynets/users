<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\List2;

use Object\Form\Wrapper\List2;

class Invites extends List2
{
    public $form_link = 'um_usrinv_invite_list';
    public $module_code = 'UM';
    public $title = 'U/M User Invite List';
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
            'um_usrinv_id' => [
                'um_usrinv_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_usrinv_id;>='],
                'um_usrinv_id2' => ['order' => 2, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_usrinv_id;<='],
                'um_usrinv_type_id1' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\User\Types', 'query_builder' => 'a.um_usrinv_type_id'],
            ],
            'roles_filter' => [
                'um_usrinrol_role_id1' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Roles', 'domain' => 'role_id', 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsGrouped', 'subquery_builder' => ['model' => '\Numbers\Users\Users\Model\User\Roles', 'alias' => 'inner_b2', 'column' => 'inner_b2.um_usrinrol_role_id', 'on' => [['a.um_usrinv_id', '=', 'inner_b2.um_usrinrol_user_id']]]],
                'um_usrinorg_organization_id1' => ['order' => 2, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped', 'subquery_builder' => ['model' => '\Numbers\Users\Users\Model\User\Organizations', 'alias' => 'inner_a2', 'column' => 'inner_a2.um_usrinorg_organization_id', 'on' => [['a.um_usrinv_id', '=', 'inner_a2.um_usrinorg_user_id']]]],
            ],
            'um_usrinv_hold1' => [
                'um_usrinv_hold1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_usrinv_hold;='],
                'um_usrinv_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_usrinv_inactive;=']
            ],
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.um_usrinv_name', 'a.um_usrinv_code', 'a.um_usrinv_phone', 'a.um_usrinv_email', 'a.um_usrinv_company', 'a.um_usrinv_login_username'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
                'um_usrinv_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Invite #', 'domain' => 'invite_id', 'percent' => 10, 'url_edit' => true],
                'um_usrinv_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 45],
                'um_usrinv_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 30],
                'um_usrinv_type_id' => ['order' => 4, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 10, 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                'um_usrinv_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                'blank1' => ['order' => 1, 'row_order' => 200, 'label_name' => null, 'domain' => 'name', 'null' => true, 'percent' => 10],
                'um_usrinv_company' => ['order' => 2, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 20],
                'um_usrinv_email' => ['order' => 3, 'label_name' => 'Email', 'domain' => 'email', 'null' => true, 'percent' => 35],
                'um_usrinv_phone' => ['order' => 4, 'label_name' => 'Phone', 'domain' => 'phone', 'null' => true, 'percent' => 35],
            ],
            'row3' => [
                'blank2' => ['order' => 1, 'row_order' => 200, 'label_name' => null, 'domain' => 'name', 'null' => true, 'percent' => 10],
                'um_usrinrol_role_id' => ['order' => 2, 'label_name' => 'Roles', 'domain' => 'role_id', 'null' => true, 'percent' => 45, 'options_model' => '\Numbers\Users\Users\Model\Roles', 'subquery' => ['model' => '\Numbers\Users\Users\Model\User\Invite\Roles', 'alias' => 'inner_b', 'groupby' => 'um_usrinrol_usrinv_id', 'on' => [['a.um_usrinv_id', '=', 'inner_b.um_usrinrol_usrinv_id']]]],
                'um_usrinorg_organization_id' => ['order' => 3, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'null' => true, 'percent' => 45, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations', 'subquery' => ['model' => '\Numbers\Users\Users\Model\User\Invite\Organizations', 'alias' => 'inner_a', 'groupby' => 'um_usrinorg_usrinv_id', 'on' => [['a.um_usrinv_id', '=', 'inner_a.um_usrinorg_usrinv_id']]]],
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Users\Model\User\Invites';
    public $query_primary_parameters = [];
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'um_usrinv_id' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'um_usrinv_id' => ['name' => 'Invite #'],
        'um_usrinv_name' => ['name' => 'Name'],
        'um_usrinv_email' => ['name' => 'Email'],
        'um_usrinv_phone' => ['name' => 'Phone'],
        'um_usrinv_company' => ['name' => 'Company']
    ];
}
