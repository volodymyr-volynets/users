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

class AssignmentTableAccesses extends Base
{
    public $form_link = 'um_assignment_table_accesses';
    public $module_code = 'UM';
    public $title = 'U/M Assignment Table Accesses Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_abacasstblacc_id' => [
                'um_abacasstblacc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Record #', 'domain' => 'big_id_sequence', 'percent' => 95, 'navigation' => true],
                'um_abacasstblacc_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_abacasstblacc_sm_model_id' => [
                'um_abacasstblacc_sm_model_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Model', 'domain' => 'model_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'options_params' => ['sm_model_scoped_record' => 1], 'onchange' => 'this.form.submit();'],
                'um_abacasstblacc_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'options_depends' => ['tm_module_module_code' => 'um_abacasstblacc_module_code'], 'onchange' => 'this.form.submit();'],
                'um_abacasstblacc_default' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_abacasstblacc_um_abacasigntype_code' => [
                'um_abacasstblacc_um_abacasigntype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Assignment Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTypes', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_abacasstblacc_um_abacasstblatr_code' => ['order' => 2, 'label_name' => 'Attribute Code', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTableAttributes', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_abacasstblacc_um_abacasignperm_code' => ['order' => 3, 'label_name' => 'Assignment Permission', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\ABAC\AssignmentPermissions', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            self::HIDDEN => [
                'um_abacasstblacc_sm_model_code' => ['order' => 1, 'label_name' => 'Model Code', 'domain' => 'code', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'um_abacasstblacc_module_code' => ['order' => 2, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'required' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Assignment Table Accesses',
        'model' => '\Numbers\Users\Users\Model\ABAC\AssignmentTableAccesses'
    ];

    public function refresh(& $form)
    {
        if ($form->values['um_abacasstblacc_sm_model_id']) {
            $model_data = Models::getSingleStatic([
                'where' => [
                    'sm_model_id' => (int) $form->values['um_abacasstblacc_sm_model_id'],
                ]
            ]);
            $form->values['um_abacasstblacc_sm_model_code'] = $model_data['sm_model_code'];
            $form->values['um_abacasstblacc_module_code'] = $model_data['sm_model_module_code'];
        }
    }
}
