<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\SMS;

use Object\Form\Wrapper\SMS;

class UsersRegisterSimple extends SMS
{
    public $form_link = 'um_users_register_simple_sms';
    public $module_code = 'UM';
    public $title = 'U/M Users Register Simple SMS';
    public $options = [
        'all_static' => true,
    ];
    public $containers = [
        self::PANEL_BRAND => ['order' => 100, 'custom_renderer' => '\Numbers\Users\Users\Helper\Brand\SMS::renderTopSMSBrandName'],
        self::SMS_MESSAGE => ['order' => 200, 'custom_renderer' => 'self::renderMessage'],
    ];
    public $rows = [];
    public $elements = [];
    public $loc = [];

    public function renderMessage(& $form)
    {
        return $form->values['message'];
    }
}
