<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class Invites extends Base
{
    public $form_link = 'um_usrinv_invites';
    public $module_code = 'UM';
    public $title = 'U/M User Invites Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'roles_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Roles',
            'details_pk' => ['um_usrinrol_role_id'],
            'required' => true,
            'order' => 35000,
        ],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Organizations',
            'details_pk' => ['um_usrinorg_organization_id'],
            'required' => true,
            'order' => 35001,
        ],
        'other_container' => ['default_row_type' => 'grid', 'order' => 33000],
    ];
    public $rows = [
        'top' => [
            'um_usrinv_id' => ['order' => 100],
            'um_usrinv_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 50, 'label_name' => 'General'],
            'organizations' => ['order' => 100, 'label_name' => 'Organizations'],
            'roles' => ['order' => 200, 'label_name' => 'Roles'],
            'other' => ['order' => 300, 'label_name' => 'Other']
        ]
    ];
    public $elements = [
        'top' => [
            'um_usrinv_id' => [
                'um_usrinv_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_usrinv_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
            ],
            'um_usrinv_name' => [
                'um_usrinv_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c', 'autocomplete' => 'off'],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'roles' => [
                'roles' => ['container' => 'roles_container', 'order' => 100],
            ],
            'other' => [
                'other' => ['container' => 'other_container', 'order' => 100],
            ],
        ],
        'general_container' => [
            'um_usrinv_type_id' => [
                'um_usrinv_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                'um_usrinv_company' => ['order' => 2, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 75, 'required' => 'c'],
                'um_usrinv_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_usrinv_title' => [
                'um_usrinv_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'um_usrinv_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
                'um_usrinv_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
            ],
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'far fa-envelope', 'percent' => 100],
            ],
            'um_usrinv_email' => [
                'um_usrinv_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
                'um_usrinv_phone' => ['order' => 2, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'separator_3' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 600, 'label_name' => 'Message To Invitee', 'icon' => 'fas fa-envelope-open-text', 'percent' => 100],
            ],
            'um_usrinv_invite_message' => [
                'um_usrinv_invite_message' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Invite Message', 'domain' => 'message', 'null' => true, 'required' => true, 'method' => 'textarea', 'rows' => 6, 'percent' => 100],
            ]
        ],
        'roles_container' => [
            'row1' => [
                'um_usrinrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
                'um_usrinrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_usrinorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_usrinorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'um_usrinorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'other_container' => [
            'um_usrinv_require_address' => [
                'um_usrinv_require_address' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Require Address', 'type' => 'boolean', 'null' => true, 'percent' => 25],
            ],
            'um_usrinv_require_assignment' => [
                'um_usrinv_require_assignment' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Require Assignment', 'type' => 'boolean', 'null' => true, 'required' => 'c', 'percent' => 25],
                'um_usrinv_assignusrtype_code' => ['order' => 2, 'label_name' => 'Assignment Type', 'domain' => 'type_code', 'null' => true, 'required' => 'c', 'percent' => 25, 'method' => 'select'],
                'um_usrinv_referral_user_id' => ['order' => 3, 'label_name' => 'Assignment User', 'domain' => 'user_id', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'User Invites',
        'model' => '\Numbers\Users\Users\Model\User\Invites',
        'details' => [
            '\Numbers\Users\Users\Model\User\Invite\Roles' => [
                'name' => 'User Invite Roles',
                'pk' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_role_id'],
                'type' => '1M',
                'map' => ['um_usrinv_tenant_id' => 'um_usrinrol_tenant_id', 'um_usrinv_id' => 'um_usrinrol_usrinv_id'],
            ],
            '\Numbers\Users\Users\Model\User\Invite\Organizations' => [
                'name' => 'User Invite Organizations',
                'pk' => ['um_usrinorg_tenant_id', 'um_usrinorg_usrinv_id', 'um_usrinorg_organization_id'],
                'type' => '1M',
                'map' => ['um_usrinv_tenant_id' => 'um_usrinorg_tenant_id', 'um_usrinv_id' => 'um_usrinorg_usrinv_id'],
            ],
        ]
    ];
    public $notification = [];

    public function validate(& $form)
    {
        // personal type
        if ($form->values['um_usrinv_type_id'] == 10) {
            if (empty($form->values['um_usrinv_first_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_usrinv_first_name');
            }
            if (empty($form->values['um_usrinv_last_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_usrinv_last_name');
            }
            $name = concat_ws(' ', $form->values['um_usrinv_title'], $form->values['um_usrinv_first_name'], $form->values['um_usrinv_last_name']);
        } elseif ($form->values['um_usrinv_type_id'] == 20) { // business
            if (empty($form->values['um_usrinv_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_usrinv_company');
            }
            $name = $form->values['um_usrinv_company'];
        } elseif ($form->values['um_usrinv_type_id'] == 30) { // API
            if (empty($form->values['um_usrinv_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_usrinv_company');
            }
            $name = $form->values['um_usrinv_company'];
        }
        // set name
        if (!$form->hasErrors() && empty($form->values['um_usrinv_name'])) {
            $form->values['um_usrinv_name'] = $name;
        }
        if (empty($form->values['um_usrinv_name'])) {
            $form->error('danger', Messages::REQUIRED_FIELD, 'um_usrinv_name');
        }
        // email or phone
        if (empty($form->values['um_usrinv_email']) && empty($form->values['um_usrinv_phone'])) {
            $form->error('danger', 'You must provide email or phone!', 'um_usrinv_email');
            $form->error('danger', 'You must provide email or phone!', 'um_usrinv_phone');
        }
        // primary organizations
        $form->validateDetailsPrimaryColumn(
            '\Numbers\Users\Users\Model\User\Invite\Organizations',
            'um_usrinorg_primary',
            'um_usrinorg_inactive',
            'um_usrinorg_organization_id'
        );
    }

    public function post(& $form)
    {
        // send email or SMS
        if (!empty($form->values['um_usrinv_login_password_new'])) {
            //\Numbers\Users\Users\Helper\User\Notifications::sendPasswordChangeEmail($form->values['um_usrinv_id']);
        }
    }

    public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value)
    {
        if ($field_name == 'um_usrinrol_role_id') {
            $where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Invite\Organizations'] ?? [], 'um_usrinorg_organization_id', ['unique' => true]);
        }
    }

    public function owners(& $form)
    {
        return [
            'organization_id' => array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Invite\Organizations'] ?? [], 'um_usrinorg_organization_id'),
        ];
    }
}
