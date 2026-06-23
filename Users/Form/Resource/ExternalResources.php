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

class ExternalResources extends Base
{
    public $form_link = 'um_external_resources_ids';
    public $module_code = 'UM';
    public $title = 'U/M External Resources Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Resource\ExternalResourceMap',
            'details_pk' => ['um_extresmap_method_code', 'um_extresmap_um_extactn_id'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
    ];
    public $rows = [
        'top' => [
            'um_extresrc_id' => ['order' => 100],
            'um_extresrc_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'map' => ['order' => 200, 'label_name' => 'Mapping'],
            'weight' => ['order' => 300, 'label_name' => 'Weight'],
        ],
    ];
    public $elements = [
        'top' => [
            'um_extresrc_id' => [
                'um_extresrc_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource #', 'domain' => 'resource_id_sequence', 'required' => 'c', 'percent' => 50, 'navigation' => true],
                'um_extresrc_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'um_extresrc_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_extresrc_name' => [
                'um_extresrc_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => true],
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
            'um_extresrc_type' => [
                'um_extresrc_type' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Types', 'onchange' => 'this.form.submit();'],
                'um_extresrc_classification' => ['order' => 2, 'label_name' => 'Classification', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'um_extresrc_um_extmdl_code' => [
                'um_extresrc_um_extmdl_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Module', 'domain' => 'module_code_external', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules', 'onchange' => 'this.form.submit();'],
                'um_extresrc_icon' => ['order' => 2, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
            ],
            'um_extresrc_description' => [
                'um_extresrc_description' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 50, 'method' => 'textarea', 'rows' => 5],
                'um_extresrc_groups' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'description', 'null' => true, 'percent' => 50, 'method' => 'textarea', 'rows' => 5, 'placeholder' => 'Groups'],
            ],
            'um_extresrc_slug' => [
                'um_extresrc_slug' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'required' => true],
                'um_extresrc_menu_url' => ['order' => 2, 'label_name' => 'Menu URL', 'type' => 'text', 'null' => true],
            ],
            'um_extresrc_acl_public' => [
                'um_extresrc_acl_public' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Acl Public', 'type' => 'boolean', 'percent' => 15],
                'um_extresrc_acl_authorized' => ['order' => 2, 'label_name' => 'Acl Authorized', 'type' => 'boolean', 'percent' => 15],
                'um_extresrc_acl_permission' => ['order' => 3, 'label_name' => 'Acl Permission', 'type' => 'boolean', 'percent' => 15],
            ]
        ],
        'map_container' => [
            'row1' => [
                'um_extresmap_method_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Method Code', 'domain' => 'code', 'null' => true, 'percent' => 50, 'required' => true, 'placeholder' => 'Method Code'],
                'um_extresmap_um_extactn_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'default' => null, 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions::optionsGrouped', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'um_extresmap_disabled' => ['order' => 3, 'label_name' => 'Disabled', 'type' => 'boolean', 'percent' => 5],
                'um_extresmap_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                'um_extresmap_weight_enabled' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_extresmap_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'required_if_set' => ['um_extresmap_weight_enabled' => 1], 'percent' => 25],
            ]
        ],
        'weight_container' => [
            'um_extresrc_weight_enabled' => [
                'um_extresrc_weight_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Weight Enabled', 'type' => 'boolean', 'percent' => 25],
                'um_extresrc_weight_value' => ['order' => 2, 'label_name' => 'Weight Value', 'domain' => 'weight', 'null' => true, 'percent' => 25, 'required_if_set' => ['um_extresrc_weight_enabled' => 1]],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM External Resources',
        'model' => '\Numbers\Users\Users\Model\Resource\ExternalResources',
        'details' => [
            '\Numbers\Users\Users\Model\Resource\ExternalResourceMap' => [
                'name' => 'UM External Resource Map',
                'pk' => ['um_extresmap_tenant_id', 'um_extresmap_um_extresrc_id', 'um_extresmap_method_code', 'um_extresmap_um_extactn_id'],
                'type' => '1M',
                'map' => ['um_extresrc_tenant_id' => 'um_extresmap_tenant_id', 'um_extresrc_id' => 'um_extresmap_um_extresrc_id']
            ]
        ]
    ];
    public $loc = [
        'NF.Error.SlugMustStartWithParentSlug' => 'Slug must start with parent slug!'
    ];

    public function validate(\Object\Form\Base & $form)
    {
        if (empty($form->values['um_extresrc_code'])) {
            $form->validateQuickRequired('um_extresrc_code');
        }
        if ($form->hasErrors()) {
            return;
        }
        $parent_slug = ExternalModules::getSingleStatic([
            'where' => [
                'um_extmdl_tenant_id' => \Tenant::id(),
                'um_extmdl_code' => $form->values['um_extresrc_um_extmdl_code'],
            ]
        ])['um_extmdl_slug'] ?? '';
        if (!str_starts_with($form->values['um_extresrc_slug'], $parent_slug) || $form->values['um_extresrc_slug'] == $parent_slug) {
            $form->error(DANGER, loc('NF.Error.SlugMustStartWithParentSlug', 'Slug must start with parent slug!'), 'um_extresrc_slug');
        }
    }
}
