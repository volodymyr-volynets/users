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

class UsersRegisterSimple extends Email
{
    public $form_link = 'um_users_registration_simple_email';
    public $module_code = 'UM';
    public $title = 'U/M Users Registration Simple Email';
    public $options = [
        'segment' => [
            'type' => 'primary',
        ],
        'hide_module_id' => true,
        'all_static' => true,
    ];
    public $containers = [
        self::PANEL_LOGO => ['order' => 100, 'custom_renderer' => '\Numbers\Users\Users\Helper\Brand\Logo::renderTopLogo'],
        self::PANEL_MESSAGE => ['order' => 150, 'type' => 'panels', 'loc' => 'NF.Message.WelcomeToBrand', 'loc_options' => ['NF.Message.UsersRegisterSimple']],
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
            'um_user_phone' => [
                'um_user_phone' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Phone', 'loc' => 'NF.Form.Phone', 'domain' => 'phone', 'percent' => 100],
            ],
            'um_user_type_id' => [
                'um_user_type_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Type', 'loc' => 'NF.Form.Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
            ],
            'um_role_ids' => [
                '\Numbers\Users\Users\Model\User\Roles' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Roles', 'loc' => 'NF.Form.Roles', 'domain' => 'role_id', 'multiple_column' => 'um_usrrol_role_id', 'percent' => 100, 'options_model' => '\Numbers\Users\Users\Model\Roles'],
            ],
            'on_organization_ids' => [
                '\Numbers\Users\Users\Model\User\Organizations' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Organizations', 'loc' => 'NF.Form.Organizations', 'domain' => 'organization_id', 'multiple_column' => 'um_usrorg_organization_id', 'percent' => 100, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations'],
            ],
        ],
        'credentials_container' => [
            'um_user_email' => [
                'um_user_email' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Email', 'loc' => 'NF.Form.Email', 'domain' => 'email', 'percent' => 100],
            ],
            '__um_user_login_password' => [
                '__um_user_login_password' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Password', 'loc' => 'NF.Form.Password', 'domain' => 'password', 'percent' => 100, 'custom_renderer' => 'self::renderPassword'],
            ]
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'readonly' => true,
        'model' => '\Numbers\Users\Users\Model\Users',
        'details' => [
            '\Numbers\Users\Users\Model\User\Roles' => [
                'name' => 'UM User Roles',
                'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Organizations' => [
                'name' => 'UM User Organizations',
                'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
            ],
        ]
    ];

    public $loc = [
        'NF.Form.ResetPassword' => 'Reset Password',
        'NF.Message.WelcomeToBrand' => 'Welcome to {config://brand.name.welcome}!',
        'NF.Message.UsersRegisterSimple' => 'You are receiving this Registration Email because you registered in {config://brand.name.welcome} system.'
    ];

    public function renderPassword(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = $form->values['__um_user_login_password'] ?? '';
        $crypt = new \Crypt();
        $result .= '&nbsp;&nbsp;&nbsp;';
        $result .= \HTML::a([
            'href' => \Request::buildURL('/Numbers/Users/Users/Controller/Password/Reset/_SetPassword', [
                'token' => urldecode($crypt->tokenCreate($form->values['um_user_id'], 'password.reset', null))
            ]),
            'value' => loc('NF.Form.ResetPassword', 'Reset Password'),
        ]);
        return $result;
    }
}
