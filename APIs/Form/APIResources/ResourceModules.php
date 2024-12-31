<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Form\APIResources;

use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class ResourceModules extends Base
{
    public $form_link = 'a3_api_resources_modules_form';
    public $module_code = 'A3';
    public $title = 'A/3 API Resources Resource Modules Form';
    public $options = [
        'actions' => [
            'refresh' => [
                'preserve_values' => ['sm_resource_module_code', 'sm_resource_version_code', 'sm_resource_id']
            ],
        ],
        'no_ajax_form_reload' => true,
        'skip_optimistic_lock' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'sm_resource_module_code' => [
                'sm_resource_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive', 'track_previous_values' => true, 'onchange' => 'this.form.submit();', 'preserved' => true],
                'sm_resource_version_code' => ['order' => 2, 'label_name' => 'Version', 'domain' => 'version_code', 'null' => true, 'default' => 'V1', 'required' => true, 'percent' => 50, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Backend\System\Modules\Model\Resources::optionsColumnSettings', 'options_params' => ['__column' => 'sm_resource_version_code', 'sm_resource_type' => 150], 'onchange' => 'this.form.submit();', 'preserved' => true],
            ],
            'full_text_search' => [
                'full_text_search' => ['order' => -200, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'null' => true, 'percent' => 100, 'placeholder' => 'Search', 'preserved' => true],
            ],
            'buttons' => [
                self::BUTTON_SUBMIT_OTHER => ['order' => 1, 'row_order' => 300] + self::BUTTON_SUBMIT_OTHER_DATA + ['style' => 'width: 100%;'],
            ],
            self::HIDDEN => [
                'sm_resource_id' => ['order' => 1, 'label_name' => 'Resource #', 'domain' => 'resource_id', 'null' => true, 'method' => 'hidden', 'preserved' => true],
                '__page_deleted' => ['order' => 2, 'label_name' => 'Page Deleted Flag', 'type' => 'boolean', 'null' => true, 'method' => 'hidden', 'preserved' => true],
            ]
        ],
    ];
    public $collection = [];

    public function overrides(& $form)
    {
        // onchange fields
        if (!empty($form->__options['input']['__form_onchange_field_values_key'])) {
            $__form_onchange_field_values_key = explode('[::]', $form->__options['input']['__form_onchange_field_values_key']);
        }
        // changes in fields
        if (($__form_onchange_field_values_key[0] ?? '') == 'sm_resource_module_code') {
            $form->values['sm_resource_id'] = null;
            $form->values['full_text_search'] = null;
        }
    }

    public function refresh(& $form)
    {
        if (!empty($form->values['__page_deleted'])) {
            $form->error(SUCCESS, Messages::RECORD_DELETED);
        }
        if (!empty($form->values['full_text_search']) && empty($form->values['sm_resource_module_code'])) {
            $form->error(DANGER, Messages::REQUIRED_FIELD, 'sm_resource_module_code');
        }
    }
}
