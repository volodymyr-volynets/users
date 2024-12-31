<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\List2\Assignment;

use Object\Form\Wrapper\List2;

class UserToCustomer extends List2
{
    public $form_link = 'um_assignment_user_to_customer_list';
    public $module_code = 'UM';
    public $title = 'U/M User To Customer Assignment List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
            'new' => ['onclick' => null],
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
            'um_assigncustomer_user_id' => [
                'um_assigncustomer_user_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Parent User', 'domain' => 'user_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Users', 'query_builder' => 'a.um_assigncustomer_user_id;='],
                'um_assignusrtype_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_assignusrtype_inactive;=']
            ],
            'um_assigncustomer_organization_id' => [
                'um_assigncustomer_organization_id1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations', 'query_builder' => 'a.um_assigncustomer_organization_id;='],
                'um_assigncustomer_customer_id1' => ['order' => 2, 'label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => 'Numbers\Users\Organizations\Model\Customers', 'query_builder' => 'a.um_assigncustomer_customer_id;='],
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
                'um_assigncustomer_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'percent' => 95, 'options_model' => '\Numbers\Users\Users\Model\Users', 'url_edit' => true],
                'um_assigncustomer_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'um_assigncustomer_organization_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Organization', 'domain' => 'organization_id', 'percent' => 50, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations'],
                'um_assigncustomer_customer_id' => ['order' => 2, 'label_name' => 'Customer', 'domain' => 'customer_id', 'percent' => 50, 'options_model' => 'Numbers\Users\Organizations\Model\Customers'],
            ],
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Users\Model\User\Assignment\Customer\Customers';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'um_assigncustomer_user_id' => SORT_ASC,
            'um_assigncustomer_customer_id' => SORT_ASC,
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'um_assigncustomer_user_id' => ['name' => 'User #'],
        'um_assigncustomer_customer_id' => ['name' => 'Customer #'],
    ];
}
