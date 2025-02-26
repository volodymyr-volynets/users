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

use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Numbers\Tenants\Tenants\Helper\Sequence;

class Roles extends Base
{
    public $form_link = 'um_roles';
    public $module_code = 'UM';
    public $title = 'U/M Roles Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Organizations',
            'details_pk' => ['um_rolorg_organization_id'],
            'order' => 35000
        ],
        'permissions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Permissions',
            'details_pk' => ['um_rolperm_module_id', 'um_rolperm_resource_id'],
            'order' => 35000
        ],
        'permission_actions_container' => [
            'type' => 'subdetails',
            'label_name' => 'Actions',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Role\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Role\Permission\Actions',
            'details_pk' => ['um_rolperaction_method_code', 'um_rolperaction_action_id'],
            'order' => 1000,
            'required' => true
        ],
        'permission_subresources_container' => [
            'type' => 'subdetails',
            'label_name' => 'Subresources',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Role\Permissions',
            'details_key' => '\Numbers\Users\Users\Model\Role\Permission\Subresources',
            'details_pk' => ['um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
            'order' => 2000,
            'required' => false
        ],
        'apis_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\APIs',
            'details_pk' => ['um_rolapi_module_id', 'um_rolapi_resource_id'],
            'order' => 35000
        ],
        'api_methods_container' => [
            'type' => 'subdetails',
            'label_name' => 'Methods',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_parent_key' => '\Numbers\Users\Users\Model\Role\APIs',
            'details_key' => '\Numbers\Users\Users\Model\Role\API\Methods',
            'details_pk' => ['um_rolapmethod_method_code'],
            'order' => 1000,
            'required' => true,
        ],
        'parents_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Children',
            'details_pk' => ['um_rolrol_parent_role_id'],
            'order' => 35000
        ],
        'notifications_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Notifications',
            'details_pk' => ['um_rolnoti_module_id', 'um_rolnoti_feature_code'],
            'order' => 35000
        ],
        'features_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Features',
            'details_pk' => ['um_rolfeature_module_id', 'um_rolfeature_feature_code'],
            'order' => 35000
        ],
        'flags_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Flags',
            'details_pk' => ['um_rolsysflag_module_id', 'um_rolsysflag_sysflag_id', 'um_rolsysflag_action_id'],
            'order' => 35000,
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Policy\Policies',
            'details_pk' => ['um_rolpolicy_sm_policy_tenant_id', 'um_rolpolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Role\Policy\Groups',
            'details_pk' => ['um_rolpolgrp_sm_polgroup_tenant_id', 'um_rolpolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
    ];

    public $rows = [
        'top' => [
            'um_role_id' => ['order' => 100],
            'um_role_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
            'parents' => ['order' => 200, 'label_name' => 'Inherit'],
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
            'um_role_id' => [
                'um_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'role_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
                'um_role_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 50, 'required' => 'c', 'navigation' => true]
            ],
            'um_role_name' => [
                'um_role_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'parents' => [
                'parents' => ['container' => 'parents_container', 'order' => 100],
            ],
            'permissions' => [
                'permissions' => ['container' => 'permissions_container', 'order' => 100],
            ],
            'apis' => [
                'apis' => ['container' => 'apis_container', 'order' => 100],
            ],
            'notifications' => [
                'notifications' => ['container' => 'notifications_container', 'order' => 100],
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
        'general_container' => [
            'um_role_type_id' => [
                'um_role_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 55, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Role\Types'],
                'um_role_global' => ['order' => 2, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 15, 'onchange' => 'this.form.submit();'],
                'um_role_super_admin' => ['order' => 3, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 15],
                'um_role_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            'um_role_icon' => [
                'um_role_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
                'um_role_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 50]
            ],
            'um_role_department_id' => [
                'um_role_department_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Department', 'domain' => 'department_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Departments::optionsActive', 'searchable' => true],
            ]
        ],
        'organizations_container' => [
            'row1' => [
                'um_rolorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'um_rolorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'parents_container' => [
            'row1' => [
                'um_rolrol_parent_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'options_params' => ['um_role_global' => 1], 'onchange' => 'this.form.submit();'],
                'um_rolrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'permissions_container' => [
            'row1' => [
                'um_rolperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 100], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolperm_module_id', 'resource_id' => 'um_rolperm_resource_id']],
                'um_rolperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_rolperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_actions_container' => [
            'row1' => [
                'um_rolperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_rolperaction_action_id', 'method_code' => 'um_rolperaction_method_code']],
                'um_rolperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
            self::HIDDEN => [
                'um_rolperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'permission_subresources_container' => [
            'row1' => [
                'um_rolsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_rolsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_rolsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_rolsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
            ],
        ],
        'apis_container' => [
            'row1' => [
                'um_rolapi_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'sm_resource_type' => 150], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolapi_module_id', 'resource_id' => 'um_rolapi_resource_id']],
                'um_rolapi_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_rolapi_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'api_methods_container' => [
            'row1' => [
                'um_rolapmethod_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\APIMethods::optionsActive', 'options_depends' => ['sm_rsrcapimeth_resource_id' => 'detail::um_rolapi_resource_id'], 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_rolapmethod_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
            ]
        ],
        'notifications_container' => [
            'row1' => [
                'um_rolnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolnoti_module_id', 'feature_code' => 'um_rolnoti_feature_code']],
                'um_rolnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_rolnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'features_container' => [
            'row1' => [
                'um_rolfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolfeature_module_id', 'feature_code' => 'um_rolfeature_feature_code']],
                'um_rolfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_rolfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'flags_container' => [
            'row1' => [
                'um_rolsysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolsysflag_module_id', 'sysflag_id' => 'um_rolsysflag_sysflag_id']],
                'um_rolsysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_rolsysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
                'um_rolsysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_rolsysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
            ]
        ],
        'policy_container' => [
            'row1' => [
                'um_rolpolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_rolpolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_rolpolicy_sm_policy_code']],
                'um_rolpolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_rolpolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'far fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_rolpolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_rolpolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_rolpolgrp_sm_polgroup_id']],
                'um_rolpolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_rolpolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Roles',
        'model' => '\Numbers\Users\Users\Model\Roles',
        'details' => [
            '\Numbers\Users\Users\Model\Role\Children' => [
                'name' => 'Children',
                'pk' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Permissions' => [
                'name' => 'Permissions',
                'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_module_id', 'um_rolperm_resource_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Role\Permission\Actions' => [
                        'name' => 'Permission Actions',
                        'pk' => ['um_rolperaction_tenant_id', 'um_rolperaction_role_id', 'um_rolperaction_module_id', 'um_rolperaction_resource_id', 'um_rolperaction_method_code', 'um_rolperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_rolperm_tenant_id' => 'um_rolperaction_tenant_id', 'um_rolperm_role_id' => 'um_rolperaction_role_id', 'um_rolperm_module_id' => 'um_rolperaction_module_id', 'um_rolperm_resource_id' => 'um_rolperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Role\Permission\Subresources' => [
                        'name' => 'Permission Subresources',
                        'pk' => ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_rolperm_tenant_id' => 'um_rolsubres_tenant_id', 'um_rolperm_role_id' => 'um_rolsubres_role_id', 'um_rolperm_module_id' => 'um_rolsubres_module_id', 'um_rolperm_resource_id' => 'um_rolsubres_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Role\APIs' => [
                'name' => 'APIs',
                'pk' => ['um_rolapi_tenant_id', 'um_rolapi_role_id', 'um_rolapi_module_id', 'um_rolapi_resource_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolapi_tenant_id', 'um_role_id' => 'um_rolapi_role_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Role\API\Methods' => [
                        'name' => 'API Methods',
                        'pk' => ['um_rolapmethod_tenant_id', 'um_rolapmethod_role_id', 'um_rolapmethod_module_id', 'um_rolapmethod_resource_id', 'um_rolapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_rolapi_tenant_id' => 'um_rolapmethod_tenant_id', 'um_rolapi_role_id' => 'um_rolapmethod_role_id', 'um_rolapi_module_id' => 'um_rolapmethod_module_id', 'um_rolapi_resource_id' => 'um_rolapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Role\Notifications' => [
                'name' => 'Notifications',
                'pk' => ['um_rolnoti_tenant_id', 'um_rolnoti_role_id', 'um_rolnoti_module_id', 'um_rolnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolnoti_tenant_id', 'um_role_id' => 'um_rolnoti_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Features' => [
                'name' => 'Features',
                'pk' => ['um_rolfeature_tenant_id', 'um_rolfeature_role_id', 'um_rolfeature_module_id', 'um_rolfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolfeature_tenant_id', 'um_role_id' => 'um_rolfeature_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Organizations' => [
                'name' => 'Organizations',
                'pk' => ['um_rolorg_tenant_id', 'um_rolorg_role_id', 'um_rolorg_organization_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolorg_tenant_id', 'um_role_id' => 'um_rolorg_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Flags' => [
                'name' => 'Flags',
                'pk' => ['um_rolsysflag_tenant_id', 'um_rolsysflag_role_id', 'um_rolsysflag_module_id', 'um_rolsysflag_sysflag_id', 'um_rolsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolsysflag_tenant_id', 'um_role_id' => 'um_rolsysflag_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Policy\Policies' => [
                'name' => 'UM Role Policies',
                'pk' => ['um_rolpolicy_tenant_id', 'um_rolpolicy_role_id', 'um_rolpolicy_sm_policy_tenant_id', 'um_rolpolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolpolicy_tenant_id', 'um_role_id' => 'um_rolpolicy_role_id']
            ],
            '\Numbers\Users\Users\Model\Role\Policy\Groups' => [
                'name' => 'UM Role Policy Groups',
                'pk' => ['um_rolpolgrp_tenant_id', 'um_rolpolgrp_role_id', 'um_rolpolgrp_sm_polgroup_tenant_id', 'um_rolpolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_role_tenant_id' => 'um_rolpolgrp_tenant_id', 'um_role_id' => 'um_rolpolgrp_role_id']
            ],
        ]
    ];

    public function validate(& $form)
    {
        if (!empty($form->values['um_role_global'])) {
            if (!empty($form->values['um_role_super_admin'])) {
                $form->error(DANGER, 'Global roles cannot be super admins!', 'um_role_super_admin');
            }
            // empty other values
            $form->values['\Numbers\Users\Users\Model\Role\Children'] = [];
            $form->values['\Numbers\Users\Users\Model\Role\Organizations'] = [];
        }
        // roles must have mandatory organizations
        if (empty($form->values['um_role_global']) && empty($form->values['um_role_super_admin'])) {
            if (empty($form->values['\Numbers\Users\Users\Model\Role\Organizations'])) {
                $form->error(DANGER, Messages::REQUIRED_FIELD, '\Numbers\Users\Users\Model\Role\Organizations[1][um_rolorg_organization_id]');
            }
        }
        // generate new sequence
        if (empty($form->values['um_role_code'])) {
            $form->values['um_role_code'] = Sequence::nextval('DEFAULT', 'ROL', 'UM', \Tenant::id(), true);
        }
    }

    public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where)
    {
        if ($field_name == 'um_rolrel_relationship_code') {
            $where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\Role\Organizations'], 'um_rolorg_organization_id', ['unique' => true]);
        }
    }

    public function overrideTabs(& $form, & $tab_options, & $tab_name, & $neighbouring_values = [])
    {
        // we hide all tabs if global
        if (!empty($form->values['um_role_global'])) {
            if (in_array($tab_name, ['organizations', 'parents', 'assigments'])) {
                return ['hidden' => true];
            }
        }
    }
}
