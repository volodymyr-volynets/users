<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

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
                    'sm_abacattr_id' => '::id::um_user_id',
                    'sm_abacattr_code' => 'um_user_id',
                    'sm_abacattr_name' => 'User #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => null,
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 1,
                    'sm_abacattr_flag_attribute' => 1,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Users',
                    'sm_abacattr_domain' => '::from::columns::um_user_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_user_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_user_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_role_id',
                    'sm_abacattr_code' => 'um_role_id',
                    'sm_abacattr_name' => 'Role #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => null,
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 1,
                    'sm_abacattr_flag_attribute' => 1,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Roles',
                    'sm_abacattr_domain' => '::from::columns::um_role_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_role_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_role_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_team_id',
                    'sm_abacattr_code' => 'um_team_id',
                    'sm_abacattr_name' => 'Team #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => null,
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 1,
                    'sm_abacattr_flag_attribute' => 1,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Teams',
                    'sm_abacattr_domain' => '::from::columns::um_team_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_team_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_team_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_usrgrp_id',
                    'sm_abacattr_code' => 'um_usrgrp_id',
                    'sm_abacattr_name' => 'User Group #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => null,
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 1,
                    'sm_abacattr_flag_attribute' => 1,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Groups',
                    'sm_abacattr_domain' => '::from::columns::um_usrgrp_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrgrp_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrgrp_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
            ]
        ],
        'abac_attributes_children' => [
            'options' => [
                'pk' => ['sm_abacattr_id'],
                'model' => '\Numbers\Backend\ABAC\Model\Attributes',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_abacattr_id' => '::id::um_usrgrp_organization_id',
                    'sm_abacattr_code' => 'um_usrgrp_organization_id',
                    'sm_abacattr_name' => 'User Group Organization #',
                    'sm_abacattr_module_code' => 'ON',
                    'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 0,
                    'sm_abacattr_flag_other_table' => 1,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Groups',
                    'sm_abacattr_link_model_id' => null,
                    'sm_abacattr_domain' => '::from::columns::um_usrgrp_organization_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrgrp_organization_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrgrp_organization_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_usrrol_user_id',
                    'sm_abacattr_code' => 'um_usrrol_user_id',
                    'sm_abacattr_name' => 'Role User #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => '::id::um_user_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Roles',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Users\Model\Roles',
                    'sm_abacattr_domain' => '::from::columns::um_usrrol_user_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrrol_user_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrrol_user_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_usrrol_role_id',
                    'sm_abacattr_code' => 'um_usrrol_role_id',
                    'sm_abacattr_name' => 'User Role #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => '::id::um_role_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Roles',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Users\Model\Users',
                    'sm_abacattr_domain' => '::from::columns::um_usrrol_role_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrrol_role_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrrol_role_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_usrorg_user_id',
                    'sm_abacattr_code' => 'um_usrorg_user_id',
                    'sm_abacattr_name' => 'Organization User #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => '::id::um_user_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Organizations',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Organizations\Model\Organizations',
                    'sm_abacattr_domain' => '::from::columns::um_usrorg_user_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrorg_user_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrorg_user_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_usrorg_organization_id',
                    'sm_abacattr_code' => 'um_usrorg_organization_id',
                    'sm_abacattr_name' => 'User Organization #',
                    'sm_abacattr_module_code' => 'ON',
                    'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\User\Organizations',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Users\Model\Users',
                    'sm_abacattr_domain' => '::from::columns::um_usrorg_organization_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_usrorg_organization_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_usrorg_organization_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_rolorg_role_id',
                    'sm_abacattr_code' => 'um_rolorg_role_id',
                    'sm_abacattr_name' => 'Organization Role #',
                    'sm_abacattr_module_code' => 'UM',
                    'sm_abacattr_parent_abacattr_id' => '::id::um_role_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Role\Organizations',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Organizations\Model\Organizations',
                    'sm_abacattr_domain' => '::from::columns::um_rolorg_role_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_rolorg_role_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_rolorg_role_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
                [
                    'sm_abacattr_id' => '::id::um_rolorg_organization_id',
                    'sm_abacattr_code' => 'um_rolorg_organization_id',
                    'sm_abacattr_name' => 'Role Organization #',
                    'sm_abacattr_module_code' => 'ON',
                    'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
                    'sm_abacattr_tenant' => 1,
                    'sm_abacattr_module' => 0,
                    'sm_abacattr_flag_abac' => 1,
                    'sm_abacattr_flag_assingment' => 0,
                    'sm_abacattr_flag_attribute' => 0,
                    'sm_abacattr_flag_link' => 1,
                    'sm_abacattr_flag_other_table' => 0,
                    'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Role\Organizations',
                    'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Users\Model\Roles',
                    'sm_abacattr_domain' => '::from::columns::um_rolorg_organization_id::domain',
                    'sm_abacattr_type' => '::from::columns::um_rolorg_organization_id::type',
                    'sm_abacattr_is_numeric_key' => '::from::columns::um_rolorg_organization_id::is_numeric_key',
                    'sm_abacattr_inactive' => 0
                ],
            ]
        ],
        'abac_assignments' => [
            'options' => [
                'pk' => ['sm_abacassign_code'],
                'model' => '\Numbers\Backend\ABAC\Model\Assignments',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_abacassign_code' => 'USER-TO-USER',
                    'sm_abacassign_name' => 'User To User',
                    'sm_abacassign_module_code' => 'UM',
                    'sm_abacassign_model_id' => '::id::\Numbers\Users\Users\Model\User\Assignment\Types',
                    'sm_abacassign_model_code' => '\Numbers\Users\Users\Model\User\Assignment\Types',
                    'sm_abacassign_inactive' => 0
                ],
            ],
        ],
    ];
}
