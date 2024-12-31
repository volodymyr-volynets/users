<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Comments\Data;

use Object\Import;

class ABAC extends Import
{
    public $data = [
        'abac_attributes_parents' => [
            'options' => [
                'pk' => ['sm_abacattr_id'],
                'model' => '\Numbers\Backend\ABAC\Model\Attributes',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_abacattr_id' => '::id::um_notetemplate_id',
                    'sm_abacattr_code' => 'um_notetemplate_id',
                    'sm_abacattr_name' => 'Comment Template #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => null,
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 1,
                    'sm_abacattr_flag_attribute' => 1,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Widgets\Comments\Model\Templates',
                    'sm_abacattr_domain' => '::from::columns::um_notetemplate_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_notetemplate_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_notetemplate_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_notetemplate_organization_id',
                    'sm_abacattr_code' => 'um_notetemplate_organization_id',
                    'sm_abacattr_name' => 'Comment Template Organization #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 1,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Widgets\Comments\Model\Templates',
                    'sm_abacattr_link_model_id' => null,
                    'sm_abacattr_domain' => '::from::columns::um_notetemplate_organization_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_notetemplate_organization_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_notetemplate_organization_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ]
            ]
        ],
    ];
}
