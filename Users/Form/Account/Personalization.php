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
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class Personalization extends Base
{
    public $form_link = 'um_account_personalization';
    public $module_code = 'UM';
    public $title = 'U/M Account Personalization Form';
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
        'personalization_container' => [
            'type' => 'details',
            'details_rendering_type' => 'grid_with_label',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\User\Personalizations',
            'details_pk' => ['um_usrpersonal_module_code'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'personalization' => ['order' => 100, 'label_name' => 'Personalization'],
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
            'personalization' => [
                'personalization' => ['container' => 'personalization_container', 'order' => 100],
            ],
        ],
        'personalization_container' => [
            'um_usrpersonal_module_code' => [
                'um_usrpersonal_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_usrpersonal_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'um_usrpersonal_name' => [
                'um_usrpersonal_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => true],
                'um_usrpersonal_is_avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'boolean', 'percent' => 5, 'onchange' => 'this.form.submit();'],
                '__upload' => ['order' => 3, 'label_name' => ' ', 'type' => 'text', 'percent' => 25, 'custom_renderer' => 'self::renderUploadImage'],
                '__show' => ['order' => 4, 'label_name' => ' ', 'type' => 'text', 'percent' => 20, 'custom_renderer' => 'self::renderPhotoAndAvatar'],
            ],
            'um_usrpersonal_biography_wysiwyg' => [
                'um_usrpersonal_biography_wysiwyg' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Biography', 'domain' => 'content', 'null' => true, 'required' => false, 'percent' => 100, 'method' => 'wysiwyg'],
            ],
            'um_usrpersonal_um_usrsign_id' => [
                'um_usrpersonal_um_usrsign_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Signature', 'domain' => 'signature_id', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Signatures::optionsActive', 'options_depends' => ['um_usrsign_user_id' => 'parent::um_user_id']],
                'um_usrpersonal_um_usrterm_id' => ['order' => 2, 'label_name' => 'Term', 'domain' => 'bigterm_id', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Terms::optionsActive', 'options_depends' => ['um_usrterm_user_id' => 'parent::um_user_id']],
            ],
            self::HIDDEN => [
                'um_usrpersonal_photo_file_id' => ['label_name' => 'Photo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
                'um_usrpersonal_photo_file_url' => ['label_name' => 'Photo File URL', 'domain' => 'url', 'null' => true, 'method' => 'hidden'],
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
            '\Numbers\Users\Users\Model\User\Personalizations' => [
                'name' => 'UM User Personalizations',
                'pk' => ['um_usrpersonal_tenant_id', 'um_usrpersonal_user_id', 'um_usrpersonal_module_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrpersonal_tenant_id', 'um_user_id' => 'um_usrpersonal_user_id']
            ],
        ]
    ];
    public $subforms = [
        'um_personalization_resize_image_subform_form' => [
            'form' => '\Numbers\Users\Users\Form\Collection\Personalizations\PersonalizationResizeImageSubform',
            'label_name' => 'Upload and Resize Image',
            'icon' => 'fa-regular fa-file-image',
            'actions' => [
                'edit' => ['name' => 'Upload and Resize Image', 'append' => true, 'icon' => 'fa-regular fa-file-image'],
            ]
        ],
    ];

    public function overrides(& $form)
    {
        $form->values['um_user_id'] = \User::id();
    }

    public function renderUploadImage(& $form, & $options, & $value, & $neighbouring_values)
    {
        $id = $options['options']['id'] ?? null;
        if (!$id || empty($neighbouring_values['um_usrpersonal_module_code'])) {
            return '';
        }
        // we show upload button if no avatar
        if (empty($neighbouring_values['um_usrpersonal_is_avatar'])) {
            $onclick = $form->generateSubformLink('um_personalization_resize_image_subform_form', $this->subforms['um_personalization_resize_image_subform_form'], [
                'um_usrpersonal_user_id' => $form->values['um_user_id'],
                'um_usrpersonal_module_code' => $neighbouring_values['um_usrpersonal_module_code'],
                'id_file_id' => str_replace('__upload', 'um_usrpersonal_photo_file_id', $id),
                'id_file_url' => str_replace('__upload', 'um_usrpersonal_photo_file_url', $id),
                'id_save_id' => 'form_um_account_personalization_element___submit_save',
            ], ['link_only' => true]);
            return \HTML::a(['value' => loc('NF.Form.Upload', 'Upload'), 'href' => 'javascript:void(0);', 'onclick' => $onclick]);
        } else {
            return '';
        }
    }

    public function renderPhotoAndAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (empty($neighbouring_values['um_usrpersonal_is_avatar'])) {
            if (!empty($neighbouring_values['um_usrpersonal_photo_file_url'])) {
                return Colors::renderPhoto($neighbouring_values['um_usrpersonal_name'] ?? '', $neighbouring_values['um_usrpersonal_photo_file_url'], 'circle') . ' ' . Colors::renderPhoto($neighbouring_values['um_usrpersonal_name'] ?? '', $neighbouring_values['um_usrpersonal_photo_file_url'], 'square');
            }
        } else {
            if (!empty($neighbouring_values['um_usrpersonal_name'])) {
                return Colors::renderAvatar($neighbouring_values['um_usrpersonal_name'], 'user');
            }
        }
        return '';
    }
}
