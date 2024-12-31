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

class UsersInviteSimple extends Email
{
    public $form_link = 'um_users_invite_simple_email';
    public $module_code = 'UM';
    public $title = 'U/M Users Invite Simple Email';
    public $options = [
        'segment' => [
            'type' => 'primary',
        ],
        'hide_module_id' => true,
        'all_static' => true,
    ];
    public $containers = [
        self::PANEL_LOGO => ['order' => 100, 'custom_renderer' => '\Numbers\Users\Users\Helper\Brand\Logo::renderTopLogo'],
        'top_panel' => ['order' => 200, 'type' => 'panels'],
        'top_container' => ['order' => 200],
        self::PANEL_FOOTER => ['order' => PHP_INT_MAX]
    ];
    public $rows = [
        'top_panel' => [
            'center' => ['order' => 100, 'label_name' => 'Invite Message', 'loc' => 'NF.Form.InviteMessage', 'panel_type' => 'primary', 'percent' => 100]
        ],
    ];
    public $elements = [
        'top_panel' => [
            'center' => [
                'top' => ['container' => 'top_container', 'order' => 100],
            ],
        ],
        'top_container' => [
            'message' => [
                'message' => ['order' => 1, 'row_order' => 100, 'label_name' => ' ', 'domain' => 'message', 'percent' => 100, 'custom_renderer' => 'self::renderMessage'],
            ],
        ],
    ];
    public $loc = [];

    public function renderMessage(& $form, & $options, & $value, & $neighbouring_values)
    {
        return str_replace('{url}', $form->values['success_url'], $form->values['message']);
    }
}
