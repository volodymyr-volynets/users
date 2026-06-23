<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Collection\Personalizations;

use Object\Form\Wrapper\Base;

class PersonalizationResizeImageSubform extends Base
{
    public $form_link = 'um_personalization_resize_image_subform_form';
    public $module_code = 'UM';
    public $title = 'U/M Personalization Resize Image Subform Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'react_container' => ['default_row_type' => 'grid', 'order' => 200, 'custom_renderer' => 'self::renderPersonalizationResizeImageContainer'],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            self::HIDDEN => [
                'um_usrpersonal_user_id' => ['label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'um_usrpersonal_module_code' => ['label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'method' => 'hidden'],
                // IDs
                'id_file_id' => ['label_name' => 'File ID', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'id_file_url' => ['label_name' => 'File URL ID', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'id_save_id' => ['label_name' => 'Save ID', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'hidden'],
            ]
        ],
    ];
    public $collection = [];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if ($form->hasErrors()) {
            return;
        }
    }

    public function renderPersonalizationResizeImageContainer(& $form)
    {
        $result = \Template::renderStatic(\Template::REACT_TSX, '/Numbers/Users/Users/View/PersonalizationResizeImage.template.react.tsx', [
            '__root' => 'numbers_controller_and_view_personalization_resize_image',
            '__subform' => true,
            '__component' => 'PersonalizationResizeImage',
            '__localStorage' => ['Internalization.Settings' => 'i18n', 'Users.BearerToken' => ''],
            // parameters
            'um_usrpersonal_user_id' => $form->values['um_usrpersonal_user_id'],
            'um_usrpersonal_module_code' => $form->values['um_usrpersonal_module_code'],
            'id_file_id' => $form->values['id_file_id'],
            'id_file_url' => $form->values['id_file_url'],
            'id_save_id' => $form->values['id_save_id'],
            'id_subform_id' => 'um_personalization_resize_image_subform_form',
        ]);
        return $result;
    }
}
