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

use Numbers\Users\Documents\Base\Helper\MassUpload;
use Numbers\Users\Documents\Base\Helper\Validate;
use Numbers\Users\Users\Helper\Assignment\UserToCustomer;
use Numbers\Users\Users\Helper\Assignment\UserToUser;
use Numbers\Users\Users\Helper\LoginWithToken;
use Numbers\Users\Users\Helper\User\Notifications;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Object\Validator\Phone;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Users\Users\Helper\Assignment\UserToChannels;
use Numbers\Users\Users\Task\UMUserPIIComputedFields;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class Users extends Base
{
    public $form_link = 'um_users';
    public $module_code = 'UM';
    public $title = 'U/M Users Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ],
        'include_js' => '/numbers/media_submodules/Numbers_Users_Users_Media_JS_Users.js'
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'tabs2' => ['default_row_type' => 'grid', 'order' => 600, 'type' => 'tabs'],
        'assignment_tabs' => ['default_row_type' => 'grid', 'order' => 700, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
        'login_container' => ['default_row_type' => 'grid', 'order' => 32105, 'acl_subresource_edit' => ['UM::USER_LOGIN']],
        'operating_container' => ['default_row_type' => 'grid', 'order' => 32105, 'acl_subresource_edit' => ['UM::USER_OPERATING']],
        'photo_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'optin_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'roles_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Roles',
            'details_pk' => ['um_usrrol_role_id'],
            'required' => true,
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_ROLES']
        ],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Organizations',
            'details_pk' => ['um_usrorg_organization_id'],
            'required' => true,
            'order' => 35001,
            'acl_subresource_edit' => ['UM::USER_ORGANIZATIONS']
        ],
        'internalization_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Users\Users\Model\User\Internalization',
            'details_pk' => ['um_usri18n_user_id'],
            'order' => 35001
        ],
        'preferences_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Users\Users\Model\User\Preferences',
            'details_pk' => ['um_usrpreference_user_id'],
            'order' => 35002
        ],
        'mentions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Mentions',
            'details_pk' => ['um_usrmention_id'],
            'order' => 35000,
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Notifications',
            'details_pk' => ['um_usrnoti_module_id', 'um_usernoti_feature_code'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_NOTIFICATIONS']
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Features',
            'details_pk' => ['um_usrfeature_module_id', 'um_usrfeature_feature_code'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_FEATURES']
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Flags',
            'details_pk' => ['um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_FLAGS']
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Permissions',
            'details_pk' => ['um_usrperm_resource_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\User\Permission\Actions',
            'details_pk' => ['um_usrperaction_method_code', 'um_usrperaction_action_id'],
            'order' => 1000,
            'required' => true,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\User\Permission\Subresources',
            'details_pk' => ['um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
            'order' => 2000,
            'required' => false,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Permission\Modules',
            'details_pk' => ['um_usrprmmod_module_id', 'um_usrprmmod_action_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'permission_access_settings_container' => [
            'type' => 'subdetails',
            'label_name' => 'Access Settings',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\User\Permission\AccessSettings',
            'details_pk' => ['um_usracsetting_sm_rsacsertype_code', 'um_usracsetting_sm_rsacserowner_code'],
            'order' => 2001,
            'required' => false,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\APIs',
            'details_pk' => ['um_usrapi_module_id', 'um_usrapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\APIs',
            'details_key' => '\Numbers\Users\Users\Model\User\API\Methods',
            'details_pk' => ['um_usrapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'teams_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Map',
            'details_pk' => ['um_usrtmmap_team_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_TEAMS']
        ],
        'security_answers_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Security\Answers',
            'details_pk' => ['um_usrsecanswer_question_id'],
            'order' => 36000,
            'acl_subresource_edit' => ['UM::USER_LOGIN']
        ],
        'assignments_container' => ['default_row_type' => 'grid', 'order' => 35003, 'custom_renderer' => '\Numbers\Users\Users\Form\Users::renderUserToUser'],
        'customer_assignments_container' => ['default_row_type' => 'grid', 'order' => 35003, 'custom_renderer' => '\Numbers\Users\Users\Form\Users::renderUserToCustomer'],
        'integration_mappings_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\IntegrationMappings',
            'details_pk' => ['um_usrintegmap_integtype_code', 'um_usrintegmap_code'],
            'order' => 35001,
        ],
        'channels_container' => ['order' => 35003, 'custom_renderer' => 'self::renderChannels'],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Policy\Policies',
            'details_pk' => ['um_usrpolicy_sm_policy_tenant_id', 'um_usrpolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Policy\Groups',
            'details_pk' => ['um_usrpolgrp_sm_polgroup_tenant_id', 'um_usrpolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
        'demographics_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Users\Users\Model\User\PIIs',
            'details_pk' => ['um_usrpii_user_id'],
            'order' => 35001
        ],
        'languages_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\User\Languages',
            'details_pk' => ['um_usrsplang_language_code'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
        'skills_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\User\Skills',
            'details_pk' => ['um_usrskill_name'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
        'realms_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\Realm\Map',
            'details_pk' => ['um_usrreamap_um_realm_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
        'domains_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\Domain\Map',
            'details_pk' => ['um_usrdommap_um_domain_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
        'external_permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\ExternalPermissions',
            'details_pk' => ['um_usrextperm_um_extmdids_id', 'um_usrextperm_um_extresrc_id'],
            'order' => 35000
        ],
        'external_permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\User\ExternalPermission\Actions',
            'details_pk' => ['um_usrextpractn_method_code', 'um_usrextpractn_um_extactn_id'],
            'order' => 1000,
            'required' => true
        ],
        'external_permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\User\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\User\ExternalPermission\Subresources',
            'details_pk' => ['um_usrextprsub_um_extsursrc_id', 'um_usrextprsub_um_extactn_id'],
            'order' => 2000,
            'required' => false
        ],
        'external_permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\ExternalPermission\Modules',
            'details_pk' => ['um_usrextprmmod_um_extmdids_id', 'um_usrextprmmod_um_extactn_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
        ],
        'classifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Map',
            'details_pk' => ['um_usrclsmap_um_classification_id'],
            'order' => 35000,
            'acl_subresource_edit' => ['UM::USER_CLASSIFICATIONS']
        ],
    ];
    public $rows = [
        'top' => [
            'um_user_id' => ['order' => 100],
            'um_user_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'login' => ['order' => 200, 'label_name' => 'Login', 'acl_subresource_hide' => ['UM::USER_LOGIN']],
            'photo' => ['order' => 300, 'label_name' => 'About'],
            'operating' => ['order' => 350, 'label_name' => 'Operations', 'acl_subresource_hide' => ['UM::USER_OPERATING']],
            'internalization' => ['order' => 400, 'label_name' => 'Internalization'],
            'preferences' => ['order' => 450, 'label_name' => 'Preferences'],
            'integration' => ['order' => 500, 'label_name' => 'Integration'],
            'optin' => ['order' => 600, 'label_name' => 'Opt In'],
            'channels' => ['order' => 700, 'label_name' => 'Channels'],
            'demographics' => ['order' => 800, 'label_name' => 'Demographics'],
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA + ['acl_subresource_hide' => ['UM::USER_ADDRESSES']],
            \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA + ['acl_subresource_hide' => ['UM::USER_ATTRIBUTES']],
        ],
        'tabs2' => [
            'organizations' => ['order' => 100, 'label_name' => 'Organizations', 'acl_subresource_hide' => ['UM::USER_ORGANIZATIONS']],
            'roles' => ['order' => 200, 'label_name' => 'Roles', 'acl_subresource_hide' => ['UM::USER_ROLES']],
            'teams' => ['order' => 300, 'label_name' => 'Teams', 'acl_subresource_hide' => ['UM::USER_TEAMS']],
            'realms' => ['order' => 350, 'label_name' => 'Realms', 'acl_subresource_hide' => ['UM::USER_REALMS']],
            'domains' => ['order' => 360, 'label_name' => 'Domains', 'acl_subresource_hide' => ['UM::USER_DOMAINS']],
            'classifications' => ['order' => 375, 'label_name' => 'Classifications', 'acl_subresource_hide' => ['UM::USER_CLASSIFICATIONS']],
            'permissions' => ['order' => 400, 'label_name' => 'Int. Perm.', 'acl_subresource_hide' => ['UM::USER_PERMISSIONS']],
            'external_permissions' => ['order' => 410, 'label_name' => 'Ext. Perm.', 'acl_subresource_hide' => ['UM::USER_PERMISSIONS']],
            'apis' => ['order' => 450, 'label_name' => 'API(s)', 'acl_subresource_hide' => ['UM::USER_APIS']],
            'notifications' => ['order' => 500, 'label_name' => 'Notifications', 'acl_subresource_hide' => ['UM::USER_NOTIFICATIONS']],
            'features' => ['order' => 600, 'label_name' => 'Features', 'acl_subresource_hide' => ['UM::USER_FEATURES']],
            'flags' => ['order' => 700, 'label_name' => 'Flags', 'acl_subresource_hide' => ['UM::USER_FLAGS']],
            'assignments' => ['order' => 800, 'label_name' => 'Assignments', 'acl_subresource_hide' => ['UM::USER_ASSIGNMENTS']],
            'policies' => ['order' => 900, 'label_name' => 'Policies', 'acl_subresource_hide' => ['UM::POLICIES_AND_POLGROUPS']],
        ],
        'assignment_tabs' => [
            'assignment_tabs_users' => ['order' => 100, 'label_name' => 'User To User', 'acl_subresource_hide' => ['UM::USER_TO_USER_ASSIGNMENTS']],
            'assignment_customer_tabs_users' => ['order' => 200, 'label_name' => 'Customer', 'acl_subresource_hide' => ['UM::USER_TO_CUSTOMER_ASSIGNMENTS']],
        ]
    ];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
            ],
            'um_user_name' => [
                'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => 'c', 'autocomplete' => 'off'],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
                'contact' => ['container' => 'contact_container', 'order' => 200]
            ],
            'login' => [
                'login' => ['container' => 'login_container', 'order' => 100],
                'separator_login_security' => ['container' => 'separator_login_security_container', 'order' => 150],
                'security_answers' => ['container' => 'security_answers_container', 'order' => 200],
            ],
            'photo' => [
                'photo' => ['container' => 'photo_container', 'order' => 100],
            ],
            'internalization' => [
                'internalization' => ['container' => 'internalization_container', 'order' => 100],
            ],
            'preferences' => [
                'preferences' => ['container' => 'preferences_container', 'order' => 100],
                'separator_3_pol' => ['container' => 'separator_3_pol', 'order' => 150],
                'mentions' => ['container' => 'mentions_container', 'order' => 200],
            ],
            'operating' => [
                'operating' => ['container' => 'operating_container', 'order' => 100],
            ],
            'integration' => [
                'integration' => ['container' => 'integration_mappings_container', 'order' => 100],
            ],
            'optin' => [
                'optin' => ['container' => 'optin_container', 'order' => 100],
            ],
            'channels' => [
                'channels' => ['container' => 'channels_container', 'order' => 100],
            ],
            'demographics' => [
                'demographics' => ['container' => 'demographics_container', 'order' => 100],
                'languages_separator' => ['container' => 'languages_separator', 'order' => 200],
                'languages' => ['container' => 'languages_container', 'order' => 300],
                'skills_separator' => ['container' => 'skills_separator', 'order' => 400],
                'skills' => ['container' => 'skills_container', 'order' => 500],
            ]
        ],
        'tabs2' => [
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'roles' => [
                'roles' => ['container' => 'roles_container', 'order' => 100],
            ],
            'teams' => [
                'teams' => ['container' => 'teams_container', 'order' => 100],
            ],
            'realms' => [
                'realms' => ['container' => 'realms_container', 'order' => 100],
            ],
            'domains' => [
                'domains' => ['container' => 'domains_container', 'order' => 100],
            ],
            'classifications' => [
                'classifications' => ['container' => 'classifications_container', 'order' => 100],
            ],
            'assignments' => [
                'assignments' => ['container' => 'assignment_tabs', 'order' => 100],
            ],
            'permissions' => [
                'permissions' => ['container' => 'permissions_container', 'order' => 100],
                '__permission_separator' => ['container' => 'permission_modules_separator_container', 'order' => 200],
                'permission_modules' => ['container' => 'permission_modules_container', 'order' => 300],
            ],
            'external_permissions' => [
                'external_permissions' => ['container' => 'external_permissions_container', 'order' => 100],
                '__external_permission_separator' => ['container' => 'external_permission_modules_separator_container', 'order' => 200],
                'external_permission_modules_container' => ['container' => 'external_permission_modules_container', 'order' => 300],
            ],
            'apis' => [
                'apis' => ['container' => 'apis_container', 'order' => 100],
            ],
            'flags' => [
                'flags' => ['container' => 'flags_container', 'order' => 100],
            ],
            'notifications' => [
                'notifications' => ['container' => 'notifications_container', 'order' => 100],
            ],
            'features' => [
                'features' => ['container' => 'features_container', 'order' => 100],
            ],
            'policies' => [
                'policies' => ['container' => 'policy_container', 'order' => 100],
                'separator_2_pol' => ['container' => 'separator_2_pol', 'order' => 150],
                'policy_groups' => ['container' => 'policy_group_container', 'order' => 200],
            ]
        ],
        'assignment_tabs' => [
            'assignment_tabs_users' => [
                'user_assignments' => ['container' => 'assignments_container', 'order' => 100],
            ],
            'assignment_customer_tabs_users' => [
                'customer_assignments' => ['container' => 'customer_assignments_container', 'order' => 100]
            ]
        ],
        'general_container' => [
            'um_user_type_id' => [
                'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                '\Numbers\Users\Users\Model\User\Group\Map' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'um_usrgrmap_group_id', 'percent' => 70, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Users\Model\User\Groups::optionsActive'],
                'um_user_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
                'um_user_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_user_title' => [
                'um_user_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
                'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
            ],
            'um_user_company' => [
                'um_user_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
            ],
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'fa-regular fa-envelope', 'percent' => 100],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false, 'validator_method' => '\Object\Validator\EmailPublic::validate'],
                'um_user_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false, 'validator_method' => '\Object\Validator\EmailPublic::validate'],
            ],
            'um_user_phone' => [
                'um_user_phone' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 25, 'required' => false],
                'um_user_whatsapp' => ['order' => 3, 'label_name' => 'WhatsApp', 'domain' => 'whatsapp', 'null' => true, 'percent' => 25, 'required' => false],
            ],
            'um_user_cell' => [
                'um_user_cell' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'um_user_alternative_contact' => [
                'um_user_alternative_contact' => ['order' => 1, 'row_order' => 800, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
            self::HIDDEN => [
                'um_user_numeric_phone' => ['label_name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
            ]
        ],
        'operating_container' => [
            'um_user_operating_country_code' => [
                'um_user_operating_country_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operating Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries::optionsActive', 'options_options' => ['skip_acl' => true], 'onchange' => 'this.form.submit();'],
                'um_user_operating_province_code' => ['order' => 2, 'label_name' => 'Operating Province', 'domain' => 'province_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Provinces::optionsActive', 'options_depends' => ['cm_province_country_code' => 'um_user_operating_country_code'], 'options_options' => ['skip_acl' => true]],
            ],
            'um_user_operating_currency_code' => [
                'um_user_operating_currency_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Currencies::optionsActive', 'options_options' => ['skip_acl' => true]],
                'um_user_operating_currency_type' => ['order' => 2, 'label_name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Types::optionsActive', 'options_options' => ['skip_acl' => true]],
            ],
            'um_user_ip' => [
                'um_user_ip' => ['order' => 1, 'row_order' => 300, 'label_name' => 'IP', 'domain' => 'ip', 'null' => true, 'percent' => 50],
            ]
        ],
        'login_container' => [
            'um_user_login_enabled' => [
                'um_user_login_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Login Enabled', 'type' => 'boolean', 'percent' => 25, 'skip_during_export' => true],
                'um_user_login_become' => ['order' => 2, 'label_name' => 'Become', 'percent' => 25, 'skip_during_export' => true, 'custom_renderer' => 'self::renderBecome'],
                'um_user_login_username' => ['order' => 2, 'label_name' => 'Username', 'domain' => 'login', 'null' => true, 'percent' => 50, 'required' => 'c', 'skip_during_export' => true, 'autocomplete' => 'new-password'],
            ],
            'um_user_login_last_set' => [
                'um_user_login_last_set' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Password Last Changed', 'type' => 'date', 'persistent' => true, 'method' => 'calendar', 'calendar_icon' => 'right', 'percent' => 50, 'readonly' => true, 'skip_during_export' => true],
                'um_user_login_password_new' => ['order' => 2, 'label_name' => 'Reset Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => false, 'empty_value' => true, 'skip_during_export' => true, 'method_renderer' => 'self::renderNewPasswordMethodRenderer']
            ],
            'um_user_weight' => [
                'um_user_weight' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Weight', 'domain' => 'weight', 'null' => true, 'percent' => 25],
            ],
            'sep2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Multi Factor Authentication', 'icon' => 'fa-solid fa-sign-in-alt', 'percent' => 100],
            ],
            'um_user_um_mfasettyp_code' => [
                'um_user_um_mfasettyp_code' => ['order' => 1, 'row_order' => 500, 'label_name' => 'MFA Setting Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Users\Users\Model\MFA\SettingTypes', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_user_um_mfatype_code' => ['order' => 2, 'label_name' => 'MFA Default Type', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\MFA\Types', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_user_last_mfa_code' => ['order' => 3, 'label_name' => 'Last MFA Code', 'domain' => 'mfa_code', 'null' => true, 'percent' => 50, 'maxlength' => 6, 'method' => 'password', 'method_renderer' => 'self::renderMFAMethodRenderer'],
            ]
        ],
        'separator_login_security_container' => [
            'sep' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'Security Questions', 'icon' => 'fa-solid fa-shield-alt', 'percent' => 100],
            ]
        ],
        'security_answers_container' => [
            'row1' => [
                'um_usrsecanswer_question_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Question', 'domain' => 'group_id', 'null' => true, 'details_unique_select' => true, 'percent' => 75, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Security\Questions::optionsActive', 'placeholder' => 'Select Question'],
                'um_usrsecanswer_answer' => ['order' => 2, 'label_name' => 'Answer', 'type' => 'text', 'null' => true, 'percent' => 25, 'required' => true],
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
                'um_usri18n_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'],
            ],
            'format' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 500, 'label_name' => 'Format', 'icon' => 'fa-regular fa-hourglass', 'percent' => 100],
            ],
            'um_usri18n_format_date' => [
                'um_usri18n_format_date' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Date Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d', 'description' => 'Y - year, m - month, d - day'],
                'um_usri18n_format_time' => ['order' => 2, 'label_name' => 'Time Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'H:i:s', 'description' => 'H - hour, i - minute, s = second, g - short hour, a - am/pm'],
                'um_usri18n_format_datetime' => ['order' => 3, 'label_name' => 'Datetime Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm'],
                'um_usri18n_format_timestamp' => ['order' => 4, 'label_name' => 'Timestamp Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s.u', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds']
            ],
            'um_usri18n_format_uom' => [
                'um_usri18n_format_uom' => ['order' => 1, 'row_order' => 650, 'label_name' => 'Unit of Measures', 'domain' => 'group_code', 'null' => true, 'default' => 'METRIC', 'method' => 'select', 'options_model' => '\Object\Format\UoM'],
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
        'preferences_container' => [
            'um_usrpreference_dynamic_menu' => [
                'um_usrpreference_dynamic_menu' => ['order' => 4, 'label_name' => 'Dynamic Menu', 'type' => 'boolean', 'percent' => 25]
            ]
        ],
        'mentions_container' => [
            'row1' => [
                'um_usrmention_mention' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Mention', 'domain' => 'mention', 'null' => true, 'required' => true, 'percent' => 50],
                'um_usrmention_language_code' => ['order' => 2, 'label_name' => 'Language Code', 'domain' => 'language_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrmention_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrmention_id' => ['label_name' => 'Mention #', 'domain' => 'big_id_sequence', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'roles_container' => [
            'row1' => [
                'um_usrrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
                'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_usrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_usrorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'um_usrorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'photo_container' => [
            '__logo_upload' => [
                '__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Photo', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '250x250', 'thumbnail_size' => '50x50'], 'description' => 'Extensions: ' . Validate::IMAGE_EXTENSIONS . '. Size: 250x250.', 'skip_during_export' => true],
                '__logo_preview' => ['order' => 2, 'label_name' => 'Preview Photo', 'percent' => 50, 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'um_user_photo_file_id', 'skip_during_export' => true],
            ],
            'um_user_about_nickname' => [
                'um_user_about_nickname' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Nickname', 'domain' => 'name', 'null' => true, 'percent' => 100],
            ],
            'um_user_about_description' => [
                'um_user_about_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
            self::HIDDEN => [
                'um_user_photo_file_id' => ['label_name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden', 'skip_during_export' => true],
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_usrnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'placeholder' => 'Notification', 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrnoti_module_id', 'feature_code' => 'um_usrnoti_feature_code']],
                'um_usrnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_usrfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'placeholder' => 'Feature', 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrfeature_module_id', 'feature_code' => 'um_usrfeature_feature_code'], 'process_readonly' => true],
                'um_usrfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_usrsysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrsysflag_module_id', 'sysflag_id' => 'um_usrsysflag_sysflag_id']],
                'um_usrsysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_usrsysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrsysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrsysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_usrperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'acl_handle_exceptions' => true, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrperm_module_id', 'resource_id' => 'um_usrperm_resource_id']],
                'um_usrperm_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrperm_module_id' => ['order' => 1, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_usrperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_usrperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_usrperaction_action_id', 'method_code' => 'um_usrperaction_method_code']],
                'um_usrperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_usrperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_usrsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_usrperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_usrsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'permission_modules_separator_container' => [
            'permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Internal Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'permission_modules_container' => [
            'row1' => [
                'um_usrprmmod_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_usrprmmod_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_usrprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrprmmod_module_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_access_settings_container' => [
            'row1' => [
                'um_usracsetting_sm_rsacsertype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes', 'onchange' => 'this.form.submit();'],
                'um_usracsetting_sm_rsacserowner_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => null, 'placeholder' => 'Please choose', 'onchange' => 'this.form.submit();'],
                'um_usracsetting_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'external_permissions_container' => [
            'row1' => [
                'um_usrextperm_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResources::optionsJson', 'options_params' => ['um_extresrc_acl_permission' => 1, 'um_extresrc_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrextperm_um_extmdids_id', 'resource_id' => 'um_usrextperm_um_extresrc_id']],
                'um_usrextperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrextperm_um_extmdids_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_actions_container' => [
            'row1' => [
                'um_usrextpractn_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResourceMap::optionsJson', 'options_depends' => ['um_extresmap_um_extresrc_id' => 'detail::um_usrextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_usrextpractn_um_extactn_id', 'method_code' => 'um_usrextpractn_method_code']],
                'um_usrextpractn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_usrextpractn_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_subresources_container' => [
            'row1' => [
                'um_usrextprsub_um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresources::optionsGrouped', 'options_depends' => ['um_extresrc_id' => 'detail::um_usrextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrextprsub_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresourceActions::optionsGrouped', 'options_depends' => ['um_extsursrc_id' => 'um_usrextprsub_um_extsursrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrextprsub_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'external_permission_modules_separator_container' => [
            'external_permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'External Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'external_permission_modules_container' => [
            'row1' => [
                'um_usrextprmmod_um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs', 'onchange' => 'this.form.submit();'],
                'um_usrextprmmod_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_usrextprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrextprmmod_um_extmdl_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'apis_container' => [
            'row1' => [
                'um_usrapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrapi_module_id', 'resource_id' => 'um_usrapi_resource_id']],
                'um_usrapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_usrapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_usrapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_usrapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'teams_container' => [
            'row1' => [
                'um_usrtmmap_team_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team', 'domain' => 'team_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Teams::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrtmmap_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'realms_container' => [
            'row1' => [
                'um_usrreamap_um_realm_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Realm', 'domain' => 'realm_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Realms::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrreamap_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'um_usrreamap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'domains_container' => [
            'row1' => [
                'um_usrdommap_um_domain_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Domain', 'domain' => 'domain_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Realms::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrdommap_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'um_usrdommap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'classifications_container' => [
            'row1' => [
                'um_usrclsmap_um_classtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code','null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Classification\Types::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrclsmap_um_classification_id' => ['order' => 2, 'label_name' => 'Classification', 'domain' => 'classification_id', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 45, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Classifications::optionsActive', 'options_depends' => ['um_classification_um_classtype_code' => 'detail::um_usrclsmap_um_classtype_code'], 'onchange' => 'this.form.submit();'],
                'um_usrclsmap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'integration_mappings_container' => [
            'row1' => [
                'um_usrintegmap_integtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Integration Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrintegmap_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 45],
                'um_usrintegmap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'um_usrintegmap_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 95],
                'um_usrintegmap_default' => ['order' => 2, 'label_name' => 'Default', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'optin_container' => [
            'um_user_channel' => [
                'um_user_channel' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Channel', 'domain' => 'name', 'null' => true, 'percent' => 100],
            ],
            'um_user_send_emails' => [
                'um_user_send_emails' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Send Emails', 'type' => 'boolean', 'default' => 1, 'percent' => 25],
                'um_user_send_sms' => ['order' => 2, 'label_name' => 'Send SMS', 'type' => 'boolean', 'percent' => 25],
                'um_user_send_whatsapp' => ['order' => 3, 'label_name' => 'Send WhatsApp', 'type' => 'boolean', 'percent' => 25],
                'um_user_send_postal' => ['order' => 4, 'label_name' => 'Send Postal Mail', 'type' => 'boolean', 'percent' => 25],
            ],
            'um_user_email_confirmed' => [
                'um_user_email_confirmed' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Email Confirmed', 'type' => 'boolean', 'percent' => 25],
                'um_user_phone_confirmed' => ['order' => 2, 'label_name' => 'Phone Confirmed', 'type' => 'boolean', 'percent' => 25],
                'um_user_whatsapp_confirmed' => ['order' => 3, 'label_name' => 'WhatsApp Confirmed', 'type' => 'boolean', 'percent' => 25],
                'um_user_postal_confirmed' => ['order' => 4, 'label_name' => 'Postal Confirmed', 'type' => 'boolean', 'percent' => 25],
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_usrpolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_usrpolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_usrpolicy_sm_policy_code']],
                'um_usrpolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_usrpolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2_pol' => [
            'separator_2_pol' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'fa-regular fa-object-group', 'percent' => 100],
            ],
        ],
        'separator_3_pol' => [
            'separator_3_pol' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Mentions', 'icon' => 'fa-brands fa-twitch', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_usrpolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_usrpolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_usrpolgrp_sm_polgroup_id']],
                'um_usrpolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_usrpolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'demographics_container' => [
            'separator_demographics_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 50, 'label_name' => 'Dates And Ages', 'icon' => 'fa-regular fa-calendar-alt', 'percent' => 100],
            ],
            'um_usrpii_date_of_birth' => [
                'um_usrpii_date_of_birth' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Date Of Birth', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_age_in_years' => ['order' => 2, 'label_name' => 'Age In Years', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
                'um_usrpii_date_of_seniority' => ['order' => 3, 'label_name' => 'Date Of Seniority', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_seniority_in_years' => ['order' => 4, 'label_name' => 'Seniority In Years', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'um_usrpii_date_of_joining' => [
                'um_usrpii_datetime_of_joining' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Date Of Joining', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_joining_in_days' => ['order' => 2, 'label_name' => 'Joining In Days', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
                'um_usrpii_datetime_of_last_purchase' => ['order' => 3, 'label_name' => 'Datetime Of Last Purchase', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_last_purchase_in_days' => ['order' => 4, 'label_name' => 'Days Since Last Purchase', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'um_usrpii_datetime_of_last_login' => [
                'um_usrpii_datetime_of_last_login' => ['order' => 1, 'row_order' => 250, 'label_name' => 'Datetime Of Last Login', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_last_login_in_days' => ['order' => 2, 'label_name' => 'Days Since Last Login', 'domain' => 'age_counter', 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'separator_demographics_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 300, 'label_name' => 'Race / Gender / Veteran', 'icon' => 'fa-regular fa-user-circle', 'percent' => 100],
            ],
            'um_usrpii_um_usrpiigender_code' => [
                'um_usrpii_um_usrpiigender_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Gender', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIGenders', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_usrpii_um_usrpiirace_code' => ['order' => 2, 'label_name' => 'Race', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIRaces', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'um_usrpii_um_usrpiidisability_code' => [
                'um_usrpii_um_usrpiidisability_code' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Disability', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIDisability', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_usrpii_um_um_usrpiiveteran_code' => ['order' => 2, 'label_name' => 'Veteran Status', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'um_usrpii_um_usrpiisexorient_code' => [
                'um_usrpii_um_usrpiisexorient_code' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Sexual Orientation', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_usrpii_um_usrpiihighedu_code' => ['order' => 2, 'label_name' => 'Highest Education', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'um_usrpii_birth_cm_country_code' => [
                'um_usrpii_birth_cm_country_code' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Birth Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries'],
                'um_usrpii_living_cm_country_code' => ['order' => 2, 'label_name' => 'Living Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries'],
            ],
            'separator_demographics_3' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'SIN And Visa', 'icon' => 'fa-regular fa-surprise', 'percent' => 100],
            ],
            'um_usrpii_sin_number' => [
                'um_usrpii_sin_number' => ['order' => 1, 'row_order' => 900, 'label_name' => 'Social Insurance Number (SIN)', 'domain' => 'sin', 'null' => true, 'percent' => 25],
                'um_usrpii_sin_expires' => ['order' => 2, 'label_name' => 'SIN Expires', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'um_usrpii_on_visa' => ['order' => 3, 'label_name' => 'On Visa', 'type' => 'boolean', 'percent' => 25],
                'um_usrpii_vulnerable_person' => ['order' => 4, 'label_name' => 'Vulnerable Person', 'type' => 'boolean', 'percent' => 25],
            ]
        ],
        'languages_separator' => [
            'languages_separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Languages', 'icon' => 'fa-regular fa-flag', 'percent' => 100],
            ],
        ],
        'languages_container' => [
            'row1' => [
                'um_usrsplang_language_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Language Code', 'domain' => 'language_code', 'null' => true, 'required' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes', 'onchange' => 'this.form.submit();'],
                'um_usrsplang_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'um_usrsplang_listening_um_usrpiiprof_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Listening Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_usrsplang_speaking_um_usrpiiprof_code' => ['order' => 2, 'label_name' => 'Speaking Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_usrsplang_writing_um_usrpiiprof_code' => ['order' => 3, 'label_name' => 'Writing Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
            ]
        ],
        'skills_separator' => [
            'skills_separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Skills', 'icon' => 'fa-regular fa-hand-spock', 'percent' => 100],
            ],
        ],
        'skills_container' => [
            'row1' => [
                'um_usrskill_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 65],
                'um_usrskill_um_usrskillprof_code' => ['order' => 2, 'label_name' => 'Proficiency', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 15, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_usrskill_years_in_practice' => ['order' => 3, 'label_name' => 'Years In Practice', 'domain' => 'age_counter', 'null' => true, 'percent' => 15],
                'um_usrskill_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
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
            '\Numbers\Users\Users\Model\Team\Map' => [
                'name' => 'UM User Teams',
                'pk' => ['um_usrtmmap_tenant_id', 'um_usrtmmap_user_id', 'um_usrtmmap_team_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrtmmap_tenant_id', 'um_user_id' => 'um_usrtmmap_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Roles' => [
                'name' => 'UM User Roles',
                'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Organizations' => [
                'name' => 'UM User Organizations',
                'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Internalization' => [
                'name' => 'UM User Internalization',
                'pk' => ['um_usri18n_tenant_id', 'um_usri18n_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usri18n_tenant_id', 'um_user_id' => 'um_usri18n_user_id']
            ],
            '\Numbers\Users\Users\Model\User\PIIs' => [
                'name' => 'UM User Demographics',
                'pk' => ['um_usrpii_tenant_id', 'um_usrpii_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usrpii_tenant_id', 'um_user_id' => 'um_usrpii_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Languages' => [
                'name' => 'UM User Languages',
                'pk' => ['um_usrsplang_tenant_id', 'um_usrsplang_user_id', 'um_usrsplang_language_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsplang_tenant_id', 'um_user_id' => 'um_usrsplang_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Skills' => [
                'name' => 'UM User Skills',
                'pk' => ['um_usrskill_tenant_id', 'um_usrskill_user_id', 'um_usrskill_name'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrskill_tenant_id', 'um_user_id' => 'um_usrskill_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Preferences' => [
                'name' => 'UM User Preferences',
                'pk' => ['um_usrpreference_tenant_id', 'um_usrpreference_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usrpreference_tenant_id', 'um_user_id' => 'um_usrpreference_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Mentions' => [
                'name' => 'UM User Mentions',
                'pk' => ['um_usrmention_tenant_id', 'um_usrmention_user_id', 'um_usrmention_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrmention_tenant_id', 'um_user_id' => 'um_usrmention_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Notifications' => [
                'name' => 'UM User Notifications',
                'pk' => ['um_usrnoti_tenant_id', 'um_usrnoti_user_id', 'um_usrnoti_module_id', 'um_usrnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrnoti_tenant_id', 'um_user_id' => 'um_usrnoti_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Features' => [
                'name' => 'UM User Features',
                'pk' => ['um_usrfeature_tenant_id', 'um_usrfeature_user_id', 'um_usrfeature_module_id', 'um_usrfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrfeature_tenant_id', 'um_user_id' => 'um_usrfeature_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Flags' => [
                'name' => 'UM User Flags',
                'pk' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id', 'um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsysflag_tenant_id', 'um_user_id' => 'um_usrsysflag_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Permissions' => [
                'name' => 'UM User Permissions',
                'pk' => ['um_usrperm_tenant_id', 'um_usrperm_user_id', 'um_usrperm_module_id', 'um_usrperm_resource_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrperm_tenant_id', 'um_user_id' => 'um_usrperm_user_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\User\Permission\Actions' => [
                        'name' => 'UM User Permission Actions',
                        'pk' => ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_usrperm_tenant_id' => 'um_usrperaction_tenant_id', 'um_usrperm_user_id' => 'um_usrperaction_user_id', 'um_usrperm_module_id' => 'um_usrperaction_module_id', 'um_usrperm_resource_id' => 'um_usrperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\User\Permission\Subresources' => [
                        'name' => 'UM User Permission Subresources',
                        'pk' => ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_usrperm_tenant_id' => 'um_usrsubres_tenant_id', 'um_usrperm_user_id' => 'um_usrsubres_user_id', 'um_usrperm_module_id' => 'um_usrsubres_module_id', 'um_usrperm_resource_id' => 'um_usrsubres_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\User\Permission\AccessSettings' => [
                        'name' => 'UM User Permission Access Settings',
                        'pk' => ['um_usracsetting_tenant_id', 'um_usracsetting_user_id', 'um_usracsetting_module_id', 'um_usracsetting_resource_id', 'um_usracsetting_sm_rsacsertype_code', 'um_usracsetting_sm_rsacserowner_code'],
                        'type' => '1M',
                        'map' => ['um_usrperm_tenant_id' => 'um_usracsetting_tenant_id', 'um_usrperm_user_id' => 'um_usracsetting_user_id', 'um_usrperm_module_id' => 'um_usracsetting_module_id', 'um_usrperm_resource_id' => 'um_usracsetting_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\User\Permission\Modules' => [
                'name' => 'UM User Permission Modules',
                'pk' => ['um_usrprmmod_tenant_id', 'um_usrprmmod_user_id', 'um_usrprmmod_module_id', 'um_usrprmmod_action_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrprmmod_tenant_id', 'um_user_id' => 'um_usrprmmod_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Security\Answers' => [
                'name' => 'UM User Security Answers',
                'pk' => ['um_usrsecanswer_tenant_id', 'um_usrsecanswer_user_id', 'um_usrsecanswer_question_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsecanswer_tenant_id', 'um_user_id' => 'um_usrsecanswer_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\APIs' => [
                'name' => 'UM User APIs',
                'pk' => ['um_usrapi_tenant_id', 'um_usrapi_user_id', 'um_usrapi_module_id', 'um_usrapi_resource_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrapi_tenant_id', 'um_user_id' => 'um_usrapi_user_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\User\API\Methods' => [
                        'name' => 'UM User API Methods',
                        'pk' => ['um_usrapmethod_tenant_id', 'um_usrapmethod_user_id', 'um_usrapmethod_module_id', 'um_usrapmethod_resource_id', 'um_usrapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_usrapi_tenant_id' => 'um_usrapmethod_tenant_id', 'um_usrapi_user_id' => 'um_usrapmethod_user_id', 'um_usrapi_module_id' => 'um_usrapmethod_module_id', 'um_usrapi_resource_id' => 'um_usrapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\User\IntegrationMappings' => [
                'name' => 'UM User Integration Mappings',
                'pk' => ['um_usrintegmap_tenant_id', 'um_usrintegmap_user_id', 'um_usrintegmap_integtype_code', 'um_usrintegmap_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrintegmap_tenant_id', 'um_user_id' => 'um_usrintegmap_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Policy\Policies' => [
                'name' => 'UM User Policies',
                'pk' => ['um_usrpolicy_tenant_id', 'um_usrpolicy_user_id', 'um_usrpolicy_sm_policy_tenant_id', 'um_usrpolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrpolicy_tenant_id', 'um_user_id' => 'um_usrpolicy_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Policy\Groups' => [
                'name' => 'UM User Policy Groups',
                'pk' => ['um_usrpolgrp_tenant_id', 'um_usrpolgrp_user_id', 'um_usrpolgrp_sm_polgroup_tenant_id', 'um_usrpolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrpolgrp_tenant_id', 'um_user_id' => 'um_usrpolgrp_user_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Map' => [
                'name' => 'UM User Realms',
                'pk' => ['um_usrreamap_tenant_id', 'um_usrreamap_user_id', 'um_usrreamap_um_realm_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrreamap_tenant_id', 'um_user_id' => 'um_usrreamap_user_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Map' => [
                'name' => 'UM User Domains',
                'pk' => ['um_usrdommap_tenant_id', 'um_usrdommap_user_id', 'um_usrdommap_um_domain_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrdommap_tenant_id', 'um_user_id' => 'um_usrdommap_user_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Map' => [
                'name' => 'UM User Classifications',
                'pk' => ['um_usrclsmap_tenant_id', 'um_usrclsmap_user_id', 'um_usrclsmap_um_classification_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrclsmap_tenant_id', 'um_user_id' => 'um_usrclsmap_user_id']
            ],
            '\Numbers\Users\Users\Model\User\ExternalPermissions' => [
                'name' => 'UM User External Permissions',
                'pk' => ['um_usrextperm_tenant_id', 'um_usrextperm_user_id', 'um_usrextperm_um_extmdids_id', 'um_usrextperm_um_extresrc_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrextperm_tenant_id', 'um_user_id' => 'um_usrextperm_user_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\User\ExternalPermission\Actions' => [
                        'name' => 'UM User External Permission Actions',
                        'pk' => ['um_usrextpractn_tenant_id', 'um_usrextpractn_user_id', 'um_usrextpractn_um_extmdids_id', 'um_usrextpractn_um_extresrc_id', 'um_usrextpractn_method_code', 'um_usrextpractn_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_usrextperm_tenant_id' => 'um_usrextpractn_tenant_id', 'um_usrextperm_user_id' => 'um_usrextpractn_user_id', 'um_usrextperm_um_extmdids_id' => 'um_usrextpractn_um_extmdids_id', 'um_usrextperm_um_extresrc_id' => 'um_usrextpractn_um_extresrc_id'],
                    ],
                    '\Numbers\Users\Users\Model\User\ExternalPermission\Subresources' => [
                        'name' => 'UM User External Permission Subresources',
                        'pk' => ['um_usrextprsub_tenant_id', 'um_usrextprsub_user_id', 'um_usrextprsub_um_extmdids_id', 'um_usrextprsub_um_extresrc_id', 'um_usrextprsub_um_extsursrc_id', 'um_usrextprsub_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_usrextperm_tenant_id' => 'um_usrextprsub_tenant_id', 'um_usrextperm_user_id' => 'um_usrextprsub_user_id', 'um_usrextperm_um_extmdids_id' => 'um_usrextprsub_um_extmdids_id', 'um_usrextperm_um_extresrc_id' => 'um_usrextprsub_um_extresrc_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\User\ExternalPermission\Modules' => [
                'name' => 'UM User External Permission Modules',
                'pk' => ['um_usrextprmmod_tenant_id', 'um_usrextprmmod_user_id', 'um_usrextprmmod_um_extmdids_id', 'um_usrextprmmod_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrextprmmod_tenant_id', 'um_user_id' => 'um_usrextprmmod_user_id'],
            ],
        ]
    ];
    public $notification = [
        'feature_code' => 'UM::EMAIL_USERS_CHANGED'
    ];
    public $preload_models = [
        'access_setting_types' => [
            'model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes',
            'partial' => false,
        ],
        'resources' => [
            'model' => '\Numbers\Backend\System\Modules\Model\Resources',
            'partial' => true,
            'ids_from_collection' => ['\Numbers\Users\Users\Model\User\Permissions', '$key', 'um_usrperm_resource_id'],
            'pk' => ['sm_resource_id']
        ]
    ];

    public function validate(\Object\Form\Base & $form)
    {
        $users_model = new \Numbers\Users\Users\Model\Users();
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
        // login enabled
        if (!empty($form->values['um_user_login_enabled'])) {
            if (empty($form->values['um_user_email']) && empty($form->values['um_user_phone']) && empty($form->values['um_user_login_username'])) {
                $form->error('danger', 'You must provide email, phone or username!', 'um_user_email');
                $form->error('danger', 'You must provide email, phone or username!', 'um_user_phone');
                $form->error('danger', 'You must provide email, phone or username!', 'um_user_login_username');
            }
        }
        // primary organizations
        $form->validateDetailsPrimaryColumn(
            '\Numbers\Users\Users\Model\User\Organizations',
            'um_usrorg_primary',
            'um_usrorg_inactive',
            'um_usrorg_organization_id'
        );
        // primary realms
        $form->validateDetailsPrimaryColumn(
            '\Numbers\Users\Users\Model\Realm\Map',
            'um_usrreamap_primary',
            'um_usrreamap_inactive',
            'um_usrreamap_um_realm_id'
        );
        // primary domains
        $form->validateDetailsPrimaryColumn(
            '\Numbers\Users\Users\Model\Domain\Map',
            'um_usrdommap_primary',
            'um_usrdommap_inactive',
            'um_usrdommap_um_domain_id'
        );
        // password
        if (!empty($form->values['um_user_login_password_new'])) {
            if (\User::roleExists('SA')) {
                $crypt = new \Crypt();
                $form->values['um_user_login_password'] = $crypt->passwordHash($form->values['um_user_login_password_new']);
            } else {
                $form->error(DANGER, 'Only super admin can reset password!', 'um_user_login_password_new');
            }
        }
        // primary address
        if (!$form->hasErrors()) {
            if (!empty($form->values['\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses'])) {
                // primary address
                $primary_first_key = null;
                $primary_address_type = $form->validateDetailsPrimaryColumn(
                    '\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses',
                    'wg_address_primary',
                    'wg_address_inactive',
                    'wg_address_type_code',
                    $primary_first_key
                );
            }
        }
        // photo
        if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
            MassUpload::uploadOneInForm($form, $form->values['__logo_upload'], 'um_user_photo_file_id', $form->fields['__logo_upload']['options']['validator_params'] ?? []);
        }
        // email
        if (!empty($form->values['um_user_email'])) {
            // validate if its already exists
            if (!$users_model->checkUniqueConstraint('um_user_email', $users_model->pk, [
                'um_user_id' => $form->values['um_user_id'] ?? null,
                'um_user_email' => $form->values['um_user_email'],
            ])) {
                $form->error(DANGER, Messages::DUPLICATE_RECORD, 'um_user_email');
            }
        }
        // username
        if (!empty($form->values['um_user_login_username'])) {
            // validate if its already exists
            if (!$users_model->checkUniqueConstraint('um_user_login_username', $users_model->pk, [
                'um_user_id' => $form->values['um_user_id'] ?? null,
                'um_user_login_username' => $form->values['um_user_login_username'],
            ])) {
                $form->error(DANGER, Messages::DUPLICATE_RECORD, 'um_user_login_username');
            }
        }
        // numeric phone
        if (!empty($form->values['um_user_phone'])) {
            if (\Application::get('flag.form.um_users.unique_numeric_phone')) {
                $form->values['um_user_numeric_phone'] = Phone::plainNumber($form->values['um_user_phone']);
                // validate if its already exists
                if (!$users_model->checkUniqueConstraint('um_user_numeric_phone', $users_model->pk, [
                    'um_user_id' => $form->values['um_user_id'] ?? null,
                    'um_user_numeric_phone' => $form->values['um_user_numeric_phone'],
                ])) {
                    $form->error(DANGER, Messages::DUPLICATE_RECORD, 'um_user_phone');
                }
            } else {
                $form->values['um_user_numeric_phone'] = null;
            }
        } else {
            $form->values['um_user_numeric_phone'] = null;
        }
        // permissions
        foreach ($form->values['\Numbers\Users\Users\Model\User\Permissions'] ?? [] as $k => $v) {
            $acl_access_settings = $form->getPreloadModel('resources', [$v['um_usrperm_resource_id']], 'sm_resource_acl_access_settings');
            if (!empty($acl_access_settings) && empty($v['\Numbers\Users\Users\Model\User\Permission\AccessSettings'])) {
                $form->validateQuickRequired(['\Numbers\Users\Users\Model\User\Permissions', $k, '\Numbers\Users\Users\Model\User\Permission\AccessSettings', 1, 'um_usracsetting_sm_rsacsertype_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['um_user_code'])) {
            $form->values['um_user_code'] = Sequence::nextval('DEFAULT', 'USR', 'UM', \Tenant::id(), true);
            // validate if its already exists
            if (!$users_model->checkUniqueConstraint('um_user_code', $users_model->pk, [
                'um_user_id' => $form->values['um_user_id'] ?? null,
                'um_user_code' => $form->values['um_user_code'],
            ])) {
                $form->error(DANGER, Messages::DUPLICATE_RECORD, 'um_user_code');
                $form->error(DANGER, 'Trying: ' . $form->values['um_user_code'], 'um_user_code');
            }
        }
    }

    public function post(& $form)
    {
        // send password reset email
        if (!empty($form->values['um_user_login_password_new'])) {
            Notifications::sendPasswordChangeEmail($form->values['um_user_id']);
        }
        // computed fields
        $computed_fields_model = new UMUserPIIComputedFields();
        $computed_fields_model->execute([
            'um_usrpii_tenant_id' => \Tenant::id(),
            'um_usrpii_user_id' => $form->values['um_user_id'],
        ]);
    }

    public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value)
    {
        if ($field_name == 'um_usrrol_role_id') {
            $where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'] ?? [], 'um_usrorg_organization_id', ['unique' => true]);
        }
    }

    public function processDefaultValue(& $form, $key, $default, & $value, & $neighbouring_values, $changed_field = [], $options = [])
    {

    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_usrassign_child_user_id' || $options['options']['field_name'] == 'um_usrassign_parent_user_id') {
            if (empty($neighbouring_values['um_usrassign_multiple'])) {
                $options['options']['method'] = 'select';
            }
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_usracsetting_sm_rsacserowner_code') {
            if (!empty($neighbouring_values['um_usracsetting_sm_rsacsertype_code'])) {
                $options['options']['options_model'] = $form->getPreloadModel('access_setting_types', [$neighbouring_values['um_usracsetting_sm_rsacsertype_code']], 'sm_rsacsertype_model');
            }
        }
    }

    public function owners(& $form)
    {
        return [
            'organization_id' => array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'] ?? [], 'um_usrorg_organization_id'),
        ];
    }

    public function renderUserToUser(& $form)
    {
        if (!empty($form->values['um_user_id'])) {
            return UserToUser::renderList($form->values['um_user_id']);
        }
    }

    public function renderUserToCustomer(& $form)
    {
        if (!empty($form->values['um_user_id'])) {
            return UserToCustomer::renderList($form->values['um_user_id']);
        }
    }

    public function renderChannels(& $form)
    {
        if (!empty($form->values['um_user_id'])) {
            return UserToChannels::renderList(
                $form->values['um_user_id'],
                array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'] ?? [], 'um_usrorg_organization_id'),
                array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Roles'] ?? [], 'um_usrrol_role_id'),
                array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\Team\Map'] ?? [], 'um_usrtmmap_team_id'),
                $form->values['\Numbers\Users\Users\Model\User\Group\Map'] ?? [],
            );
        }
    }

    public function renderBecome(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_user_id']) && \User::roleExists('SA') && \User::id() != $form->values['um_user_id'] && !empty($form->values['um_user_login_enabled']) && \Can::userFeatureExists('UM::USER_BECOME')) {
            return \HTML::a([
                'href' => LoginWithToken::URL($form->values['um_user_id']),
                'value' => i18n(null, 'Become'),
            ]);
        } else {
            return '';
        }
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_user_name'])) {
            return Colors::renderAvatar($form->values['um_user_name'], 'user', false) . ' ' . Colors::renderAvatar($form->values['um_user_name'], 'user', true);
        } else {
            return '';
        }
    }

    public function renderNewPasswordMethodRenderer(& $form, & $options, & $value, & $neighbouring_values)
    {
        $id = $options['options']['id'];
        $result = [
            'left' => loc('NF.Form.Password', 'Password'),
            'value' => $value,
            'right' => [],
        ];
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.View', 'View'), 'onclick' => "$('#" . $id . "').attr('type', 'input');"]);
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.Copy', 'Copy'), 'onclick' => "Numbers.Form.copyToClipboard($('#" . $id . "').val());"]);
        return \HTML::inputGroup($result);
    }

    public function renderMFAMethodRenderer(& $form, & $options, & $value, & $neighbouring_values)
    {
        $id = $options['options']['id'];
        $result = [
            'left' => loc('NF.Form.MFA', 'MFA'),
            'value' => $value,
            'right' => [],
        ];
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.View', 'View'), 'onclick' => "$('#" . $id . "').attr('type', 'input');"]);
        $result['right'][] = \HTML::a(['href' => 'javascript:void(0);', 'value' => loc('NF.Form.Copy', 'Copy'), 'onclick' => "Numbers.Form.copyToClipboard($('#" . $id . "').val());"]);
        return \HTML::inputGroup($result);
    }
}
