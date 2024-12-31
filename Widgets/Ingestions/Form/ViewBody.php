<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Form;

use Object\Form\Wrapper\Base;

class ViewBody extends Base
{
    public $form_link = 'wg_view_ingestion_body';
    public $module_code = 'WG';
    public $title = 'W/G View Ingestion Body Form';
    public $options = [];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'wg_ingestion_sender' => [
                'wg_ingestion_sender' => ['order' => 1, 'row_order' => 100, 'label_name' => 'From', 'type' => 'text', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'div', 'format' => 'encode'],
            ],
            'wg_ingestion_subject' => [
                'wg_ingestion_subject' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Subject', 'type' => 'text', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'div', 'format' => 'encode'],
            ],
            'wg_ingestion_to' => [
                'wg_ingestion_to' => ['order' => 1, 'row_order' => 300, 'label_name' => 'To', 'type' => 'text', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'div', 'format' => 'encode'],
            ],
            'wg_ingestion_body_id_preview' => [
                'wg_ingestion_body_id_preview' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Body', 'type' => 'text', 'null' => true, 'required' => true, 'custom_renderer' => '\Numbers\Users\Widgets\Ingestions\Form\ViewBody::renderPreview'],
            ],
            self::HIDDEN => [
                'wg_ingestion_id' => ['order' => 1, 'label_name' => 'Ingestion #', 'domain' => 'big_id', 'null' => true, 'method' => 'hidden'],
                'wg_ingestion_body_id' => ['order' => 2, 'label_name' => 'Body #', 'domain' => 'big_id', 'null' => true, 'method' => 'hidden'],
            ],
        ],
    ];
    public $collection = [];

    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            $model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Ingestions',
                'model' => $model->ingestions_model
            ];
        }
    }

    public function renderPreview(& $form, & $options, & $value, & $neighbouring_values)
    {
        $crypt = new \Crypt();
        return \HTML::iframe([
            'src' => \Request::host() . 'Numbers/Users/Widgets/Ingestions/Controller/IngestionBody?token=' . $crypt->tokenCreate($neighbouring_values['wg_ingestion_body_id'], 'ingestion.body'),
            'width' => '100%',
            'height' => '100%',
            'border' => 0,
            'style' => 'height: 700px;'
        ]);
    }
}
