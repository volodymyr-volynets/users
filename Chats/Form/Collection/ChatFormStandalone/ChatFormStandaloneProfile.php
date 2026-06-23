<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormStandalone;

use Object\Form\Wrapper\Base;

class ChatFormStandaloneProfile extends Base
{
    public $form_link = 'c5_chat_standalone_user_profile_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone User Profile Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'readonly' => true,
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'photo_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
        'preferences_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Users\Users\Model\User\Preferences',
            'details_pk' => ['um_usrpreference_user_id'],
            'order' => 35002
        ],
        'mentions_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Mentions',
            'details_pk' => ['um_usrmention_id'],
            'order' => 35000,
        ],
    ];
    public $rows = [
        'top' => [
            'um_user_id' => ['order' => 100],
            'um_user_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'photo' => ['order' => 500, 'label_name' => 'Photo'],
            'preferences' => ['order' => 700, 'label_name' => 'Preferences'],
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA
        ]
    ];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true],
                'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => false, 'persistent' => true, 'readonly' => true]
            ],
            'um_user_name' => [
                'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
                'contact' => ['container' => 'contact_container', 'order' => 200]
            ],
            'photo' => [
                'photo' => ['container' => 'photo_container', 'order' => 100],
            ],
            'preferences' => [
                'mentions' => ['container' => 'mentions_container', 'order' => 200],
            ],
        ],
        'general_container' => [
            self::HIDDEN => [
                'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                'um_user_numeric_phone' => ['label_name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
            ],
            'um_user_title' => [
                'um_user_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
                'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
            ],
            'um_user_company' => [
                'um_user_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
            ],
            'separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'fa-regular fa-envelope', 'percent' => 100],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'um_user_phone' => [
                'um_user_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'um_user_cell' => [
                'um_user_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'um_user_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ]
        ],
        'photo_container' => [
            '__logo_preview' => [
                '__logo_preview' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Preview Photo', 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'um_user_photo_file_id'],
            ],
            self::HIDDEN => [
                'um_user_photo_file_id' => ['name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'mentions_container' => [
            'row1' => [
                'um_usrmention_mention' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Mention', 'domain' => 'mention', 'null' => true, 'required' => true, 'percent' => 50],
                'um_usrmention_language_code' => ['order' => 2, 'label_name' => 'Language Code', 'domain' => 'language_code', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrmention_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_usrmention_id' => ['label_name' => 'Mention #', 'domain' => 'big_id_sequence', 'null' => true, 'method' => 'hidden'],
            ]
        ],
    ];
    public $collection = [
        'name' => 'UM Users',
        'model' => '\Numbers\Users\Users\Model\Users',
        'readonly' => true,
        'details' => [
            '\Numbers\Users\Users\Model\User\Mentions' => [
                'name' => 'UM Mentions',
                'readonly' => true,
                'pk' => ['um_usrmention_tenant_id', 'um_usrmention_user_id', 'um_usrmention_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrmention_tenant_id', 'um_user_id' => 'um_usrmention_user_id']
            ],
        ]
    ];
}
