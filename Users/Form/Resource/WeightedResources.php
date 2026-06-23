<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Resource;

use Object\Form\Wrapper\Base;
use Numbers\Tenants\Tenants\Model\Modules;
use Numbers\Backend\System\Modules\Model\Resources;

class WeightedResources extends Base
{
    public $form_link = 'um_weighted_resources';
    public $module_code = 'UM';
    public $title = 'U/M Weighted Resources Form';
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
        'tabs' => ['default_row_type' => 'grid', 'order' => 200, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'actions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\Resource\WeightedResourceActions',
            'details_pk' => ['um_weiresactn_action_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
    ];
    public $rows = [
        'top' => [
            'um_weiresrc_module_id' => ['order' => 100],
            'um_weiresrc_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'weight' => ['order' => 200, 'label_name' => 'Weight'],
        ],
    ];
    public $elements = [
        'top' => [
            'um_weiresrc_module_id' => [
                'um_weiresrc_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'default' => null, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_weiresrc_resource_id' => ['order' => 2, 'label_name' => 'Resource #', 'domain' => 'resource_id', 'null' => true, 'default' => null, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resources', 'options_depends' => ['sm_resource_module_code' => 'um_weiresrc_module_code'], 'options_params' => ['sm_resource_type' => 100, 'sm_resource_acl_permission' => 1], 'onchange' => 'this.form.submit();'],
                'um_weiresrc_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_weiresrc_name' => [
                'um_weiresrc_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
                'um_weiresrc_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 50, 'readonly' => true],
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100]
            ],
            'weight' => [
                'weight' => ['container' => 'weight_container', 'order' => 100],
                'separator' => ['container' => 'separator_container', 'order' => 200],
                'actions' => ['container' => 'actions_container', 'order' => 300]
            ]
        ],
        'general_container' => [
            'um_weiresrc_module_code' => [
                'um_weiresrc_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules', 'readonly' => true],
                'um_weiresrc_slug' => ['order' => 2, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'required' => true, 'percent' => 50],
            ],
        ],
        'weight_container' => [
            'um_weiresrc_weight_enabled' => [
                'um_weiresrc_weight_enabled' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_weiresrc_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'percent' => 25, 'required_if_set' => ['um_weiresrc_weight_enabled' => 1]],
            ]
        ],
        'separator_container' => [
            'separator_container_row' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Actions', 'icon' => 'fa-regular fa-hand-pointer', 'percent' => 100],
            ]
        ],
        'actions_container' => [
            'row1' => [
                'um_weiresactn_action_id' => ['order' => 1, 'label_name' => 'Action', 'domain' => 'action_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 60, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_weiresactn_weight_enabled' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 10],
                'um_weiresactn_weight_value' => ['order' => 3, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'required_if_set' => ['um_weiresactn_weight_enabled' => 1], 'percent' => 25],
                'um_weiresactn_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Weighted Modules',
        'model' => '\Numbers\Users\Users\Model\Resource\WeightedResources',
        'details' => [
            '\Numbers\Users\Users\Model\Resource\WeightedResourceActions' => [
                'name' => 'UM Weighted Resource Actions',
                'pk' => ['um_weiresactn_tenant_id', 'um_weiresactn_module_id', 'um_weiresactn_resource_id', 'um_weiresactn_action_id'],
                'type' => '1M',
                'map' => ['um_weiresrc_tenant_id' => 'um_weiresactn_tenant_id', 'um_weiresrc_module_id' => 'um_weiresactn_module_id', 'um_weiresrc_resource_id' => 'um_weiresactn_resource_id']
            ]
        ]
    ];
    public $loc = [];

    public function refresh(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        if ($form->changed_field = 'um_weiresrc_module_id' && !empty($form->values['um_weiresrc_module_id'])) {
            $parent_module = Modules::getSingleStatic([
                'where' => [
                    'tm_module_tenant_id' => \Tenant::id(),
                    'tm_module_id' => $form->values['um_weiresrc_module_id'],
                ]
            ]);
            $form->values['um_weiresrc_module_code'] = $parent_module['tm_module_module_code'];
        }
        if ($form->changed_field = 'um_weiresrc_resource_id' && !empty($form->values['um_weiresrc_resource_id'])) {
            $parent_resource = Resources::getSingleStatic([
                'where' => [
                    'sm_resource_id' => $form->values['um_weiresrc_resource_id'],
                ]
            ]);
            $form->values['um_weiresrc_name'] = $parent_resource['sm_resource_name'];
            $form->values['um_weiresrc_code'] = $parent_resource['sm_resource_code'];
        }
    }
}
