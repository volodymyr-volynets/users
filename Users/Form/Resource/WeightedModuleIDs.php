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

class WeightedModuleIDs extends Base
{
    public $form_link = 'um_weighted_module_ids';
    public $module_code = 'UM';
    public $title = 'U/M Weighted Module IDs Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Resource\WeightedModuleActions',
            'details_pk' => ['um_weimdction_action_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
    ];
    public $rows = [
        'top' => [
            'um_weimdids_module_id' => ['order' => 100],
            'um_weimdids_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'weight' => ['order' => 200, 'label_name' => 'Weight'],
        ],
    ];
    public $elements = [
        'top' => [
            'um_weimdids_module_id' => [
                'um_weimdids_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'default' => null, 'required' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules', 'onchange' => 'this.form.submit();'],
                'um_weimdids_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_weimdids_name' => [
                'um_weimdids_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
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
            'um_weimdids_module_code' => [
                'um_weimdids_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules', 'readonly' => true],
                'um_weimdids_slug' => ['order' => 2, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'required' => true, 'percent' => 50],
            ],
        ],
        'weight_container' => [
            'um_weimdids_weight_enabled' => [
                'um_weimdids_weight_enabled' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_weimdids_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'percent' => 25, 'required_if_set' => ['um_weimdids_weight_enabled' => 1]],
            ]
        ],
        'separator_container' => [
            'separator_container_row' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Actions', 'icon' => 'fa-regular fa-hand-pointer', 'percent' => 100],
            ]
        ],
        'actions_container' => [
            'row1' => [
                'um_weimdction_action_id' => ['order' => 1, 'label_name' => 'Action', 'domain' => 'action_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 60, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Actions::optionsGrouped', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_weimdction_weight_enabled' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 10],
                'um_weimdction_weight_value' => ['order' => 3, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'required_if_set' => ['um_weimdction_weight_enabled' => 1], 'percent' => 25],
                'um_weimdction_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Weighted Modules',
        'model' => '\Numbers\Users\Users\Model\Resource\WeightedModuleIDs',
        'details' => [
            '\Numbers\Users\Users\Model\Resource\WeightedModuleActions' => [
                'name' => 'UM Weighted Module Actions',
                'pk' => ['um_weimdction_tenant_id', 'um_weimdction_module_id', 'um_weimdction_action_id'],
                'type' => '1M',
                'map' => ['um_weimdids_tenant_id' => 'um_weimdction_tenant_id', 'um_weimdids_module_id' => 'um_weimdction_module_id']
            ]
        ]
    ];
    public $loc = [];

    public function refresh(& $form)
    {
        if (!$form->hasErrors() && !empty($form->values['um_weimdids_module_id']) && empty($form->values['um_weimdids_module_code'])) {
            $parent_module = Modules::getSingleStatic([
                'where' => [
                    'tm_module_tenant_id' => \Tenant::id(),
                    'tm_module_id' => $form->values['um_weimdids_module_id'],
                ]
            ]);
            $form->values['um_weimdids_module_code'] = $parent_module['tm_module_module_code'];
            $form->values['um_weimdids_name'] = $parent_module['tm_module_name'];
        }
    }
}
