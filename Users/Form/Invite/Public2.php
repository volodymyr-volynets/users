<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Invite;

use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Object\Validator\Phone;
use Numbers\Users\Users\Helper\User\Notifications;
use Numbers\Users\Users\Form\Users;

class Public2 extends Base
{
    public $form_link = 'um_usrinv_invite_public2';
    public $module_code = 'UM';
    public $title = 'U/M User Invite Public Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
        ],
        'no_ajax_form_reload' => true,
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
            'details_new_rows' => 0,
            'details_key' => '\Numbers\Users\Users\Model\User\Invite\Roles',
            'details_pk' => ['um_usrinrol_role_id'],
            'required' => true,
            'order' => 35000,
            'details_cannot_delete' => true,
        ],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 0,
            'details_key' => '\Numbers\Users\Users\Model\User\Invite\Organizations',
            'details_pk' => ['um_usrinorg_organization_id'],
            'required' => true,
            'order' => 35001,
            'details_cannot_delete' => true,
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
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => ['order' => 300] + \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA,
            'password' => ['order' => 400, 'label_name' => 'Password'],
            'other' => ['order' => 500, 'label_name' => 'Other']
        ]
    ];
    public $elements = [
        'top' => [
            'um_usrinv_id' => [
                'um_usrinv_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Invite #', 'domain' => 'invite_id_sequence', 'percent' => 50, 'required' => true, 'readonly' => true],
                'um_usrinv_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'readonly' => true]
            ],
            'um_usrinv_name' => [
                'um_usrinv_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c', 'autocomplete' => 'off'],
            ],
            self::HIDDEN => [
                'token' => ['label_name' => 'Token', 'method' => 'hidden', 'preserved' => true]
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
            'password' => [
                'password' => ['container' => 'password_container', 'order' => 100],
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
                'um_usrinv_phone' => ['order' => 2, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false, 'description' => 'Must start with country code like +1'],
            ],
        ],
        'roles_container' => [
            'row1' => [
                'um_usrinrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'readonly' => true],
                'um_usrinrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5, 'readonly' => true]
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_usrinorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'readonly' => true],
                'um_usrinorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15, 'readonly' => true],
                'um_usrinorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5, 'readonly' => true]
            ]
        ],
        'password_container' => [
            'row1' => [
                'new_password1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Password', 'domain' => 'password', 'required' => true, 'percent' => 50, 'method' => 'password']
            ],
            'row2' => [
                'new_password2' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Password (Confirm)', 'domain' => 'password', 'required' => true, 'percent' => 50, 'method' => 'password']
            ]
        ],
        'other_container' => [
            'um_usrinv_require_address' => [
                'um_usrinv_require_address' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Require Address', 'type' => 'boolean', 'null' => true, 'percent' => 25, 'readonly' => true],
            ],
            'um_usrinv_require_assignment' => [
                'um_usrinv_require_assignment' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Require Assignment', 'type' => 'boolean', 'null' => true, 'required' => 'c', 'percent' => 25, 'readonly' => true],
                'um_usrinv_assignusrtype_code' => ['order' => 2, 'label_name' => 'Assignment Type', 'domain' => 'type_code', 'null' => true, 'required' => 'c', 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types::optionsActive', 'readonly' => true],
                'um_usrinv_referral_user_id' => ['order' => 3, 'label_name' => 'Assignment User', 'domain' => 'user_id', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'readonly' => true],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'UM User Invites',
        'model' => '\Numbers\Users\Users\Model\User\Invites',
        'skip_transaction' => true,
        'details' => [
            '\Numbers\Users\Users\Model\User\Invite\Roles' => [
                'readonly' => true,
                'name' => 'UM User Invite Roles',
                'pk' => ['um_usrinrol_tenant_id', 'um_usrinrol_usrinv_id', 'um_usrinrol_role_id'],
                'type' => '1M',
                'map' => ['um_usrinv_tenant_id' => 'um_usrinrol_tenant_id', 'um_usrinv_id' => 'um_usrinrol_usrinv_id'],
            ],
            '\Numbers\Users\Users\Model\User\Invite\Organizations' => [
                'readonly' => true,
                'name' => 'UM User Invite Organizations',
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
        // password
        if ($form->values['new_password1'] != $form->values['new_password2']) {
            $form->error('danger', 'Confirm password and password must match!', 'new_password2');
        }
        // primary address
        if (!empty($form->values['\Numbers\Users\Users\Model\User\Invites\0Virtual0\Widgets\Addresses'])) {
            // primary address
            $primary_first_key = null;
            $primary_address_type = $form->validateDetailsPrimaryColumn(
                '\Numbers\Users\Users\Model\User\Invites\0Virtual0\Widgets\Addresses',
                'wg_address_primary',
                'wg_address_inactive',
                'wg_address_type_code',
                $primary_first_key
            );
        }
    }

    public function post(& $form)
    {
        // create user
        $numeric_phone = null;
        if (!empty($form->values['um_usrinv_phone'])) {
            $numeric_phone = Phone::plainNumber($form->values['um_usrinv_phone']);
        }
        $crypt = new \Crypt();
        // prepare data
        $data = [
            'um_user_code' => $form->values['um_usrinv_code'],
            'um_user_type_id' => $form->values['um_usrinv_type_id'],
            'um_user_name' => $form->values['um_usrinv_name'],
            'um_user_company' => $form->values['um_usrinv_company'],
            // personal information
            'um_user_title' => $form->values['um_usrinv_title'],
            'um_user_first_name' => $form->values['um_usrinv_first_name'],
            'um_user_last_name' => $form->values['um_usrinv_last_name'],
            // contact
            'um_user_email' => $form->values['um_usrinv_email'],
            'um_user_phone' => $form->values['um_usrinv_phone'],
            'um_user_numeric_phone' => $numeric_phone,
            // login
            'um_user_login_enabled' => 1,
            'um_user_login_username' => null,
            //'um_user_login_password_new' => $crypt->passwordHash($form->values['new_password1']),
            'um_user_login_last_set' => \Format::now('date'),
            // inactive & hold
            'um_user_hold' => 0,
            'um_user_inactive' => 0,
        ];
        // add roles
        $data['\Numbers\Users\Users\Model\User\Roles'] = [];
        foreach ($form->values['\Numbers\Users\Users\Model\User\Invite\Roles'] as $v) {
            $data['\Numbers\Users\Users\Model\User\Roles'][] = [
                'um_usrrol_role_id' => $v['um_usrinrol_role_id'],
                'um_usrrol_inactive' => $v['um_usrinrol_inactive'],
            ];
        }
        // add organizations
        $data['\Numbers\Users\Users\Model\User\Organizations'] = [];
        foreach ($form->values['\Numbers\Users\Users\Model\User\Invite\Organizations'] as $v) {
            $data['\Numbers\Users\Users\Model\User\Organizations'][] = [
                'um_usrorg_organization_id' => $v['um_usrinorg_organization_id'],
                'um_usrorg_primary' => $v['um_usrinorg_primary'],
                'um_usrorg_inactive' => $v['um_usrinorg_inactive'],
            ];
        }
        // copy addresses
        $data['\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses'] = [];
        foreach ($form->values['\Numbers\Users\Users\Model\User\Invites\0Virtual0\Widgets\Addresses'] as $v) {
            $data['\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses'][] = $v;
        }
        // finaly save
        $model = Users::API();
        $result = $model->save($data);
        if (!$result['success']) {
            $form->error('danger', $result['error']);
        } else {
            // sep password
            $um_user_id = $result['new_serials']['um_user_id'];
            $result = \Numbers\Users\Users\Model\Users::collectionStatic()->merge(
                [
                    'um_user_id' => $um_user_id,
                    'um_user_login_enabled' => 1,
                    'um_user_login_password' => $crypt->passwordHash($form->values['new_password1']),
                    'um_user_login_last_set' => \Format::now('date')
                ],
                [
                    'skip_optimistic_lock' => true
                ]
            );
            if (!$result['success']) {
                $form->error('danger', $result['error']);
                return;
            }
            // send notification
            Notifications::sendRegistrationSimpleEmail($um_user_id, $form->values['new_password1']);
            // redirect
            $url = \Application::get('flag.global.default_login_page');
            $form_action_params = [];
            $form_action_params['__message'] = 'Successfully created user account, please login with provided information.';
            \Request::redirect($url . '?' . http_build_query2($form_action_params));
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
