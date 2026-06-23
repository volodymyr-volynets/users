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

class Domains extends Base
{
    public $form_link = 'um_domains';
    public $module_code = 'UM';
    public $title = 'U/M Domains Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Domain\Organizations',
            'details_pk' => ['um_domorg_organization_id'],
            'order' => 35000
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Permissions',
            'details_pk' => ['um_domperm_module_id', 'um_domperm_resource_id'],
            'order' => 35000
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Domain\Permission\Actions',
            'details_pk' => ['um_domperaction_method_code', 'um_domperaction_action_id'],
            'order' => 1000,
            'required' => true
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Domain\Permission\Subresources',
            'details_pk' => ['um_domsubres_rsrsubres_id', 'um_domsubres_action_id'],
            'order' => 2000,
            'required' => false
        ],
        'permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Permission\Modules',
            'details_pk' => ['um_domprmmod_module_id', 'um_domprmmod_action_id'],
            'order' => 35000,
        ],
        'permission_access_settings_container' => [
            'type' => 'subdetails',
            'label_name' => 'Access Settings',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Domain\Permission\AccessSettings',
            'details_pk' => ['um_domacsetting_sm_rsacsertype_code', 'um_domacsetting_sm_rsacserowner_code'],
            'order' => 35000,
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\APIs',
            'details_pk' => ['um_domapi_module_id', 'um_domapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\APIs',
            'details_key' => '\Numbers\Users\Users\Model\Domain\API\Methods',
            'details_pk' => ['um_domapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Notifications',
            'details_pk' => ['um_domnoti_module_id', 'um_domnoti_feature_code'],
            'order' => 35000
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Features',
            'details_pk' => ['um_domfeature_module_id', 'um_domfeature_feature_code'],
            'order' => 35000
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Flags',
            'details_pk' => ['um_domsysflag_module_id', 'um_domsysflag_sysflag_id', 'um_domsysflag_action_id'],
            'order' => 35000,
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Policy\Policies',
            'details_pk' => ['um_dompolicy_sm_policy_tenant_id', 'um_dompolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Policy\Groups',
            'details_pk' => ['um_dompolgrp_sm_polgroup_tenant_id', 'um_dompolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
        'external_permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermissions',
            'details_pk' => ['um_domextperm_um_extmdids_id', 'um_domextperm_um_extresrc_id'],
            'order' => 35000
        ],
        'external_permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermission\Actions',
            'details_pk' => ['um_domextpractn_method_code', 'um_domextpractn_um_extactn_id'],
            'order' => 1000,
            'required' => true
        ],
        'external_permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermissions',
            'details_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermission\Subresources',
            'details_pk' => ['um_domextprsub_um_extsursrc_id', 'um_domextprsub_um_extactn_id'],
            'order' => 2000,
            'required' => false
        ],
        'external_permission_modules_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\ExternalPermission\Modules',
            'details_pk' => ['um_domextprmmod_um_extmdids_id', 'um_domextprmmod_um_extactn_id'],
            'order' => 35000,
        ],
        'parents_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Domain\Children',
            'details_pk' => ['um_domdom_parent_um_domain_id'],
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
            'um_domain_id' => [
                'um_domain_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Domain #', 'domain' => 'domain_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_domain_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'um_domain_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_domain_name' => [
                'um_domain_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => true],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
            ],
            'um_domain_icon' => [
                'um_domain_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_domain_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 45],
                'um_domain_global' => ['order' => 3, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
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
                'um_domorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_domorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'parents_container' => [
            'row1' => [
                'um_domdom_parent_um_domain_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Domain', 'domain' => 'domain_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Domains::optionsActive', 'options_params' => ['um_domain_global' => 1], 'onchange' => 'this.form.submit();'],
                'um_domdom_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_domperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domperm_module_id', 'resource_id' => 'um_domperm_resource_id']],
                'um_domperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_domperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_domperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_domperaction_action_id', 'method_code' => 'um_domperaction_method_code']],
                'um_domperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_domperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_domsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_domperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_domsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'permission_modules_separator_container' => [
            'permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Internal Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'permission_modules_container' => [
            'row1' => [
                'um_domprmmod_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_domprmmod_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_domprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domprmmod_module_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_access_settings_container' => [
            'row1' => [
                'um_domacsetting_sm_rsacsertype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\AccessSetting\AccessSettingTypes', 'onchange' => 'this.form.submit();'],
                'um_domacsetting_sm_rsacserowner_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => null, 'placeholder' => 'Please choose', 'onchange' => 'this.form.submit();'],
                'um_domacsetting_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'external_permissions_container' => [
            'row1' => [
                'um_domextperm_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResources::optionsJson', 'options_params' => ['um_extresrc_acl_permission' => 1, 'um_extresrc_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domextperm_um_extmdids_id', 'resource_id' => 'um_domextperm_um_extresrc_id']],
                'um_domextperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domextperm_um_extmdids_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_actions_container' => [
            'row1' => [
                'um_domextpractn_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalResourceMap::optionsJson', 'options_depends' => ['um_extresmap_um_extresrc_id' => 'detail::um_domextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_domextpractn_um_extactn_id', 'method_code' => 'um_domextpractn_method_code']],
                'um_domextpractn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_domextpractn_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'external_permission_subresources_container' => [
            'row1' => [
                'um_domextprsub_um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresources::optionsGrouped', 'options_depends' => ['um_extresrc_id' => 'detail::um_domextperm_um_extresrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domextprsub_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Resource\ExternalSubresourceActions::optionsGrouped', 'options_depends' => ['um_extsursrc_id' => 'um_domextprsub_um_extsursrc_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domextprsub_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'external_permission_modules_separator_container' => [
            'external_permission_modules_separator_container' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'External Modules', 'icon' => 'fa-solid fa-dice-d6', 'percent' => 100],
            ],
        ],
        'external_permission_modules_container' => [
            'row1' => [
                'um_domextprmmod_um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs', 'onchange' => 'this.form.submit();'],
                'um_domextprmmod_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'searchable' => true, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_domextprmmod_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domextprmmod_um_extmdl_code' => ['order' => 1, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'apis_container' => [
            'row1' => [
                'um_domapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domapi_module_id', 'resource_id' => 'um_domapi_resource_id']],
                'um_domapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_domapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_domapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_domnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domnoti_module_id', 'feature_code' => 'um_domnoti_feature_code']],
                'um_domnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_domfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domfeature_module_id', 'feature_code' => 'um_domfeature_feature_code']],
                'um_domfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_domsysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_domsysflag_module_id', 'sysflag_id' => 'um_domsysflag_sysflag_id']],
                'um_domsysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_domsysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_domsysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_domsysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_dompolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_dompolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_dompolicy_sm_policy_code']],
                'um_dompolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_dompolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'fa-regular fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_dompolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_dompolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_dompolgrp_sm_polgroup_id']],
                'um_dompolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_dompolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Domains',
        'model' => '\Numbers\Users\Users\Model\Domains',
        'details' => [
            '\Numbers\Users\Users\Model\Domain\Organizations' => [
                'name' => 'UM Domain Organizations',
                'pk' => ['um_domorg_tenant_id', 'um_domorg_um_domain_id', 'um_domorg_organization_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domorg_tenant_id', 'um_domain_id' => 'um_domorg_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Children' => [
                'name' => 'UM Domain Children',
                'pk' => ['um_domdom_tenant_id', 'um_domdom_parent_um_domain_id', 'um_domdom_child_um_domain_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domdom_tenant_id', 'um_domain_id' => 'um_domdom_child_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Permissions' => [
                'name' => 'UM Domain Permissions',
                'pk' => ['um_domperm_tenant_id', 'um_domperm_um_domain_id', 'um_domperm_module_id', 'um_domperm_resource_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domperm_tenant_id', 'um_domain_id' => 'um_domperm_um_domain_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Domain\Permission\Actions' => [
                        'name' => 'UM Domain Permission Actions',
                        'pk' => ['um_domperaction_tenant_id', 'um_domperaction_um_domain_id', 'um_domperaction_module_id', 'um_domperaction_resource_id', 'um_domperaction_method_code', 'um_domperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_domperm_tenant_id' => 'um_domperaction_tenant_id', 'um_domperm_um_domain_id' => 'um_domperaction_um_domain_id', 'um_domperm_module_id' => 'um_domperaction_module_id', 'um_domperm_resource_id' => 'um_domperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Domain\Permission\Subresources' => [
                        'name' => 'UM Domain Permission Subresources',
                        'pk' => ['um_domsubres_tenant_id', 'um_domsubres_um_domain_id', 'um_domsubres_module_id', 'um_domsubres_resource_id', 'um_domsubres_rsrsubres_id', 'um_domsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_domperm_tenant_id' => 'um_domsubres_tenant_id', 'um_domperm_um_domain_id' => 'um_domsubres_um_domain_id', 'um_domperm_module_id' => 'um_domsubres_module_id', 'um_domperm_resource_id' => 'um_domsubres_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Domain\Permission\AccessSettings' => [
                        'name' => 'UM Domain Permission Access Settings',
                        'pk' => ['um_domacsetting_tenant_id', 'um_domacsetting_um_domain_id', 'um_domacsetting_module_id', 'um_domacsetting_resource_id', 'um_domacsetting_sm_rsacsertype_code', 'um_domacsetting_sm_rsacserowner_code'],
                        'type' => '1M',
                        'map' => ['um_domperm_tenant_id' => 'um_domacsetting_tenant_id', 'um_domperm_um_domain_id' => 'um_domacsetting_um_domain_id', 'um_domperm_module_id' => 'um_domacsetting_module_id', 'um_domperm_resource_id' => 'um_domacsetting_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Domain\Permission\Modules' => [
                'name' => 'UM Domain Permission Modules',
                'pk' => ['um_domprmmod_tenant_id', 'um_domprmmod_um_domain_id', 'um_domprmmod_module_id', 'um_domprmmod_action_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domprmmod_tenant_id', 'um_domain_id' => 'um_domprmmod_um_domain_id'],
            ],
            '\Numbers\Users\Users\Model\Domain\APIs' => [
                'name' => 'UM Domain APIs',
                'pk' => ['um_domapi_tenant_id', 'um_domapi_um_domain_id', 'um_domapi_module_id', 'um_domapi_resource_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domapi_tenant_id', 'um_domain_id' => 'um_domapi_um_domain_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Domain\API\Methods' => [
                        'name' => 'UM Domain API Methods',
                        'pk' => ['um_domapmethod_tenant_id', 'um_domapmethod_um_domain_id', 'um_domapmethod_module_id', 'um_domapmethod_resource_id', 'um_domapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_domapi_tenant_id' => 'um_domapmethod_tenant_id', 'um_domapi_um_domain_id' => 'um_domapmethod_um_domain_id', 'um_domapi_module_id' => 'um_domapmethod_module_id', 'um_domapi_resource_id' => 'um_domapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Domain\Notifications' => [
                'name' => 'UM Domain Notifications',
                'pk' => ['um_domnoti_tenant_id', 'um_domnoti_um_domain_id', 'um_domnoti_module_id', 'um_domnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domnoti_tenant_id', 'um_domain_id' => 'um_domnoti_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Features' => [
                'name' => 'UM Domain Features',
                'pk' => ['um_domfeature_tenant_id', 'um_domfeature_um_domain_id', 'um_domfeature_module_id', 'um_domfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domfeature_tenant_id', 'um_domain_id' => 'um_domfeature_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Flags' => [
                'name' => 'UM Domain Flags',
                'pk' => ['um_domsysflag_tenant_id', 'um_domsysflag_um_domain_id', 'um_domsysflag_module_id', 'um_domsysflag_sysflag_id', 'um_domsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domsysflag_tenant_id', 'um_domain_id' => 'um_domsysflag_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Policy\Policies' => [
                'name' => 'UM Domain Policies',
                'pk' => ['um_dompolicy_tenant_id', 'um_dompolicy_um_domain_id', 'um_dompolicy_sm_policy_tenant_id', 'um_dompolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_dompolicy_tenant_id', 'um_domain_id' => 'um_dompolicy_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\Policy\Groups' => [
                'name' => 'UM Domain Policy Groups',
                'pk' => ['um_dompolgrp_tenant_id', 'um_dompolgrp_um_domain_id', 'um_dompolgrp_sm_polgroup_tenant_id', 'um_dompolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_dompolgrp_tenant_id', 'um_domain_id' => 'um_dompolgrp_um_domain_id']
            ],
            '\Numbers\Users\Users\Model\Domain\ExternalPermissions' => [
                'name' => 'UM Domain External Permissions',
                'pk' => ['um_domextperm_tenant_id', 'um_domextperm_um_domain_id', 'um_domextperm_um_extmdids_id', 'um_domextperm_um_extresrc_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domextperm_tenant_id', 'um_domain_id' => 'um_domextperm_um_domain_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Domain\ExternalPermission\Actions' => [
                        'name' => 'UM Domain External Permission Actions',
                        'pk' => ['um_domextpractn_tenant_id', 'um_domextpractn_um_domain_id', 'um_domextpractn_um_extmdids_id', 'um_domextpractn_um_extresrc_id', 'um_domextpractn_method_code', 'um_domextpractn_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_domextperm_tenant_id' => 'um_domextpractn_tenant_id', 'um_domextperm_um_domain_id' => 'um_domextpractn_um_domain_id', 'um_domextperm_um_extmdids_id' => 'um_domextpractn_um_extmdids_id', 'um_domextperm_um_extresrc_id' => 'um_domextpractn_um_extresrc_id'],
                    ],
                    '\Numbers\Users\Users\Model\Domain\ExternalPermission\Subresources' => [
                        'name' => 'UM Domain External Permission Subresources',
                        'pk' => ['um_domextprsub_tenant_id', 'um_domextprsub_um_domain_id', 'um_domextprsub_um_extmdids_id', 'um_domextprsub_um_extresrc_id', 'um_domextprsub_um_extsursrc_id', 'um_domextprsub_um_extactn_id'],
                        'type' => '1M',
                        'map' => ['um_domextperm_tenant_id' => 'um_domextprsub_tenant_id', 'um_domextperm_um_domain_id' => 'um_domextprsub_um_domain_id', 'um_domextperm_um_extmdids_id' => 'um_domextprsub_um_extmdids_id', 'um_domextperm_um_extresrc_id' => 'um_domextprsub_um_extresrc_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Domain\ExternalPermission\Modules' => [
                'name' => 'UM Domain External Permission Modules',
                'pk' => ['um_domextprmmod_tenant_id', 'um_domextprmmod_um_domain_id', 'um_domextprmmod_um_extmdids_id', 'um_domextprmmod_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_domain_tenant_id' => 'um_domextprmmod_tenant_id', 'um_domain_id' => 'um_domextprmmod_um_domain_id'],
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
            'ids_from_collection' => ['\Numbers\Users\Users\Model\Domain\Permissions', '$key', 'um_domperm_resource_id'],
            'pk' => ['sm_resource_id']
        ]
    ];

    public function validate(& $form)
    {
        // permissions
        foreach ($form->values['\Numbers\Users\Users\Model\Domain\Permissions'] ?? [] as $k => $v) {
            $acl_access_settings = $form->getPreloadModel('resources', [$v['um_domperm_resource_id']], 'sm_resource_acl_access_settings');
            if (!empty($acl_access_settings) && empty($v['\Numbers\Users\Users\Model\Domain\Permission\AccessSettings'])) {
                $form->validateQuickRequired(['\Numbers\Users\Users\Model\Domain\Permissions', $k, '\Numbers\Users\Users\Model\Domain\Permission\AccessSettings', 1, 'um_domacsetting_sm_rsacsertype_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['um_domain_code'])) {
            $form->values['um_domain_code'] = Sequence::nextval('DEFAULT', 'DOM', 'UM', \Tenant::id(), true);
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'um_domacsetting_sm_rsacserowner_code') {
            if (!empty($neighbouring_values['um_domacsetting_sm_rsacsertype_code'])) {
                $options['options']['options_model'] = $form->getPreloadModel('access_setting_types', [$neighbouring_values['um_domacsetting_sm_rsacsertype_code']], 'sm_rsacsertype_model');
            }
        }
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['um_domain_name'])) {
            return Colors::renderAvatar($form->values['um_domain_name'], 'domain', false) . ' ' . Colors::renderAvatar($form->values['um_domain_name'], 'domain', true);
        } else {
            return '';
        }
    }
}
