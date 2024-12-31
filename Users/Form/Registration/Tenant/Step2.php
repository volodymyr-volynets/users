<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Registration\Tenant;

class Step2
{
    /**
     * Render
     *
     * @return string
     */
    public function render()
    {
        $input = \Request::input();
        $options = [
            'type' => 'success',
            'options' => [
                i18n(null, 'Please check [email] and click the link provided to confirm your registration.', [
                    'replace' => [
                        '[email]' => $input['email'] ?? i18n(null, 'your email')
                    ]
                ]),
                i18n(null, 'If you did not receive the email, please check your junk/spam mailbox.')
            ]
        ];
        return \HTML::message($options);
    }
}
