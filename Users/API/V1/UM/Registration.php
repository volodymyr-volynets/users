<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\API\V1\UM;

use Helper\Constant\HTTPConstants;
use Numbers\Users\Users\Model\User\Authorize;
use Numbers\Users\Users\Model\UsersAR;
use Numbers\Users\Users\Model\User\OrganizationsAR as UserOrganizationsAR;
use Numbers\Users\Users\Model\User\RolesAR as UserRolesAR;
use Object\Content\Messages;
use Object\Controller\API;
use Object\Validator\Phone;
use Numbers\Users\Users\Helper\User\Notifications;

class Registration extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Registration (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Registration';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => false,
        'permission' => false,
    ];

    public $loc = [
        'NF.Message.RegisteredWithProvider' => 'Registered with {provider}!',
        'NF.Message.RegisteredWithWebsite' => 'Registered with website form!',
        'NF.Message.DuplicateRecord' => Messages::DUPLICATE_RECORD,
    ];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Public');
    }

    /**
     * Register API (Simple)
     */
    public $postSimple_name = 'Register User (Simple)';
    public $postSimple_description = 'Use this API to register new user.';
    public $postSimple_columns = [
        'um_user_name' => ['required' => true, 'name' => 'Name', 'loc' => 'NF.Form.Name', 'domain' => 'name'],
        'um_user_email' => ['required' => true, 'name' => 'Email', 'loc' => 'NF.Form.Email', 'domain' => 'email'],
        'um_user_phone' => ['name' => 'Phone', 'loc' => 'NF.Form.Phone', 'domain' => 'phone', 'null' => true],
        'um_user_send_sms' => ['name' => 'Send SMS', 'loc' => 'NF.Form.SendSMS', 'type' => 'boolean'],
        'um_user_login_password' => ['name' => 'Password', 'loc' => 'NF.Form.Password', 'domain' => 'password', 'null' => true],
        // scoped parameters
        'um_user_type_id' => ['required' => true, 'name' => 'Type', 'loc' => 'NF.Form.Type', 'domain' => 'type_id'],
        'um_role_code' => ['required' => true, 'name' => 'Role Code', 'loc' => 'NF.Form.RoleCode', 'domain' => 'group_code'],
        'on_organization_code' => ['required' => true, 'name' => 'Organization Code', 'loc' => 'NF.Form.OrganizationCode', 'domain' => 'group_code'],
        // other
        '__provider' => ['name' => 'Provider', 'loc' => 'NF.Form.Provider', 'domain' => 'name', 'null' => true],
    ];
    public $postSimple_result_danger = \Validator::RESULT_DANGER;
    public $postSimple_result_success = Authorize::RESULT_SUCCESS;
    public function postSimple(UsersAR $users_ar, UserOrganizationsAR $user_organizations_ar, UserRolesAR $user_roles_ar, \Crypt $crypt)
    {
        $um_user_numeric_phone = null;
        if (!empty($this->values['um_user_phone']) && \Application::get('flag.form.um_users.unique_numeric_phone')) {
            $um_user_numeric_phone = Phone::plainNumber($this->values['um_user_phone']);
            if (!$users_ar->getTableObject()->checkUniqueConstraint('um_user_numeric_phone', $users_ar->getTableObject()->pk, [
                'um_user_id' => null,
                'um_user_numeric_phone' => $um_user_numeric_phone,
            ])) {
                $this->error('NF.Message.DuplicateRecord', $this->loc['NF.Message.DuplicateRecord'], 'um_user_phone');
                return $this->finish(HTTPConstants::Status400BadRequest, [], true);
            }
        }
        // password
        $um_user_login_password = $this->values['um_user_login_password'] ?: $crypt->passwordPolicyGenerate(12);
        // fill values
        $result = $users_ar->fill([
            'um_user_tenant_id' => \Tenant::id(),
            'um_user_type_id' => $this->values['um_user_type_id'],
            'um_user_name' => $this->values['um_user_name'],
            'um_user_email' => $this->values['um_user_email'],
            'um_user_phone' => $this->values['um_user_phone'],
            'um_user_numeric_phone' => $um_user_numeric_phone,
            'um_user_login_enabled' => 1,
            'um_user_login_password' => $crypt->passwordHash($um_user_login_password),
            'um_user_channel' => $this->values['__provider'] ? loc('NF.Message.RegisteredWithProvider', $this->loc['NF.Message.RegisteredWithProvider'], ['provider' => $this->values['__provider'], '__locale' => 'en_CA.UTF-8']) : loc('NF.Message.RegisteredWithWebsite', $this->loc['NF.Message.RegisteredWithWebsite']),
        ])
            ->detail($user_organizations_ar->fill([
                'um_usrorg_tenant_id' => \Tenant::id(),
                'um_usrorg_organization_id' => $user_organizations_ar->loadIDByCode($this->values['on_organization_code']),
                'um_usrorg_primary' => 1,
                'um_usrorg_inactive' => 0
            ]))
            ->detail($user_roles_ar->fill([
                'um_usrrol_tenant_id' => \Tenant::id(),
                'um_usrrol_role_id' => $user_roles_ar->loadIDByCode($this->values['um_role_code']),
                'um_usrrol_inactive' => 0
            ]))
            ->merge();
        if (!$result['success']) {
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        // send registration email
        Notifications::sendRegistrationSimpleEmail($result['new_serials']['um_user_id'], $um_user_login_password);
        // success
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'um_user_id' => $result['new_serials']['um_user_id']
        ]);
    }
}
