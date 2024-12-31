<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Assignment;

use Object\Form\Wrapper\Base;

class Types extends Base
{
    public $form_link = 'um_assignment_types';
    public $module_code = 'UM';
    public $title = 'U/M Assignment Types Form';
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
            'um_assignusrtype_code' => [
                'um_assignusrtype_id' => ['order' => 1, 'row_order' => 100, 'label_name'  => 'Assignment #', 'domain' => 'assignment_id_sequence', 'null' => true, 'percent' => 50, 'navigation' => true],
                'um_assignusrtype_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'type_code', 'percent' => 45, 'required' => true, 'navigation' => true],
                'um_assignusrtype_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_assignusrtype_name' => [
                'um_assignusrtype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 70, 'required' => true],
                'um_assignusrtype_multiple' => ['order' => 2, 'label_name' => 'Multiple', 'type' => 'boolean', 'percent' => 15],
                'um_assignusrtype_mandatory' => ['order' => 3, 'label_name' => 'Mandatory', 'type' => 'boolean', 'percent' => 15],
            ],
            'um_assignusrtype_parent_role_id' => [
                'um_assignusrtype_parent_role_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parent Role', 'domain' => 'group_id', 'null' => true, 'required' => true, 'persistent' => 'if_set', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive'],
                'um_assignusrtype_child_role_id' => ['order' => 2, 'label_name' => 'Child Role', 'domain' => 'group_id', 'null' => true, 'required' => true, 'persistent' => 'if_set', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Assignment Types',
        'model' => '\Numbers\Users\Users\Model\User\Assignment\Types'
    ];
}
