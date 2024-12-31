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

class MyPasswords extends Base
{
    public $form_link = 'um_my_passwords';
    public $module_code = 'UM';
    public $title = 'U/M My Passwords Form';
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
            'details_key' => '\Numbers\Users\Users\Model\Credential\MyPassword\Values',
            'details_pk' => ['um_mypasswval_name'],
            'required' => true,
            'order' => 800,
        ],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_mypasswd_id' => [
                'um_mypasswd_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Password #', 'domain' => 'password_id', 'percent' => 95, 'navigation' => true],
                'um_mypasswd_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_mypasswd_name' => [
                'um_mypasswd_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'um_mypasswd_passtype_code' => [
                'um_mypasswd_passtype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Credential\Types::optionsActive', 'onchange' => 'this.form.submit();'],
            ]
        ],
        'values_container' => [
            'row1' => [
                'um_mypasswval_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50, 'onblur' => 'this.form.submit();'],
                'um_mypasswval_encrypted_password' => ['order' => 2, 'label_name' => 'Value', 'domain' => 'encrypted_password', 'null' => true, 'required' => true, 'percent' => 45],
                'um_mypasswval_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            self::HIDDEN => [
                'um_mypasswval_timestamp' => ['label_name' => 'Timestamp', 'type' => 'timestamp', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'My Passwords',
        'model' => '\Numbers\Users\Users\Model\Credential\MyPasswords',
        'acl_datasource' => '\Numbers\Users\Users\DataSource\Credential\MyPasswords',
        'details' => [
            '\Numbers\Users\Users\Model\Credential\MyPassword\Values' => [
                'name' => 'Values',
                'pk' => ['um_mypasswval_tenant_id', 'um_mypasswval_mypasswd_id', 'um_mypasswval_name'],
                'type' => '1M',
                'map' => ['um_mypasswd_tenant_id' => 'um_mypasswval_tenant_id', 'um_mypasswd_id' => 'um_mypasswval_mypasswd_id']
            ],
        ]
    ];

    public function refresh(& $form)
    {
        if (!empty($form->values['um_mypasswd_passtype_code'])) {
            $presets = Values::getStatic([
                'where' => [
                    'um_passtpval_passtype_code' => $form->values['um_mypasswd_passtype_code'],
                    'um_passtpval_preset' => 1,
                ],
                'pk' => ['um_passtpval_name'],
                'columns' => ['um_passtpval_name'],
                'orderby' => ['um_passtpval_timestamp' => SORT_ASC]
            ]);
            $existing = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'], 'um_mypasswval_name');
            foreach ($presets as $k => $v) {
                if (!in_array($k, $existing)) {
                    $form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'][] = [
                        'um_mypasswval_name' => $k,
                    ];
                }
            }
        }
    }

    public function loadOriginalValues(& $form)
    {
        $crypt = new \Crypt();
        foreach ($form->original_values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'] as $k => $v) {
            $form->original_values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'][$k]['um_mypasswval_encrypted_password'] = $crypt->decrypt($v['um_mypasswval_encrypted_password']);
        }
    }

    public function loadValues(& $form)
    {
        $crypt = new \Crypt();
        foreach ($form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'] as $k => $v) {
            $form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'][$k]['um_mypasswval_encrypted_password'] = $crypt->decrypt($v['um_mypasswval_encrypted_password']);
        }
    }

    public function validate(& $form)
    {
        if (!$form->hasErrors()) {
            $crypt = new \Crypt();
            foreach ($form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'] as $k => $v) {
                $form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'][$k]['um_mypasswval_encrypted_password'] = $crypt->encrypt($v['um_mypasswval_encrypted_password']);
                // timestamp
                if (empty($v['um_passtpval_timestamp'])) {
                    $form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values'][$k]['um_mypasswval_timestamp'] = \Format::now('timestamp');
                }
            }
            $form->values['um_mypasswd_value_counter'] = count($form->values['\Numbers\Users\Users\Model\Credential\MyPassword\Values']);
        }
    }
}
