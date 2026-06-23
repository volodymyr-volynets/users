<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Form\List2\Frontend;

use Object\Form\Wrapper\List2;
use Numbers\Users\Dashboards\Model\Frontend\Dashboards;
use Object\Data\Model\DateTypes;
use Object\Form\Base;

class ViewDashboards extends List2
{
    public $form_link = 'd9_frontend_view_dashboards_list';
    public $module_code = 'D9';
    public $title = 'D/9 Frontend View Dashboards List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => false,
            'import' => false,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fa-solid fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX - 1000],
        'dashboards' => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX - 500, 'custom_renderer' => 'self::renderDashboards'],
    ];
    public $rows = [
        'tabs' => [
            'filter' => ['order' => 100, 'label_name' => 'Filter'],
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'filter' => [
                'filter' => ['container' => 'filter', 'order' => 100]
            ],
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'filter' => [
            // this needs to be hidden
            'd9_frontdash_id' => [
                'd9_frontdash_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Dashboard #', 'domain' => 'dashboard_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.d9_frontdash_id;>=', 'row_hidden' => true],
                'd9_frontdash_id2' => ['order' => 2, 'label_name' => 'Dashboard #', 'domain' => 'dashboard_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.d9_frontdash_id;<='],
                'd9_frontdash_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.d9_frontdash_inactive;=']
            ],
            'dates' => [
                'date1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Date (From)', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'date2' => ['order' => 2, 'label_name' => 'Date (To)', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'date_type' => ['order' => 3, 'label_name' => 'Date Type', 'domain' => 'group_code', 'null' => true, 'default' => 'LAST_30_DAYS', 'percent' => 50, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\DateTypes', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
            ],
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
        self::LIST_CONTAINER => [
            'row1' => [
                'd9_frontdash_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Dashboard #', 'domain' => 'dashboard_id', 'percent' => 10, 'url_edit' => true],
                'd9_frontdash_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 35],
                'd9_frontdash_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 30],
                'd9_frontdash_module_code' => ['order' => 4, 'label_name' => 'Module', 'domain' => 'module_code', 'percent' => 20, 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules'],
                'd9_frontdash_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Users\Dashboards\Model\Frontend\Dashboards';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'd9_frontdash_id' => SORT_ASC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'd9_frontdash_id' => ['name' => 'Dashboard #'],
        'd9_frontdash_code' => ['name' => 'Code'],
        'd9_frontdash_name' => ['name' => 'Name']
    ];

    public function refresh(Base & $form)
    {
        $form->options['actions']['refresh_'] = [
            'href' => \Request::redirect('/Numbers/Users/Dashboards/Controller/ViewDashboards/_Edit', null, [
                'd9_frontdash_id' => $form->values['d9_frontdash_id1'],
                '__refresh' => random_int(1000, 9999) . '_' . random_int(1000, 9999) . '_' . random_int(1000, 9999),
            ], [
                'return_value' => true,
            ]),
            'value' => loc('NF.Form.Refresh', 'Refresh'),
            'icon' => 'fa-solid fa-sync',
            'sort' => PHP_INT_MAX,
        ];

        if ($form->changed_field == 'date_type') {
            $form->values = array_merge($form->values, DateTypes::generateStartAndEndDates($form->values['date_type'], null));
        }
    }

    public function renderDashboards(& $form)
    {
        $data = Dashboards::queryBuilderStatic()
            ->select()
            ->withRelation('FrontendDashboardDetails')
            ->where('AND', ['d9_frontdash_id', '=', $form->values['d9_frontdash_id1']])
            ->limit(1)
            ->query('d9_frontdash_id');

        if (empty($data['rows'])) {
            throw new \Exception('Could not load dashboard.');
        }

        $result = [];
        foreach ($data['rows'][$form->values['d9_frontdash_id1']]['FrontendDashboardDetails'] as $k => $v) {
            $result[$v['d9_frontdshdet_order']] ??= [];
            $result[$v['d9_frontdshdet_order']][$k] = $v;
        }
        ksort($result);

        $css = <<<CSST
.numbers_frontend_form_list_pagination_container { display: none; }
.numbers_frontend_form_list_table_wrapper_outer { display: none; }
CSST;
        $html = '<table width="100%">';
        foreach ($result as $k => $v) {
            $html .= '<tr>';
            $html .= '<td>';
            foreach ($v as $k2 => $v2) {
                $class = 'nf_dashboard_o_' . $k . '_' . $k2;
                $id = $class . '_' . 'id';
                $width = $v2['d9_frontdshdet_x_end'] - $v2['d9_frontdshdet_x_start'] + 1;
                $height = $v2['d9_frontdshdet_y_end'] - $v2['d9_frontdshdet_y_start'] + 1 + 30;
                $html .= '<div class="' . $class . '" style="width: ' . $width . '%; height: ' . $height . 'px !important; float: left;">';
                $html .= '<fieldset class="border p-0">';
                $html .= '<legend  class="w-auto">' . $v2['d9_frontdshdet_name'] . '</legend>';
                $html .= '<div style="height: ' . ($height - 30) . 'px;" id="' . $id . '">' . $this->renderOneDashboard($id, $v2['d9_frontdshdet_d9_backdash_code'], $form->values) . '</div>';
                $html .= '</fieldset>';
                $html .= '</div>';
                $css .= "\n" . '.' . $class . ' { width: ' . $width . '%; height: ' . $height . 'px !important; }';
            }
            $html .= '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= \HTML::style(['value' => $css]);
        return $html;
    }

    public function renderOneDashboard($id, $d9_backdash_code, $parameters): string
    {
        $loading = loc('NF.Form.Loading3Dots', 'Loading...');
        $html = <<<HTMLT
            <div style="position: relative; width: 100%; height: 100%;">
                <div style="position: absolute; left: 40%; top: 50%;">{$loading}</div>
            </div>
HTMLT;
        $crypt = new \Crypt();
        $token = $crypt->tokenCreate(0, 'content.generator.view', ['d9_backdash_code' => $d9_backdash_code]);
        $needed_parameters = (new \Array2([0 => $parameters]))->only(['date1', 'date2', 'date_type'])->toArray();
        $js_variable = json_encode($needed_parameters[0] + [
            'd9_backdash_code' => $d9_backdash_code,
            'token' => urldecode($token),
        ]);
        $js = <<<JST
            fetch("/Numbers/Users/Dashboards/Controller/ViewDashboards/_ContentGenerator", {
                method: "POST",
                body: JSON.stringify({$js_variable}),
            })
            .then(response => response.text())
            .then(html => {
                $('#{$id}').html(html);
            });
JST;
        \Layout::onLoad($js);
        return $html;
    }
}
