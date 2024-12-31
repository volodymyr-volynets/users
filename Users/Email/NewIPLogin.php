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

class NewIPLogin extends Email
{
    public $form_link = 'um_new_ip_login_email';
    public $module_code = 'UM';
    public $title = 'U/M New IP Login Email';
    public $options = [
        'segment' => [
            'type' => 'primary',
        ],
        'hide_module_id' => true,
        'all_static' => true,
    ];
    public $containers = [
        self::PANEL_LOGO => ['order' => 100, 'custom_renderer' => '\Numbers\Users\Users\Helper\Brand\Logo::renderTopLogo'],
        self::PANEL_MESSAGE => ['order' => 150, 'type' => 'panels', 'loc' => 'NF.Message.NewIPLogin', 'loc_options' => ['NF.Message.NewIPMessage']],
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
            'um_usrlogin_ip_address' => [
                'um_usrlogin_ip_address' => ['order' => 1, 'row_order' => 100, 'label_name' => 'IP Address', 'loc' => 'NF.Form.IPAddress', 'domain' => 'message', 'percent' => 100],
            ],
            'um_usrlogin_ip_description' => [
                'um_usrlogin_ip_description' => ['order' => 1, 'row_order' => 200, 'label_name' => 'IP Description', 'loc' => 'NF.Form.IPDescription', 'domain' => 'message', 'percent' => 100],
            ],
            'um_usrlogin_ip_provider' => [
                'um_usrlogin_ip_provider' => ['order' => 1, 'row_order' => 300, 'label_name' => 'IP Provider', 'loc' => 'NF.Form.IPProvider', 'domain' => 'message', 'percent' => 100],
            ],
            'um_usrlogin_authorization_type' => [
                'um_usrlogin_authorization_type' => ['order' => 1, 'row_order' => 350, 'label_name' => 'Authorization Type', 'loc' => 'NF.Form.AuthorizationType', 'domain' => 'name', 'percent' => 100],
            ],
            '__ip_image' => [
                '__ip_image' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Map Location', 'loc' => 'NF.Form.MapLocation', 'domain' => 'message', 'percent' => 100, 'custom_renderer' => 'self::renderMap'],
            ],
        ]
    ];
    public $collection = [
        'name' => 'UM Users',
        'readonly' => true,
        'model' => '\Numbers\Users\Users\Model\Users',
    ];
    public $loc = [
        'NF.Message.GoogleMapOf' => 'Google map of {location}',
        'NF.Message.NewIPLogin' => 'New IP Login!',
        'NF.Message.NewIPMessage' => 'You are receiving this New IP Login Email because you logged in into {config://brand.name.welcome} system with new IP address.'
    ];

    public function renderMap(& $form, & $options, & $value, & $neighbouring_values)
    {
        return '<img width="600" src="https://maps.googleapis.com/maps/api/staticmap?center=' . urlencode($form->values['um_usrlogin_ip_description']) . '&zoom=13&scale=2&size=600x300&maptype=roadmap&format=png&key=' . \Application::get('google.maps.api_key') . '" alt="' . loc('NF.Message.GoogleMapOf', 'Google map of {location}', ['location' => $form->values['um_usrlogin_ip_description']]) . '" />';
    }
}
