<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Form\Wrapper\Base;

class Signatures extends Base
{
    public $form_link = 'um_signatures';
    public $module_code = 'UM';
    public $title = 'U/M Signatures Form';
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
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_usrsign_id' => [
                'um_usrsign_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Signature #', 'domain' => 'signature_id_sequence', 'percent' => 95, 'navigation' => true],
                'um_usrsign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_usrsign_name' => [
                'um_usrsign_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'um_usrsign_user_id' => [
                'um_usrsign_user_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Users::optionsActive'],
                'um_usrsign_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive'],
            ],
            'um_usrsign_content_wysiwyg' => [
                'um_usrsign_content_wysiwyg' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Signature', 'domain' => 'content', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'wysiwyg'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM User Signatures',
        'model' => '\Numbers\Users\Users\Model\User\Signatures',
    ];
}
