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

class ExternalActions extends Base
{
    public $form_link = 'um_external_actions_ids';
    public $module_code = 'UM';
    public $title = 'U/M External Actions Form';
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
            'um_extactn_id' => [
                'um_extactn_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Action #', 'domain' => 'action_id_sequence', 'required' => 'c', 'percent' => 50, 'navigation' => true],
                'um_extactn_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'um_extactn_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_extactn_name' => [
                'um_extactn_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 75],
                'um_extactn_order' => ['order' => 2, 'label_name' => 'Order', 'domain' => 'order', 'default' => 10000, 'null' => true, 'required' => true, 'percent' => 25],
            ],
            'um_extactn_icon' => [
                'um_extactn_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50],
                'um_extactn_parent_um_extactn_id' => ['order' => 2, 'label_name' => 'Parent', 'domain' => 'action_id', 'default' => null, 'null' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions'],
                'um_extactn_prohibitive' => ['order' => 3, 'label_name' => 'Prohibitive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM External Actions',
        'model' => '\Numbers\Users\Users\Model\Resource\ExternalActions'
    ];
    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if (empty($form->values['um_extactn_code'])) {
            $form->validateQuickRequired('um_extactn_code');
        }
    }
}
