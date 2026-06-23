<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Form\Wrapper\Base;
use Object\ACL\Resources;

class Dashboard extends Base
{
    public $form_link = 'um_dashboard';
    public $module_code = 'UM';
    public $title = 'U/M Dashboard Form';
    public $options = [
        'segment' => self::SEGMENT_DASHBOARD,
        'actions' => [
            'refresh' => true,
        ],
        'skip_web_sockets' => true,
        //'no_ajax_form_reload' => true,
    ];
    public $containers = [
        'trees_container' => ['default_row_type' => 'grid', 'order' => 100],
    ];
    public $rows = [];
    public $elements = [
        'tree_container' => [
            'search' => [
                'search' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'placeholder' => 'Type here...', 'onkeyup' => "numbers_tree_search_for_text('numbers_tree_option_table_name_column_grouped', this);"]
            ],
            'tree' => [
                'tree' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'custom_renderer' => 'self::renderTreesListing']
            ],
        ],
    ];
    public $collection = [];
    public $notification = [];

    public $subforms = [];

    public function renderTreesListing(& $form, & $options, & $value, & $neighbouring_values)
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
        // render
        $grouped = [0 => [], 1 => [], 2 => [], 3 => []];
        $index = 0;
        foreach ($data as $k => $v) {
            $url = 'javascript:void(0);';
            $a_name = \String2::createStatic($v['name'])->englishOnly(true)->toString();
            if (!empty($v['url'])) {
                $url = \Request::fixUrl($v['url'], $v['template']);
                $name = \HTML::a(['href' => $url, 'value' => (!empty($v['icon']) ? (\HTML::icon(['type' => $v['icon']]) . ' ') : null) . loc('NF.System.' . $a_name, $v['name'])]);
            } else {
                $name = (!empty($v['icon']) ? (\HTML::icon(['type' => $v['icon']]) . ' ') : null) . loc('NF.System.' . $a_name, $v['name']);
            }
            if (!empty($v['options'])) {
                $name .= '<div class="numbers_postlogin_dashboard_content_inner">';
                $name .= \HTML::tree([
                    'options' => $v['options'],
                    'icon_key' => 'icon',
                    'loc_prefix' => 'NF.System.',
                    'collapse' => true,
                    'id_column' => 'menu_id',
                    'id' => 'form_um_dashboard_form_tree_' . $index,
                    'form_id' => 'form_um_dashboard_form',
                ]);
                $name .= '</div>';
            }
            $grouped[$index][] = $name;
            $index++;
            if ($index % 4 == 0) {
                $index = 0;
            }
        }
        $result = '';
        foreach ($grouped as $v) {
            $result .= '<div class="numbers_postlogin_dashboard_content_div">' . implode('<hr/>', $v) . '</div>';
        }
        return $result;
    }
}
