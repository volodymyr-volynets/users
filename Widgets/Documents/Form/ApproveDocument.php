<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Documents\Form;

use Object\Form\Wrapper\Base;

class ApproveDocument extends Base
{
    public $form_link = 'wg_approve_document';
    public $module_code = 'UM';
    public $title = 'U/M Aprove Document Form';
    public $options = [
        'on_success_refresh_parent' => true
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'wg_document_id' => [
                'wg_document_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Document #', 'domain' => 'big_id_sequence', 'null' => true, 'readonly' => true],
            ],
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_APPROVE => self::BUTTON_SUBMIT_APPROVE_DATA,
                self::BUTTON_SUBMIT_DECLINE => self::BUTTON_SUBMIT_DECLINE_DATA,
            ]
        ]
    ];
    public $collection = [];

    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            $model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Documents',
                'model' => $model->documents_model
            ];
        }
    }

    public function validate(& $form)
    {
        $model = new $form->options['model_table']();
        foreach ($model->documents['map'] as $k => $v) {
            if (isset($form->options['input'][$k])) {
                $form->values[$v] = (int) $form->options['input'][$k];
            }
        }
        if (!empty($form->process_submit[self::BUTTON_SUBMIT_APPROVE])) {
            $form->values['wg_document_approval_status_id'] = 30;
        } elseif (!empty($form->process_submit[self::BUTTON_SUBMIT_DECLINE])) {
            $form->values['wg_document_approval_status_id'] = 40;
        }
        $form->process_submit[$form::BUTTON_SUBMIT_SAVE] = true;
    }
}
