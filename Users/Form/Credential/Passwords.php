<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Credential;

use Numbers\Users\Users\Model\Credential\Type\Values;
use Object\Form\Wrapper\Base;

class Passwords extends Base
{
    public $form_link = 'um_passwords';
    public $module_code = 'UM';
    public $title = 'U/M Passwords Form';
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
        'values_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Credential\Password\Values',
            'details_pk' => ['um_passwval_name'],
            'required' => true,
            'order' => 800,
        ],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_password_code' => [
                'um_password_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
                'um_password_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_password_name' => [
                'um_password_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'um_password_passtype_code' => [
                'um_password_passtype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Credential\Types::optionsActive', 'onchange' => 'this.form.submit();'],
            ]
        ],
        'values_container' => [
            'row1' => [
                'um_passwval_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50, 'onblur' => 'this.form.submit();'],
                'um_passwval_encrypted_password' => ['order' => 2, 'label_name' => 'Value', 'domain' => 'encrypted_password', 'null' => true, 'required' => true, 'percent' => 45],
                'um_passwval_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_passwval_timestamp' => ['label_name' => 'Timestamp', 'type' => 'timestamp', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Passwords',
        'model' => '\Numbers\Users\Users\Model\Credential\Passwords',
        'details' => [
            '\Numbers\Users\Users\Model\Credential\Password\Values' => [
                'name' => 'Values',
                'pk' => ['um_passwval_tenant_id', 'um_passwval_password_code', 'um_passwval_name'],
                'type' => '1M',
                'map' => ['um_password_tenant_id' => 'um_passwval_tenant_id', 'um_password_code' => 'um_passwval_password_code']
            ],
        ]
    ];

    public function refresh(& $form)
    {
        if (!empty($form->values['um_password_passtype_code'])) {
            $presets = Values::getStatic([
                'where' => [
                    'um_passtpval_passtype_code' => $form->values['um_password_passtype_code'],
                    'um_passtpval_preset' => 1,
                ],
                'pk' => ['um_passtpval_name'],
                'columns' => ['um_passtpval_name'],
                'orderby' => ['um_passtpval_timestamp' => SORT_ASC]
            ]);
            $existing = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\Credential\Password\Values'], 'um_passwval_name');
            foreach ($presets as $k => $v) {
                if (!in_array($k, $existing)) {
                    $form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][] = [
                        'um_passwval_name' => $k,
                    ];
                }
            }
        }
    }

    public function loadOriginalValues(& $form)
    {
        $crypt = new \Crypt();
        foreach ($form->original_values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
            $form->original_values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->decrypt($v['um_passwval_encrypted_password']);
        }
    }

    public function loadValues(& $form)
    {
        $crypt = new \Crypt();
        foreach ($form->values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
            $form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->decrypt($v['um_passwval_encrypted_password']);
        }
    }

    public function validate(& $form)
    {
        if (!$form->hasErrors()) {
            $crypt = new \Crypt();
            foreach ($form->values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
                $form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->encrypt($v['um_passwval_encrypted_password']);
                // timestamp
                if (empty($v['um_passtpval_timestamp'])) {
                    $form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_timestamp'] = \Format::now('timestamp');
                }
            }
            $form->values['um_password_value_counter'] = count($form->values['\Numbers\Users\Users\Model\Credential\Password\Values']);
        }
    }
}
