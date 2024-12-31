<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Tags\Form;

use Numbers\Users\Widgets\Tags\Model\Tags;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class NewTag extends Base
{
    public $form_link = 'wg_new_tag';
    public $module_code = 'UM';
    public $title = 'U/M New Tag Form';
    public $options = [
        'on_success_refresh_parent' => true
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'wg_tag_id' => [
                'wg_tag_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Tag #', 'domain' => 'big_id_sequence', 'null' => true, 'readonly' => true],
            ],
            'wg_tag_name' => [
                'wg_tag_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'New Tag', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => 'c', 'method' => 'input'],
                'wg_tag_global_tag_id' => ['order' => 2, 'label_name' => 'Existing Tag', 'domain' => 'big_id', 'null' => true, 'percent' => 50, 'required' => 'c', 'placeholder' => 'Tag', 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Widgets\Tags\Model\Tags::optionsActive'],
            ],
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
                self::BUTTON_SUBMIT_DELETE => self::BUTTON_SUBMIT_DELETE_DATA + ['style' => 'display: none;'],
            ]
        ]
    ];
    public $collection = [];

    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            $model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Tags',
                'model' => $model->tags_model
            ];
        }
    }

    public function validate(& $form)
    {
        if (empty($form->values['wg_tag_name']) && empty($form->values['wg_tag_global_tag_id'])) {
            $form->error(DANGER, Messages::REQUIRED_FIELD, 'wg_tag_name');
            $form->error(DANGER, Messages::REQUIRED_FIELD, 'wg_tag_global_tag_id');
            return;
        }
        $model = new $form->options['model_table']();
        foreach ($model->tags['map'] as $k => $v) {
            if (isset($form->options['input'][$k])) {
                $form->values[$v] = (int) $form->options['input'][$k];
            }
        }
        // if we have a name we fetch existing id
        if (!empty($form->values['wg_tag_name'])) {
            $global_tags_model = new Tags();
            $global_tags_data = $global_tags_model->get([
                'where' => [
                    'um_tag_name' => $form->values['wg_tag_name'],
                ],
                'pk' => null
            ]);
            if (empty($global_tags_data)) {
                $global_tags_data = $global_tags_model->collection()->merge([
                    'um_tag_name' => $form->values['wg_tag_name'],
                ]);
                $form->values['wg_tag_global_tag_id'] = $global_tags_data['new_serials']['um_tag_id'];
            } else {
                $form->values['wg_tag_global_tag_id'] = $global_tags_data[0]['um_tag_id'];
            }
        }
    }
}
