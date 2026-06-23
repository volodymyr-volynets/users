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

class Realms extends Base
{
    public $form_link = 'um_realms';
    public $module_code = 'UM';
    public $title = 'U/M Realms Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Realm\Organizations',
            'details_pk' => ['um_reaorg_organization_id'],
            'order' => 35000
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Permissions',
            'details_pk' => ['um_reaperm_module_id', 'um_reaperm_resource_id'],
            'order' => 35000
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Realm\Permission\Actions',
            'details_pk' => ['um_reaperaction_method_code', 'um_reaperaction_action_id'],
            'order' => 1000,
            'required' => true
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Realm\Permission\Subresources',
            'details_pk' => ['um_reasubres_rsrsubres_id', 'um_reasubres_action_id'],
            'order' => 2000,
            'required' => false
        ],
        'permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Permission\Modules',
            'details_pk' => ['um_reaprmmod_module_id', 'um_reaprmmod_action_id'],
            'order' => 35000,
        ],
        'permission_access_settings_container' => [
            'type' => 'subdetails',
            'label_name' => 'Access Settings',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Realm\Permission\AccessSettings',
            'details_pk' => ['um_reaacsetting_sm_rsacsertype_code', 'um_reaacsetting_sm_rsacserowner_code'],
            'order' => 35000,
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\APIs',
            'details_pk' => ['um_reaapi_module_id', 'um_reaapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\APIs',
            'details_key' => '\Numbers\Users\Users\Model\Realm\API\Methods',
            'details_pk' => ['um_reaapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Notifications',
            'details_pk' => ['um_reanoti_module_id', 'um_reanoti_feature_code'],
            'order' => 35000
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Features',
            'details_pk' => ['um_reafeature_module_id', 'um_reafeature_feature_code'],
            'order' => 35000
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Flags',
            'details_pk' => ['um_reasysflag_module_id', 'um_reasysflag_sysflag_id', 'um_reasysflag_action_id'],
            'order' => 35000,
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Policy\Policies',
            'details_pk' => ['um_reapolicy_sm_policy_tenant_id', 'um_reapolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Policy\Groups',
            'details_pk' => ['um_reapolgrp_sm_polgroup_tenant_id', 'um_reapolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
        'external_permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermissions',
            'details_pk' => ['um_reaextperm_um_extmdids_id', 'um_reaextperm_um_extresrc_id'],
            'order' => 35000
        ],
        'external_permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermission\Actions',
            'details_pk' => ['um_reaextpractn_method_code', 'um_reaextpractn_um_extactn_id'],
            'order' => 1000,
            'required' => true
        ],
        'external_permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermission\Subresources',
            'details_pk' => ['um_reaextprsub_um_extsursrc_id', 'um_reaextprsub_um_extactn_id'],
            'order' => 2000,
            'required' => false
        ],
        'external_permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\ExternalPermission\Modules',
            'details_pk' => ['um_reaextprmmod_um_extmdids_id', 'um_reaextprmmod_um_extactn_id'],
            'order' => 35000,
        ],
        'parents_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Realm\Children',
            'details_pk' => ['um_rearea_parent_um_realm_id'],
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
            'um_realm_id' => [
                'um_realm_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Realm #', 'domain' => 'realm_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_realm_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'um_realm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_realm_name' => [
                'um_realm_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => true],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
            ],
            'um_realm_icon' => [
                'um_realm_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_realm_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 45],
                'um_realm_global' => ['order' => 3, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
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
                'um_reaorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_reaorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'parents_container' => [
            'row1' => [
                'um_rearea_parent_um_realm_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Realm', 'domain' => 'realm_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Realms::optionsActive', 'options_params' => ['um_realm_global' => 1], 'onchange' => 'this.form.submit();'],
                'um_rearea_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_reaperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reaperm_module_id', 'resource_id' => 'um_reaperm_resource_id']],
                'um_reaperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reaperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_reaperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_reaperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_reaperaction_action_id', 'method_code' => 'um_reaperaction_method_code']],
                'um_reaperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_reaperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_reasubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_reaperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reasubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_reasubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reasubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'permission_modules_separator_container' => [
            'permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Internal Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'permission_modules_container' => [
            'row1' => [
                'um_reaprmmod_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_reaprmmod_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_reaprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reaprmmod_module_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_access_settings_container' => [
            'row1' => [
                'um_reaacsetting_sm_rsacsertype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes', 'onchange' => 'this.form.submit();'],
                'um_reaacsetting_sm_rsacserowner_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => null, 'placeholder' => 'Please choose', 'onchange' => 'this.form.submit();'],
                'um_reaacsetting_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'external_permissions_container' => [
            'row1' => [
                'um_reaextperm_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResources::optionsJson', 'options_params' => ['um_extresrc_acl_permission' => 1, 'um_extresrc_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reaextperm_um_extmdids_id', 'resource_id' => 'um_reaextperm_um_extresrc_id']],
                'um_reaextperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reaextperm_um_extmdids_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_actions_container' => [
            'row1' => [
                'um_reaextpractn_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResourceMap::optionsJson', 'options_depends' => ['um_extresmap_um_extresrc_id' => 'detail::um_reaextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_reaextpractn_um_extactn_id', 'method_code' => 'um_reaextpractn_method_code']],
                'um_reaextpractn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_reaextpractn_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_subresources_container' => [
            'row1' => [
                'um_reaextprsub_um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresources::optionsGrouped', 'options_depends' => ['um_extresrc_id' => 'detail::um_reaextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reaextprsub_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresourceActions::optionsGrouped', 'options_depends' => ['um_extsursrc_id' => 'um_reaextprsub_um_extsursrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reaextprsub_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'external_permission_modules_separator_container' => [
            'external_permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'External Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'external_permission_modules_container' => [
            'row1' => [
                'um_reaextprmmod_um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs', 'onchange' => 'this.form.submit();'],
                'um_reaextprmmod_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_reaextprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reaextprmmod_um_extmdl_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'apis_container' => [
            'row1' => [
                'um_reaapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reaapi_module_id', 'resource_id' => 'um_reaapi_resource_id']],
                'um_reaapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reaapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_reaapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_reaapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reaapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_reanoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reanoti_module_id', 'feature_code' => 'um_reanoti_feature_code']],
                'um_reanoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reanoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_reafeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reafeature_module_id', 'feature_code' => 'um_reafeature_feature_code']],
                'um_reafeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reafeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_reasysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_reasysflag_module_id', 'sysflag_id' => 'um_reasysflag_sysflag_id']],
                'um_reasysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_reasysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_reasysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_reasysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_reapolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_reapolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_reapolicy_sm_policy_code']],
                'um_reapolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_reapolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'fa-regular fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_reapolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_reapolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_reapolgrp_sm_polgroup_id']],
                'um_reapolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_reapolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Realms',
        'model' => '\Numbers\Users\Users\Model\Realms',
        'details' => [
            '\Numbers\Users\Users\Model\Realm\Organizations' => [
                'name' => 'UM Realm Organizations',
                'pk' => ['um_reaorg_tenant_id', 'um_reaorg_um_realm_id', 'um_reaorg_organization_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaorg_tenant_id', 'um_realm_id' => 'um_reaorg_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Children' => [
                'name' => 'UM Realm Children',
                'pk' => ['um_rearea_tenant_id', 'um_rearea_parent_um_realm_id', 'um_rearea_child_um_realm_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_rearea_tenant_id', 'um_realm_id' => 'um_rearea_child_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Permissions' => [
                'name' => 'UM Realm Permissions',
                'pk' => ['um_reaperm_tenant_id', 'um_reaperm_um_realm_id', 'um_reaperm_module_id', 'um_reaperm_resource_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaperm_tenant_id', 'um_realm_id' => 'um_reaperm_um_realm_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Realm\Permission\Actions' => [
                        'name' => 'UM Realm Permission Actions',
                        'pk' => ['um_reaperaction_tenant_id', 'um_reaperaction_um_realm_id', 'um_reaperaction_module_id', 'um_reaperaction_resource_id', 'um_reaperaction_method_code', 'um_reaperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_reaperm_tenant_id' => 'um_reaperaction_tenant_id', 'um_reaperm_um_realm_id' => 'um_reaperaction_um_realm_id', 'um_reaperm_module_id' => 'um_reaperaction_module_id', 'um_reaperm_resource_id' => 'um_reaperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Realm\Permission\Subresources' => [
                        'name' => 'UM Realm Permission Subresources',
                        'pk' => ['um_reasubres_tenant_id', 'um_reasubres_um_realm_id', 'um_reasubres_module_id', 'um_reasubres_resource_id', 'um_reasubres_rsrsubres_id', 'um_reasubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_reaperm_tenant_id' => 'um_reasubres_tenant_id', 'um_reaperm_um_realm_id' => 'um_reasubres_um_realm_id', 'um_reaperm_module_id' => 'um_reasubres_module_id', 'um_reaperm_resource_id' => 'um_reasubres_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Realm\Permission\AccessSettings' => [
                        'name' => 'UM Realm Permission Access Settings',
                        'pk' => ['um_reaacsetting_tenant_id', 'um_reaacsetting_um_realm_id', 'um_reaacsetting_module_id', 'um_reaacsetting_resource_id', 'um_reaacsetting_sm_rsacsertype_code', 'um_reaacsetting_sm_rsacserowner_code'],
                        'type' => '1M',
                        'map' => ['um_reaperm_tenant_id' => 'um_reaacsetting_tenant_id', 'um_reaperm_um_realm_id' => 'um_reaacsetting_um_realm_id', 'um_reaperm_module_id' => 'um_reaacsetting_module_id', 'um_reaperm_resource_id' => 'um_reaacsetting_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Realm\Permission\Modules' => [
                'name' => 'UM Realm Permission Modules',
                'pk' => ['um_reaprmmod_tenant_id', 'um_reaprmmod_um_realm_id', 'um_reaprmmod_module_id', 'um_reaprmmod_action_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaprmmod_tenant_id', 'um_realm_id' => 'um_reaprmmod_um_realm_id'],
            ],
            '\Numbers\Users\Users\Model\Realm\APIs' => [
                'name' => 'UM Realm APIs',
                'pk' => ['um_reaapi_tenant_id', 'um_reaapi_um_realm_id', 'um_reaapi_module_id', 'um_reaapi_resource_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaapi_tenant_id', 'um_realm_id' => 'um_reaapi_um_realm_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Realm\API\Methods' => [
                        'name' => 'UM Realm API Methods',
                        'pk' => ['um_reaapmethod_tenant_id', 'um_reaapmethod_um_realm_id', 'um_reaapmethod_module_id', 'um_reaapmethod_resource_id', 'um_reaapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_reaapi_tenant_id' => 'um_reaapmethod_tenant_id', 'um_reaapi_um_realm_id' => 'um_reaapmethod_um_realm_id', 'um_reaapi_module_id' => 'um_reaapmethod_module_id', 'um_reaapi_resource_id' => 'um_reaapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Realm\Notifications' => [
                'name' => 'UM Realm Notifications',
                'pk' => ['um_reanoti_tenant_id', 'um_reanoti_um_realm_id', 'um_reanoti_module_id', 'um_reanoti_feature_code'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reanoti_tenant_id', 'um_realm_id' => 'um_reanoti_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Features' => [
                'name' => 'UM Realm Features',
                'pk' => ['um_reafeature_tenant_id', 'um_reafeature_um_realm_id', 'um_reafeature_module_id', 'um_reafeature_feature_code'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reafeature_tenant_id', 'um_realm_id' => 'um_reafeature_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Flags' => [
                'name' => 'UM Realm Flags',
                'pk' => ['um_reasysflag_tenant_id', 'um_reasysflag_um_realm_id', 'um_reasysflag_module_id', 'um_reasysflag_sysflag_id', 'um_reasysflag_action_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reasysflag_tenant_id', 'um_realm_id' => 'um_reasysflag_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Policy\Policies' => [
                'name' => 'UM Realm Policies',
                'pk' => ['um_reapolicy_tenant_id', 'um_reapolicy_um_realm_id', 'um_reapolicy_sm_policy_tenant_id', 'um_reapolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reapolicy_tenant_id', 'um_realm_id' => 'um_reapolicy_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\Policy\Groups' => [
                'name' => 'UM Realm Policy Groups',
                'pk' => ['um_reapolgrp_tenant_id', 'um_reapolgrp_um_realm_id', 'um_reapolgrp_sm_polgroup_tenant_id', 'um_reapolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reapolgrp_tenant_id', 'um_realm_id' => 'um_reapolgrp_um_realm_id']
            ],
            '\Numbers\Users\Users\Model\Realm\ExternalPermissions' => [
                'name' => 'UM Realm External Permissions',
                'pk' => ['um_reaextperm_tenant_id', 'um_reaextperm_um_realm_id', 'um_reaextperm_um_extmdids_id', 'um_reaextperm_um_extresrc_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaextperm_tenant_id', 'um_realm_id' => 'um_reaextperm_um_realm_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Realm\ExternalPermission\Actions' => [
                        'name' => 'UM Realm External Permission Actions',
                        'pk' => ['um_reaextpractn_tenant_id', 'um_reaextpractn_um_realm_id', 'um_reaextpractn_um_extmdids_id', 'um_reaextpractn_um_extresrc_id', 'um_reaextpractn_method_code', 'um_reaextpractn_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_reaextperm_tenant_id' => 'um_reaextpractn_tenant_id', 'um_reaextperm_um_realm_id' => 'um_reaextpractn_um_realm_id', 'um_reaextperm_um_extmdids_id' => 'um_reaextpractn_um_extmdids_id', 'um_reaextperm_um_extresrc_id' => 'um_reaextpractn_um_extresrc_id'],
                    ],
                    '\Numbers\Users\Users\Model\Realm\ExternalPermission\Subresources' => [
                        'name' => 'UM TeRealmam External Permission Subresources',
                        'pk' => ['um_reaextprsub_tenant_id', 'um_reaextprsub_um_realm_id', 'um_reaextprsub_um_extmdids_id', 'um_reaextprsub_um_extresrc_id', 'um_reaextprsub_um_extsursrc_id', 'um_reaextprsub_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_reaextperm_tenant_id' => 'um_reaextprsub_tenant_id', 'um_reaextperm_um_realm_id' => 'um_reaextprsub_um_realm_id', 'um_reaextperm_um_extmdids_id' => 'um_reaextprsub_um_extmdids_id', 'um_reaextperm_um_extresrc_id' => 'um_reaextprsub_um_extresrc_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Realm\ExternalPermission\Modules' => [
                'name' => 'UM Realm External Permission Modules',
                'pk' => ['um_reaextprmmod_tenant_id', 'um_reaextprmmod_um_realm_id', 'um_reaextprmmod_um_extmdids_id', 'um_reaextprmmod_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_realm_tenant_id' => 'um_reaextprmmod_tenant_id', 'um_realm_id' => 'um_reaextprmmod_um_realm_id'],
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
            'ids_from_collection' => ['\Numbers\Users\Users\Model\Realm\Permissions', '$key', 'um_reaperm_resource_id'],
            'pk' => ['sm_resource_id']
        ]
    ];

    public function validate(& $form)
    {
        // permissions
        foreach ($form->values['\Numbers\Users\Users\Model\Realm\Permissions'] ?? [] as $k => $v) {
            $acl_access_settings = $form->getPreloadModel('resources', [$v['um_reaperm_resource_id']], 'sm_resource_acl_access_settings');
            if (!empty($acl_access_settings) && empty($v['\Numbers\Users\Users\Model\Realm\Permission\AccessSettings'])) {
                $form->validateQuickRequired(['\Numbers\Users\Users\Model\Realm\Permissions', $k, '\Numbers\Users\Users\Model\Realm\Permission\AccessSettings', 1, 'um_reaacsetting_sm_rsacsertype_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['um_realm_code'])) {
            $form->values['um_realm_code'] = Sequence::nextval('DEFAULT', 'REA', 'UM', \Tenant::id(), true);
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_reaacsetting_sm_rsacserowner_code') {
            if (!empty($neighbouring_values['um_reaacsetting_sm_rsacsertype_code'])) {
                $options['options']['options_model'] = $form->getPreloadModel('access_setting_types', [$neighbouring_values['um_reaacsetting_sm_rsacsertype_code']], 'sm_rsacsertype_model');
            }
        }
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_realm_name'])) {
            return Colors::renderAvatar($form->values['um_realm_name'], 'realm', false) . ' ' . Colors::renderAvatar($form->values['um_realm_name'], 'realm', true);
        } else {
            return '';
        }
    }
}
