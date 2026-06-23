<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Account;

use Object\Form\Wrapper\Base;

class Signatures extends Base
{
    public $form_link = 'um_account_signatures';
    public $module_code = 'UM';
    public $title = 'U/M Account Signatures Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
        ],
        'skip_shared_access' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'signatures_container' => [
            'type' => 'details',
            'details_rendering_type' => 'grid_with_label',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Signatures',
            'details_pk' => ['um_usrsign_id'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'signatures' => ['order' => 100, 'label_name' => 'Signatures'],
        ]
    ];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true],
                'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true]
            ],
            'um_user_name' => [
                'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c', 'readonly' => true],
            ]
        ],
        'tabs' => [
            'signatures' => [
                'signatures' => ['container' => 'signatures_container', 'order' => 100],
            ],
        ],
        'signatures_container' => [
            'um_usrsign_name' => [
                'um_usrsign_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => true],
                'um_usrsign_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrsign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_usrsign_content_wysiwyg' => [
                'um_usrsign_content_wysiwyg' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Signature', 'domain' => 'content', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'wysiwyg'],
            ],
            self::HIDDEN => [
                'um_usrsign_id' => ['label_name' => 'Signature #', 'domain' => 'signature_id_sequence', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'model' => '\Numbers\Users\Users\Model\Users',
        'details' => [
            '\Numbers\Users\Users\Model\User\Signatures' => [
                'name' => 'UM User Signatures',
                'pk' => ['um_usrsign_tenant_id', 'um_usrsign_user_id', 'um_usrsign_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsign_tenant_id', 'um_user_id' => 'um_usrsign_user_id']
            ],
        ]
    ];

    public function overrides(& $form)
    {
        $form->values['um_user_id'] = \User::id();
    }
}
