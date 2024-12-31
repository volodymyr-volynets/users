<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Email;

use Object\Form\Wrapper\Email;

class PasswordReset extends Email
{
    public $form_link = 'um_password_reset_email';
    public $module_code = 'UM';
    public $title = 'U/M Password Reset Email';
    public $options = [
        'segment' => [
            'type' => 'primary',
        ],
        'hide_module_id' => true,
        'all_static' => true,
    ];
    public $containers = [
        self::PANEL_LOGO => ['order' => 100, 'custom_renderer' => '\Numbers\Users\Users\Helper\Brand\Logo::renderTopLogo'],
        self::PANEL_MESSAGE => ['order' => 150, 'type' => 'panels', 'loc' => 'NF.Message.PasswordResetRequest', 'loc_options' => ['NF.Message.PasswordResetMessage']],
        'top_panel' => ['order' => 200, 'type' => 'panels'],
        'top_container' => ['default_row_type' => 'table', 'order' => 200, 'column_name_width_percent' => 25],
        'credentials_panel' => ['order' => 300, 'type' => 'panels'],
        'credentials_container' => ['default_row_type' => 'table', 'order' => 300, 'column_name_width_percent' => 25],
        self::PANEL_FOOTER => ['order' => PHP_INT_MAX]
    ];
    public $rows = [
        'top_panel' => [
            'center' => ['order' => 100, 'label_name' => 'User Information', 'loc' => 'NF.Form.UserInformation', 'panel_type' => 'primary', 'percent' => 100]
        ],
        'credentials_panel' => [
            'center' => ['order' => 100, 'label_name' => 'Credential Information', 'loc' => 'NF.Form.CredentialInformation', 'panel_type' => 'warning', 'percent' => 100]
        ],
    ];
    public $elements = [
        'top_panel' => [
            'center' => [
                'top' => ['container' => 'top_container', 'order' => 100],
            ],
        ],
        'credentials_panel' => [
            'center' => [
                'credentials' => ['container' => 'credentials_container', 'order' => 100],
            ],
        ],
        'top_container' => [
            'um_user_id' => [
                'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'loc' => 'NF.Form.UserID', 'domain' => 'user_id', 'percent' => 100],
            ],
            'um_user_name' => [
                'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'loc' => 'NF.Form.Name', 'domain' => 'name', 'percent' => 100],
            ],
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Email', 'loc' => 'NF.Form.Email', 'domain' => 'email', 'percent' => 100],
            ],
        ],
        'credentials_container' => [
            '__link_temporary' => [
                '__link_temporary' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Temporary Link', 'loc' => 'NF.Form.TemporaryLink', 'domain' => 'message', 'percent' => 100, 'custom_renderer' => 'self::renderResetLink'],
            ],
            '__link_raw' => [
                '__link_raw' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Raw Link', 'loc' => 'NF.Form.RawLink', 'domain' => 'message', 'percent' => 100, 'method' => 'pre', 'style' => 'width: 780px; overflow-x: scroll;'],
            ],
            '__link_valid' => [
                '__link_valid' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Link Valid', 'loc' => 'NF.Form.LinkValid', 'domain' => 'message', 'percent' => 100],
            ],
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'readonly' => true,
        'model' => '\Numbers\Users\Users\Model\Users',
    ];
    public $loc = [
        'NF.Form.ClickHere' => 'Click here',
        'NF.Message.LinkValidForHours' => 'Link is valid for {hours} hours',
        'NF.Message.PasswordResetRequest' => 'Password Reset Request!',
        'NF.Message.PasswordResetMessage' => 'You are receiving this Password Reset Email because you requested password reset in {config://brand.name.welcome} system.'
    ];

    public function refresh(& $form)
    {
        $crypt = new \Crypt();
        $form->values['__link_raw'] = \Request::buildURL('/Numbers/Users/Users/Controller/Password/Reset/_SetPassword', [
            'token' => urldecode($crypt->tokenCreate($form->values['um_user_id'], 'password.reset', null))
        ]);
        $form->values['__link_valid'] = loc('NF.Message.LinkValidForHours', $this->loc['NF.Message.LinkValidForHours'], ['hours' => $crypt->object->valid_hours]);
    }

    public function renderResetLink(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = '';
        $result .= \HTML::a([
            'href' => $form->values['__link_raw'],
            'value' => loc('NF.Form.ClickHere', 'Click here'),
        ]);
        return $result;
    }
}
