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
use Numbers\Users\Users\Model\Resource\ExternalModules;

class ExternalModuleIDs extends Base
{
    public $form_link = 'um_external_module_ids';
    public $module_code = 'UM';
    public $title = 'U/M External Module IDs Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Resource\ExternalModuleActions',
            'details_pk' => ['um_extmdction_um_extactn_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
    ];
    public $rows = [
        'top' => [
            'um_extmdids_id' => ['order' => 100],
            'um_extmdids_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'weight' => ['order' => 200, 'label_name' => 'Weight'],
        ],
    ];
    public $elements = [
        'top' => [
            'um_extmdids_id' => [
                'um_extmdids_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id_sequence', 'percent' => 95, 'navigation' => true],
                'um_extmdids_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_extmdids_name' => [
                'um_extmdids_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
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
            ],
        ],
        'general_container' => [
            'um_extmdids_um_extmdl_code' => [
                'um_extmdids_um_extmdl_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code_external', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules'],
                'um_extmdids_slug' => ['order' => 2, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'required' => true, 'percent' => 50],
            ]
        ],
        'weight_container' => [
            'um_extmdids_weight_enabled' => [
                'um_extmdids_weight_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_extmdids_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'percent' => 25, 'required_if_set' => ['um_extmdids_weight_enabled' => 1]],
            ]
        ],
        'separator_container' => [
            'separator_container_row' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Actions', 'icon' => 'fa-regular fa-hand-pointer', 'percent' => 100],
            ]
        ],
        'actions_container' => [
            'row1' => [
                'um_extmdction_um_extactn_id' => ['order' => 1, 'label_name' => 'Action', 'domain' => 'action_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 60, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_extmdction_weight_enabled' => ['order' => 2, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 10],
                'um_extmdction_weight_value' => ['order' => 3, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'required_if_set' => ['um_extmdction_weight_enabled' => 1], 'percent' => 25],
                'um_extmdction_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM External Modules',
        'model' => '\Numbers\Users\Users\Model\Resource\ExternalModuleIDs',
        'details' => [
            '\Numbers\Users\Users\Model\Resource\ExternalModuleActions' => [
                'name' => 'UM External Module Actions',
                'pk' => ['um_extmdction_tenant_id', 'um_extmdction_um_extmdids_id', 'um_extmdction_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_extmdids_tenant_id' => 'um_extmdction_tenant_id', 'um_extmdids_id' => 'um_extmdction_um_extmdids_id']
            ]
        ]
    ];
    public $loc = [
        'NF.Error.SlugMustStartWithParentSlug' => 'Slug must start with parent slug!',
    ];

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        $parent_slug = ExternalModules::getSingleStatic([
            'where' => [
                'um_extmdl_tenant_id' => \Tenant::id(),
                'um_extmdl_code' => $form->values['um_extmdids_um_extmdl_code'],
            ]
        ])['um_extmdl_slug'] ?? '';
        if (!str_starts_with($form->values['um_extmdids_slug'], $parent_slug) || $form->values['um_extmdids_slug'] == $parent_slug) {
            $form->error(DANGER, loc('NF.Error.SlugMustStartWithParentSlug', 'Slug must start with parent slug!'), 'um_extmdids_slug');
        }
    }
}
