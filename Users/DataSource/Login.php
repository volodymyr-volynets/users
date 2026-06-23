<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource;

use Numbers\Users\Organizations\Model\Organizations;
use Numbers\Users\Users\Model\Roles;
use Numbers\Users\Users\Model\Team\Map;
use Numbers\Users\Users\Model\Teams;
use Numbers\Users\Users\Model\User\API\Methods;
use Numbers\Users\Users\Model\User\APIs;
use Numbers\Users\Users\Model\User\Features;
use Numbers\Users\Users\Model\User\Flags;
use Numbers\Users\Users\Model\User\Internalization;
use Numbers\Users\Users\Model\User\Preferences;
use Numbers\Users\Users\Model\User\Linked\Accounts;
use Numbers\Users\Users\Model\User\Notifications;
use Numbers\Users\Users\Model\User\Permission\Actions;
use Numbers\Users\Users\Model\User\Permission\Subresources;
use Numbers\Users\Users\Model\User\Permissions;
use Numbers\Users\Users\Model\Users;
use Object\DataSource;
use Object\Validator\Phone;
use Numbers\Users\Users\Model\User\Policy\Groups;
use Numbers\Users\Users\Model\User\Policy\Policies;
use Numbers\Users\Users\Model\User\Groups as UserGroups;
use Numbers\Users\Users\Model\User\Group\Map as UserGroupMap;
use Numbers\Users\Users\Model\Domains;
use Numbers\Users\Users\Model\Realms;
use Numbers\Users\Users\Model\Settings;

