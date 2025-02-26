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

class Dashboard extends Authorized
{
    public function actionIndex()
    {
        \Layout::addCss('/numbers/media_submodules/Numbers_Users_Users_Media_CSS_Base.css');
        $data = Resources::getStatic('menu', 'primary');
        $data = $data[200] ?? [];
        if (!empty($data['Operations'])) {
            $temp = $data['Operations']['options'];
            unset($data['Operations']);
            $data = array_merge_hard($data, $temp);
        }
        if (!empty($data['Accounting'])) {
            $temp = $data['Accounting']['options'];
            unset($data['Accounting']);
            $data = array_merge_hard($data, $temp);
        }
        // translate
        //\I18n::translateArray($data, true);
        // render
        $groupped = [0 => [], 1 => [], 2 => [], 3 => []];
        $index = 0;
        foreach ($data as $k => $v) {
            $url = 'javascript:void(0);';
            if (!empty($v['url'])) {
                $url = \Request::fixUrl($v['url'], $v['template']);
            }
            $name = \HTML::a(['href' => $url, 'value' => (!empty($v['icon']) ? (\HTML::icon(['type' => $v['icon']]) . ' ') : null) . $v['name']]);
            if (!empty($v['options'])) {
                \I18n::translateArray($v['options'], true);
                $name .= '<div class="numbers_postlogin_dashboard_content_inner">';
                $name .= \HTML::tree(['options' => $v['options'], 'icon_key' => 'icon']);
                $name .= '</div>';
            }
            $groupped[$index][] = $name;
            $index++;
            if ($index % 4 == 0) {
                $index = 0;
            }
        }
        $result = '';
        foreach ($groupped as $v) {
            $result .= '<div class="numbers_postlogin_dashboard_content_div">' . implode('<hr/>', $v) . '</div>';
        }
        return \HTML::segment([
            'type' => 'primary',
            'value' => $result,
            'header' => [
                'icon' => [
                    'type' => 'fas fa-sitemap'
                ],
                'title' => i18n(null, 'Dashboard')
            ]
        ]);
    }
}
