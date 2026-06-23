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

class RegisterSimple extends Base
{
    public $form_link = 'um_register_simple';
    public $module_code = 'UM';
    public $title = 'U/M Register Simple Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
        ],
        'skip_acl' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 200],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_user_title' => [
                'um_user_title' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => true],
                'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => true],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => 'c'],
                'um_user_phone' => ['order' => 2, 'label_name' => 'Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => 'c'],
            ],
            'password' => [
                'password' => ['order' => 1, 'row_order' => 300, 'label_name' => 'New Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true],
                'password2' => ['order' => 2, 'label_name' => 'New Password (Repeat)', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true],
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
        ]
    ];
    public $loc = [
        'NF.Message.SuccessfullyRegisteredSMSValidatePhone' => 'You have successfully registered, please click on {url} to validate you phone number!',
    ];
    private $password = '';

    public function validate(& $form)
    {
        $scope = \Application::get('registration.UM.UserSimple.scope') ?? 'UM.Register';
        $form->values['um_user_hold'] = \Application::get('registration.UM.UserSimple.hold') ? 1 : 0;
        $form->values['um_user_type_id'] = 10;
        $form->values['um_user_name'] = concat_ws(' ', $form->values['um_user_title'], $form->values['um_user_first_name'], $form->values['um_user_last_name']);
        $form->values['um_user_channel'] = \Application::get('registration.UM.UserSimple.channel');
        // numeric phone
        if (!empty($form->values['um_user_phone'])) {
            $form->values['um_user_numeric_phone'] = Phone::plainNumber($form->values['um_user_phone']);
        } else {
            $form->values['um_user_numeric_phone'] = null;
        }
        // login enabled
        if (empty($form->values['um_user_email']) && empty($form->values['um_user_numeric_phone'])) {
            $form->error('danger', 'You must provide Email or Phone!', 'um_user_email');
            $form->error('danger', 'You must provide Email or Phone!', 'um_user_phone');
        }
        $form->values['um_user_login_enabled'] = 1;
        if (!empty($form->values['um_user_email'])) {
            $form->values['um_user_send_emails'] = 1;
        }
        if (!empty($form->values['um_user_numeric_phone'])) {
            $form->values['um_user_send_sms'] = 1;
        }
        // password
        if (!$form->hasErrors()) {
            $crypt = new \Crypt();
            $form->values['um_user_login_password'] = $crypt->passwordHash($form->values['password']);
            $this->password = $form->values['password'];
        }
        // organizations
        $organizations = \Application::get('scope.' . $scope . '.on_organization_code');
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
        // roles
        $roles = \Application::get('scope.' . $scope . '.um_role_code');
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
        // hold
        if (\Application::get('registration.UM.UserSimple.hold')) {
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