class Login extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row = true;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model;
    public $parameters = [
        'username' => ['name' => 'Username', 'type' => 'text'],
        'user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'user_ids' => ['name' => 'User(s) #', 'domain' => 'user_id', 'multiple_column' => true],
        'skip_login_enabled' => ['name' => 'Skip Login Enalbed', 'type' => 'boolean'],
    ];

    public function query($parameters, $options = [])
    {
        // create a query object
        $this->query = Users::queryBuilderStatic([
            'alias' => 'a',
            'skip_acl' => true
        ])->select();
        // columns
        $this->query->columns([
            'id' => 'a.um_user_id',
            'code' => 'a.um_user_code',
            'type' => 'a.um_user_type_id',
            'name' => 'a.um_user_name',
            'company' => 'a.um_user_company',
            // contact
            'email' => 'a.um_user_email',
            'email2' => 'a.um_user_email2',
            'phone' => 'a.um_user_phone',
            'phone2' => 'a.um_user_phone2',
            'cell' => 'a.um_user_cell',
            'fax' => 'a.um_user_fax',
            // sms
            'send_sms' => 'a.um_user_send_sms',
            'numeric_phone' => 'a.um_user_numeric_phone',
            // login
            'login_username' => 'a.um_user_login_username',
            'login_password' => 'a.um_user_login_password',
            'login_last_set' => 'COALESCE(a.um_user_login_last_set, a.um_user_inserted_timestamp)',
            // inactive & hold
            'hold' => 'a.um_user_hold',
            'inactive' => 'a.um_user_inactive',
            // roles
            'roles' => 'b.roles',
            'role_ids' => 'b.role_ids',
            'role_names' => 'b.role_names',
            'permissions' => 'f.permissions',
            'organizations' => 'c.organizations',
            'organization_countries' => 'c.organization_countries',
            'super_admin' => 'b.super_admin',
            'maximum_role_weight' => 'b.maximum_role_weight',
            'linked_accounts' => 'g.linked_accounts',
            // teams
            'teams' => 'h.teams',
            'team_codes' => 'h.team_codes',
            'team_names' => 'h.team_names',
            'maximum_team_weight' => 'h.maximum_team_weight',
            // realms
            'realms' => 'r.realms',
            'realm_codes' => 'r.realm_codes',
            'realm_names' => 'r.realm_names',
            'maximum_realm_weight' => 'r.maximum_realm_weight',
            // domains
            'domains' => 'd2.domains',
            'domain_codes' => 'd2.domain_codes',
            'domain_names' => 'd2.domain_names',
            'maximum_domain_weight' => 'd2.maximum_domain_weight',
            // groups
            'group_ids' => 'g0.group_ids',
            'group_codes' => 'g0.group_codes',
            'group_names' => 'g0.group_names',
            // max cumulative weight
            'max_cumulative_weight' => 'GREATEST(b.maximum_role_weight, h.maximum_team_weight, r.maximum_realm_weight, d2.maximum_domain_weight)',
            // feature
            'features' => 'j.features',
            'notifications' => 'm.notifications',
            'subresources' => 'k.subresources',
            'flags' => 'l.flags',
            'apis' => 'n.apis',
            // policies and policy groups
            'policies' => 'o.policies',
            'policy_groups' => 'p.policy_groups',
            // internalization
            'i18n_group_id' => 'd.um_usri18n_group_id',
            'i18n_language_code' => 'd.um_usri18n_language_code',
            'i18n_locale_code' => 'd.um_usri18n_locale_code',
            'i18n_timezone_code' => 'd.um_usri18n_timezone_code',
            'i18n_organization_id' => 'd.um_usri18n_organization_id',
            'i18n_format_date' => 'd.um_usri18n_format_date',
            'i18n_format_time' => 'd.um_usri18n_format_time',
            'i18n_format_datetime' => 'd.um_usri18n_format_datetime',
            'i18n_format_timestamp' => 'd.um_usri18n_format_timestamp',
            'i18n_format_amount_frm' => 'd.um_usri18n_format_amount_frm',
            'i18n_format_amount_fs' => 'd.um_usri18n_format_amount_fs',
            'i18n_format_uom' => 'd.um_usri18n_format_uom',
            'i18n_print_format' => 'd.um_usri18n_print_format',
            'i18n_print_font' => 'd.um_usri18n_print_font',
            // preferences
            'preference_dynamic_menu' => 'x.um_usrpreference_dynamic_menu',
            // primary organization
            'organization_id' => 'e.um_usrorg_organization_id',
            'photo_file_id' => 'a.um_user_photo_file_id',
            'operating_country_code' => 'a.um_user_operating_country_code',
            'operating_province_code' => 'a.um_user_operating_province_code',
            // MFA from U/M Settings and U/M Users
            'um_setting_um_mfasettyp_code' => 'um_settings.um_setting_um_mfasettyp_code',
            'um_setting_um_mfatype_code' => 'um_settings.um_setting_um_mfatype_code',
            'um_user_um_mfasettyp_code' => 'a.um_user_um_mfasettyp_code',
            'um_user_um_mfatype_code' => 'a.um_user_um_mfatype_code',
            'um_user_totp_encrypted' => 'a.um_user_totp_encrypted',
        ]);
        // joins
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrrol_user_id',
                'roles' => $query->db_object->sqlHelper('string_agg', ['expression' => "inner_b.um_role_code", 'delimiter' => ';;']),
                'role_ids' => $query->db_object->sqlHelper('string_agg', ['expression' => $query->db_object->cast('inner_b.um_role_id', 'varchar'), 'delimiter' => ';;']),
                'role_names' => $query->db_object->sqlHelper('string_agg', ['expression' => "inner_b.um_role_name", 'delimiter' => ';;']),
                'super_admin' => 'SUM(inner_b.um_role_super_admin)',
                'maximum_role_weight' => 'MAX(inner_b.um_role_weight)'
            ]);
            // join
            $query->join('INNER', new Roles(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrrol_role_id', '=', 'inner_b.um_role_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrrol_user_id']);
            $query->where('AND', ['inner_a.um_usrrol_inactive', '=', 0]);
            $query->where('AND', ['inner_b.um_role_inactive', '=', 0]);
        }, 'b', 'ON', [
            ['AND', ['a.um_user_id', '=', 'b.um_usrrol_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrorg_user_id',
                'organizations' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrorg_organization_id)", 'delimiter' => ';;']),
                'organization_countries' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_b.on_organization_operating_country_code)", 'delimiter' => ';;'])
            ]);
            // join
            $query->join('INNER', new Organizations(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrorg_organization_id', '=', 'inner_b.on_organization_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrorg_user_id']);
            $query->where('AND', ['inner_a.um_usrorg_inactive', '=', 0]);
            $query->where('AND', ['inner_b.on_organization_inactive', '=', 0]);
        }, 'c', 'ON', [
            ['AND', ['a.um_user_id', '=', 'c.um_usrorg_user_id', true], false]
        ]);
        $this->query->join('LEFT', new Internalization(), 'd', 'ON', [
            ['AND', ['a.um_user_id', '=', 'd.um_usri18n_user_id', true], false]
        ]);
        $this->query->join('LEFT', new Preferences(), 'x', 'ON', [
            ['AND', ['a.um_user_id', '=', 'x.um_usrpreference_user_id', true], false]
        ]);
        $this->query->join('LEFT', new \Numbers\Users\Users\Model\User\Organizations(), 'e', 'ON', [
            ['AND', ['a.um_user_id', '=', 'e.um_usrorg_user_id', true], false],
            ['AND', ['e.um_usrorg_primary', '=', 1, false], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Actions::queryBuilderStatic(['alias' => 'inner_c'])->select();
            // join
            $query->join('INNER', new Permissions(), 'inner_c2', 'ON', [
                ['AND', ['inner_c2.um_usrperm_user_id', '=', 'inner_c.um_usrperaction_user_id', true], false],
                ['AND', ['inner_c2.um_usrperm_module_id', '=', 'inner_c.um_usrperaction_module_id', true], false],
                ['AND', ['inner_c2.um_usrperm_resource_id', '=', 'inner_c.um_usrperaction_resource_id', true], false],
            ]);
            $query->columns([
                'inner_c.um_usrperaction_user_id',
                'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_c.um_usrperaction_resource_id, inner_c.um_usrperaction_method_code, inner_c.um_usrperaction_action_id, (inner_c.um_usrperaction_inactive + inner_c2.um_usrperm_inactive), inner_c.um_usrperaction_module_id)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_c.um_usrperaction_user_id']);
        }, 'f', 'ON', [
            ['AND', ['a.um_user_id', '=', 'f.um_usrperaction_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Accounts::queryBuilderStatic(['alias' => 'inner_d'])->select();
            $query->columns([
                'inner_d.um_usrlinked_user_id',
                'linked_accounts' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_d.um_usrlinked_module_id, inner_d.um_usrlinked_type_code, inner_d.um_usrlinked_linked_id)", 'delimiter' => ';;'])
            ]);
            $query->where('AND', ['inner_d.um_usrlinked_inactive', '=', 0]);
            $query->groupby(['inner_d.um_usrlinked_user_id']);
        }, 'g', 'ON', [
            ['AND', ['a.um_user_id', '=', 'g.um_usrlinked_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Map::queryBuilderStatic(['alias' => 'inner_h'])->select();
            $query->columns([
                'inner_h.um_usrtmmap_user_id',
                'teams' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_h.um_usrtmmap_team_id)", 'delimiter' => ';;']),
                'team_codes' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_h_team.um_team_code)", 'delimiter' => ';;']),
                'team_names' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_h_team.um_team_name)", 'delimiter' => ';;']),
                'maximum_team_weight' => 'MAX(inner_h_team.um_team_weight)',
            ]);
            // join
            $query->join('INNER', new Teams(), 'inner_h_team', 'ON', [
                ['AND', ['inner_h.um_usrtmmap_team_id', '=', 'inner_h_team.um_team_id', true], false]
            ]);
            $query->where('AND', ['inner_h.um_usrtmmap_inactive', '=', 0]);
            $query->groupby(['inner_h.um_usrtmmap_user_id']);
        }, 'h', 'ON', [
            ['AND', ['a.um_user_id', '=', 'h.um_usrtmmap_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = UserGroupMap::queryBuilderStatic(['alias' => 'inner_g0'])->select();
            $query->columns([
                'inner_g0.um_usrgrmap_user_id',
                'group_ids' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_g0_group.um_usrgrp_id)", 'delimiter' => ';;']),
                'group_codes' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_g0_group.um_usrgrp_code)", 'delimiter' => ';;']),
                'group_names' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_g0_group.um_usrgrp_name)", 'delimiter' => ';;']),
            ]);
            // join
            $query->join('INNER', new UserGroups(), 'inner_g0_group', 'ON', [
                ['AND', ['inner_g0.um_usrgrmap_group_id', '=', 'inner_g0_group.um_usrgrp_id', true], false]
            ]);
            $query->where('AND', ['inner_g0_group.um_usrgrp_inactive', '=', 0]);
            $query->groupby(['inner_g0.um_usrgrmap_user_id']);
        }, 'g0', 'ON', [
            ['AND', ['a.um_user_id', '=', 'g0.um_usrgrmap_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Features::queryBuilderStatic(['alias' => 'inner_j'])->select();
            $query->columns([
                'inner_j.um_usrfeature_user_id',
                'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_j.um_usrfeature_feature_code, inner_j.um_usrfeature_module_id, inner_j.um_usrfeature_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_j.um_usrfeature_user_id']);
        }, 'j', 'ON', [
            ['AND', ['a.um_user_id', '=', 'j.um_usrfeature_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Subresources::queryBuilderStatic(['alias' => 'inner_k'])->select();
            // join
            $query->join('INNER', new Permissions(), 'inner_k2', 'ON', [
                ['AND', ['inner_k2.um_usrperm_user_id', '=', 'inner_k.um_usrsubres_user_id', true], false],
                ['AND', ['inner_k2.um_usrperm_module_id', '=', 'inner_k.um_usrsubres_module_id', true], false],
                ['AND', ['inner_k2.um_usrperm_resource_id', '=', 'inner_k.um_usrsubres_resource_id', true], false],
            ]);
            $query->columns([
                'inner_k.um_usrsubres_user_id',
                'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_k.um_usrsubres_resource_id, inner_k.um_usrsubres_rsrsubres_id, inner_k.um_usrsubres_action_id, (inner_k.um_usrsubres_inactive + inner_k2.um_usrperm_inactive), inner_k.um_usrsubres_module_id)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_k.um_usrsubres_user_id']);
        }, 'k', 'ON', [
            ['AND', ['a.um_user_id', '=', 'k.um_usrsubres_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Notifications::queryBuilderStatic(['alias' => 'inner_m', 'skip_acl' => true])->select();
            $query->columns([
                'inner_m.um_usrnoti_user_id',
                'notifications' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_m.um_usrnoti_feature_code, inner_m.um_usrnoti_module_id, inner_m.um_usrnoti_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_m.um_usrnoti_user_id']);
        }, 'm', 'ON', [
            ['AND', ['a.um_user_id', '=', 'm.um_usrnoti_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Flags::queryBuilderStatic(['alias' => 'inner_l', 'skip_acl' => true])->select();
            $query->columns([
                'inner_l.um_usrsysflag_user_id',
                'flags' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_l.um_usrsysflag_sysflag_id, inner_l.um_usrsysflag_action_id, inner_l.um_usrsysflag_inactive, inner_l.um_usrsysflag_module_id)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_l.um_usrsysflag_user_id']);
        }, 'l', 'ON', [
            ['AND', ['a.um_user_id', '=', 'l.um_usrsysflag_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Methods::queryBuilderStatic(['alias' => 'inner_n', 'skip_acl' => true])->select();
            $query->columns([
                'inner_n.um_usrapmethod_user_id',
                'apis' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_n.um_usrapmethod_resource_id, inner_n.um_usrapmethod_method_code, (inner_n.um_usrapmethod_inactive + inner_n2.um_usrapi_inactive), inner_n.um_usrapmethod_module_id)", 'delimiter' => ';;'])
            ]);
            $query->join('INNER', new APIs(), 'inner_n2', 'ON', [
                ['AND', ['inner_n.um_usrapmethod_user_id', '=', 'inner_n2.um_usrapi_user_id', true], false],
                ['AND', ['inner_n.um_usrapmethod_module_id', '=', 'inner_n2.um_usrapi_module_id', true], false],
                ['AND', ['inner_n.um_usrapmethod_resource_id', '=', 'inner_n2.um_usrapi_resource_id', true], false]
            ]);
            $query->groupby(['inner_n.um_usrapmethod_user_id']);
        }, 'n', 'ON', [
            ['AND', ['a.um_user_id', '=', 'n.um_usrapmethod_user_id', true], false]
        ]);
        // policies
        $this->query->join('LEFT', function (& $query) {
            $query = Policies::queryBuilderStatic(['alias' => 'inner_o', 'skip_acl' => true])->select();
            $query->columns([
                'inner_o.um_usrpolicy_user_id',
                'policies' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('-::-', inner_o.um_usrpolicy_sm_policy_tenant_id, inner_o.um_usrpolicy_sm_policy_code, inner_o.um_usrpolicy_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_o.um_usrpolicy_user_id']);
        }, 'o', 'ON', [
            ['AND', ['a.um_user_id', '=', 'o.um_usrpolicy_user_id', true], false]
        ]);
        // policy groups
        $this->query->join('LEFT', function (& $query) {
            $query = Groups::queryBuilderStatic(['alias' => 'inner_p', 'skip_acl' => true])->select();
            $query->columns([
                'inner_p.um_usrpolgrp_user_id',
                'policy_groups' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_p.um_usrpolgrp_sm_polgroup_tenant_id, inner_p.um_usrpolgrp_sm_polgroup_id, inner_p.um_usrpolgrp_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_p.um_usrpolgrp_user_id']);
        }, 'p', 'ON', [
            ['AND', ['a.um_user_id', '=', 'p.um_usrpolgrp_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\Realm\Map::queryBuilderStatic(['alias' => 'inner_r'])->select();
            $query->columns([
                'inner_r.um_usrreamap_user_id',
                'realms' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_r.um_usrreamap_um_realm_id)", 'delimiter' => ';;']),
                'realm_codes' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_r_realm.um_realm_code)", 'delimiter' => ';;']),
                'realm_names' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_r_realm.um_realm_name)", 'delimiter' => ';;']),
                'maximum_realm_weight' => 'MAX(inner_r_realm.um_realm_weight)',
            ]);
            // join
            $query->join('INNER', new Realms(), 'inner_r_realm', 'ON', [
                ['AND', ['inner_r.um_usrreamap_um_realm_id', '=', 'inner_r_realm.um_realm_id', true], false]
            ]);
            $query->where('AND', ['inner_r.um_usrreamap_inactive', '=', 0]);
            $query->groupby(['inner_r.um_usrreamap_user_id']);
        }, 'r', 'ON', [
            ['AND', ['a.um_user_id', '=', 'r.um_usrreamap_user_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\Domain\Map::queryBuilderStatic(['alias' => 'inner_d2'])->select();
            $query->columns([
                'inner_d2.um_usrdommap_user_id',
                'domains' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_d2.um_usrdommap_um_domain_id)", 'delimiter' => ';;']),
                'domain_codes' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_d2_domain.um_domain_code)", 'delimiter' => ';;']),
                'domain_names' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_d2_domain.um_domain_name)", 'delimiter' => ';;']),
                'maximum_domain_weight' => 'MAX(inner_d2_domain.um_domain_weight)',
            ]);
            // join
            $query->join('INNER', new Domains(), 'inner_d2_domain', 'ON', [
                ['AND', ['inner_d2.um_usrdommap_um_domain_id', '=', 'inner_d2_domain.um_domain_id', true], false]
            ]);
            $query->where('AND', ['inner_d2.um_usrdommap_inactive', '=', 0]);
            $query->groupby(['inner_d2.um_usrdommap_user_id']);
        }, 'd2', 'ON', [
            ['AND', ['a.um_user_id', '=', 'd2.um_usrdommap_user_id', true], false]
        ]);
        $this->query->join('LEFT', new Settings(), 'um_settings', 'ON', [
            ['AND', ['a.um_user_tenant_id', '=', 'um_settings.um_setting_tenant_id', true], false]
        ]);
        // where
        if (empty($parameters['skip_login_enabled'])) {
            $this->query->where('AND', ['a.um_user_login_enabled', '=', 1]);
        }
        $this->query->where('AND', ['a.um_user_inactive', '=', 0]);
        $this->query->orderby([
            'um_user_id' => SORT_DESC
        ]);
        if (!empty($parameters['user_ids'])) {
            $this->query->where('AND', ['a.um_user_id', '=', $parameters['user_ids']]);
        } elseif (!empty($parameters['user_id'])) {
            $this->query->where('AND', ['a.um_user_id', '=', (int) $parameters['user_id']]);
            $this->query->limit(1);
        } else {
            $parameters['username'] = trim(strtolower($parameters['username'] . ''));
            if (strpos($parameters['username'], '@') !== false) {
                $this->query->where('AND', ['a.um_user_email', '=', $parameters['username']]);
            } elseif (strpos($parameters['username'], '+') !== false) {
                $phone = Phone::plainNumber($parameters['username']);
                $this->query->where('AND', ['a.um_user_numeric_phone', '=', $phone]);
            } else {
                $this->query->where('AND', ['a.um_user_login_username', '=', $parameters['username']]);
            }
            $this->query->limit(1);
        }
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            // unset password
            if (!empty($options['parameters']['user_ids'])) {
                unset($data[$k]['login_password']);
            }
            // roles
            if (!empty($v['roles'])) {
                $data[$k]['roles'] = explode(';;', $v['roles']);
            } else {
                $data[$k]['roles'] = [];
            }
            // role ids
            if (!empty($v['role_ids'])) {
                $data[$k]['role_ids'] = explode(';;', $v['role_ids']);
                foreach ($data[$k]['role_ids'] as $k2 => $v2) {
                    $data[$k]['role_ids'][$k2] = (int) $v2;
                }
            } else {
                $data[$k]['role_ids'] = [];
            }
            if (!empty($v['role_names'])) {
                $data[$k]['role_names'] = explode(';;', $v['role_names']);
            } else {
                $data[$k]['role_names'] = [];
            }
            // teams
            if (!empty($v['teams'])) {
                $data[$k]['teams'] = explode(';;', $v['teams']);
                foreach ($data[$k]['teams'] as $k2 => $v2) {
                    $data[$k]['teams'][$k2] = (int) $v2;
                }
            } else {
                $data[$k]['teams'] = [];
            }
            if (!empty($v['team_names'])) {
                $data[$k]['team_names'] = explode(';;', $v['team_names']);
            } else {
                $data[$k]['team_names'] = [];
            }
            if (!empty($v['team_codes'])) {
                $data[$k]['team_codes'] = explode(';;', $v['team_codes']);
            } else {
                $data[$k]['team_codes'] = [];
            }
            // realms
            if (!empty($v['realms'])) {
                $data[$k]['realms'] = explode(';;', $v['realms']);
                foreach ($data[$k]['realms'] as $k2 => $v2) {
                    $data[$k]['realms'][$k2] = (int) $v2;
                }
            } else {
                $data[$k]['realms'] = [];
            }
            if (!empty($v['realm_names'])) {
                $data[$k]['realm_names'] = explode(';;', $v['realm_names']);
            } else {
                $data[$k]['realm_names'] = [];
            }
            if (!empty($v['realm_codes'])) {
                $data[$k]['realm_codes'] = explode(';;', $v['realm_codes']);
            } else {
                $data[$k]['realm_codes'] = [];
            }
            // domains
            if (!empty($v['domains'])) {
                $data[$k]['domains'] = explode(';;', $v['domains']);
                foreach ($data[$k]['domains'] as $k2 => $v2) {
                    $data[$k]['domains'][$k2] = (int) $v2;
                }
            } else {
                $data[$k]['domains'] = [];
            }
            if (!empty($v['domain_names'])) {
                $data[$k]['domain_names'] = explode(';;', $v['domain_names']);
            } else {
                $data[$k]['domain_names'] = [];
            }
            if (!empty($v['domain_codes'])) {
                $data[$k]['domain_codes'] = explode(';;', $v['domain_codes']);
            } else {
                $data[$k]['domain_codes'] = [];
            }
            // groups
            if (!empty($v['group_ids'])) {
                $data[$k]['group_ids'] = explode(';;', $v['group_ids']);
                foreach ($data[$k]['group_ids'] as $k2 => $v2) {
                    $data[$k]['group_ids'][$k2] = (int) $v2;
                }
            } else {
                $data[$k]['group_ids'] = [];
            }
            if (!empty($v['group_names'])) {
                $data[$k]['group_names'] = explode(';;', $v['group_names']);
            } else {
                $data[$k]['group_names'] = [];
            }
            if (!empty($v['group_codes'])) {
                $data[$k]['group_codes'] = explode(';;', $v['group_codes']);
            } else {
                $data[$k]['group_codes'] = [];
            }
            // organizations
            if (!empty($v['organizations'])) {
                $data[$k]['organizations'] = [];
                foreach (explode(';;', $v['organizations']) as $v2) {
                    $data[$k]['organizations'][] = (int) $v2;
                }
            } else {
                $data[$k]['organizations'] = [];
            }
            // organization countries
            if (!empty($v['organization_countries'])) {
                $data[$k]['organization_countries'] = array_unique(explode(';;', $v['organization_countries']));
            } else {
                $data[$k]['organization_countries'] = [];
            }
            // process i18n
            $data[$k]['internalization'] = [];
            foreach ($v as $k2 => $v2) {
                if (strpos($k2, 'i18n_') === 0) {
                    $data[$k]['internalization'][str_replace('i18n_', '', $k2)] = $v2;
                    unset($data[$k][$k2]);
                }
            }
            // permissions
            if (!empty($v['permissions'])) {
                $data[$k]['permissions'] = [];
                $temp = explode(';;', $v['permissions']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['permissions'][(int) $v2[0]][$v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
                }
            } else {
                $data[$k]['permissions'] = [];
            }
            // apis
            if (!empty($v['apis'])) {
                $data[$k]['apis'] = [];
                $temp = explode(';;', $v['apis']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['apis'][(int) $v2[0]][$v2[1]][(int) $v2[3]] = (int) $v2[2];
                }
            } else {
                $data[$k]['apis'] = [];
            }
            // subresources
            if (!empty($v['subresources'])) {
                $data[$k]['subresources'] = [];
                $temp = explode(';;', $v['subresources']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['subresources'][(int) $v2[0]][(int) $v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
                }
            } else {
                $data[$k]['subresources'] = [];
            }
            // features
            if (!empty($v['features'])) {
                $data[$k]['features'] = [];
                $temp = explode(';;', $v['features']);
                foreach ($temp as $v2) {
                    $v2 = explode('~~', $v2);
                    $data[$k]['features'][$v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['features'] = [];
            }
            // notifications
            if (!empty($v['notifications'])) {
                $data[$k]['notifications'] = [];
                $temp = explode(';;', $v['notifications']);
                foreach ($temp as $v2) {
                    $v2 = explode('~~', $v2);
                    $data[$k]['notifications'][$v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['notifications'] = [];
            }
            // flags
            if (!empty($v['flags'])) {
                $data[$k]['flags'] = [];
                $temp = explode(';;', $v['flags']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['flags'][(int) $v2[0]][(int)$v2[1]][(int) $v2[3]] = (int) $v2[2];
                }
            } else {
                $data[$k]['flags'] = [];
            }
            // linked_accounts
            if (!empty($v['linked_accounts'])) {
                $data[$k]['linked_accounts'] = [];
                $temp = explode(';;', $v['linked_accounts']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['linked_accounts'][$v2[1]][(int) $v2[0]] = (int) $v2[2];
                }
            } else {
                $data[$k]['linked_accounts'] = [];
            }
            // policies
            if (!empty($v['policies'])) {
                $data[$k]['policies'] = [];
                $temp = explode(';;', $v['policies']);
                foreach ($temp as $v2) {
                    $v2 = explode('-::-', $v2);
                    $data[$k]['policies'][(int) $v2[0]][$v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['policies'] = [];
            }
            // policy groups
            if (!empty($v['policy_groups'])) {
                $data[$k]['policy_groups'] = [];
                $temp = explode(';;', $v['policy_groups']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['policy_groups'][(int) $v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['policy_groups'] = [];
            }
        }
        return $data;
    }
}
