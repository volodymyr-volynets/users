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

class Step4
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
                i18n(null, 'Congratulations! You have successfully registered.'),
                i18n(null, 'You can now sign in into your account. [signin].', [
                    'replace' => [
                        '[signin]' => \HTML::a(['href' => $input['url'] ?? null, 'value' => i18n(null, 'Sign In')])
                    ]
                ])
            ]
        ];
        return \HTML::message($options);
    }
}
