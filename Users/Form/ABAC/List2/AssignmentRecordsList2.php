<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\ABAC\List2;

use Object\Form\Wrapper\List2;

class AssignmentRecordsList2 extends List2
{
    public $form_link = 'um_abac_assignment_records_list';
    public $module_code = 'UM';
    public $title = 'U/M ABAC Assignment Records List';
    public $options = [
        'actions' => [
            'refresh' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fa-solid fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);'],
            'import' => false,
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
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.um_abacassign_attribute_value_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
            ],
            self::HIDDEN => [
                'um_abacassign_record_sm_model_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Model', 'domain' => 'code', 'query_builder' => 'a.um_abacassign_record_sm_model_code'],
                'um_abacassign_record_value_id' => ['order' => 2, 'label_name' => 'Field Value #', 'domain' => 'big_id', 'null' => true, 'query_builder' => 'a.um_abacassign_record_value_id'],
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
                'um_abacassign_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Record #', 'domain' => 'big_id_sequence', 'percent' => 15, 'url_edit' => true],
                'um_abacassign_attribute_sm_model_id' => ['order' => 2, 'label_name' => 'Model', 'domain' => 'model_id', 'percent' => 15, 'options_model' => '\Numbers\Backend\Db\Common\Model\Models'],
                'um_abacassign_attribute_value_name' => ['order' => 3, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 40],
                'um_abacassign_um_abacasigntype_code' => ['order' => 4, 'label_name' => 'Type', 'domain' => 'group_code', 'percent' => 15, 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTypes'],
                'um_abacassign_um_abacasignperm_code' => ['order' => 5, 'label_name' => 'Permission', 'domain' => 'group_code', 'percent' => 15, 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentPermissions'],
            ],
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Users\Model\ABAC\AssignmentRecords';
    public $query_primary_parameters = [];
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'um_abacassign_inserted_timestamp' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'um_abacassign_inserted_timestamp' => ['name' => 'Inserted'],
    ];

    public $subforms = [
        'um_assignment_records_form' => [
            'form' => '\Numbers\Users\Users\Form\ABAC\AssignmentRecordsForm',
            'label_name' => 'Create or Edit Scoped Attribute',
            'icon' => 'fa-regular fa-object-group',
            'actions' => [
                'new' => ['name' => 'New'],
                'edit' => ['name' => 'Edit', 'url_edit' => true, 'icon' => 'fa-regular fa-object-group'],
            ],
            'bypass_hidden_from_input_fields' => [
                'um_abacassign_record_sm_model_code',
                'um_abacassign_record_value_id',
            ],
            'button_to_submit' => '__submit_refresh',
        ]
    ];

    public function refresh(& $form)
    {

    }
}
