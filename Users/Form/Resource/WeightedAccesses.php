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

class WeightedAccesses extends Base
{
    public $form_link = 'um_weighted_accesses';
    public $module_code = 'UM';
    public $title = 'U/M Weighted Accesses Form';
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
            'um_weiaccess_id' => [
                'um_weiaccess_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Weighted #', 'domain' => 'weight', 'null' => true, 'percent' => 95, 'navigation' => true],
                'um_weiaccess_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_weiaccess_name' => [
                'um_weiaccess_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
            ],
            'um_weiaccess_icon' => [
                'um_weiaccess_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100],
            ],
            'um_weiaccess_description' => [
                'um_weiaccess_description' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea', 'rows' => 3],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Weighted Accesses',
        'model' => '\Numbers\Users\Users\Model\Resource\WeightedAccesses'
    ];
    public $loc = [];

    public function validate(& $form)
    {
        $form->validateQuickRequired('um_weiaccess_id');
    }
}
