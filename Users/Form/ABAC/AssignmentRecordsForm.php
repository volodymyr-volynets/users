<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\ABAC;

use Object\Form\Wrapper\Base;
use Numbers\Backend\Db\Common\Model\Models;

class AssignmentRecordsForm extends Base
{
    public $form_link = 'um_assignment_records_form';
    public $module_code = 'UM';
    public $title = 'U/M Assignment Records Form';
    public $options = [
        'actions' => [
            'refresh' => true,
            'import' => false,
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_abacassign_id' => [
                'um_abacassign_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Record #', 'domain' => 'big_id_sequence', 'null' => true, 'readonly' => true],
            ],
            'um_abacassign_attribute_sm_model_id' => [
                'um_abacassign_attribute_sm_model_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Model', 'domain' => 'model_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'options_params' => ['sm_model_scoped_attribute' => 1], 'onchange' => 'this.form.submit();'],
                'um_abacassign_um_abacasigntype_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTypes', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_abacassign_um_abacasignperm_code' => ['order' => 3, 'label_name' => 'Permission', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentPermissions', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'um_abacassign_attribute_value_id' => [
                'um_abacassign_attribute_value_id' => ['order' => 1, 'row_order' => 200 , 'label_name' => 'Attribute Field Value #', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'select', 'onchange' => 'this.form.submit();'],
            ],
            'um_abacassign_attribute_value_code' => [
                'um_abacassign_attribute_value_code' => ['order' => 1, 'row_order' => 300 , 'label_name' => 'Attribute Field Value Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'select', 'onchange' => 'this.form.submit();'],
            ],
            'um_abacassign_attribute_value_name' => [
                'um_abacassign_attribute_value_name' => ['order' => 1, 'row_order' => 400 , 'label_name' => 'Attribute Field Value Name', 'domain' => 'name', 'null' => true, 'required' => 'c', 'percent' => 100],
            ],
            self::HIDDEN => [
                'um_abacassign_record_sm_model_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Record Model Code', 'domain' => 'code', 'null' => true, 'method' => 'hidden'],
                'um_abacassign_record_value_id' => ['order' => 2, 'label_name' => 'Record Field Value #', 'domain' => 'big_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Assignment Records',
        'model' => '\Numbers\Users\Users\Model\ABAC\AssignmentRecords',
    ];

    public $attribute_data = null;
    public $attribute_model = null;

    public function refresh(& $form)
    {
        if (empty($form->values['um_abacassign_id'])) {
            $form->values['um_abacassign_record_sm_model_code'] = $form->options['input']['um_abacassign_record_sm_model_code'];
            $form->values['um_abacassign_record_value_id'] = $form->options['input']['um_abacassign_record_value_id'];
        }
    }

    public function validate(\Object\Form\Base & $form)
    {
        $this->preloadData($form);
        // record
        $record_model = \Factory::model($form->values['um_abacassign_record_sm_model_code'], true);
        $record_data = Models::getSingleStatic([
            'where' => [
                'sm_model_code' => $form->values['um_abacassign_record_sm_model_code'],
            ]
        ]);
        $form->values['um_abacassign_record_sm_model_id'] = $record_data['sm_model_id'];
        $form->values['um_abacassign_record_field_code'] = $record_model->scoped_records['column_key'];
        $form->values['um_abacassign_record_field_name'] = $record_model->scoped_records['column_name'];
        // attribute
        $form->values['um_abacassign_attribute_sm_model_id'];
        $form->values['um_abacassign_attribute_sm_model_code'] = $this->attribute_data['sm_model_code'];
        $form->values['um_abacassign_attribute_field_code'] = $this->attribute_model->scoped_attributes['column_key'];
        $form->values['um_abacassign_attribute_field_name'] = $this->attribute_model->scoped_attributes['column_name'];
        if ($this->attribute_model->scoped_attributes['column_pk_type'] == 'int') {
            $form->validateQuickRequired('um_abacassign_attribute_value_id');
            if ($form->values['um_abacassign_attribute_value_id']) {
                $form->values['um_abacassign_attribute_value_name'] = $this->attribute_model->getByColumn($this->attribute_model->scoped_attributes['column_key'], $form->values['um_abacassign_attribute_value_id'], $this->attribute_model->column_prefix . 'name') . '; #' . $form->values['um_abacassign_attribute_value_id'];
            }
        } else {
            $form->validateQuickRequired('um_abacassign_attribute_value_code');
            if ($form->values['um_abacassign_attribute_value_code']) {
                $form->values['um_abacassign_attribute_value_name'] = $this->attribute_model->getByColumn($this->attribute_model->scoped_attributes['column_key'], $form->values['um_abacassign_attribute_value_code'], $this->attribute_model->column_prefix . 'name') . '; ' . $form->values['um_abacassign_attribute_value_code'];
            }
        }
    }

    public function post(& $form)
    {
        \Layout::onLoad("$('#form_um_abac_assignment_records_list_form').submit();");
    }

    protected function preloadData(& $form)
    {
        if ($form->values['um_abacassign_attribute_sm_model_id'] && !$this->attribute_model) {
            $this->attribute_data = Models::getSingleStatic([
                'where' => [
                    'sm_model_id' => $form->values['um_abacassign_attribute_sm_model_id'],
                ]
            ]);
            $this->attribute_model = \Factory::model($this->attribute_data['sm_model_code'], true);
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        $this->preloadData($form);
        if (in_array($options['options']['field_name'], ['um_abacassign_attribute_value_id', 'um_abacassign_attribute_value_code'])) {
            if (empty($form->values['um_abacassign_attribute_sm_model_id'])) {
                $options['options']['row_hidden'] = true;
            } else {
                if ($this->attribute_model->scoped_attributes['column_pk_type'] == 'int') {
                    if ($options['options']['field_name'] == 'um_abacassign_attribute_value_code') {
                        $options['options']['row_hidden'] = true;
                    } else {
                        $options['options']['options_model'] = $this->attribute_data['sm_model_code'];
                    }
                } else {
                    if ($options['options']['field_name'] == 'um_abacassign_attribute_value_id') {
                        $options['options']['row_hidden'] = true;
                    } else {
                        $options['options']['options_model'] = $this->attribute_data['sm_model_code'];
                    }
                }
            }
        }
        if ($options['options']['field_name'] == 'um_abacassign_attribute_value_name') {
            if (empty($form->values['um_abacassign_attribute_sm_model_id'])) {
                $options['options']['row_hidden'] = true;
            }
        }
    }
}
