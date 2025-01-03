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
    ];
    public $rows = [
        'tabs' => [
            'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
            'permissions' => ['order' => 300, 'label_name' => 'Permisions'],
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
                'um_team_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'um_team_icon' => [
                'um_team_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_team_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 50]
            ]
        ],
        'tabs' => [
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'permissions' => [
                'permissions' => ['container' => 'permissions_container', 'order' => 100],
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
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'far fa-object-group', 'percent' => 100],
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
        'name' => 'Teams',
        'model' => '\Numbers\Users\Users\Model\Teams',
        'details' => [
            '\Numbers\Users\Users\Model\Team\Organizations' => [
                'name' => 'Organizations',
                'pk' => ['um_temorg_tenant_id', 'um_temorg_team_id', 'um_temorg_organization_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temorg_tenant_id', 'um_team_id' => 'um_temorg_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Permissions' => [
                'name' => 'Permissions',
                'pk' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temperm_tenant_id', 'um_team_id' => 'um_temperm_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\Permission\Actions' => [
                        'name' => 'Permission Actions',
                        'pk' => ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temperaction_tenant_id', 'um_temperm_team_id' => 'um_temperaction_team_id', 'um_temperm_module_id' => 'um_temperaction_module_id', 'um_temperm_resource_id' => 'um_temperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Team\Permission\Subresources' => [
                        'name' => 'Permission Subresources',
                        'pk' => ['um_temsubres_tenant_id', 'um_temsubres_team_id', 'um_temsubres_module_id', 'um_temsubres_resource_id', 'um_temsubres_rsrsubres_id', 'um_temsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temsubres_tenant_id', 'um_temperm_team_id' => 'um_temsubres_team_id', 'um_temperm_module_id' => 'um_temsubres_module_id', 'um_temperm_resource_id' => 'um_temsubres_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\APIs' => [
                'name' => 'APIs',
                'pk' => ['um_temapi_tenant_id', 'um_temapi_team_id', 'um_temapi_module_id', 'um_temapi_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temapi_tenant_id', 'um_team_id' => 'um_temapi_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\API\Methods' => [
                        'name' => 'API Methods',
                        'pk' => ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id', 'um_temapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_temapi_tenant_id' => 'um_temapmethod_tenant_id', 'um_temapi_team_id' => 'um_temapmethod_team_id', 'um_temapi_module_id' => 'um_temapmethod_module_id', 'um_temapi_resource_id' => 'um_temapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\Notifications' => [
                'name' => 'Notifications',
                'pk' => ['um_temnoti_tenant_id', 'um_temnoti_team_id', 'um_temnoti_module_id', 'um_temnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temnoti_tenant_id', 'um_team_id' => 'um_temnoti_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Features' => [
                'name' => 'Features',
                'pk' => ['um_temfeature_tenant_id', 'um_temfeature_team_id', 'um_temfeature_module_id', 'um_temfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temfeature_tenant_id', 'um_team_id' => 'um_temfeature_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Flags' => [
                'name' => 'Flags',
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
        ]
    ];

    public function validate(& $form)
    {
        // generate new sequence
        if (empty($form->values['um_team_code'])) {
            $form->values['um_team_code'] = Sequence::nextval('DEFAULT', 'TEA', 'UM', \Tenant::id(), true);
        }
    }
}
