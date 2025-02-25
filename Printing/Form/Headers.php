<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Form;

use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class Headers extends Base
{
    public $form_link = 'p8_headers';
    public $module_code = 'P8';
    public $title = 'P/8 Headers Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true,
            'activate' => true
        ],
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'fields_container' => [
            'type' => 'details',
            'details_rendering_type' => 'grid_with_label',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Printing\Model\Header\Fields',
            'details_pk' => ['p8_hdrfield_model_code', 'p8_hdrfield_column_name', 'p8_hdrfield_hdrrowtype_code'],
            'required' => true,
            'order' => 35000
        ],
        'multiple_columns_container' => [
            'label_name' => 'Multiple Columns',
            'type' => 'subdetails',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Printing\Model\Header\Fields',
            'details_key' => '\Numbers\Users\Printing\Model\Header\Field\MultipleColumns',
            'details_pk' => ['p8_hdrfldmult_multiple_model_code', 'p8_hdrfldmult_multiple_column_name'],
            'order' => 35001,
            'required' => false
        ],
    ];

    public $rows = [
        'tabs' => [
            'fields' => ['order' => 200, 'label_name' => 'Fields'],
        ]
    ];
    public $elements = [
        'top' => [
            'p8_header_id' => [
                'p8_header_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Header #', 'domain' => 'header_id_sequence', 'percent' => 50, 'required' => false, 'navigation' => true],
                'p8_header_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
                'p8_header_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'p8_header_name' => [
                'p8_header_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'p8_header_template_id' => [
                'p8_header_template_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Template', 'domain' => 'template_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Printing\Model\Templates::optionsActive', 'options_params' => ['p8_template_versioned' => 0], 'onchange' => 'this.form.submit();'],
                'p8_header_skip_rendering' => ['order' => 2, 'label_name' => 'Skip Rendering', 'type' => 'boolean', 'percent' => 15],
                'p8_header_start_at_rows' => ['order' => 3, 'label_name' => 'Row #', 'domain' => 'order', 'null' => true, 'required' => true, 'placeholder' => 'Row #', 'percent' => 10],
                'p8_header_start_at_page' => ['order' => 4, 'label_name' => 'Page #', 'domain' => 'order', 'null' => true, 'required' => true, 'placeholder' => 'Page #', 'percent' => 10],
                'p8_header_switch_to_max' => ['order' => 5, 'label_name' => 'Switch To Max', 'type' => 'boolean', 'percent' => 15],
            ],
            'p8_header_data_model_code' => [
                'p8_header_data_model_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Data Model', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Printing\DataSource\Templates::optionsGrouppedCollectionTree', 'options_depends' => ['p8_template_id' => 'p8_header_template_id'], 'onchange' => 'this.form.submit();'],
                'p8_header_font_family' => ['order' => 2, 'label_name' => 'Font Family', 'domain' => 'font_family', 'null' => true, 'percent' => 20, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Fonts::options'],
                'p8_header_font_style' => ['order' => 3, 'label_name' => 'Font Style', 'domain' => 'font_style', 'null' => true, 'percent' => 20, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\FontStyles'],
                'p8_header_font_size' => ['order' => 4, 'label_name' => 'Font Size', 'domain' => 'font_size', 'null' => true, 'percent' => 10],
            ]
        ],
        'tabs' => [
            'fields' => [
                'fields' => ['container' => 'fields_container', 'order' => 100],
            ]
        ],
        'fields_container' => [
            'row1' => [
                'p8_hdrfield_order' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true, 'percent' => 5],
                'p8_hdrfield_model_code' => ['order' => 2, 'label_name' => 'Model', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Printing\DataSource\Templates::optionsGrouppedCollectionTree', 'options_depends' => ['p8_template_id' => 'parent::p8_header_template_id'], 'onchange' => 'this.form.submit();'],
                'p8_hdrfield_column_name' => ['order' => 3, 'label_name' => 'Column', 'domain' => 'column_name', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\Db\Common\Model\Models::optionsFields', 'options_depends' => ['sm_model_code' => 'p8_hdrfield_model_code'], 'options_params' => ['include_blank_columns' => true], 'onchange' => 'this.form.submit();'],
                'p8_hdrfield_hdrrowtype_code' => ['order' => 4, 'label_name' => 'Row Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Printing\Model\Header\RowTypes'],
            ],
            'row2' => [
                'p8_hdrfield_percent' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Percent', 'domain' => 'percent', 'null' => true, 'required' => true, 'percent' => 5],
                'p8_hdrfield_label_name' => ['order' => 2, 'label_name' => 'Label Name', 'domain' => 'name', 'null' => true, 'required' => false, 'percent' => 40],
                'p8_hdrfield_skip_empty' => ['order' => 3, 'label_name' => 'Skip Empty', 'type' => 'boolean', 'percent' => 10],
                'p8_hdrfield_value' => ['order' => 3, 'label_name' => 'Value', 'domain' => 'name', 'null' => true, 'percent' => 25],
            ],
            'row3' => [
                'p8_hdrfield_other_options' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Other Options', 'type' => 'json', 'null' => true, 'method' => 'textarea', 'rows' => 5, 'placeholder' => '{align, data_align, fs, ...}'],
            ]
        ],
        'multiple_columns_container' => [
            'row1' => [
                'p8_hdrfldmult_multiple_order' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true, 'percent' => 5],
                'p8_hdrfldmult_multiple_model_code' => ['order' => 2, 'label_name' => 'Model', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Printing\DataSource\Templates::optionsGrouppedCollectionTree', 'options_depends' => ['p8_template_id' => 'parent::p8_header_template_id'], 'onchange' => 'this.form.submit();'],
                'p8_hdrfldmult_multiple_column_name' => ['order' => 3, 'label_name' => 'Column', 'domain' => 'column_name', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\Db\Common\Model\Models::optionsFields', 'options_depends' => ['sm_model_code' => 'p8_hdrfldmult_multiple_model_code'], 'options_params' => ['include_blank_columns' => false], 'onchange' => 'this.form.submit();'],
                'p8_hdrfldmult_multiple_separator' => ['order' => 4, 'label_name' => 'Sep.', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 5, 'placeholder' => ''],
                'p8_hdrfldmult_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'P8 Headers',
        'model' => '\Numbers\Users\Printing\Model\Headers',
        'details' => [
            '\Numbers\Users\Printing\Model\Header\Fields' => [
                'name' => 'P8 Header Fields',
                'pk' => ['p8_hdrfield_tenant_id', 'p8_hdrfield_header_id', 'p8_hdrfield_model_code', 'p8_hdrfield_column_name', 'p8_hdrfield_hdrrowtype_code'],
                'type' => '1M',
                'map' => ['p8_header_tenant_id' => 'p8_hdrfield_tenant_id', 'p8_header_id' => 'p8_hdrfield_header_id'],
                'details' => [
                    '\Numbers\Users\Printing\Model\Header\Field\MultipleColumns' => [
                        'name' => 'P8 Header Field Multiple Columns',
                        'pk' => ['p8_hdrfldmult_tenant_id', 'p8_hdrfldmult_header_id', 'p8_hdrfldmult_model_code', 'p8_hdrfldmult_column_name', 'p8_hdrfldmult_hdrrowtype_code', 'p8_hdrfldmult_multiple_model_code', 'p8_hdrfldmult_multiple_column_name'],
                        'type' => '1M',
                        'map' => ['p8_hdrfield_tenant_id' => 'p8_hdrfldmult_tenant_id', 'p8_hdrfield_header_id' => 'p8_hdrfldmult_header_id', 'p8_hdrfield_model_code' => 'p8_hdrfldmult_model_code', 'p8_hdrfield_column_name' => 'p8_hdrfldmult_column_name', 'p8_hdrfield_hdrrowtype_code' => 'p8_hdrfldmult_hdrrowtype_code'],
                    ]
                ]
            ]
        ]
    ];

    public function validate(& $form)
    {
        /* @var $form \Object\Form\Base */
        $percents = [];
        $percent_first_field = [];
        // check percentages
        foreach ($form->values['\Numbers\Users\Printing\Model\Header\Fields'] as $k => $v) {
            if (!isset($percents[$v['p8_hdrfield_hdrrowtype_code']])) {
                $percents[$v['p8_hdrfield_hdrrowtype_code']] = 0;
                $percent_first_field[$v['p8_hdrfield_hdrrowtype_code']] = $k;
            }
            $percents[$v['p8_hdrfield_hdrrowtype_code']] += $v['p8_hdrfield_percent'];
            // multiple columns
            if (str_contains($v['p8_hdrfield_column_name'], '__multiple')) {
                if (empty($v['\Numbers\Users\Printing\Model\Header\Field\MultipleColumns'])) {
                    $form->validateQuickRequired(['\Numbers\Users\Printing\Model\Header\Fields', $k, '\Numbers\Users\Printing\Model\Header\Field\MultipleColumns', 1, 'p8_hdrfldmult_column_name']);
                    $form->validateQuickRequired(['\Numbers\Users\Printing\Model\Header\Fields', $k, '\Numbers\Users\Printing\Model\Header\Field\MultipleColumns', 1, 'p8_hdrfldmult_model_code']);
                }
            }
            // otheer options
            if (!empty($v['p8_hdrfield_other_options'])) {
                if (!is_json($v['p8_hdrfield_other_options'])) {
                    $form->error(DANGER, Messages::INVALID_VALUES, "'\Numbers\Users\Printing\Model\Header\Fields[{$k}][p8_hdrfield_other_options]");
                } else {
                    $form->values['\Numbers\Users\Printing\Model\Header\Fields'][$k]['p8_hdrfield_other_options'] = json_encode(json_decode($v['p8_hdrfield_other_options'], true), JSON_UNESCAPED_SLASHES);
                }
            }
        }
        foreach ($percents as $k => $v) {
            if ($v == 100) {
                continue;
            }
            $form->error(DANGER, 'Sum on percentages per row must be equal to 100%.', "\Numbers\Users\Printing\Model\Header\Fields[{$percent_first_field[$k]}][p8_hdrfield_percent]");
        }
    }

    public function refresh(& $form)
    {

    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {

    }

    public function overrideTabs(& $form, & $tab_options, & $tab_name, & $neighbouring_values = [])
    {
        if ($tab_name === '\Numbers\Users\Printing\Model\Header\Field\MultipleColumns') {
            if (empty($neighbouring_values['p8_hdrfield_column_name']) || !str_contains($neighbouring_values['p8_hdrfield_column_name'], '__multiple')) {
                return ['hidden' => true];
            }
        }
    }
}
