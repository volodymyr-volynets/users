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

class ExternalModules extends Base
{
    public $form_link = 'um_external_modules';
    public $module_code = 'UM';
    public $title = 'U/M External Modules Form';
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
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_extmdl_code' => [
                'um_extmdl_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module Code', 'domain' => 'module_code_external', 'percent' => 95, 'navigation' => true],
                'um_extmdl_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_extmdl_name' => [
                'um_extmdl_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 75, 'required' => true],
                'um_extmdl_abbreviation' => ['order' => 2, 'label_name' => 'Abbreviation', 'domain' => 'name', 'percent' => 25, 'required' => true],
            ],
            'um_extmdl_type' => [
                'um_extmdl_type' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Module\Types', 'options_options' => ['i18n' => 'skip_sorting']],
                'um_extmdl_transactions' => ['order' => 3, 'label_name' => 'Transactions', 'type' => 'boolean', 'percent' => 25],
                'um_extmdl_multiple' => ['order' => 4, 'label_name' => 'Multiple', 'type' => 'boolean', 'percent' => 25],
            ],
            'um_extmdl_icon' => [
                'um_extmdl_icon' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
                'um_extmdl_slug' => ['order' => 2, 'label_name' => 'Slug', 'domain' => 'slug', 'null' => true, 'percent' => 50, 'required' => true],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM External Modules',
        'model' => '\Numbers\Users\Users\Model\Resource\ExternalModules'
    ];
    public $loc = [
        'NF.Error.SlugMustStartWithExternal' => 'Slug must start with "external-" and must continue to have value!',
    ];

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        if (!str_starts_with($form->values['um_extmdl_slug'], 'external-') || $form->values['um_extmdl_slug'] == 'external-') {
            $form->error(DANGER, loc('NF.Error.SlugMustStartWithExternal', 'Slug must start with "external-" and must continue to have value!'), 'um_extmdl_slug');
        }
    }
}
