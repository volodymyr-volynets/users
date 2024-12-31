<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Account;

use Numbers\Users\Documents\Base\Base;
use Object\Controller;

class Account extends Controller
{
    public $title = 'Account Name and Avatar';
    public function actionJsonMenuName()
    {
        if (\User::authorized()) {
            if (\User::get('photo_file_id')) {
                $avatar = \HTML::img(['src' => Base::generateURL(\User::get('photo_file_id'), true), 'class' => 'navbar-menu-item-avatar-img', 'alt' => 'Avatar', 'width' => 25, 'height' => 25]);
            } else {
                $avatar = \HTML::icon(['type' => 'fas fa-address-card']);
            }
            $short_name = \User::get('name');
            if (strlen($short_name) > 20) {
                $short_name = substr($short_name, 0, 20) . '...';
            }
            $label = '<span title="' . \User::get('name') . '">' . $avatar . ' ' . $short_name . '</span>';
            \Layout::renderAs([
                'success' => true,
                'error' => [],
                'data' => $label,
                'item' => \Request::input('item'),
            ], 'application/json');
        } else {
            \Layout::renderAs([
                'success' => false,
                'error' => [],
                'data' => null,
                'item' => null,
                'avatar' => null
            ], 'application/json');
        }
    }
}
