<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Helper;

use Object\ACL\Resources;
use Object\Controller\Authorized;
use NF\Error;

class Menu extends Authorized
{
    public function actionIndex()
    {
        \Layout::addCss('/numbers/media_submodules/Numbers_Users_Users_Media_CSS_Base.css');
        $menu_option_chosen = \Request::getStatic('menu_option_chosen', 'Account');
        $data = Resources::getStatic('menu', 'primary');
        // sanity check
        if (empty($data['all_items'][$menu_option_chosen])) {
            throw new \Exception('You must choose proper menu!');
        }
        // set title
        \Layout::$title_override = $data['all_items'][$menu_option_chosen]['name_loc'];
        \Layout::$icon_override = $data['all_items'][$menu_option_chosen]['icon'];
        //print_r2($data['all_items'][$menu_option_chosen]);
        $quick_action_ul_options = [];
        foreach ($data['quick_actions'][$menu_option_chosen]['options'] ?? [] as $k => $v) {
            $name = \HTML::icon(['type' => $v['icon']]) . ' ' . $v['name_loc'];
            $quick_action_ul_options[] = ['value' => \HTML::a(['href' => $v['url'], 'value' => $name])];
        }
        $quick_action_ul_html = $quick_action_ul_options ? \HTML::ul(['options' => $quick_action_ul_options, 'style' => 'padding: 0;']) : \HTML::message(['type' => 'warning', 'options' => [loc(Error::NO_ROWS_FOUND)]]);
        $quick_actions = \HTML::h5(['value' => loc('NF.Form.QuickActions', 'Quick Actions')]) . \HTML::hr() . $quick_action_ul_html;
        $menu_items = \HTML::h5(['value' => $data['all_items'][$menu_option_chosen]['name_loc']]) . \HTML::hr() . \HTML::tree(['options' => $data['all_items'][$menu_option_chosen]['options'], 'icon_key' => 'icon', 'loc_prefix' => 'NF.System.']);
        $grid = [
            'options' => [
                'Default' => [
                    'Quick Actions' => [
                        'Quick Actions' => [
                            'value' => $quick_actions,
                            'options' => [
                                'percent' => 25,
                                'style' => '',
                            ]
                        ],
                        'Menu Items' => [
                            'value' => $menu_items,
                            'options' => [
                                'percent' => 75,
                                'style' => 'border-left: 1px solid var(--bs-secondary)',
                            ]
                        ]
                    ],
                ],
            ]
        ];
        return \HTML::segment([
            'type' => 'primary',
            'value' => \HTML::grid($grid),
            'header' => [
                'icon' => [
                    'type' => $data['all_items'][$menu_option_chosen]['icon']
                ],
                'title' => loc('NF.Form.Menu', 'Menu')
            ]
        ]);
    }
}
