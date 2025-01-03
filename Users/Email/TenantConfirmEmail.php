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

use Numbers\Users\Users\Model\Registration\Tenants;
use Object\Form\Base;
use Object\Form\Wrapper\Email;

class TenantConfirmEmail extends Email
{
    public $form_link = 'um_tenant_confirm_email';
    public $module_code = 'UM';
    public $title = 'U/M Tenant Confirm Email';
    public $options = [
        'segment' => [
            'type' => 'primary',
        ],
        'hide_module_id' => true,
    ];
    public $containers = [
        'head' => ['order' => -100, 'custom_renderer' => 'self::workflowActionButtonsTop'],
        'head2' => ['order' => -50, 'type' => 'panels'],
        'head2_container' => ['order' => 32006, 'custom_renderer' => 'self::renderMainText'],
    ];
    public $rows = [
        'head2' => [
            'center' => ['order' => 100, 'label_name' => 'Tenant Email Confirmation', 'panel_type' => 'danger', 'percent' => 100]
        ],
    ];
    public $elements = [
        'head2' => [
            'center' => [
                'center' => ['container' => 'head2_container', 'order' => 100],
            ],
        ],
    ];
    public $collection = [
        'name' => 'PM Registration Tenants',
        'model' => Tenants::class
    ];

    public function refresh(Base & $form)
    {

    }

    public function renderMainText(Base & $form)
    {
        $result = [];
        $crypt = new \Crypt();
        $href = \Application::get('mvc.full_with_host') . '?__wizard_step=3&token=' . $crypt->tokenCreate($form->values['um_regten_id'], 'registration.tenant');
        $result[] = i18n(null, 'Please [link] to continue the registration process.', ['replace' => ['[link]' => \HTML::a(['value' => i18n(null, 'click here'), 'class' => 'link-danger', 'href' => $href])]]);
        $result[] = '&nbsp;';
        $result[] = i18n(null, 'Or paste this into a browser:');
        $result[] = '&nbsp;';
        $result[] = $href;
        $result[] = '&nbsp;';
        $result[] = i18n(null, "Please note that this link is only active for [Token_Valid_Hours] hours after receipt. After this time limit has expired the token will not work and you will need to resubmit the registration request.", [
            'replace' => [
                '[Token_Valid_Hours]' => $crypt->object->valid_hours
            ]
        ]);
        $result[] = '&nbsp;';
        $result[] = i18n(null, 'Thank you!');
        return implode('<br/>', $result);
    }

    public function workflowActionButtonsTop(& $form)
    {
        $logo_url = \Registry::get('websites.NumbersSoft.logo_url');
        $result = '';
        if ($logo_url) {
            $result .= '<table>';
            $result .= '<tr>';
            $result .= '<td><img src="' . \Request::host() . $logo_url . '" alt="Logo" /></td>';
            $result .= '</tr>';
            $result .= '</table>';
        }
        return $result;
    }
}
