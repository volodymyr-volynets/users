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

class Classifications extends Base
{
    public $form_link = 'um_classifications';
    public $module_code = 'UM';
    public $title = 'U/M Classifications Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Classification\Organizations',
            'details_pk' => ['um_clsorg_organization_id'],
            'order' => 35000
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Permissions',
            'details_pk' => ['um_clsperm_module_id', 'um_clsperm_resource_id'],
            'order' => 35000
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Classification\Permission\Actions',
            'details_pk' => ['um_clsperaction_method_code', 'um_clsperaction_action_id'],
            'order' => 1000,
            'required' => true
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Classification\Permission\Subresources',
            'details_pk' => ['um_clssubres_rsrsubres_id', 'um_clssubres_action_id'],
            'order' => 2000,
            'required' => false
        ],
        'permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Permission\Modules',
            'details_pk' => ['um_clsprmmod_module_id', 'um_clsprmmod_action_id'],
            'order' => 35000,
        ],
        'permission_access_settings_container' => [
            'type' => 'subdetails',
            'label_name' => 'Access Settings',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Classification\Permission\AccessSettings',
            'details_pk' => ['um_clsacsetting_sm_rsacsertype_code', 'um_clsacsetting_sm_rsacserowner_code'],
            'order' => 35000,
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\APIs',
            'details_pk' => ['um_clsapi_module_id', 'um_clsapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\APIs',
            'details_key' => '\Numbers\Users\Users\Model\Classification\API\Methods',
            'details_pk' => ['um_clsapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Notifications',
            'details_pk' => ['um_clsnoti_module_id', 'um_clsnoti_feature_code'],
            'order' => 35000
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Features',
            'details_pk' => ['um_clsfeature_module_id', 'um_clsfeature_feature_code'],
            'order' => 35000
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Flags',
            'details_pk' => ['um_clssysflag_module_id', 'um_clssysflag_sysflag_id', 'um_clssysflag_action_id'],
            'order' => 35000,
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Policy\Policies',
            'details_pk' => ['um_clspolicy_sm_policy_tenant_id', 'um_clspolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Policy\Groups',
            'details_pk' => ['um_clspolgrp_sm_polgroup_tenant_id', 'um_clspolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
        'external_permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermissions',
            'details_pk' => ['um_clsextperm_um_extmdids_id', 'um_clsextperm_um_extresrc_id'],
            'order' => 35000
        ],
        'external_permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermission\Actions',
            'details_pk' => ['um_clsextpractn_method_code', 'um_clsextpractn_um_extactn_id'],
            'order' => 1000,
            'required' => true
        ],
        'external_permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermission\Subresources',
            'details_pk' => ['um_clsextprsub_um_extsursrc_id', 'um_clsextprsub_um_extactn_id'],
            'order' => 2000,
            'required' => false
        ],
        'external_permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\ExternalPermission\Modules',
            'details_pk' => ['um_clsextprmmod_um_extmdids_id', 'um_clsextprmmod_um_extactn_id'],
            'order' => 35000,
        ],
        'parents_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Classification\Children',
            'details_pk' => ['um_clscls_parent_um_classification_id'],
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
            'um_classification_id' => [
                'um_classification_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Classification #', 'domain' => 'classification_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_classification_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'um_classification_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_classification_name' => [
                'um_classification_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 45, 'required' => true],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
                'um_classification_um_classtype_code' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Classification\Types', 'onchange' => 'this.form.submit();'],
            ],
            'um_classification_icon' => [
                'um_classification_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_classification_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 45],
                'um_classification_global' => ['order' => 3, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
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
                'um_clsorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_clsorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'parents_container' => [
            'row1' => [
                'um_clscls_um_classtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code','null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Classification\Types::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_clscls_parent_um_classification_id' => ['order' => 2, 'label_name' => 'Classification', 'domain' => 'classification_id', 'null' => true, 'required' => true, 'details_unique_select' => true, 'percent' => 45, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Classifications::optionsActive', 'options_params' => ['um_classification_global' => 1], 'options_depends' => ['um_classification_um_classtype_code' => 'detail::um_clscls_um_classtype_code'], 'onchange' => 'this.form.submit();'],
                'um_clscls_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_clsperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clsperm_module_id', 'resource_id' => 'um_clsperm_resource_id']],
                'um_clsperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_clsperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_clsperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_clsperaction_action_id', 'method_code' => 'um_clsperaction_method_code']],
                'um_clsperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_clsperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_clssubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_clsperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clssubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_clssubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clssubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'permission_modules_separator_container' => [
            'permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Internal Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'permission_modules_container' => [
            'row1' => [
                'um_clsprmmod_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_clsprmmod_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_clsprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsprmmod_module_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_access_settings_container' => [
            'row1' => [
                'um_clsacsetting_sm_rsacsertype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes', 'onchange' => 'this.form.submit();'],
                'um_clsacsetting_sm_rsacserowner_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => null, 'placeholder' => 'Please choose', 'onchange' => 'this.form.submit();'],
                'um_clsacsetting_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'external_permissions_container' => [
            'row1' => [
                'um_clsextperm_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResources::optionsJson', 'options_params' => ['um_extresrc_acl_permission' => 1, 'um_extresrc_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clsextperm_um_extmdids_id', 'resource_id' => 'um_clsextperm_um_extresrc_id']],
                'um_clsextperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsextperm_um_extmdids_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_actions_container' => [
            'row1' => [
                'um_clsextpractn_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResourceMap::optionsJson', 'options_depends' => ['um_extresmap_um_extresrc_id' => 'detail::um_clsextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_clsextpractn_um_extactn_id', 'method_code' => 'um_clsextpractn_method_code']],
                'um_clsextpractn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_clsextpractn_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_subresources_container' => [
            'row1' => [
                'um_clsextprsub_um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresources::optionsGrouped', 'options_depends' => ['um_extresrc_id' => 'detail::um_clsextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clsextprsub_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresourceActions::optionsGrouped', 'options_depends' => ['um_extsursrc_id' => 'um_clsextprsub_um_extsursrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clsextprsub_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'external_permission_modules_separator_container' => [
            'external_permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'External Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'external_permission_modules_container' => [
            'row1' => [
                'um_clsextprmmod_um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs', 'onchange' => 'this.form.submit();'],
                'um_clsextprmmod_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_clsextprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsextprmmod_um_extmdl_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'apis_container' => [
            'row1' => [
                'um_clsapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clsapi_module_id', 'resource_id' => 'um_clsapi_resource_id']],
                'um_clsapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_clsapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_clsapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clsapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_clsnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clsnoti_module_id', 'feature_code' => 'um_clsnoti_feature_code']],
                'um_clsnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_clsfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clsfeature_module_id', 'feature_code' => 'um_clsfeature_feature_code']],
                'um_clsfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clsfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_clssysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_clssysflag_module_id', 'sysflag_id' => 'um_clssysflag_sysflag_id']],
                'um_clssysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_clssysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_clssysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_clssysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_clspolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_clspolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_clspolicy_sm_policy_code']],
                'um_clspolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_clspolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'fa-regular fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_clspolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_clspolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_clspolgrp_sm_polgroup_id']],
                'um_clspolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_clspolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Classifications',
        'model' => '\Numbers\Users\Users\Model\Classifications',
        'details' => [
            '\Numbers\Users\Users\Model\Classification\Organizations' => [
                'name' => 'UM Classification Organizations',
                'pk' => ['um_clsorg_tenant_id', 'um_clsorg_um_classification_id', 'um_clsorg_organization_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsorg_tenant_id', 'um_classification_id' => 'um_clsorg_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Children' => [
                'name' => 'UM Classification Children',
                'pk' => ['um_clscls_tenant_id', 'um_clscls_parent_um_classification_id', 'um_clscls_child_um_classification_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clscls_tenant_id', 'um_classification_id' => 'um_clscls_child_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Permissions' => [
                'name' => 'UM Classification Permissions',
                'pk' => ['um_clsperm_tenant_id', 'um_clsperm_um_classification_id', 'um_clsperm_module_id', 'um_clsperm_resource_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsperm_tenant_id', 'um_classification_id' => 'um_clsperm_um_classification_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Classification\Permission\Actions' => [
                        'name' => 'UM Classification Permission Actions',
                        'pk' => ['um_clsperaction_tenant_id', 'um_clsperaction_um_classification_id', 'um_clsperaction_module_id', 'um_clsperaction_resource_id', 'um_clsperaction_method_code', 'um_clsperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_clsperm_tenant_id' => 'um_clsperaction_tenant_id', 'um_clsperm_um_classification_id' => 'um_clsperaction_um_classification_id', 'um_clsperm_module_id' => 'um_clsperaction_module_id', 'um_clsperm_resource_id' => 'um_clsperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Classification\Permission\Subresources' => [
                        'name' => 'UM Classification Permission Subresources',
                        'pk' => ['um_clssubres_tenant_id', 'um_clssubres_um_classification_id', 'um_clssubres_module_id', 'um_clssubres_resource_id', 'um_clssubres_rsrsubres_id', 'um_clssubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_clsperm_tenant_id' => 'um_clssubres_tenant_id', 'um_clsperm_um_classification_id' => 'um_clssubres_um_classification_id', 'um_clsperm_module_id' => 'um_clssubres_module_id', 'um_clsperm_resource_id' => 'um_clssubres_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Classification\Permission\AccessSettings' => [
                        'name' => 'UM Classification Permission Access Settings',
                        'pk' => ['um_clsacsetting_tenant_id', 'um_clsacsetting_um_classification_id', 'um_clsacsetting_module_id', 'um_clsacsetting_resource_id', 'um_clsacsetting_sm_rsacsertype_code', 'um_clsacsetting_sm_rsacserowner_code'],
                        'type' => '1M',
                        'map' => ['um_clsperm_tenant_id' => 'um_clsacsetting_tenant_id', 'um_clsperm_um_classification_id' => 'um_clsacsetting_um_classification_id', 'um_clsperm_module_id' => 'um_clsacsetting_module_id', 'um_clsperm_resource_id' => 'um_clsacsetting_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Classification\Permission\Modules' => [
                'name' => 'UM Classification Permission Modules',
                'pk' => ['um_clsprmmod_tenant_id', 'um_clsprmmod_um_classification_id', 'um_clsprmmod_module_id', 'um_clsprmmod_action_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsprmmod_tenant_id', 'um_classification_id' => 'um_clsprmmod_um_classification_id'],
            ],
            '\Numbers\Users\Users\Model\Classification\APIs' => [
                'name' => 'UM Classification APIs',
                'pk' => ['um_clsapi_tenant_id', 'um_clsapi_um_classification_id', 'um_clsapi_module_id', 'um_clsapi_resource_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsapi_tenant_id', 'um_classification_id' => 'um_clsapi_um_classification_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Classification\API\Methods' => [
                        'name' => 'UM Classification API Methods',
                        'pk' => ['um_clsapmethod_tenant_id', 'um_clsapmethod_um_classification_id', 'um_clsapmethod_module_id', 'um_clsapmethod_resource_id', 'um_clsapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_clsapi_tenant_id' => 'um_clsapmethod_tenant_id', 'um_clsapi_um_classification_id' => 'um_clsapmethod_um_classification_id', 'um_clsapi_module_id' => 'um_clsapmethod_module_id', 'um_clsapi_resource_id' => 'um_clsapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Classification\Notifications' => [
                'name' => 'UM Classification Notifications',
                'pk' => ['um_clsnoti_tenant_id', 'um_clsnoti_um_classification_id', 'um_clsnoti_module_id', 'um_clsnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsnoti_tenant_id', 'um_classification_id' => 'um_clsnoti_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Features' => [
                'name' => 'UM Classification Features',
                'pk' => ['um_clsfeature_tenant_id', 'um_clsfeature_um_classification_id', 'um_clsfeature_module_id', 'um_clsfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsfeature_tenant_id', 'um_classification_id' => 'um_clsfeature_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Flags' => [
                'name' => 'UM Classification Flags',
                'pk' => ['um_clssysflag_tenant_id', 'um_clssysflag_um_classification_id', 'um_clssysflag_module_id', 'um_clssysflag_sysflag_id', 'um_clssysflag_action_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clssysflag_tenant_id', 'um_classification_id' => 'um_clssysflag_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Policy\Policies' => [
                'name' => 'UM Classification Policies',
                'pk' => ['um_clspolicy_tenant_id', 'um_clspolicy_um_classification_id', 'um_clspolicy_sm_policy_tenant_id', 'um_clspolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clspolicy_tenant_id', 'um_classification_id' => 'um_clspolicy_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\Policy\Groups' => [
                'name' => 'UM Classification Policy Groups',
                'pk' => ['um_clspolgrp_tenant_id', 'um_clspolgrp_um_classification_id', 'um_clspolgrp_sm_polgroup_tenant_id', 'um_clspolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clspolgrp_tenant_id', 'um_classification_id' => 'um_clspolgrp_um_classification_id']
            ],
            '\Numbers\Users\Users\Model\Classification\ExternalPermissions' => [
                'name' => 'UM Classification External Permissions',
                'pk' => ['um_clsextperm_tenant_id', 'um_clsextperm_um_classification_id', 'um_clsextperm_um_extmdids_id', 'um_clsextperm_um_extresrc_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsextperm_tenant_id', 'um_classification_id' => 'um_clsextperm_um_classification_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Classification\ExternalPermission\Actions' => [
                        'name' => 'UM Classification External Permission Actions',
                        'pk' => ['um_clsextpractn_tenant_id', 'um_clsextpractn_um_classification_id', 'um_clsextpractn_um_extmdids_id', 'um_clsextpractn_um_extresrc_id', 'um_clsextpractn_method_code', 'um_clsextpractn_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_clsextperm_tenant_id' => 'um_clsextpractn_tenant_id', 'um_clsextperm_um_classification_id' => 'um_clsextpractn_um_classification_id', 'um_clsextperm_um_extmdids_id' => 'um_clsextpractn_um_extmdids_id', 'um_clsextperm_um_extresrc_id' => 'um_clsextpractn_um_extresrc_id'],
                    ],
                    '\Numbers\Users\Users\Model\Classification\ExternalPermission\Subresources' => [
                        'name' => 'UM Classification External Permission Subresources',
                        'pk' => ['um_clsextprsub_tenant_id', 'um_clsextprsub_um_classification_id', 'um_clsextprsub_um_extmdids_id', 'um_clsextprsub_um_extresrc_id', 'um_clsextprsub_um_extsursrc_id', 'um_clsextprsub_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_clsextperm_tenant_id' => 'um_clsextprsub_tenant_id', 'um_clsextperm_um_classification_id' => 'um_clsextprsub_um_classification_id', 'um_clsextperm_um_extmdids_id' => 'um_clsextprsub_um_extmdids_id', 'um_clsextperm_um_extresrc_id' => 'um_clsextprsub_um_extresrc_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Classification\ExternalPermission\Modules' => [
                'name' => 'UM Classification External Permission Modules',
                'pk' => ['um_clsextprmmod_tenant_id', 'um_clsextprmmod_um_classification_id', 'um_clsextprmmod_um_extmdids_id', 'um_clsextprmmod_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_classification_tenant_id' => 'um_clsextprmmod_tenant_id', 'um_classification_id' => 'um_clsextprmmod_um_classification_id'],
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
            'ids_from_collection' => ['\Numbers\Users\Users\Model\Classification\Permissions', '$key', 'um_clsperm_resource_id'],
            'pk' => ['sm_resource_id']
        ]
    ];

    public function validate(& $form)
    {
        // permissions
        foreach ($form->values['\Numbers\Users\Users\Model\Classification\Permissions'] ?? [] as $k => $v) {
            $acl_access_settings = $form->getPreloadModel('resources', [$v['um_clsperm_resource_id']], 'sm_resource_acl_access_settings');
            if (!empty($acl_access_settings) && empty($v['\Numbers\Users\Users\Model\Classification\Permission\AccessSettings'])) {
                $form->validateQuickRequired(['\Numbers\Users\Users\Model\Classification\Permissions', $k, '\Numbers\Users\Users\Model\Classification\Permission\AccessSettings', 1, 'um_clsacsetting_sm_rsacsertype_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['um_classification_code'])) {
            $form->values['um_classification_code'] = Sequence::nextval('DEFAULT', 'CLS', 'UM', \Tenant::id(), true);
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_clsacsetting_sm_rsacserowner_code') {
            if (!empty($neighbouring_values['um_clsacsetting_sm_rsacsertype_code'])) {
                $options['options']['options_model'] = $form->getPreloadModel('access_setting_types', [$neighbouring_values['um_clsacsetting_sm_rsacsertype_code']], 'sm_rsacsertype_model');
            }
        }
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_classification_name'])) {
            return Colors::renderAvatar($form->values['um_classification_name'], 'circle', false) . ' ' . Colors::renderAvatar($form->values['um_classification_name'], 'circle', true);
        } else {
            return '';
        }
    }
}
