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

use Object\Form\Wrapper\Base;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;
use Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes;

class Teams extends Base
{
    public $form_link = 'um_teams';
    public $module_code = 'UM';
    public $title = 'U/M Teams Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Organizations',
            'details_pk' => ['um_temorg_organization_id'],
            'order' => 35000
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Permissions',
            'details_pk' => ['um_temperm_module_id', 'um_temperm_resource_id'],
            'order' => 35000
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Team\Permission\Actions',
            'details_pk' => ['um_temperaction_method_code', 'um_temperaction_action_id'],
            'order' => 1000,
            'required' => true
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Team\Permission\Subresources',
            'details_pk' => ['um_temsubres_rsrsubres_id', 'um_temsubres_action_id'],
            'order' => 2000,
            'required' => false
        ],
        'permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Permission\Modules',
            'details_pk' => ['um_temprmmod_module_id', 'um_temprmmod_action_id'],
            'order' => 35000,
        ],
        'permission_access_settings_container' => [
            'type' => 'subdetails',
            'label_name' => 'Access Settings',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Team\Permission\AccessSettings',
            'details_pk' => ['um_temacsetting_sm_rsacsertype_code', 'um_temacsetting_sm_rsacserowner_code'],
            'order' => 35000,
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\APIs',
            'details_pk' => ['um_temapi_module_id', 'um_temapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\APIs',
            'details_key' => '\Numbers\Users\Users\Model\Team\API\Methods',
            'details_pk' => ['um_temapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Notifications',
            'details_pk' => ['um_temnoti_module_id', 'um_temnoti_feature_code'],
            'order' => 35000
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Features',
            'details_pk' => ['um_temfeature_module_id', 'um_temfeature_feature_code'],
            'order' => 35000
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Flags',
            'details_pk' => ['um_temsysflag_module_id', 'um_temsysflag_sysflag_id', 'um_temsysflag_action_id'],
            'order' => 35000,
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Policy\Policies',
            'details_pk' => ['um_tempolicy_sm_policy_tenant_id', 'um_tempolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Policy\Groups',
            'details_pk' => ['um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
        'external_permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\ExternalPermissions',
            'details_pk' => ['um_temextperm_um_extmdids_id', 'um_temextperm_um_extresrc_id'],
            'order' => 35000
        ],
        'external_permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Team\ExternalPermission\Actions',
            'details_pk' => ['um_temextpractn_method_code', 'um_temextpractn_um_extactn_id'],
            'order' => 1000,
            'required' => true
        ],
        'external_permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Team\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Team\ExternalPermission\Subresources',
            'details_pk' => ['um_temextprsub_um_extsursrc_id', 'um_temextprsub_um_extactn_id'],
            'order' => 2000,
            'required' => false
        ],
        'external_permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\ExternalPermission\Modules',
            'details_pk' => ['um_temextprmmod_um_extmdids_id', 'um_temextprmmod_um_extactn_id'],
            'order' => 35000,
        ],
        'parents_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Team\Children',
            'details_pk' => ['um_temtem_parent_team_id'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
            'permissions' => ['order' => 300, 'label_name' => 'Internal Permissions'],
            'external_permissions' => ['order' => 310, 'label_name' => 'External Permissions'],
            'parents' => ['order' => 315, 'label_name' => 'Inherit'],
            'apis' => ['order' => 350, 'label_name' => 'API(s)'],
            'notifications' => ['order' => 400, 'label_name' => 'Notifications'],
            'features' => ['order' => 450, 'label_name' => 'Features'],
            'flags' => ['order' => 500, 'label_name' => 'Flags'],
            'policies' => ['order' => 600, 'label_name' => 'Policies'],
        ]
    ];
    public $elements = [
        'top' => [
            'um_team_id' => [
                'um_team_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team #', 'domain' => 'team_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_team_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'um_team_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_team_name' => [
                'um_team_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => true],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
            ],
            'um_team_icon' => [
                'um_team_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_team_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 45],
                'um_team_global' => ['order' => 3, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'tabs' => [
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
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
            'parents' => [
                'parents' => ['container' => 'parents_container', 'order' => 100],
            ],
            'notifications' => [
                'notifications' => ['container' => 'notifications_container', 'order' => 100],
            ],
            'apis' => [
                'apis' => ['container' => 'apis_container', 'order' => 100],
            ],
            'features' => [
                'features' => ['container' => 'features_container', 'order' => 100],
            ],
            'flags' => [
                'flags' => ['container' => 'flags_container', 'order' => 100],
            ],
            'policies' => [
                'policies' => ['container' => 'policy_container', 'order' => 100],
                'separator_2' => ['container' => 'separator_2', 'order' => 150],
                'policy_groups' => ['container' => 'policy_group_container', 'order' => 200],
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_temorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_temorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'parents_container' => [
            'row1' => [
                'um_temtem_parent_team_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team', 'domain' => 'team_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Teams::optionsActive', 'options_params' => ['um_team_global' => 1], 'onchange' => 'this.form.submit();'],
                'um_temtem_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_temperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temperm_module_id', 'resource_id' => 'um_temperm_resource_id']],
                'um_temperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_temperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_temperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_temperaction_action_id', 'method_code' => 'um_temperaction_method_code']],
                'um_temperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_temperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_temsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_temperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_temsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'permission_modules_separator_container' => [
            'permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Internal Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'permission_modules_container' => [
            'row1' => [
                'um_temprmmod_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_temprmmod_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_temprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temprmmod_module_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_access_settings_container' => [
            'row1' => [
                'um_temacsetting_sm_rsacsertype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes', 'onchange' => 'this.form.submit();'],
                'um_temacsetting_sm_rsacserowner_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => null, 'placeholder' => 'Please choose', 'onchange' => 'this.form.submit();'],
                'um_temacsetting_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'external_permissions_container' => [
            'row1' => [
                'um_temextperm_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResources::optionsJson', 'options_params' => ['um_extresrc_acl_permission' => 1, 'um_extresrc_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temextperm_um_extmdids_id', 'resource_id' => 'um_temextperm_um_extresrc_id']],
                'um_temextperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temextperm_um_extmdids_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_actions_container' => [
            'row1' => [
                'um_temextpractn_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResourceMap::optionsJson', 'options_depends' => ['um_extresmap_um_extresrc_id' => 'detail::um_temextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_temextpractn_um_extactn_id', 'method_code' => 'um_temextpractn_method_code']],
                'um_temextpractn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_temextpractn_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_subresources_container' => [
            'row1' => [
                'um_temextprsub_um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresources::optionsGrouped', 'options_depends' => ['um_extresrc_id' => 'detail::um_temextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temextprsub_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresourceActions::optionsGrouped', 'options_depends' => ['um_extsursrc_id' => 'um_temextprsub_um_extsursrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temextprsub_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'external_permission_modules_separator_container' => [
            'external_permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'External Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'external_permission_modules_container' => [
            'row1' => [
                'um_temextprmmod_um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs', 'onchange' => 'this.form.submit();'],
                'um_temextprmmod_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_temextprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temextprmmod_um_extmdl_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'apis_container' => [
            'row1' => [
                'um_temapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temapi_module_id', 'resource_id' => 'um_temapi_resource_id']],
                'um_temapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_temapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_temapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_temnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temnoti_module_id', 'feature_code' => 'um_temnoti_feature_code']],
                'um_temnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_temfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temfeature_module_id', 'feature_code' => 'um_temfeature_feature_code']],
                'um_temfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_temsysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_temsysflag_module_id', 'sysflag_id' => 'um_temsysflag_sysflag_id']],
                'um_temsysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_temsysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_temsysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_temsysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_tempolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_tempolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_tempolicy_sm_policy_code']],
                'um_tempolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_tempolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'fa-regular fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_tempolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_tempolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_tempolgrp_sm_polgroup_id']],
                'um_tempolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_tempolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Teams',
        'model' => '\Numbers\Users\Users\Model\Teams',
        'details' => [
            '\Numbers\Users\Users\Model\Team\Organizations' => [
                'name' => 'UM Team Organizations',
                'pk' => ['um_temorg_tenant_id', 'um_temorg_team_id', 'um_temorg_organization_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temorg_tenant_id', 'um_team_id' => 'um_temorg_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Children' => [
                'name' => 'UM Team Children',
                'pk' => ['um_temtem_tenant_id', 'um_temtem_parent_team_id', 'um_temtem_child_team_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temtem_tenant_id', 'um_team_id' => 'um_temtem_child_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Permissions' => [
                'name' => 'UM Team Permissions',
                'pk' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temperm_tenant_id', 'um_team_id' => 'um_temperm_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\Permission\Actions' => [
                        'name' => 'UM Team Permission Actions',
                        'pk' => ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temperaction_tenant_id', 'um_temperm_team_id' => 'um_temperaction_team_id', 'um_temperm_module_id' => 'um_temperaction_module_id', 'um_temperm_resource_id' => 'um_temperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Team\Permission\Subresources' => [
                        'name' => 'UM Team Permission Subresources',
                        'pk' => ['um_temsubres_tenant_id', 'um_temsubres_team_id', 'um_temsubres_module_id', 'um_temsubres_resource_id', 'um_temsubres_rsrsubres_id', 'um_temsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temsubres_tenant_id', 'um_temperm_team_id' => 'um_temsubres_team_id', 'um_temperm_module_id' => 'um_temsubres_module_id', 'um_temperm_resource_id' => 'um_temsubres_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Team\Permission\AccessSettings' => [
                        'name' => 'UM Team Permission Access Settings',
                        'pk' => ['um_temacsetting_tenant_id', 'um_temacsetting_team_id', 'um_temacsetting_module_id', 'um_temacsetting_resource_id', 'um_temacsetting_sm_rsacsertype_code', 'um_temacsetting_sm_rsacserowner_code'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temacsetting_tenant_id', 'um_temperm_team_id' => 'um_temacsetting_team_id', 'um_temperm_module_id' => 'um_temacsetting_module_id', 'um_temperm_resource_id' => 'um_temacsetting_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\Permission\Modules' => [
                'name' => 'UM Team Permission Modules',
                'pk' => ['um_temprmmod_tenant_id', 'um_temprmmod_team_id', 'um_temprmmod_module_id', 'um_temprmmod_action_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temprmmod_tenant_id', 'um_team_id' => 'um_temprmmod_team_id'],
            ],
            '\Numbers\Users\Users\Model\Team\APIs' => [
                'name' => 'UM Team APIs',
                'pk' => ['um_temapi_tenant_id', 'um_temapi_team_id', 'um_temapi_module_id', 'um_temapi_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temapi_tenant_id', 'um_team_id' => 'um_temapi_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\API\Methods' => [
                        'name' => 'UM Team API Methods',
                        'pk' => ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id', 'um_temapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_temapi_tenant_id' => 'um_temapmethod_tenant_id', 'um_temapi_team_id' => 'um_temapmethod_team_id', 'um_temapi_module_id' => 'um_temapmethod_module_id', 'um_temapi_resource_id' => 'um_temapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\Notifications' => [
                'name' => 'UM Team Notifications',
                'pk' => ['um_temnoti_tenant_id', 'um_temnoti_team_id', 'um_temnoti_module_id', 'um_temnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temnoti_tenant_id', 'um_team_id' => 'um_temnoti_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Features' => [
                'name' => 'UM Team Features',
                'pk' => ['um_temfeature_tenant_id', 'um_temfeature_team_id', 'um_temfeature_module_id', 'um_temfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temfeature_tenant_id', 'um_team_id' => 'um_temfeature_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Flags' => [
                'name' => 'UM Team Flags',
                'pk' => ['um_temsysflag_tenant_id', 'um_temsysflag_team_id', 'um_temsysflag_module_id', 'um_temsysflag_sysflag_id', 'um_temsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temsysflag_tenant_id', 'um_team_id' => 'um_temsysflag_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Policy\Policies' => [
                'name' => 'UM Team Policies',
                'pk' => ['um_tempolicy_tenant_id', 'um_tempolicy_team_id', 'um_tempolicy_sm_policy_tenant_id', 'um_tempolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_tempolicy_tenant_id', 'um_team_id' => 'um_tempolicy_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Policy\Groups' => [
                'name' => 'UM Team Policy Groups',
                'pk' => ['um_tempolgrp_tenant_id', 'um_tempolgrp_team_id', 'um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_tempolgrp_tenant_id', 'um_team_id' => 'um_tempolgrp_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\ExternalPermissions' => [
                'name' => 'UM Team External Permissions',
                'pk' => ['um_temextperm_tenant_id', 'um_temextperm_team_id', 'um_temextperm_um_extmdids_id', 'um_temextperm_um_extresrc_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temextperm_tenant_id', 'um_team_id' => 'um_temextperm_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\ExternalPermission\Actions' => [
                        'name' => 'UM Team External Permission Actions',
                        'pk' => ['um_temextpractn_tenant_id', 'um_temextpractn_team_id', 'um_temextpractn_um_extmdids_id', 'um_temextpractn_um_extresrc_id', 'um_temextpractn_method_code', 'um_temextpractn_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_temextperm_tenant_id' => 'um_temextpractn_tenant_id', 'um_temextperm_team_id' => 'um_temextpractn_team_id', 'um_temextperm_um_extmdids_id' => 'um_temextpractn_um_extmdids_id', 'um_temextperm_um_extresrc_id' => 'um_temextpractn_um_extresrc_id'],
                    ],
                    '\Numbers\Users\Users\Model\Team\ExternalPermission\Subresources' => [
                        'name' => 'UM Team External Permission Subresources',
                        'pk' => ['um_temextprsub_tenant_id', 'um_temextprsub_team_id', 'um_temextprsub_um_extmdids_id', 'um_temextprsub_um_extresrc_id', 'um_temextprsub_um_extsursrc_id', 'um_temextprsub_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_temextperm_tenant_id' => 'um_temextprsub_tenant_id', 'um_temextperm_team_id' => 'um_temextprsub_team_id', 'um_temextperm_um_extmdids_id' => 'um_temextprsub_um_extmdids_id', 'um_temextperm_um_extresrc_id' => 'um_temextprsub_um_extresrc_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\ExternalPermission\Modules' => [
                'name' => 'UM Team External Permission Modules',
                'pk' => ['um_temextprmmod_tenant_id', 'um_temextprmmod_team_id', 'um_temextprmmod_um_extmdids_id', 'um_temextprmmod_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temextprmmod_tenant_id', 'um_team_id' => 'um_temextprmmod_team_id'],
            ],
        ]
    ];
    public $preload_models = [
        'access_setting_types' => [
            'model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes',
            'partial' => false,
        ],
        'resources' => [
            'model' => '\Numbers\Backend\System\Modules\Model\Resources',
            'partial' => true,
            'ids_from_collection' => ['\Numbers\Users\Users\Model\Team\Permissions', '$key', 'um_temperm_resource_id'],
            'pk' => ['sm_resource_id']
        ]
    ];

    public function validate(& $form)
    {
        // permissions
        foreach ($form->values['\Numbers\Users\Users\Model\Team\Permissions'] ?? [] as $k => $v) {
            $acl_access_settings = $form->getPreloadModel('resources', [$v['um_temperm_resource_id']], 'sm_resource_acl_access_settings');
            if (!empty($acl_access_settings) && empty($v['\Numbers\Users\Users\Model\Team\Permission\AccessSettings'])) {
                $form->validateQuickRequired(['\Numbers\Users\Users\Model\Team\Permissions', $k, '\Numbers\Users\Users\Model\Team\Permission\AccessSettings', 1, 'um_temacsetting_sm_rsacsertype_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['um_team_code'])) {
            $form->values['um_team_code'] = Sequence::nextval('DEFAULT', 'TEA', 'UM', \Tenant::id(), true);
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_temacsetting_sm_rsacserowner_code') {
            if (!empty($neighbouring_values['um_temacsetting_sm_rsacsertype_code'])) {
                $options['options']['options_model'] = $form->getPreloadModel('access_setting_types', [$neighbouring_values['um_temacsetting_sm_rsacsertype_code']], 'sm_rsacsertype_model');
            }
        }
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_team_name'])) {
            return Colors::renderAvatar($form->values['um_team_name'], 'team', false) . ' ' . Colors::renderAvatar($form->values['um_team_name'], 'team', true);
        } else {
            return '';
        }
    }
}
