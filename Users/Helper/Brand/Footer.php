<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Brand;

class Footer
{
    /**
     * Render footer
     */
    public function renderBottomFooter(& $form)
    {
        $name = \Application::get('brand.name.welcome');
        $address = \Application::get('brand.name.address');
        $user_id = $form->values['um_user_id'] ?? $form->values['user_id'] ?? null;
        // render
        $result = '<table>';
        if ($name) {
            $result .= '<tr><td>© ' . $name . ' ' . date('Y') . '</td></tr>';
        }
        if ($user_id) {
            $result .= '<tr><td>';
            $result .= loc('NF.Message.DoNotWantToReceiveEmails', 'If you would no longer like to receive emails like this one from Monster please click here to {unsubscribe}.', [
                'unsubscribe' => \HTML::a(['href' => \Request::host() . 'Numbers/Users/Users/Controller/Unsubscribe?token=' . \Crypt::nanoCreateStatic($user_id), 'value' => loc('NF.Message.Unsubscribe', 'unsubscribe')]),
            ]);
            $result .= '</td></tr>';
        }
        $result .= '<tr><td>' . $name;
        if ($address) {
            $result .= ' | ' . $address;
        }
        $result .= '</td></tr>';
        $result .= '</table>';
        return $result;
    }
}
