<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Registration;

use Numbers\Users\Documents\Base\Helper\Validate;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Object\Validator\Phone;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Tenants\Tenants\Helper\ShortUrls;
use Numbers\Users\Users\Helper\User\Notifications;

class RegisterAdvanced extends Base
{
    public $form_link = 'um_register_advanced';
    public $module_code = 'UM';
    public $title = 'U/M Register Advance Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
        ],
        'skip_acl' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 200, 'type' => 'tabs'],
        'tabs2' => ['default_row_type' => 'grid', 'order' => 300, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'password_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'other_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'photo_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
        'permissions_container' => ['default_row_type' => 'grid', 'order' => 34000],
        'internalization_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Users\Users\Model\User\Internalization',
            'details_pk' => ['um_usri18n_user_id'],
        ],
        'roles_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Roles',
            'details_pk' => ['um_usrrol_role_id'],
            'details_cannot_delete' => false,
            'order' => 35000
        ],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Organizations',
            'details_pk' => ['um_usrorg_organization_id'],
            'details_cannot_delete' => false,
            'order' => 35001
        ]
    ];
    public $rows = [
        'top' => [
            'um_user_id' => ['order' => 100],
            'um_user_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'organizations' => ['order' => 300, 'label_name' => 'Organizations'],
            'roles' => ['order' => 400, 'label_name' => 'Roles'],
            'photo' => ['order' => 500, 'label_name' => 'Photo'],
            'internalization' => ['order' => 600, 'label_name' => 'Internalization'],
            'other' => ['order' => 700, 'label_name' => 'Other'],
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA
        ],
        'tabs2' => [
            'password' => ['order' => 100, 'label_name' => 'Password'],
        ]
    ];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true],
                'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true]
            ],
            'um_user_name' => [
                'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
                'contact' => ['container' => 'contact_container', 'order' => 200]
            ],
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'roles' => [
                'roles' => ['container' => 'roles_container', 'order' => 100],
            ],
            'photo' => [
                'photo' => ['container' => 'photo_container', 'order' => 100],
            ],
            'internalization' => [
                'internalization' => ['container' => 'internalization_container', 'order' => 100],
            ],
            'other' => [
                'other' => ['container' => 'other_container', 'order' => 100],
            ]
        ],
        'tabs2' => [
            'password' => [
                'password' => ['container' => 'password_container', 'order' => 100],
            ]
        ],
        'general_container' => [
            'um_user_type_id' => [
                'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                '\Numbers\Users\Users\Model\User\Group\Map' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'um_usrgrmap_group_id', 'percent' => 75, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Users\Model\User\Groups::optionsActive'],
                'um_user_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5, 'readonly' => true],
            ],
            self::HIDDEN => [
                //'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                'um_user_numeric_phone' => ['label_name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
            ],
            'um_user_title' => [
                'um_user_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
                'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
            ],
            'um_user_company' => [
                'um_user_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
            ],
            'separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'fa-regular fa-envelope', 'percent' => 100],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'um_user_phone' => [
                'um_user_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'um_user_cell' => [
                'um_user_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ]
        ],
        'internalization_container' => [
            'um_usri18n_group_id' => [
                'um_usri18n_group_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Group', 'domain' => 'group_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Groups::optionsActive'],
            ],
            'um_usri18n_language_code' => [
                'um_usri18n_language_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive'],
                'um_usri18n_locale_code' => ['order' => 2, 'label_name' => 'Locale', 'domain' => 'locale_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Locales::optionsActive'],
            ],
            'um_usri18n_timezone_code' => [
                'um_usri18n_timezone_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Timezone', 'domain' => 'timezone_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Timezones::optionsActive'],
                'um_usri18n_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
            ],
            'format' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 500, 'label_name' => 'Format', 'icon' => 'fa-regular fa-hourglass', 'percent' => 100],
            ],
            'um_usri18n_format_date' => [
                'um_usri18n_format_date' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Date Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
                'um_usri18n_format_time' => ['order' => 2, 'label_name' => 'Time Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
                'um_usri18n_format_datetime' => ['order' => 3, 'label_name' => 'Datetime Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
                'um_usri18n_format_timestamp' => ['order' => 4, 'label_name' => 'Timestamp Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s.u', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds']
            ],
            'um_usri18n_format_amount_frm' => [
                'um_usri18n_format_amount_frm' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Amounts In Forms', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts'],
                'um_usri18n_format_amount_fs' => ['order' => 2, 'label_name' => 'Amounts In Financial Statement', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts']
            ],
            'print' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Print', 'icon' => 'fa-solid fa-print', 'percent' => 100],
            ],
            'um_usri18n_print_format' => [
                'um_usri18n_print_format' => ['order' => 1, 'row_order' => 900, 'label_name' => 'Print Format', 'domain' => 'code', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Formats::options'],
                'um_usri18n_print_font' => ['order' => 2, 'label_name' => 'Print Font', 'domain' => 'code', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Fonts::options'],
            ]
        ],
        'roles_container' => [
            'row1' => [
                'um_usrrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'persistent' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'options_params' => ['um_role_super_admin' => 0], 'onchange' => 'this.form.submit();'],
                'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5, 'persistent' => true]
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_usrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'persistent' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15, 'persistent' => true],
                'um_usrorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5, 'persistent' => true]
            ]
        ],
        'photo_container' => [
            '__logo_upload' => [
                '__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Photo', 'type' => 'mixed', 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '250x250', 'thumbnail_size' => '50x50'], 'description' => 'Extensions: ' . Validate::IMAGE_EXTENSIONS . '. Size: 250x250.'],
            ],
            '__logo_preview' => [
                '__logo_preview' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Preview Photo', 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'um_user_photo_file_id'],
            ],
            self::HIDDEN => [
                'um_user_photo_file_id' => ['name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'other_container' => [
            'um_user_channel' => [
                'um_user_channel' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Channel', 'domain' => 'name', 'null' => true, 'percent' => 100],
            ],
            'um_user_send_emails' => [
                'um_user_send_emails' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Send Emails', 'type' => 'boolean', 'default' => 1, 'percent' => 25, 'readonly' => true],
                'um_user_send_sms' => ['order' => 2, 'label_name' => 'Send SMS', 'type' => 'boolean', 'percent' => 25, 'readonly' => true],
                'um_user_send_postal' => ['order' => 3, 'label_name' => 'Send Postal Mail', 'type' => 'boolean', 'percent' => 25, 'readonly' => true],
            ],
        ],
        'password_container' => [
            'um_user_login_username' => [
                'um_user_login_username' => ['order' => 1, 'row_order' => 50, 'label_name' => 'Username', 'domain' => 'login', 'null' => true, 'percent' => 50]
            ],
            'password' => [
                'password' => ['order' => 1, 'row_order' => 100, 'label_name' => 'New Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true],
            ],
            'password2' => [
                'password2' => ['order' => 1, 'row_order' => 200, 'label_name' => 'New Password (Repeat)', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true],
            ],
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA
            ]
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'model' => '\Numbers\Users\Users\Model\Users',
        'details' => [
            '\Numbers\Users\Users\Model\User\Group\Map' => [
                'name' => 'UM User Groups',
                'pk' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrgrmap_tenant_id', 'um_user_id' => 'um_usrgrmap_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Roles' => [
                'name' => 'UM User Roles',
                'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Organizations' => [
                'name' => 'UM User Organizations',
                'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Internalization' => [
                'name' => 'UM User Internalization',
                'pk' => ['um_usri18n_tenant_id', 'um_usri18n_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usri18n_tenant_id', 'um_user_id' => 'um_usri18n_user_id']
            ]
        ]
    ];
    public $loc = [
        'NF.Message.SuccessfullyRegistered' => 'You have successfully registered, please check your email/sms for email validation!',
        'NF.Form.RegistrationInSystem' => 'You registered to join the system.',
        'NF.Form.TokenVerified' => 'Token verified.',
    ];
    private $password = '';

    public function refresh(& $form)
    {
        $form->values['um_user_hold'] = \Application::get('registration.UM.Users.hold') ? 1 : 0;
        if (empty($form->values['um_user_channel'])) {
            $form->values['um_user_channel'] = \Application::get('registration.UM.Users.channel');
        }
        $organizations = \Application::get('scope.UM.Register.on_organization_code');
        if (empty($form->values['\Numbers\Users\Users\Model\User\Organizations']) && !empty($organizations)) {
            $form->presetDetailsFromCodes(
                '\Numbers\Users\Users\Model\User\Organizations',
                'um_usrorg_organization_id',
                'um_usrorg_primary',
                'um_usrorg_inactive',
                '\Numbers\Users\Users\Model\User\OrganizationsAR',
                explode(',', $organizations)
            );
        }
        $roles = \Application::get('scope.UM.Register.um_role_code');
        if (empty($form->values['\Numbers\Users\Users\Model\User\Roles']) && $roles) {
            $form->presetDetailsFromCodes(
                '\Numbers\Users\Users\Model\User\Roles',
                'um_usrrol_role_id',
                null,
                'um_usrrol_inactive',
                '\Numbers\Users\Users\Model\User\RolesAR',
                explode(',', $roles)
            );
        }
    }

    public function validate(& $form)
    {
        // personal type
        if ($form->values['um_user_type_id'] == 10) {
            if (empty($form->values['um_user_first_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_user_first_name');
            }
            if (empty($form->values['um_user_last_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_user_last_name');
            }
            $name = concat_ws(' ', $form->values['um_user_title'], $form->values['um_user_first_name'], $form->values['um_user_last_name']);
        } elseif ($form->values['um_user_type_id'] == 20) { // business
            if (empty($form->values['um_user_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_user_company');
            }
            $name = $form->values['um_user_company'];
        } elseif ($form->values['um_user_type_id'] == 30) { // API
            if (empty($form->values['um_user_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'um_user_company');
            }
            $name = $form->values['um_user_company'];
        }
        // set name
        if (!$form->hasErrors() && empty($form->values['um_user_name'])) {
            $form->values['um_user_name'] = $name;
        }
        // photo
        if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
            $form->values['__logo_upload']['__image_properties'] = $form->fields['__logo_upload']['options']['validator_params'] ?? [];
            $model = new \Numbers\Users\Documents\Base\Base();
            // remove file if exists
            if (!empty($form->values['um_user_photo_file_id'])) {
                $result = $model->delete($form->values['um_user_photo_file_id']);
                if (!$result['success']) {
                    $form->error(DANGER, $result['error']);
                    return;
                }
                $form->values['um_user_photo_file_id'] = null;
            }
            // add file
            $primary_organization_id = current(array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'], 'um_usrorg_organization_id', ['where' => ['um_usrorg_primary' => 1]]));
            $catalog = $model->fetchPrimaryCatalog($primary_organization_id);
            if (empty($catalog)) {
                $form->error(DANGER, 'You must set primary catalog!');
                return;
            }
            $result = $model->upload($form->values['__logo_upload'], $catalog);
            if (!$result['success']) {
                $form->error(DANGER, $result['error']);
                return;
            }
            $form->values['um_user_photo_file_id'] = $result['file_id'];
        }
        // numeric phone
        if (!empty($form->values['um_user_phone'])) {
            $form->values['um_user_numeric_phone'] = Phone::plainNumber($form->values['um_user_phone']);
        } else {
            $form->values['um_user_numeric_phone'] = null;
        }
        // primary organizations
        $primary_organization_id = $form->validateDetailsPrimaryColumn(
            '\Numbers\Users\Users\Model\User\Organizations',
            'um_usrorg_primary',
            'um_usrorg_inactive',
            'um_usrorg_organization_id'
        );
        // login enabled
        if (empty($form->values['um_user_email']) && empty($form->values['um_user_numeric_phone']) && empty($form->values['um_user_login_username'])) {
            $form->error('danger', 'You must provide Email or Phone or Username!', 'um_user_email');
            $form->error('danger', 'You must provide Email or Phone or Username!', 'um_user_phone');
            $form->error('danger', 'You must provide Email or Phone or Username!', 'um_user_login_username');
        }
        $form->values['um_user_login_enabled'] = 1;
        if (!empty($form->values['um_user_email'])) {
            $form->values['um_user_send_emails'] = 1;
        }
        if (!empty($form->values['um_user_numeric_phone'])) {
            $form->values['um_user_send_sms'] = 1;
        }
        if (!empty($form->values['\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses'])) {
            $form->values['um_user_send_postal'] = 1;
        }
        // password
        if (!$form->hasErrors()) {
            $crypt = new \Crypt();
            $form->values['um_user_login_password'] = $crypt->passwordHash($form->values['password']);
            $this->password = $form->values['password'];
        }
        // hold
        if (\Application::get('registration.UM.Users.hold')) {
            $form->values['um_user_hold'] = 1;
        }
        // generate new sequence
        if (empty($form->values['um_user_code'])) {
            $form->values['um_user_code'] = Sequence::nextval('DEFAULT', 'USR', 'UM', \Tenant::id(), true);
        }
    }

    public function finish(& $form)
    {
        // send email
        if (!empty($form->values['um_user_email'])) {
            $crypt = new \Crypt();
            $url = \Request::host() . 'Numbers/Users/Users/Controller/Verify/Public2/_Index?token=' . $crypt->tokenCreate($form->values['um_user_id'], 'user.registration.email.token');
            $success_url = ShortUrls::createShortUrl('User Registered (Email)', $url)['short_url_with_host'];
            Notifications::sendRegistrationSimpleEmail($form->values['um_user_id'], $this->password, $success_url);
        }
        // send SMS
        if (!empty($form->values['um_user_numeric_phone'])) {
            $crypt = new \Crypt();
            $url = \Request::host() . 'Numbers/Users/Users/Controller/Verify/Public2/_Index?token=' . $crypt->tokenCreate($form->values['um_user_id'], 'user.registration.sms.token');
            $success_url = ShortUrls::createShortUrl('User Registered (SMS)', $url)['short_url_with_host'];
            $message = loc('NF.Message.SuccessfullyRegisteredSMSValidatePhone', 'You have successfully registered, please click on {url} to validate you phone number!', ['url' => $success_url]);
            Notifications::sendRegistrationToSMS($form->values['um_user_numeric_phone'], $message, $success_url);
        }
        // redirect to dashboard
        $url = \Request::buildFromName('U/M Sign In', 'Index');
        $form->redirect($url . '?__message=' . loc('NF.Message.SuccessfullyRegistered', 'You have successfully registered, please check your email/sms for email validation!'));
    }
}
