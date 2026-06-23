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
use Object\Controller\API;
use Numbers\Users\Users\DataSource\Login;
use Numbers\Users\Users\Helper\User\Notifications;
use Numbers\Users\Users\Model\RolesAR;
use Numbers\Users\Users\Model\User\AssignmentsAR;
use Numbers\Users\Users\Model\User\InvitesAR;
use Numbers\Users\Users\Model\User\Invite\RolesAR as InviteRolesAR;
use Numbers\Users\Users\Model\User\Invite\OrganizationsAR as InviteOrganizationsAR;
use Object\Validator\Phone;
use Numbers\Tenants\Tenants\Helper\ShortUrls;
use Numbers\Users\Users\Helper\Assignments;

class Invite extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Invite (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Invite';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => false,
        'permission' => false,
    ];

    public $loc = [
        'NF.Message.YouCannotInviteYourself' => 'You cannot invite yourself!',
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
    public $postSimple_name = 'Invite User (Simple)';
    public $postSimple_description = 'Use this API to invite new user.';
    public $postSimple_columns = [
        'username' => ['required' => true, 'domain' => 'username', 'name' => 'Username', 'loc' => 'NF.Form.Username'],
        'name' => ['required' => true, 'domain' => 'name',  'name' => 'Name', 'loc' => 'NF.Form.Name'],
        'message' => ['required' => true, 'domain' => 'message', 'name' => 'Message', 'loc' => 'NF.Form.Message'],
        'occasion' => ['required' => true, 'domain' => 'message', 'name' => 'Occasion', 'loc' => 'NF.Form.Occasion'],
        'success_url' => ['required' => true, 'domain' => 'url', 'name' => 'Success URL', 'loc' => 'NF.Form.SuccessURL'],
        // scoped parameters
        'um_user_type_id' => ['required' => true, 'name' => 'Type', 'loc' => 'NF.Form.Type', 'domain' => 'type_id'],
        'um_role_code' => ['required' => true, 'name' => 'Role Code', 'loc' => 'NF.Form.RoleCode', 'domain' => 'group_code'],
        'on_organization_code' => ['required' => true, 'name' => 'Organization Code', 'loc' => 'NF.Form.OrganizationCode', 'domain' => 'group_code'],
        // assignment
        'um_user_referral_user_id' => ['required' => true, 'name' => 'Referral User #', 'domain' => 'user_id'],
        'um_assignusrtype_code' => ['required' => true, 'name' => 'Assignment Type', 'domain' => 'type_code'],
        // other
        'um_usrinv_reference_table' => ['required' => false, 'name' => 'Reference Table', 'domain' => 'table', 'null' => true],
        'um_usrinv_reference_id' => ['required' => false, 'name' => 'Reference #', 'domain' => 'big_id', 'null' => true],
    ];
    public $postSimple_result_danger = \Validator::RESULT_DANGER;
    public $postSimple_result_success = Authorize::RESULT_SUCCESS;
    public function postSimple(AssignmentsAR $assignments_ar, RolesAR $roles_ar, InvitesAR $invites_ar, InviteRolesAR $invite_roles_ar, InviteOrganizationsAR $invite_organization_ar)
    {
        $datasource = new Login();
        $user = $datasource->get(['where' => ['username' => $this->values['username']]]);
        $um_usrinv_created_user_id = null;
        if (!empty($user)) {
            // check if you invite yourself
            if ($this->values['um_user_referral_user_id'] == $user['id']) {
                return $this->finish(HTTPConstants::Status400BadRequest, [
                    'success' => false,
                    'error' => [loc('NF.Message.YouCannotInviteYourself', 'You cannot invite yourself!')]
                ]);
            }
            // save user to invites table
            $um_usrinv_created_user_id = $user['id'];
        }
        $short_url = ShortUrls::createShortUrl('Invite User (Simple)', $this->values['success_url'])['short_url_with_host'] ?? $this->values['success_url'];
        $result = $invites_ar->fill([
            'um_usrinv_name' => $this->values['name'],
            'um_usrinv_email' => strpos($this->values['username'], '@') !== false ? $this->values['username'] : null,
            'um_usrinv_phone' => str_starts_with($this->values['username'], '+') ? $this->values['username'] : null,
            'um_usrinv_username' => strpos($this->values['username'], '@') === false && !str_starts_with($this->values['username'], '+') ? $this->values['username'] : null,
            'um_usrinv_type_id' => $this->values['um_user_type_id'],
            'um_usrinv_referral_user_id' => $this->values['um_user_referral_user_id'],
            'um_usrinv_assignusrtype_code' => $this->values['um_assignusrtype_code'],
            'um_usrinv_require_assignment' => true,
            'um_usrinv_invite_message' => $this->values['message'],
            'um_usrinv_other_json_params' => [
                'success_url' => $short_url,
                'occasion' => $this->values['occasion'],
            ],
            'um_usrinv_reference_table' => $this->values['um_usrinv_reference_table'] ?? null,
            'um_usrinv_reference_id' => $this->values['um_usrinv_reference_id'] ?? null,
            'um_usrinv_created_user_id' => $um_usrinv_created_user_id,
        ])
            ->detail($invite_roles_ar->fill([
                'um_usrinrol_tenant_id' => \Tenant::id(),
                'um_usrinrol_role_id' => current($invite_roles_ar->loadIDByCode($this->values['um_role_code'])),
                'um_usrinrol_inactive' => 0
            ]))
            ->detail($invite_organization_ar->fill([
                'um_usrinorg_tenant_id' => \Tenant::id(),
                'um_usrinorg_organization_id' => current($invite_organization_ar->loadIDByCode($this->values['on_organization_code'])),
                'um_usrinorg_primary' => 1,
                'um_usrinorg_inactive' => 0
            ]))
            ->merge();
        if (!$result['success']) {
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        // create assignments
        if ($um_usrinv_created_user_id) {
            $assignment_result = Assignments::linkUsers(
                $this->values['um_assignusrtype_code'],
                $this->values['um_role_code'],
                $this->values['um_user_referral_user_id'],
                $um_usrinv_created_user_id
            );
            if (!$assignment_result['success']) {
                return $this->finish(HTTPConstants::Status500InternalServerError, $assignment_result);
            }
            // send email notification
            if (!empty($user['email'])) {
                Notifications::sendInviteSimpleEmail(
                    $user['id'],
                    $this->values['message'],
                    $this->values['occasion'],
                    $short_url,
                );
            }
            // send SMS
            if (!empty($user['numeric_phone']) && $user['send_sms']) {
                Notifications::sendInviteSimpleSMS(
                    $user['id'],
                    $this->values['message'],
                    $this->values['occasion'],
                    $short_url,
                );
            }
        } else {
            // send email
            if (strpos($this->values['username'], '@') !== false) {
                Notifications::sendInviteToEmail($this->values['username'], $this->values['message'], $this->values['occasion'], $short_url);
            }
            // send SMS
            if (str_starts_with($this->values['username'], '+')) {
                $phone = Phone::plainNumber($this->values['username']);
                Notifications::sendInviteToSMS($phone, $this->values['message'], $this->values['occasion'], $short_url);
            }
        }
        // success
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => []
        ]);
    }
}
