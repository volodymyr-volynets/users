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
use Numbers\Users\Users\Model\Resource\ExternalResources;

class ExternalSubresources extends Base
{
    public $form_link = 'um_external_subresources_ids';
    public $module_code = 'UM';
    public $title = 'U/M External Subresources Form';
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
        'map_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Users\Users\Model\Resource\ExternalSubresourceMap',
            'details_pk' => ['um_extsursmap_um_extactn_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
    ];
    public $rows = [
        'top' => [
            'um_extsursrc_id' => ['order' => 100],
            'um_extsursrc_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'map' => ['order' => 200, 'label_name' => 'Mapping'],
            'weight' => ['order' => 300, 'label_name' => 'Weight'],
        ],
    ];
    public $elements = [
        'top' => [
            'um_extsursrc_id' => [
                'um_extsursrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource #', 'domain' => 'resource_id_sequence', 'required' => 'c', 'percent' => 50, 'navigation' => true],
                'um_extsursrc_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'um_extsursrc_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_extsursrc_name' => [
                'um_extsursrc_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 95, 'required' => true],
                'um_extsursrc_disabled' => ['order' => 2, 'label_name' => 'Disabled', 'type' => 'boolean', 'percent' => 5],
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100]
            ],
            'map' => [
                'map' => ['container' => 'map_container', 'order' => 100]
            ],
            'weight' => [
                'weight' => ['container' => 'weight_container', 'order' => 100]
            ],
        ],
        'general_container' => [
            'um_extsursrc_um_extresrc_id' => [
                'um_extsursrc_um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource #', 'domain' => 'resource_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalResources', 'onchange' => 'this.form.submit();'],
                'um_extsursrc_parent_um_extsursrc_id' => ['order' => 2, 'label_name' => 'Parent Subresource #', 'domain' => 'resource_id', 'default' => null, 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresources', 'options_depends' => ['um_extsursrc_um_extresrc_id' => 'um_extsursrc_um_extresrc_id']],
            ],
            'um_extsursrc_um_extmdl_code' => [
                'um_extsursrc_um_extmdl_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Module', 'domain' => 'module_code_external', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules', 'onchange' => 'this.form.submit();'],
                'um_extsursrc_icon' => ['order' => 2, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
            ],
            'um_extsursrc_slug' => [
                'um_extsursrc_slug' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'required' => true, 'percent' => 100],
            ],
        ],
        'map_container' => [
            'row1' => [
                'um_extsursmap_um_extactn_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Action', 'domain' => 'action_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_extsursmap_disabled' => ['order' => 2, 'label_name' => 'Disabled', 'type' => 'boolean', 'percent' => 5],
                'um_extsursmap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                'um_extsursmap_weight_enabled' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_extsursmap_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'required_if_set' => ['um_extsursmap_weight_enabled' => 1], 'percent' => 25],
            ]
        ],
        'weight_container' => [
            'um_extsursrc_weight_enabled' => [
                'um_extsursrc_weight_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_extsursrc_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'percent' => 25, 'required_if_set' => ['um_extsursrc_weight_enabled' => 1]],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM External Subresources',
        'model' => '\Numbers\Users\Users\Model\Resource\ExternalSubresources',
        'details' => [
            '\Numbers\Users\Users\Model\Resource\ExternalSubresourceMap' => [
                'name' => 'UM External Subresource Map',
                'pk' => ['um_extsursmap_tenant_id', 'um_extsursmap_um_extsursrc_id', 'um_extsursmap_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_extsursrc_tenant_id' => 'um_extsursmap_tenant_id', 'um_extsursrc_id' => 'um_extsursmap_um_extsursrc_id']
            ]
        ]
    ];
    public $loc = [
        'NF.Error.SlugMustStartWithParentSlug' => 'Slug must start with parent slug!'
    ];

    public function validate(\Object\Form\Base & $form)
    {
        if (empty($form->values['um_extsursrc_code'])) {
            $form->validateQuickRequired('um_extsursrc_code');
        }
        if ($form->hasErrors()) {
            return;
        }
        $parent_slug = ExternalResources::getSingleStatic([
            'where' => [
                'um_extresrc_tenant_id' => \Tenant::id(),
                'um_extresrc_id' => $form->values['um_extsursrc_um_extresrc_id'],
            ]
        ])['um_extresrc_slug'] ?? '';
        if (!str_starts_with($form->values['um_extsursrc_slug'], $parent_slug) || $form->values['um_extsursrc_slug'] == $parent_slug) {
            $form->error(DANGER, loc('NF.Error.SlugMustStartWithParentSlug', 'Slug must start with parent slug!'), 'um_extsursrc_slug');
        }
    }
}
